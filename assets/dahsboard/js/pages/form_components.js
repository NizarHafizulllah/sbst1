"use strict";
$(document).ready(function () {
// Select2
    $(".select2").select2(
        {
            width: "100%"
        }
    );
    $(".tokenizer").select2({
        tags: true,
        width: "100%",
        tokenSeparators: [',', ' ']
    });
    $(".js-example-disabled-multi").select2();

    $(".js-example-disabled-multi").prop("disabled", false);
    //Date range picker
    $('#reservation').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    }).on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    }).on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    //Date range picker with time picker
    $("#reservationtime").daterangepicker({
        timePicker: true,
        autoUpdateInput: false,
        timePickerIncrement: 30,
        locale: {
            cancelLabel: 'Clear'
        }
    }).on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY h:mm A') + ' - ' + picker.endDate.format('MM/DD/YYYY h:mm A'));
    }).on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    //clock pickers and call back

    $('.clockpicker').clockpicker({
        placement: 'bottom',
        align: 'left',
        donetext: 'Done'
    });
    var input = $('.clockpicker-with-callbacks').clockpicker({
        donetext: 'Done',
        placement: "bottom",
        init: function () {
            console.log("colorpicker initiated");
        },
        beforeShow: function () {
            console.log("before show");
        },
        afterShow: function () {
            console.log("after show");
        },
        beforeHide: function () {
            console.log("before hide");
        },
        afterHide: function () {
            console.log("after hide");
        },
        beforeHourSelect: function () {
            console.log("before hour selected");
        },
        afterHourSelect: function () {
            console.log("after hour selected");
        },
        beforeDone: function () {
            console.log("before done");
        },
        afterDone: function () {
            console.log("after done");
        }
    });
     // air datepicker code
    Date.prototype.addDays = function (days) {
        var dat = new Date(this.valueOf());
        dat.setDate(dat.getDate() + days);
        return dat;
    };
    var dat = new Date();
    $('#my-element').datepicker();
    $('#timepick').datepicker();
    $('#dateranges').datepicker();
    var disabledDays = [0, 6];

    // bootstrap switches
    $("[name='my-checkbox']").bootstrapSwitch();
//============button-size-change=======
    $(".changesize").on("click", function () {
        $("#switchsize").bootstrapSwitch("size", $(this).text());
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();

    $(".my-colorpicker2").colorpicker(
        {
            format: 'rgba'
        }
    );
    $("#cp3").colorpicker();
    $(".disable-button").on("click", function(e) {
        e.preventDefault();
        $("#cp10").colorpicker('disable');
    });

    $(".enable-button").on("click", function(e) {
        e.preventDefault();
        $("#cp10").colorpicker('enable');
    });
    $('#cp10').colorpicker();

});