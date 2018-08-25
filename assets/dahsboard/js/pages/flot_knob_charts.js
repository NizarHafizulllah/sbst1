"use strict";
$(document).ready(function () {
    /* line chart */

    function showTooltipStats(x, y, contents) {
        $('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5
        }).appendTo("body").fadeIn(200);
    }

//line chart start
    $(function () {

        var d1, d2, data, Options;

        d1 = [
            [1262304000000, 100],
            [1264982400000, 560],
            [1267401600000, 1605],
            [1270080000000, 1129],
            [1272672000000, 2163],
            [1275350400000, 1905],
            [1277942400000, 2002],
            [1280620800000, 2917],
            [1283299200000, 2700],
            [1285891200000, 2700],
            [1288569600000, 2100],
            [1291161600000, 2700]
        ];

        d2 = [
            [1262304000000, 434],
            [1264982400000, 232],
            [1267401600000, 875],
            [1270080000000, 553],
            [1272672000000, 975],
            [1275350400000, 1379],
            [1277942400000, 789],
            [1280620800000, 1026],
            [1283299200000, 1240],
            [1285891200000, 1892],
            [1288569600000, 1147],
            [1291161600000, 2256]
        ];

        data = [{
            label: "Total visitors",
            data: d1,
            color: "#E1E1E1"
        }, {
            label: "Total Sales",
            data: d2,
            color: "#2283BF"
        }];

        Options = {
            xaxis: {
                min: (new Date(2009, 12, 1)).getTime(),
                max: (new Date(2010, 11, 2)).getTime(),
                mode: "time",
                tickSize: [1, "month"],
                monthNames: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
                tickLength: 0
            },
            yaxis: {},
            series: {
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 2
                },
                points: {
                    show: true,
                    radius: 4.5,
                    fill: true,
                    fillColor: "#ffffff",
                    lineWidth: 2
                }
            },
            grid: {
                hoverable: true,
                clickable: false,
                borderWidth: 0
            },
            legend: {
                container: '#basicFlotLegend',
                show: true
            },

            tooltip: true,
            tooltipOpts: {
                content: '%s: %y'
            }

        };


        var holder = $('#line-chart');

        if (holder.length) {
            $.plot(holder, data, Options);
        }


    });
//line chart end

//start bar stack
    var d11 = [
        ["Jan", 130],
        ["Feb", 63],
        ["Mar", 104],
        ["Apr", 54],
        ["May", 92],
        ["Jun", 150],
        ["Jul", 50],
        ["Aug", 80],
        ["Sep", 120],
        ["Oct", 91],
        ["Nov", 79],
        ["Dec", 112]
    ];
    var d12 = [
        ["Jan", 58],
        ["Feb", 30],
        ["Mar", 46],
        ["Apr", 35],
        ["May", 55],
        ["Jun", 46],
        ["Jul", 20],
        ["Aug", 50],
        ["Sep", 50],
        ["Oct", 40],
        ["Nov", 35],
        ["Dec", 57]
    ];
    $.plot("#bar-chart-stacked", [{
        data: d11,
        label: "New Visitor",
        color: "#E1E1E1"
    }, {
        data: d12,
        label: "Returning Visitor",
        color: "#2283BF"
    }], {
        series: {
            stack: !0,
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#ddd",
            borderWidth: 1,
            hoverable: !0
        },
        legend: {
            container: '#basicFlotLegend-stac',
            show: true
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#ddd",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#ddd"
        },
        shadowSize: 0
    });
//end bar chart stack

    /* server load  */

    var data = [],
        totalPoints = 300;

    function getRandomData() {
        if (data.length > 0)
            data = data.slice(1);

        // do a random walk
        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50;
            var y = prev + Math.random() * 10 - 5;
            if (y < 0)
                y = 0;
            if (y > 100)
                y = 100;
            data.push(y);
        }

        // zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i)
            res.push([i, data[i]])
        return res;
    }

// setup control widget
    var updateInterval = 50;

// setup plot
    var options = {
        colors: ["#E1E1E1"],
        series: {
            shadowSize: 0,
            lines: {
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.5
                    }, {
                        opacity: 0.5
                    }]
                }
            }
        },
        yaxis: {
            min: 0,
            max: 120
        },
        xaxis: {
            show: false
        },
        grid: {
            backgroundColor: '#fff',
            borderWidth: 1,
            borderColor: '#fff'
        }
    };

    var plot4 = $.plot($("#realtime"), [getRandomData()], options);

    function update() {
        plot4.setData([getRandomData()]);
        // since the axes don't change, we don't need to call plot.setupGrid()
        plot4.draw();
        setTimeout(update, updateInterval);
    }

    update();
    $(".knob").knob();
});