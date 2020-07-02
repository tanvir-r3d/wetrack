/*=========================================================================================
    File Name: card-statistics.js
    Description: intialize advance card statistics
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  'use strict';
  // colors for charts
  var $primary = "#00b5b8",
    $secondary = "#2c3648",
    $success = "#0f8e67",
    $info = "#179bad",
    $warning = "#ffb997",
    $danger = "#ff8f9e"

  var $themeColor = [$info, $success, $warning, $primary, $danger, $secondary]


  /*****************************************************
   *               Grouped Card Statistics              *
   *****************************************************/
  var rtl = false;
  if ($('html').data('textdirection') == 'rtl')
    rtl = true;

  if ($('.knob').length) {
    $(".knob").knob({
      rtl: rtl,
      draw: function () {
        var ele = this.$;
        var style = ele.attr('style');
        style = style.replace("bold", "normal");
        var fontSize = parseInt(ele.css('font-size'), 10);
        var updateFontSize = Math.ceil(fontSize * 1.65);
        style = style.replace("bold", "normal");
        style = style + "font-size: " + updateFontSize + "px;";
        var icon = ele.attr('data-knob-icon');
        ele.hide();
        $('<i class="knob-center-icon ' + icon + '"></i>').insertAfter(ele).attr('style', style);

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          this.cursorExt = 0.3;

          var a = this.arc(this.cv), // Arc
            pa, // Previous arc
            r = 1;

          this.g.lineWidth = this.lineWidth;

          if (this.o.displayPrevious) {
            pa = this.arc(this.v);
            this.g.beginPath();
            this.g.strokeStyle = this.pColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
  }


  /******************************************
   *               Total Likes               *
   ******************************************/
  if ($('#morris-likes').length) {
    Morris.Area({
      element: 'morris-likes',
      data: [{
        y: '1',
        a: 14,
      }, {
        y: '2',
        a: 12
      }, {
        y: '3',
        a: 4
      }, {
        y: '4',
        a: 9
      }, {
        y: '5',
        a: 3
      }, {
        y: '6',
        a: 6
      }, {
        y: '7',
        a: 11
      }, {
        y: '8',
        a: 10
      }, {
        y: '9',
        a: 13
      }, {
        y: '10',
        a: 9
      }, {
        y: '11',
        a: 14
      }, {
        y: '12',
        a: 11
      }, {
        y: '13',
        a: 16
      }, {
        y: '14',
        a: 20
      }, {
        y: '15',
        a: 15
      }],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Likes'],
      axes: false,
      grid: false,
      behaveLikeLine: true,
      ymax: 20,
      resize: true,
      pointSize: 0,
      smooth: true,
      numLines: 6,
      lineWidth: 2,
      fillOpacity: 0.1,
      lineColors: ['#16D39A'],
      hideHover: true,
      hoverCallback: function (index, options, content, row) {
        return "";
      }
    });
  }


  /*********************************************
   *               Total Comments               *
   *********************************************/
  if ($('#morris-comments').length) {
    Morris.Area({
      element: 'morris-comments',
      data: [{
        y: '1',
        a: 15,
      }, {
        y: '2',
        a: 20
      }, {
        y: '3',
        a: 16
      }, {
        y: '4',
        a: 11
      }, {
        y: '5',
        a: 14
      }, {
        y: '6',
        a: 9
      }, {
        y: '7',
        a: 13
      }, {
        y: '8',
        a: 10
      }, {
        y: '9',
        a: 11
      }, {
        y: '10',
        a: 6
      }, {
        y: '11',
        a: 3
      }, {
        y: '12',
        a: 9
      }, {
        y: '13',
        a: 4
      }, {
        y: '14',
        a: 12
      }, {
        y: '15',
        a: 14
      }],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Comments'],
      axes: false,
      grid: false,
      behaveLikeLine: true,
      ymax: 20,
      resize: true,
      pointSize: 0,
      smooth: true,
      numLines: 6,
      lineWidth: 2,
      fillOpacity: 0.1,
      lineColors: ['#FF7D4D'],
      hideHover: true,
      hoverCallback: function (index, options, content, row) {
        return "";
      }
    });
  }
  /******************************************
   *               Total Views               *
   ******************************************/
  if ($('#morris-views').length) {
    Morris.Area({
      element: 'morris-views',
      data: [{
        y: '1',
        a: 14,
      }, {
        y: '2',
        a: 12
      }, {
        y: '3',
        a: 4
      }, {
        y: '4',
        a: 9
      }, {
        y: '5',
        a: 3
      }, {
        y: '6',
        a: 6
      }, {
        y: '7',
        a: 11
      }, {
        y: '8',
        a: 10
      }, {
        y: '9',
        a: 13
      }, {
        y: '10',
        a: 9
      }, {
        y: '11',
        a: 14
      }, {
        y: '12',
        a: 11
      }, {
        y: '13',
        a: 16
      }, {
        y: '14',
        a: 20
      }, {
        y: '15',
        a: 15
      }],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Views'],
      axes: false,
      grid: false,
      behaveLikeLine: true,
      ymax: 20,
      resize: true,
      pointSize: 0,
      smooth: true,
      numLines: 6,
      lineWidth: 2,
      fillOpacity: 0.1,
      lineColors: ['#FF4558'],
      hideHover: true,
      hoverCallback: function (index, options, content, row) {
        return "";
      }
    });
  }

  /************************************************
   *               Sparkline Charts                *
   ************************************************/

  var sparkLineDraw = function () {
    /******************
     *   Line Charts   *
     ******************/
    // Total Cost
    if ($("#sp-line-total-cost").length) {
      $("#sp-line-total-cost").sparkline([14, 12, 4, 9, 3, 6, 11, 10, 13, 9, 14, 11, 16, 20, 15], {
        type: 'line',
        width: '100%',
        height: '100px',
        lineColor: '#FFA87D',
        fillColor: '#FFA87D',
        spotColor: '',
        minSpotColor: '',
        maxSpotColor: '',
        highlightSpotColor: '',
        highlightLineColor: '',
        chartRangeMin: 0,
        chartRangeMax: 20,
      });
    }

    // Total Sales
    if ($("#sp-line-total-sales").length) {
      $("#sp-line-total-sales").sparkline([14, 12, 4, 9, 3, 6, 11, 10, 13, 9, 14, 11, 16, 20, 15], {
        type: 'line',
        width: '100%',
        height: '100px',
        lineColor: '#16D39A',
        fillColor: '#16D39A',
        spotColor: '',
        minSpotColor: '',
        maxSpotColor: '',
        highlightSpotColor: '',
        highlightLineColor: '',
        chartRangeMin: 0,
        chartRangeMax: 20,
      });
    }

    // Total Revenue
    if ($("#sp-line-total-revenue").length) {
      $("#sp-line-total-revenue").sparkline([14, 12, 4, 9, 3, 6, 11, 10, 13, 9, 14, 11, 16, 20, 15], {
        type: 'line',
        width: '100%',
        height: '100px',
        lineColor: '#FF7588',
        fillColor: '#FF7588',
        spotColor: '',
        minSpotColor: '',
        maxSpotColor: '',
        highlightSpotColor: '',
        highlightLineColor: '',
        chartRangeMin: 0,
        chartRangeMax: 20,
      });
    }

    /*****************
     *   Bar Charts   *
     *****************/
    if ($("#sp-bar-total-cost").length) {
      $("#sp-bar-total-cost").sparkline([5, 6, 7, 8, 9, 10, 12, 13, 15, 14, 13, 12, 10, 9, 8, 10, 12, 14, 15, 16, 17, 14, 12, 11, 10, 8], {
        type: 'bar',
        width: '100%',
        height: '30px',
        barWidth: 2,
        barSpacing: 4,
        barColor: '#FFA87D'
      });
    }

    if ($("#sp-bar-total-sales").length) {
      $("#sp-bar-total-sales").sparkline([5, 6, 7, 8, 9, 10, 12, 13, 15, 14, 13, 12, 10, 9, 8, 10, 12, 14, 15, 16, 17, 14, 12, 11, 10, 8], {
        type: 'bar',
        width: '100%',
        height: '30px',
        barWidth: 2,
        barSpacing: 4,
        barColor: '#16D39A'
      });
    }

    if ($("#sp-bar-total-revenue").length) {
      $("#sp-bar-total-revenue").sparkline([5, 6, 7, 8, 9, 10, 12, 13, 15, 14, 13, 12, 10, 9, 8, 10, 12, 14, 15, 16, 17, 14, 12, 11, 10, 8], {
        type: 'bar',
        width: '100%',
        height: '30px',
        barWidth: 2,
        barSpacing: 4,
        barColor: '#FF7588'
      });
    }

    /*************************
     *   Stacked Bar Charts   *
     *************************/
    if ($("#sp-stacked-bar-total-cost").length) {
      $("#sp-stacked-bar-total-cost").sparkline([
        [8, 10],
        [12, 8],
        [9, 14],
        [8, 11],
        [10, 13],
        [7, 11],
        [8, 14],
        [9, 12],
        [10, 11],
        [12, 14],
        [8, 12],
        [9, 12],
        [9, 14]
      ], {
        type: 'bar',
        width: '100%',
        height: '30px',
        barWidth: 4,
        barSpacing: 6,
        stackedBarColor: ['#4CAF50', '#FFEB3B']
      });
    }

    if ($("#sp-stacked-bar-total-cost").length) {
      $("#sp-stacked-bar-total-sales").sparkline([
        [8, 10],
        [12, 8],
        [9, 14],
        [8, 11],
        [10, 13],
        [7, 11],
        [8, 14],
        [9, 12],
        [10, 11],
        [12, 14],
        [8, 12],
        [9, 12],
        [9, 14]
      ], {
        type: 'bar',
        width: '100%',
        height: '30px',
        barWidth: 4,
        barSpacing: 6,
        stackedBarColor: ['#FF5722', '#009688']
      });
    }

    if ($("#sp-stacked-bar-total-revenue").length) {
      $("#sp-stacked-bar-total-revenue").sparkline([
        [8, 10],
        [12, 8],
        [9, 14],
        [8, 11],
        [10, 13],
        [7, 11],
        [8, 14],
        [9, 12],
        [10, 11],
        [12, 14],
        [8, 12],
        [9, 12],
        [9, 14]
      ], {
        type: 'bar',
        width: '100%',
        height: '30px',
        barWidth: 4,
        barSpacing: 6,
        stackedBarColor: ['#E91E63', '#00BCD4']
      });
    }
    /**********************
     *   Tristate Charts   *
     **********************/
    if ($("#sp-tristate-bar-total-cost").length) {
      $("#sp-tristate-bar-total-cost").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1, 0, -1, 1, -1], {
        type: 'tristate',
        height: '30',
        posBarColor: '#ffeb3b',
        negBarColor: '#4caf50',
        barWidth: 4,
        barSpacing: 5,
        zeroAxis: false
      });
    }

    if ($("#sp-tristate-bar-total-sales").length) {
      $("#sp-tristate-bar-total-sales").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1, 0, -1, 1, -1], {
        type: 'tristate',
        height: '30',
        posBarColor: '#009688',
        negBarColor: '#FF5722',
        barWidth: 4,
        barSpacing: 5,
        zeroAxis: false
      });
    }

    if ($("#sp-tristate-bar-total-revenue").length) {
      $("#sp-tristate-bar-total-revenue").sparkline([1, 1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1, 0, -1, 1, -1], {
        type: 'tristate',
        height: '30',
        posBarColor: '#00BCD4',
        negBarColor: '#E91E63',
        barWidth: 4,
        barSpacing: 5,
        zeroAxis: false
      });
    }


    // Total Revenue
    if ($("#sp-line-total-profit").length) {
      $("#sp-line-total-profit").sparkline([14, 12, 4, 9, 3, 6, 11, 10, 13, 9, 14, 11, 16, 20, 15], {
        type: 'line',
        width: '100%',
        height: '50px',
        lineColor: '#E91E63',
        fillColor: '',
        spotColor: '',
        minSpotColor: '',
        maxSpotColor: '',
        highlightSpotColor: '',
        highlightLineColor: '',
        chartRangeMin: 0,
        chartRangeMax: 20,
      });
    }
  };

  var sparkResize;

  $(window).resize(function (e) {
    clearTimeout(sparkResize);
    sparkResize = setTimeout(sparkLineDraw, 500);
  });
  sparkLineDraw();


  /*****************************************************
   *         Sparkline chart using Apex charts         *
   *****************************************************/

  var power_consumption_area_spline_chart_options = {
    chart: {
      height: 370,
      type: 'area',
      toolbar: {
        show: false
      },
      dropShadow: {
        enabled: true,
        top: 18,
        left: 0,
        blur: 2,
        color: $primary,
        opacity: 0.1
      }
    },
    fill: {
      colors: $primary,
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.2,
        opacityTo: 0.6,
        stops: [0, 90, 100]
      }
    },
    legend: {
      show: false
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      colors: $themeColor
    },
    series: [{
      name: '',
      data: [19.3, 18, 19.6, 19, 22, 19, 20.5]
    }],
    xaxis: {
      type: 'category',
      categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        show: true,

        style: {
          fontSize: '14',
          fontFamily: 'Helvetica, Arial, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
        }
      },
    },
    yaxis: {
      tickAmount: 3,
      min: 17,
      max: 24,
    },
    tooltip: {
      x: {
        show: false
      },
      y: {
        formatter: function (seriesName) {
          return seriesName + ' kWh'
        }
      },
      marker: {
        show: false
      },
    },
    theme: {
      mode: 'light'
    },
    markers: {
      colors: $primary,
    },
  }

  // Initializing Area Spline Chart
  var power_consumption_area_spline_chart = new ApexCharts(
    document.querySelector("#spline-chart"),
    power_consumption_area_spline_chart_options
  );
  power_consumption_area_spline_chart.render();


  /*****************************************************
   *      Basic column bar chart using Apex charts      *
   *****************************************************/

  var product_sales_column_basic_chart_options = {
    chart: {
      height: 310,
      type: 'bar',
      toolbar: {
        show: false
      }
    },
    legend: {
      show: false
    },
    grid: {
      show: false
    },

    colors: [$primary, $primary, $danger, $primary, $warning],

    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '23%',
        endingShape: 'flat',
        colors: {
          backgroundBarColors: '#444',
          backgroundBarOpacity: 0.1,
        },
        distributed: true
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [{
      name: '',
      data: [30, 45, 49, 42, 61, 44]
    }],
    xaxis: {
      type: 'category',
      categories: ['Jan', 'Fab', 'Mar', 'Apr', 'May', 'Jun'],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        style: {
          cssClass: 'apexcharts-xaxis-title',
        }
      },
    },
    yaxis: {
      show: false,
      labels: {
        show: true,
        style: {
          fontSize: '10',
          cssClass: 'apexcharts-xaxis-title',
        },
        offsetY: 10,
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      marker: {
        show: false
      },
      x: {
        show: false
      },

      y: {
        formatter: function (seriesName) {
          return seriesName + 'k Sales'
        }
      }
    }
  }

  // Initializing Column Basic Chart
  var product_sales_column_basic_chart = new ApexCharts(
    document.querySelector(".tab-content #product_sales_column_basic_chart"),
    product_sales_column_basic_chart_options
  );
  product_sales_column_basic_chart.render();


  /*****************************************************
   *      simple pie donut chart using Apex charts     *
   *****************************************************/

  var sales_in_region_pie_donut_simple_chart_options = {
    chart: {
      width: 240,
      height: 258,
      type: 'donut',
    },

    plotOptions: {
      pie: {
        size: "92",
        offsetY: 30,
        donut: {
          size: '93%',
          labels: {
            show: true,
            name: {
              offsetY: 23,
              color: "#98a4b8",
              fontSize: '20px'
            },
            value: {
              fontSize: '35px',
              offsetY: -22,
              color: "#404e67",
              formatter: function (val) {
                return val + '%'
              }
            },
            total: {
              show: true,
              label: 'Total',
              color: "#98a4b8",
              formatter: function (w) {
                return "$6.9k"
              }
            }
          }
        }
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [48, 24, 28],
    labels: ['California', 'New york', 'Alaska'],
    responsive: [{
      breakpoint: 480,
      options: {
        chart: {
          width: 200
        },
        legend: {
          show: false
        }
      }
    },
    {
      breakpoint: 1425,
      options: {
        chart: {
          width: 250
        },
        legend: {
          show: false
        }
      }
    }
    ],
    legend: {
      show: false
    },
    colors: [$primary, $danger, $warning]
  }

  // Initializing Pie Donut Simple Chart
  var sales_in_region_pie_donut_simple_chart = new ApexCharts(
    document.querySelector("#sales_in_region_pie_donut"),
    sales_in_region_pie_donut_simple_chart_options
  );
  sales_in_region_pie_donut_simple_chart.render();



  /*****************************************************
   *      radial chart for general task loading     *
   *****************************************************/

  var general_task_radial_bar_chart_options = {
    chart: {
      height: 145,
      width: 170,
      type: 'radialBar',
      offsetY: 30,
      toolbar: {
        show: false
      }
    },

    plotOptions: {
      radialBar: {
        hollow: {
          margin: 0,
          size: '80%',
        },
        track: {
          background: '#eee',
          strokeWidth: '80%',
          margin: 0, // margin is in pixels

        },

        dataLabels: {
          showOn: 'always',
          name: {
            show: false,
          },
          value: {
            formatter: function (val) {
              return parseInt(val) + '%';
            },
            offsetY: 8,
            color: $info,
            fontSize: '20px',
            show: true,
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 768,
        options: {
          chart: {
            width: 170,
            offsetX: -15
          },
          legend: {
            show: false
          }
        }
      }
    ],
    fill: {
      colors: [$primary]
    },
    series: [67],
    stroke: {
      lineCap: 'flat'
    },
    labels: ['Percent'],

  }

  var general_task_radial_bar_chart = new ApexCharts(
    document.querySelector("#general_task_radial_bar_chart"),
    general_task_radial_bar_chart_options
  );

  general_task_radial_bar_chart.render();


  /*****************************************************
   *  total stats chart in information time tracking  *
   *****************************************************/

  var info_tracking_total_stats_Chart_options = {
    chart: {
      height: 120,
      width: 140,
      type: 'bar',
      toolbar: {
        show: false
      }
    },
    states: {
      hover: {
        filter: {
          type: 'darken',
          value: 0.90,
        }
      }
    },
    legend: {
      show: false
    },
    grid: {
      show: false
    },
    colors: ['#eee', '#eee', '#eee', $primary, '#eee', '#eee', '#eee'],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '45%',
        endingShape: 'rounded',
        distributed: true
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [{
      name: '',
      data: [50, 40, 30, 45, 30, 40, 50]
    }],
    xaxis: {
      type: 'category',
      categories: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      },
      labels: {
        show: true,
        style: {
          fontSize: '12',
          fontFamily: 'Helvetica, Arial, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
        }
      },
    },
    yaxis: {
      show: false,
      labels: {
        show: true,
        style: {
          fontSize: '10',
          fontFamily: 'Helvetica, Arial, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
        },
        offsetY: 10,
      },
    },
    fill: {
      opacity: 1,
    },
    tooltip: {
      marker: {
        show: false
      },
      x: {
        show: false
      },
      y: {
        formatter: function (seriesName) {
          return seriesName + '%'
        }
      },
    }
  }

  // Initializing Column Basic  Chart

  var info_tracking_total_stats_Chart = new ApexCharts(
    document.querySelector("#info_tracking_total_stats"),
    info_tracking_total_stats_Chart_options
  );
  info_tracking_total_stats_Chart.render();

  
  // perfect scrollbar for latest update card

  if ($('.latest-update-tracking').length > 0) {
		new PerfectScrollbar(".latest-update-tracking-list", {
		  wheelPropagation: false
		});
	}
})(window, document, jQuery);