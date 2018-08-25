"use strict";
$(document).ready(function () {

    // clock widget
    function date_Time() {
        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        var dayName =["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        $('#time_update').html(h + ":" + m + ":" + s);
        var t = setTimeout(date_Time, 1000);
        var y = today.getFullYear();
        var mo = today .getUTCMonth();
        var d = today .getDate();
        $('#update_date').html(d + " " + monthNames [mo] + " " + y);

        var day = today.getDay();
        $('#update_day').html( dayName [day]);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i}  // add zero in front of numbers < 10
        return i;
    }
    date_Time();

});