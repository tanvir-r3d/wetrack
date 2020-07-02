/*=========================================================================================
    File Name: timeline.js
    Description: Checkbox & Radio buttons with icheck, bootstrap switch & switchery etc..
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
    'use strict';

    // Checkbox & Radio 1
    $('.icheck-task input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
    });

})(window, document, jQuery);
$(window).on("load", function () {
    // initialize the Dragable Marker map
    var mapsLeafletMarkerDragable = L.map('maps-leaflet-marker-dragable').setView([48.861927, 2.349833], 12);
    var mapsLeafletMarkerLoc = L.marker([48.861927, 2.349833], {
        draggable: 'true'
    }).addTo(mapsLeafletMarkerDragable);
    mapsLeafletMarkerLoc.bindPopup("<b>I am at Paris!</b><br>Got more Chill!!!.").openPopup();
    L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
        maxZoom: 18,
    }).addTo(mapsLeafletMarkerDragable);

    // candle stick chart for timeline center's compaign report
    // custom colors declaration
    var $blue = '#2dcee3', //$info
        $danger = '#ff7588', //$danger
        $orange = '#ffa87d', //$warning
        $green = '#16d39a', //$success
        $cyan = '#00b5b8'; //$primary

    var $themeColor = [$cyan, $green, $orange, $blue, $danger]
    // columnBasicChart for timeline center's campaign report section
    var columnBasicChart = {
        chart: {
            height: 350,
            type: 'bar',
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Net Profit',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: 'Revenue',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
            name: 'Free Cash Flow',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
            title: {
                text: '$ (thousands)'
            }
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        },
        fill: {
            colors: $themeColor
        }
    }
    // Initializing Candlestick Basic Chart
    var basicColumnChart = new ApexCharts(
        document.querySelector("#stacked-column"),
        columnBasicChart
    );
    basicColumnChart.render();


    // radar basic chart on same page

    var radarBasicChart = {
        chart: {
            height: 350,
            type: 'radar',
        },
        series: [{
            name: 'Series 1',
            data: [80, 50, 30, 40, 100, 20],
        }],
        title: {
            text: 'Basic Radar Chart'
        },
        fill: {
            colors: $themeColor
        },
        labels: ['January', 'February', 'March', 'April', 'May', 'June']
    }
    // Initializing radar Basic Chart
    var basicRadarChart = new ApexCharts(
        document.querySelector("#non-ribbon-chord"),
        radarBasicChart
    );
    basicRadarChart.render();
});