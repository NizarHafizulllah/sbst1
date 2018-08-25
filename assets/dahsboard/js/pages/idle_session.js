"use strict";
$(document).ready(function() {
    $(document).idleTimer(6000);

    $(function() {
        $(document).on("idle.idleTimer", function(event, elem, obj) {
            // function you want to fire when the user goes idle
            window.location = "lockscreen.html";
        });

        $(document).on("active.idleTimer", function(event, elem, obj, triggerevent) {
            // function you want to fire when the user becomes active again
        });

    });
});
