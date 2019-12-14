
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

    let modalFormEdit = $('#EditModalWindow');
    let EditSaveModal = $('#EditSaveModal');
    let EditModalForm = $('#modalFormEdit');

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

    jQuery(document).on('click', '.deleteBtn', function(e){
        e.preventDefault();
        let marker = $(this).data('id');
        $.ajax({
            url: '/' + marker + '/delete',
            type: 'DELETE',
            data: {
                _token: CSRF_TOKEN,
            },
            success: function(response) {
                $.get("/map", function(data){
                    layer.clearLayers();
                    createMarkers(data, layer);
                    L.layerGroup(layer).addTo(map);
                });
                showCreateDeleteModal('Успішно вилдалено!');
            },
            fail: function (response) {
                alert('На сервері виникла помилка, маркер не видалено!')
            }
        });
    });

    jQuery(document).on('click', '.editBtn', function(e){
        e.preventDefault();
        let marker = $(this).data('id');
        $.ajax({
            url: '/' + marker + '/edit',
            type: 'GET',
            success: function(response) {
                let name = $('#nameModalEdit');
                let supplier = $('#supplierModalEdit');
                let erdpouCode = $('#erdpouCodeModalEdit');
                let latModal = $('#latModalEdit');
                let lngModal = $('#lngModalEdit');
                let street = $('#streetModalEdit');
                let houseNumber = $('#houseNumberModalEdit');
                let homeDesc = $('#homeDescModalEdit');
                let retailSpace = $('#retailSpaceModalEdit');
                let rangeProd = $('#rangeProdModalEdit');
                let spec = $('#specModalEdit');
                let type = $('#typeModalEdit');
                let monday = $('#mondayModalEdit');
                let tuesday = $('#tuesdayModalEdit');
                let wednesday = $('#wednesdayModalEdit');
                let thursday = $('#thursdayModalEdit');
                let friday = $('#fridayModalEdit');
                let saturday = $('#saturdayModalEdit');
                let sunday = $('#sundayModalEdit');
                let openingDesc = $('#openingDescModalEdit');
                name.val(response.name);
                supplier.val(response.supplier);
                erdpouCode.val(response.erdpou_code);
                latModal.val(response.latitude);
                lngModal.val(response.longitude);
                street.val(response.street);
                houseNumber.val(response.number);
                homeDesc.val(response.homeDesc);
                retailSpace.val(response.retail_space);
                rangeProd.val(response.product_range_id);
                spec.val(response.specialization_id);
                type.val(response.object_type_id);
                monday.val(response.opening.monday);
                tuesday.val(response.opening.tuesday);
                wednesday.val(response.opening.wednesday);
                thursday.val(response.opening.thursday);
                friday.val(response.opening.friday);
                saturday.val(response.opening.saturday);
                sunday.val(response.opening.sunday);
                openingDesc.val(response.opening_desc);

                modalFormEdit.modal();
            },
            fail: function (response) {
                alert('На сервері виникла помилка!')
            }
        });
    });

    function createMarkers(data, layer) {
        for(let item in data) {
            L.marker([data[item].latitude, data[item].longitude], {icon : icon}).addTo(layer).bindPopup(
                "<button type='button' data-id='" + data[item].id +
                "' class='editBtn btn btn-sm btn-outline-primary mr-2'>Редагувати</button>"
                + "<button type='button' data-id='" + data[item].id +
                "' class='deleteBtn btn btn-sm btn-outline-danger'>Видалити</button>" + "<br>"

                + data[item].name + "<br>"
                + data[item].street + " " + data[item].number + "<br>"
                + "Пн. " + data[item].opening.monday + "<br>"
                + "Вт. " + data[item].opening.tuesday + "<br>"
                + "Ср. " + data[item].opening.wednesday + "<br>"
                + "Чт. " + data[item].opening.thursday + "<br>"
                + "Пт. " + data[item].opening.friday + "<br>"
                + "Сб. " + data[item].opening.saturday + "<br>"
                + "Нд. " + data[item].opening.sunday + "<br>"
                + data[item].opening_desc);
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
    let streetModal = $('#streetModalCreate');
    let houseNumberModal = $('#houseNumberModalCreate');
    let lngHiddenModal = $('#lngModalCreate');
    let latHiddenModal = $('#latModalCreate');
    let modalForm = $('#modalFormCreate');
    let saveModal = $('#CreateSaveModal');
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
                $('#CreateModalWindow').modal();
            }
        });
    }

    function showCreateDeleteModal(text) {
        let centerModal = $('#centerModal');
        centerModal.find('.bodyText').text(text);
        centerModal.modal();
    }

    function reloadMarkers()
    {
        $.get('/map', $('form#filterForm').serialize())
            .done(function(data) {
                layer.clearLayers();
                createMarkers(data, layer);
                L.layerGroup(layer).addTo(map);
            });
    }

    EditSaveModal.on('click', function() {
        let marker = $('.editBtn').data('id');
        let _this = $(this);
        $.ajax({
            type: "POST",
            url: '/' + marker + '/edit',
            data: {
                _token: CSRF_TOKEN,
                data: EditModalForm.serializeArray()
            },
        }).fail(function(data, status) {
            _this.parent().parent().css('border', '3px solid red');
        }).done(function (data, status) {
            $('#EditModalWindow').modal('hide');
            showCreateDeleteModal('Успішно відредаговано!');
            reloadMarkers();
        })
    });

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
            $('#CreateModalWindow').modal('hide');
            showCreateDeleteModal('Успішно створено!');
            reloadMarkers();
        })
    });

    $('#CreateModalWindow').on('hidden.bs.modal', function () {
        map.removeLayer(marker);
    });

    map.on('click', onMapClick);
});
