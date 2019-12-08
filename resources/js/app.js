
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('leaflet');
require('leaflet-control-geocoder');

$(document).ready(function() {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    let rangeProd = $('#rangeProd');
    let spec = $('#spec');
    let type = $('#type');
    let findBtn = $('#find');
    let clearBtn = $('#clear');
    let street = $('#street');
    let supplier = $('#supplier');

    let icon = new L.Icon.Default();
    icon.options.shadowSize = [0,0];

    let layer = L.layerGroup();
    let map = L.map('map', {
        center: [48.5097, 32.2656],
        zoom: 13,
        layers: [layer]
    });

    let geocoder = L.Control.Geocoder.nominatim();
    let control = L.Control.geocoder({
        geocoder: geocoder
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    $.get("/map", function(data, status){
        createMarkers(data, layer);
        //map.removeLayer(layer);
    });

    findBtn.on('click', function (event) {
        event.preventDefault();
        $.get('/map', $('form#filterForm').serialize())
            .done(function(data) {
                layer.clearLayers();
                createMarkers(data, layer);
                L.layerGroup(layer).addTo(map);
            });
    });

    clearBtn.on('click', function (event) {
        event.preventDefault();
        $.get('/map', function (data, status) {
            createMarkers(data, layer);
            clearFilter();
        });
    });

    function createMarkers(data, layer) {
        for(let item in data) {
            L.marker([data[item].latitude, data[item].longitude], {icon : icon}).addTo(layer).bindPopup(data[item].name + "<br>"
                + data[item].street + " " + data[item].number + "<br>"
                + "Пн. " + data[item].opening.monday + "<br>"
                + "Вт. " + data[item].opening.tuesday + "<br>"
                + "Ср. " + data[item].opening.wednesday + "<br>"
                + "Чт. " + data[item].opening.thursday + "<br>"
                + "Пт. " + data[item].opening.friday + "<br>"
                + "Сб. " + data[item].opening.saturday + "<br>"
                + "Нд. " + data[item].opening.sunday);
        }
    }

    function clearFilter() {
        rangeProd.val('');
        spec.val('');
        type.val('');
        street.val('');
        supplier.val('');
    }

    let popup = L.popup();
    let marker;
    let streetModal = $('#streetModal');
    let houseNumberModal = $('#houseNumberModal');
    let lngHiddenModal = $('#lngHiddenModal');
    let latHiddenModal = $('#latHiddenModal');
    let modalForm = $('#modalForm');
    let saveModal = $('#saveModal');
    function onMapClick(e) {
        geocoder.reverse(e.latlng, map.options.crs.scale(map.getZoom()), function(results) {
            let r = results[0];
            let address = r.properties.address;
            if (r) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(r.center, {icon: icon}).bindPopup(r.html || r.name).addTo(map);
                latHiddenModal.val(r.center.lat);
                lngHiddenModal.val(r.center.lng);
                streetModal.val(address.road);
                houseNumberModal.val(address.house_number);
                $('#modalWindow').modal();
            }
        });
    }

    saveModal.on('click', function() {
        $.ajax({
            type: "POST",
            url: '/create',
            data: {
                _token: CSRF_TOKEN,
                data: modalForm.serializeArray()
            },
        }).fail(function(data, status) {
            modalForm.parent().parent().css('border', '3px solid red');
        }).done(function (data, status) {
            $('#modalWindow').modal('hide');
            $.get('/map', $('form#filterForm').serialize())
                .done(function(data) {
                    layer.clearLayers();
                    createMarkers(data, layer);
                    L.layerGroup(layer).addTo(map);
                });
        })
    });

    map.on('click', onMapClick);
});
