"use strict";
$(document).ready(function() {

    // chartjs main chart

    var linechart = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "Product 1",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#2283BF",
            borderColor: "#2283BF",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'none',
            pointBorderColor: "#6F7474",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#2283BF",
            pointHoverBorderColor: "#FFF",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [50, 65, 53, 70, 60, 75, 85],
            spanGaps: false
        }, {
            label: "Product 2",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "#75D1A3",
            borderColor: "#75D1A3",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#75D1A3",
            pointHoverBorderColor: "#FFF",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [57, 60, 70, 53, 59, 56, 75],
            spanGaps: false
        }]
    };

    function line_chart() {

        var line_data = '#line_chart';

        $(line_data).attr('width', $(line_data).parent().width());
        var myDoughnut = new Chart($("#line_chart"), {
            type: 'line',
            data: linechart,
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: "#e1e1e1"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "#e1e1e1"
                        }
                    }]
                }
            }
        });
    }

    line_chart();


    // load charts

    var lpoints = [11, 21, 31, 21, 31, 1, 91, 41, 31, 11, 11, 21, 11, 11, 11, 21, 11, 11, 12, 31, 21, 13];

    function server_loader() {
        var load = 5 + parseInt(Math.random() * 90 - 5);
        if (load < 25) {
            load = 25;
        }
        if (load > 100) {
            load = 90;
        }
        lpoints.shift();
        lpoints.push(load);
        $('#server_load').sparkline(lpoints, {
            width: '100%',
            height: '55',
            fillColor: '#E5F0FB',
            lineColor: '#2283BF',
            tooltipSuffix: '%'
        });
        setTimeout(server_loader, 1000);
    }

    server_loader();

    function cpu_load() {
        var barParentdiv = $('#cpu_load').closest('div');
        var barCount = [111, 121, 131, 121, 131, 101, 91, 141, 131, 111, 111, 121, 111, 111, 101, 121, 111, 111];
        var barSpacing = 2;
        $("#cpu_load").sparkline(barCount, {
            type: 'bar',
            width: '100%',
            barWidth: (barParentdiv.width() - (barCount.length * barSpacing)) / barCount.length,
            height: '55',
            barSpacing: barSpacing,
            barColor: '#EFD79B',
            tooltipSuffix: ' %'
        });
    }

    cpu_load();

    $(window).on('resize', function () {
        cpu_load();
    });
    $(".sidebar-toggle").on("click", function () {
        setTimeout(cpu_load, 0);
        $(window).trigger("resize");
    });

    //start doughnut chart
    var doughnutData = {

        labels: [
            "Mexico",
            "Tschechien",
            "Venezuela"
        ],
        datasets: [{
            data: [250, 210, 100],
            backgroundColor: [
                "#E1E1E1",
                "#2283BF",
                "#9BC7E2"
            ],
            hoverBackgroundColor: [
                "#E1E1E1",
                "#2283BF",
                "#9BC7E2"
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

    function map_marker() {
        var cityAreaData = [
                700.70,
                210.69,
                920.17
            ],
            key = [
                'Mexico',
                'Tschechien',
                'Venezuela'
            ];

        var cityAreaDataKey = [];
        for (var i = 0, lengt = cityAreaData.length; i < lengt; i++) {
            cityAreaDataKey[i] = {
                label: key[i],
                data: cityAreaData[i]
            }
        }



        $('#map-visitor-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            zoomOnScroll: true,
            focusOn: {
                x: 0,
                y: 0,
                scale: 0.9
            },
            zoomMin: 0.9,
            hoverColor: false,
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
            markerStyle: {
                initial: {
                    fill: '#ff5722',
                    stroke: 'rgba(230,140,110,.8)',
                    "fill-opacity": 1,
                    "stroke-width": 9,
                    "stroke-opacity": 0.5,
                    r: 3
                },
                hover: {
                    stroke: '#D83400',
                    "stroke-width": 2
                },
                selected: {
                    fill: 'blue'
                },
                selectedHover: {}
            },
            backgroundColor: '#ffffff',
            markers: [

                { latLng: [37.71, -103.00], name: 'Mexico' },
                { latLng: [50.03, 14.43], name: 'Tschechien' },
                { latLng: [6.42, -66.58], name: 'Venezuela' }

            ],
            series: {
                markers: [{
                    attribute: 'r',
                    scale: [3, 7],
                    values: cityAreaData
                }]
            }
        });
    }
    map_marker();


});
