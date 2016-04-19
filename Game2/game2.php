

<html>
<head>

<script>
var a;
var b;
var chart;
var initi=0;

function initval(){

a=0;
b=0;

}

initval();

function addval(){
 var rand=Math.floor((Math.random() * 2)+1);

 if(rand==1){
  if(initi==0){

  a=a+0;
  initi=initi+1;
}
else{a=a+1;}
}
  else if(rand==2) {if(initi==0){

  b=b+0;
  initi=initi+1;
}
    
   else{ b=b+1;}
 
  }


draw(a,b);

}

addval();


  

</script>

<script>window.onkeypress = function(event) {
   if (event.keyCode == 49) {
     addval();
   }
}</script>
<style type="text/css">#chartdiv {#chartdiv {
  width   : 5000%;
  height    : 5000px;
  font-size : 11px;
} 
  width   : 100px;
  height    : 350px;
  font-size : 11px;
}         </style>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script >


 function draw(a,b){

if(chart){
                chart.clear();
            }


 chart = AmCharts.makeChart( "chartdiv", {

  "type": "serial",
  "theme": "light",
  "rotate": true,

  "dataProvider": [ {
    "Player": "A",
    "Score": a
  }, {
    "Player": "B",
    "Score": b
  }],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    
     
     
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,

  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 1,
    "lineAlpha": 0.2,
    "integersOnly":true,
  
    "type": "column",
    "valueField": "Score"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "Player",
  "categoryAxis": {
   
    "gridAlpha": 0,
    "autoGridCount" = false,
   
    "tickPosition": "start"

    

  } 

} );

} 
</script>

 </head>
<body>
<div id="chartdiv"style="width: 1000px; height: 350px;"></div>  
 <button  type ="button" id="buyLetter" class="btn btn-default"aria-label="Center Align">Let em Play! [ 1 ] </button>   
<button id="answer" type="button" class="btn btn-default" aria-label="Center Align">Let me Bet ! [ 2 ]</button>

</body>
</html>