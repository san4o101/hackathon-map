
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('leaflet');
require('leaflet-control-geocoder');

$(document).ready(function() {

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

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    $.get("/user/map", function(data, status){
        createMarkers(data, layer);
    });

    findBtn.on('click', function (event) {
        event.preventDefault();
        $.get('/user/map', $('form#filterForm').serialize())
            .done(function(data) {
                layer.clearLayers();
                createMarkers(data, layer);
                L.layerGroup(layer).addTo(map);
            });
    });

    clearBtn.on('click', function (event) {
        event.preventDefault();
        $.get('/user/map', function (data, status) {
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
});
