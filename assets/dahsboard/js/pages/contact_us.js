'use strict';
$(document).ready(function () {
    $(".sidebar-toggle").on("click", function () {
        maplocation.refresh();
        $(window).trigger("resize");
    });
    var maplocation = new GMaps({
        el: '#gmap_location',
        lat: 45.464211,
        lng: 9.191383,
        zoom:13,
        zoomControl: true,
        mapTypeControlOptions: {
            mapTypeIds: ["terrain", "satellite", "osm", "cloudmade", "hybrid"]
        }
    });

    maplocation.setMapTypeId("terrain");
    var markers = [{
        lat: 45.464211,
        lng: 9.191383,
        title: "Marker #1",
        animation: google.maps.Animation.DROP,
        infoWindow: {
            content: "<strong>Milan: HTML Content</strong>"
        }
    }];
    maplocation.addMarkers(markers);
});