
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('leaflet');

var icon = new L.Icon.Default();
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
$.get("/map", function(data, status){
    createMarkers(data, layer);
    //map.removeLayer(layer);
});


function createMarkers(data, layer) {
    for(let item in data) {
        L.marker([data[item].latitude, data[item].longitude], {icon : icon}).addTo(layer).bindPopup(data[item].name + "<br>"
            + "Пн. " + data[item].opening.monday + "<br>"
            + "Вт. " + data[item].opening.tuesday + "<br>"
            + "Ср. " + data[item].opening.wednesday + "<br>"
            + "Чт. " + data[item].opening.thursday + "<br>"
            + "Пт. " + data[item].opening.friday + "<br>"
            + "Сб. " + data[item].opening.saturday + "<br>"
            + "Нд. " + data[item].opening.sunday);
    }
}

$('#find').on('click', function (event) {
    event.preventDefault();
    $.get('/map', $('form').serialize())
        .done(function(data) {
            layer.clearLayers();
            createMarkers(data, layer);
            var layerGroup = L.layerGroup(layer).addTo(map);

        });
});
