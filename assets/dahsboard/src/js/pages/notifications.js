"use strict";
$(document).ready(function () {
    $('#notific8Test').on('click', function (event) {
        var params = {
                life: $('#notific8Life').find('option:selected').val(),
                theme: $('#notific8Theme').val(),
                sticky: $('#notific8Sticky').is(':checked'),
                horizontalEdge: $('#notific8horizontal').find('option:selected').val(),
                verticalEdge: $('#notific8vertical').find('option:selected').val()
            },
            text = $('#notific8Text').val(),
            $heading = $('#notific8Heading');

        if ($.trim($heading.val()) !== '') {
            params.heading = $heading.val();
        }
        // show notification
        $.notific8(text, params);
    });
    $(".content .row").find('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('[type="reset"]').on('click', function () {
        setTimeout(function () {
            $("input").iCheck("update");
        }, 10);
    });
});