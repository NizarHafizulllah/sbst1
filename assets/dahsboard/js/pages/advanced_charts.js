"use strict";
$(document).ready(function() {

    //start pie chart
    var pieData = {
        labels: [
            "Default",
            "Primary"

        ],
        datasets: [{
            data: [300, 80],
            backgroundColor: [
                "#E1E1E1",
                "#2283BF"

            ],
            hoverBackgroundColor: [
                "#E1E1E1",
                "#2283BF"

            ]
        }]
    };

    function draw4() {

        var selector5 = '#pie-chart';

        $(selector5).attr('width', $(selector5).parent().width());
        var myPie = new Chart($("#pie-chart"), {
            type: 'pie',
            data: pieData
        });
    }

    draw4();

    //end pie chart

    //start doughnut chart
    var doughnutData = {

        labels: [
            "Default",
            "Primary"
        ],
        datasets: [{
            data: [300, 100],
            backgroundColor: [
                "#E1E1E1",
                "#2283BF"
            ],
            hoverBackgroundColor: [
                "#E1E1E1",
                "#2283BF"
            ]
        }]

    };

    function draw5() {

        var selector6 = '#doughnut-chart';

        $(selector6).attr('width', $(selector6).parent().width());
        var myDoughnut = new Chart($("#doughnut-chart"), {
            type: 'doughnut',
            data: doughnutData
        });
    }

    draw5();


    //end doughnut chart
    //start polar area chart
    var chartData = {
        datasets: [{
            data: [
                15,
                8,
                10
            ],
            backgroundColor: [
                "#2283bf",
                "#7ec4e7",
                "#e1e1e1"
            ]
            // label: 'My dataset' // for legend
        }],
        labels: [
            "data1",
            "data2",
            "data3"
        ]
    };

    function draw3() {

        var selector4 = '#polar-area-chart';

        $(selector4).attr('width', $(selector4).parent().width());
        var myPolarArea = new Chart($("#polar-area-chart"), {
            data: chartData,
            type: 'polarArea'
        });
    }
    draw3();

    //end polar area chart

    /*Advanced SMIL Animations Chart*/

    var data = {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        series: [
            [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
            [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4]
        ]
    };
    var options = {
        low: 0
    };
    var chart7 = new Chartist.Line('.ct-chart', data, options);

    var seq1 = 0,
        delays = 80,
        durations = 500;

    chart7.on('created', function() {
        seq1 = 0;
    });

    chart7.on('draw', function(data) {
        seq1++;

        if (data.type === 'line') {
            data.element.animate({
                opacity: {
                    begin: seq1 * delays + 1000,
                    dur: durations,
                    from: 0,
                    to: 1
                }
            });
        } else if (data.type === 'label' && data.axis === 'x') {
            data.element.animate({
                y: {
                    begin: seq1 * delays,
                    dur: durations,
                    from: data.y + 100,
                    to: data.y,
                    easing: 'easeOutQuart'
                }
            });
        } else if (data.type === 'label' && data.axis === 'y') {
            data.element.animate({
                x: {
                    begin: seq1 * delays,
                    dur: durations,
                    from: data.x - 100,
                    to: data.x,
                    easing: 'easeOutQuart'
                }
            });
        } else if (data.type === 'point') {
            data.element.animate({
                x1: {
                    begin: seq1 * delays,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                x2: {
                    begin: seq1 * delays,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                opacity: {
                    begin: seq1 * delays,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: 'easeOutQuart'
                }
            });
        } else if (data.type === 'grid') {
            var pos1Animation = {
                begin: seq1 * delays,
                dur: durations,
                from: data[data.axis.units.pos + '1'] - 30,
                to: data[data.axis.units.pos + '1'],
                easing: 'easeOutQuart'
            };

            var pos2Animation = {
                begin: seq1 * delays,
                dur: durations,
                from: data[data.axis.units.pos + '2'] - 100,
                to: data[data.axis.units.pos + '2'],
                easing: 'easeOutQuart'
            };

            var animations = {};
            animations[data.axis.units.pos + '1'] = pos1Animation;
            animations[data.axis.units.pos + '2'] = pos2Animation;
            animations['opacity'] = {
                begin: seq1 * delays,
                dur: durations,
                from: 0,
                to: 1,
                easing: 'easeOutQuart'
            };

            data.element.animate(animations);
        }
    });

    chart7.on('created', function() {
        if (window.__exampleAnimateTimeout) {
            clearTimeout(window.__exampleAnimateTimeout);
            window.__exampleAnimateTimeout = null;
        }
        window.__exampleAnimateTimeout = setTimeout(chart7.update.bind(chart7), 12000);
    });
    // Advanced SMIL Animations Chart ends

    // line chart
    var data6 = {
        labels: ['Week1', 'Week2', 'Week3', 'Week4', 'Week5', 'Week6'],
        series: [
            [5, 4, 3, 7, 5, 10],
            [3, 2, 9, 5, 4, 6]
        ]
    };
    // We are setting a few options for our chart and override the defaults
    var options6 = {
        showPoint: false,
        lineSmooth: false,
        axisX: {
            showGrid: false,
            showLabel: false
        },
        axisY: {
            offset: 60,
            labelInterpolationFnc: function(value) {
                return '$' + value + 'm';
            }
        }
    };
    new Chartist.Line('.ct-chart6', data6, options6);
    // line chart ends

    // bar chart

    var data1 = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [
            [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
            [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
        ]
    };

    var options1 = {
        seriesBarDistance: 15
    };

    var responsiveOptions1 = [
        ['screen and (min-width: 641px) and (max-width: 1024px)', {
            seriesBarDistance: 10,
            axisX: {
                labelInterpolationFnc: function(value) {
                    return value;
                }
            }
        }],
        ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
                labelInterpolationFnc: function(value) {
                    return value[0];
                }
            }
        }]
    ];

    new Chartist.Bar('.ct-chart1', data1, options1, responsiveOptions1);

    // bar chart ends
    //sidebar toggle
    $(".sidebar-toggle").on("click", function() {
        new Chartist.Line('.ct-chart', data, options);
        new Chartist.Bar('.ct-chart1', data1, options1, responsiveOptions1);
        new Chartist.Line('.ct-chart6', data6, options6);
        new Chartist.Line('.ct-chart7', data7, options7);
    });

});
