/*=========================================================================================
    File Name: project-summary-task.js
    Description: Project Summary Page JS
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// custom colors declaration
var $blue = '#2dcee3', //$info
   $danger = '#ff7588', //$danger
   $orange = '#ffa87d', //$warning
   $green = '#16d39a', //$success
   $cyan = '#00b5b8'; //$primary

var $themeColor = [$cyan, $green, $orange, $blue, $danger];

/* task progress chart */
/*------------------ */
var pieSimpleChart = {
   chart: {
      height: 350,
      type: 'pie',
   },
   legend: {
      position: 'bottom'
   },
   labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
   series: [44, 55, 13, 43, 22],
   responsive: [{
      breakpoint: 1200,
      options: {
         chart: {
            width: '100%'
         },
         legend: {
            position: 'bottom'
         }
      }
   }, {
      breakpoint: 768,
      options: {
         chart: {
            width: 520
         },
         legend: {
            position: 'right'
         }
      }
   }, {
      breakpoint: 620,
      options: {
         chart: {
            width: 450
         },
         legend: {
            position: 'right'
         }
      }
   }, {
      breakpoint: 480,
      options: {
         chart: {
            width: '100%'
         },
         legend: {
            position: 'bottom'
         }
      }
   }],
   fill: {
      colors: $themeColor
   }
}

var chart = new ApexCharts(
   document.querySelector("#task-pie-chart"),
   pieSimpleChart
);

chart.render();


/* bug-pie-chart */
/* ------------- */
var radial_bar_multiple_chart_option = {
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
   series: [89, 78, 67, 44],
   labels: ['Critical', 'High', 'Medium', 'Low'],
 
 }

  var radial_bar_multiple_chart = new ApexCharts(
     document.querySelector("#bug-pie-chart"),
     radial_bar_multiple_chart_option
  );

  radial_bar_multiple_chart.render();
