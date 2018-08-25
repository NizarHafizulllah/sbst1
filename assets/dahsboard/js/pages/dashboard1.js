"use strict";
$(document).ready(function () {
    // sales morris chart
    Morris.Bar({
        element: 'sales_chart',
        data: [
            {y: '2009', a: 70, b: 48},
            {y: '2010', a: 97, b: 63},
            {y: '2011', a: 58, b: 45},
            {y: '2012', a: 70, b: 48},
            {y: '2013', a: 43, b: 35},
            {y: '2014', a: 65, b: 43},
            {y: '2015', a: 77, b: 61},
            {y: '2016', a: 43, b: 35}
        ],
        resize: true,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Model A', 'Model B'],
        barColors: ["#2283BF", "#E7EFF5"],
        hideHover: 'auto',
        gridLineColor: '#E5E5E5'
    });
    // sparkline charts of visits sales etc..

    function spark_product() {
        $("#product_status").sparkline([209, 210, 209, 210, 210, 211, 212, 210, 210, 211, 213, 212, 211, 210, 212, 211, 210, 212, 209, 210, 209, 210, 210, 211, 212, 210, 210, 211, 213, 212, 211, 210, 212, 211, 210, 212], {
            type: 'line',
            width: '100%',
            height: '70',
            lineColor: '#2283BF',
            fillColor: '#B2D3E7',
            tooltipSuffix: 'Total Views',
            highlightLineColor: 'rgba(0,0,0,0)'
        });
    }

    spark_product();
    $(window).on('resize', function () {
        spark_product();
    });
    $(".sidebar-toggle").on("click", function () {
        setTimeout(spark_product, 0);
        $(window).trigger("resize");
    });
});

