
<html>
<head>

<?php 

 session_start();

$Awins=0;
$Bwins=0;


?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

    var a = <?php echo $_SESSION["Awins"]; ?>;
   function sendvalues(){

$.ajax({
        type: 'post',
        url: 'graph.php',
        data: {
            Awins: a,
            Bwins: a
        }
        
    });

   }
</script>

<style type="text/css">#chartdiv {#chartdiv {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
} 
  width   : 60%;
  height    : 400px;
  font-size : 11px;
}         </style>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>

<script type="text/javascript">

var rand=Math.floor((Math.random() * 2)+1);

a=(a+(rand-1));



var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [ {
    "country": "A",
    "visits": a
  }, {
    "country": "B",
    "visits": a
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );

</script></head>
<body>
<div id="chartdiv"></div>	
<imput type="button" onclick="sendvalues()">Click Me!</button>
</body>
</html>