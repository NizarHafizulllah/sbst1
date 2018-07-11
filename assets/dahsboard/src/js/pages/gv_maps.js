'use strict';
$(document).ready(function() {
    $(".sidebar-toggle").on("click", function() {
        styledmap.refresh();
        maptypes.refresh();
        search_placemap.refresh();
        $(window).trigger("resize");
    });

    var $gmap = $(".gmap");
    $gmap.css("height", "300px");


    // ==============styled map with markers=============
    var styledmap = new GMaps({
        div: "#gmap-styled",
        lat: 41.895465,
        lng: 12.482324,
        zoom: 5,
        zoomControl: true,
        zoomControlOpt: {
            style: "SMALL",
            position: "TOP_LEFT"
        },
        panControl: true,
        streetViewControl: false,
        mapTypeControl: false,
        overviewMapControl: false
    });
    var styles = [{
        stylers: [
            { hue: "#00ffe6" },
            { saturation: -20 }
        ]
    }, {
        featureType: "road",
        elementType: "geometry",
        stylers: [
            { lightness: 100 },
            { visibility: "simplified" }
        ]
    }, {
        featureType: "road",
        elementType: "labels",
        stylers: [
            { visibility: "off" }
        ]
    }];
    styledmap.addStyle({
        styles: styles,
        mapTypeId: "maps_style"
    });

    styledmap.setStyle("maps_style");
    var markers = [{
        lat: 45.464211,
        lng: 9.191383,
        title: "Marker #1",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Milan: HTML Content</strong>"
        }
    }, {
        lat: 41.895465,
        lng: 12.482324,
        title: "Marker #2",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Rome: HTML Content</strong>"
        }
    }, {
        lat: 48.864716,
        lng: 2.349014,
        title: "Marker #3",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Paris: HTML Content</strong>"
        }
    }, {
        lat: 64.135666,
        lng: -21.862675,
        title: "Marker #4",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Iceland: HTML Content</strong>"
        }
    }];
    styledmap.addMarkers(markers);
    // ================styled map with markers==================
    // ==============map types============
    var maptypes = new GMaps({
        el: '#gmap-types',
        lat: -12.043333,
        lng: -77.028333,
        mapTypeControlOptions: {
            mapTypeIds: ["terrain", "satellite", "osm", "cloudmade", "hybrid"]
        }
    });
    maptypes.addMapType("osm", {
        getTileUrl: function(coord, zoom) {
            return "http://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
        },
        tileSize: new google.maps.Size(256, 256),
        name: "OpenStreetMap",
        maxZoom: 18
    });
    maptypes.addMapType("cloudmade", {
        getTileUrl: function(coord, zoom) {
            return "http://b.tile.cloudmade.com/8ee2a50541944fb9bcedded5165f09d9/1/256/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
        },
        tileSize: new google.maps.Size(256, 256),
        name: "CloudMade",
        maxZoom: 18
    });
    maptypes.setMapTypeId("terrain");
    // ================map types========================
    // ============================================adv maps js=============================
    // =====================search place====================
    var search_placemap = new GMaps({
        div: '#map1',
        lat: 43.654438,
        lng: -79.380699,
        zoom: 3
    });
    var input = document.getElementById('address');
    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(-33.8902, 151.1759),
        new google.maps.LatLng(-33.8474, 151.2631));
    var options = {
        bounds: defaultBounds,
        types: ['establishment']
    };
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    $('#geocoding_form').submit(function(e) {
        e.preventDefault();
        search_placemap.removeMarkers();
        GMaps.geocode({
            address: $('#address').val().trim(),
            callback: function(results, status) {
                if (status == 'OK') {
                    var latlng = results[0].geometry.location;
                    search_placemap.setCenter(latlng.lat(), latlng.lng());
                    search_placemap.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng()
                    });
                    search_placemap1.setZoom(3);
                }
            }
        });
    });
    // ============search places=============
    // ==============vector map ===========
    $(function() {
        $('#world-map').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: true,
            regionStyle: {
                initial: {
                    fill: '#2283BF',
                    "fill-opacity": 1,
                    stroke: '#a5ded9',
                    "stroke-width": 0,
                    "stroke-opacity": 0
                },
                hover: {
                    "fill-opacity": 0.5
                }
            },
            backgroundColor: '#fff'
        });
         $('#asia-map').vectorMap({
            map: 'asia_mill',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: true,
             regionStyle: {
                initial: {
                    fill: '#7ec4e7',
                    "fill-opacity": 1,
                    stroke: '#a5ced9',
                    "stroke-width": 0,
                    "stroke-opacity": 0
                },
                hover: {
                    "fill-opacity": 0.5
                }
            },
            backgroundColor: '#fff'
        });
    });
    // ==============vector map end===========
});
