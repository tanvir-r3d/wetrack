/*=========================================================================================
    File Name: dashboard-fitness.js
    Description: Dahsboard fitness js
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
   "use strict";
   // Checkbox & Radio 1
   $(".icheck-activity").iCheck({
      checkboxClass: "icheckbox_square-blue",
      radioClass: "iradio_square-blue"
   });

   //TODO:AJ: Improve check uncheck all func
   var checkAll = $('input#icheck-input-all');
   var checkboxes = $('input.icheck-activity');

   checkAll.on('ifClicked', function () {
      if (checkAll.prop('checked')) {
         checkboxes.iCheck('uncheck');
      } else {
         checkboxes.iCheck('check');
      }
   });

   var activity = new PerfectScrollbar("#friends-activity", {
      wheelPropagation: false
   });
   var activity_daily = new PerfectScrollbar("#daily-activity", {
      wheelPropagation: false
   });

   // fitness-stats
   $("#fitness-stats").sparkline([5, 6, 7, 8, 9, 10, 13, 15, 13, 12, 10, 9, 10, 12, 15, 18, 16, 14, 12, 10, 8, 5], {
      type: "bar",
      width: "100%",
      height: "30px",
      barWidth: 6,
      barSpacing: 4,
      barColor: "#FF7588"
   });

   // apex chart in dashboard fitness's activity division

   // custom colors declaration
   var $blue = '#2dcee3', //$info
   $danger = '#ff7588', //$danger
   $orange = '#ffa87d', //$warning
   $green = '#16d39a', //$success
   $cyan = '#00b5b8';//$primary

   var $themeColor = [$cyan, $green, $orange, $blue, $danger]

   var radialBarMultipleChart = {
      chart: {
         height: 350,
         type: 'radialBar',
      },
      plotOptions: {
         radialBar: {
            dataLabels: {
               name: {
                  fontSize: '22px',
               },
               value: {
                  fontSize: '16px',
               },
               total: {
                  show: true,
                  label: 'Total',
                  formatter: function (w) {
                     // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                     return 249
                  }
               }
            }
         }
      },
      fill: {
         colors: $themeColor
      },
      series: [44, 55, 67, 83],
      labels: ['dancing', 'Arobics', 'Running', 'Swimming'],

   }

   var chart = new ApexCharts(
      document.querySelector("#activity-division"),
      radialBarMultipleChart
   );

   chart.render();




   /*****************************************************
    *               Knob Card Statistics              *
    *****************************************************/
   var rtl = false;
   if ($("html").data("textdirection") == "rtl") rtl = true;
   $(".knob").knob({
      rtl: rtl,
      draw: function () {
         var ele = this.$;
         var style = ele.attr("style");
         var fontSize = parseInt(ele.css("font-size"), 10);
         var updateFontSize = Math.ceil(fontSize * 1.65);
         style = style.replace("bold", "normal");
         style = style + "font-size: " + updateFontSize + "px;";
         var icon = ele.attr("data-knob-icon");
         ele.hide();
         $('<i class="knob-center-icon ' + icon + '"></i>')
            .insertAfter(ele)
            .attr("style", style);

         // "tron" case
         if (this.$.data("skin") == "tron") {
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
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + (this.lineWidth * 2) / 3, 0, 2 * Math.PI, false);
            this.g.stroke();

            return false;
         }
      }
   });

   var weeklyActivityChart = Morris.Line({
      element: "weekly-activity-chart",
      data: [{
            day: Date.parse("2016-12-05"),
            Running: 100,
            Walking: 40,
            Cycling: 62
         },
         {
            day: Date.parse("2016-12-06"),
            Running: 150,
            Walking: 200,
            Cycling: 120
         },
         {
            day: Date.parse("2016-12-07"),
            Running: 200,
            Walking: 105,
            Cycling: 70
         },
         {
            day: Date.parse("2016-12-08"),
            Running: 125,
            Walking: 150,
            Cycling: 75
         },
         {
            day: Date.parse("2016-12-09"),
            Running: 150,
            Walking: 275,
            Cycling: 100
         },
         {
            day: Date.parse("2016-12-10"),
            Running: 200,
            Walking: 325,
            Cycling: 80
         },
         {
            day: Date.parse("2016-12-11"),
            Running: 260,
            Walking: 130,
            Cycling: 90
         }
      ],
      xkey: "day",
      xLabels: ["day"],
      ykeys: ["Running", "Walking", "Cycling"],
      labels: ["Running", "Walking", "Cycling"],
      resize: true,
      smooth: true,
      pointSize: 3,
      pointStrokeColors: ["#FF7588", "#16D39A", "#FFA87D"],
      gridLineColor: "#e3e3e3",
      behaveLikeLine: true,
      numLines: 6,
      gridtextSize: 14,
      lineWidth: 3,
      hideHover: "auto",
      lineColors: ["#FF7588", "#16D39A", "#FFA87D"],
      xLabelFormat: function (x) {
         var day = x.getDay();
         var days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
         return days[day];
      }
   });

   /************************************************************
    *               Social Cards Content Slider                 *
    ************************************************************/
   // RTL Support
   var rtl = false;
   if ($("html").data("textdirection") == "rtl") {
      rtl = true;
   }
   if (rtl === true) $(".tweet-slider").attr("dir", "rtl");
   if (rtl === true) $(".fb-post-slider").attr("dir", "rtl");

   // Tweet Slider
   $(".tweet-slider").unslider({
      autoplay: true,
      arrows: false,
      nav: false,
      infinite: true
   });

   // FB Post Slider
   $(".fb-post-slider").unslider({
      autoplay: true,
      delay: 3500,
      arrows: false,
      nav: false,
      infinite: true
   });
})(window, document, jQuery);

$(window).on("load", function () {
   // initialize the user location map
   var mapsLeafletUserLocation = L.map('maps-leaflet-user-location').setView([42.35, -71.08], 10);
   mapsLeafletUserLocation.locate({
      setView: true,
      maxZoom: 16
   });

   function onLocationFound(e) {
      var radius = e.accuracy;
      L.marker(e.latlng).addTo(mapsLeafletUserLocation)
         .bindPopup("You are within " + radius + " meters from this point").openPopup();
      L.circle(e.latlng, radius).addTo(mapsLeafletUserLocation);
   }
   mapsLeafletUserLocation.on('locationfound', onLocationFound);
   L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
      maxZoom: 18,
   }).addTo(mapsLeafletUserLocation);
});