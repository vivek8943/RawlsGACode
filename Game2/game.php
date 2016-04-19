
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<?php 
session_start();
$subjectId=$_SESSION["subjectId"];
$v =$subjectId;
echo "<h2><strong>Your Unique iNumber:$subjectId</h2>" ;  ?>


 

</script>
<script type="text/javascript">
var temp=0;
var temporaryvar=0;
var rounds=0;

    function MyFunction() {      
        $('#buttons2').hide();
    }
</script>
<script type="text/javascript">
      $(document).ready(function () {

        MyFunction();
    });
</script>
<script >


 function draw(a,b){

if(chart){
                chart.clear();
            }


 var chart = new AmCharts.AmSerialChart();
chartData =[{"Player":"Player A","Score":a,"color":"#838383"},{"Player":"Player B","Score":b,"color":"#838383"}]
        
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "Player";
         chart.rotate = true;
              chart.fontSize=17;
chart.categoryAxis.title="Player"
        // VALUE AXIS
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.axisAlpha = 0.15;
        valueAxis.minimum = 0;
        valueAxis.maximum = 100;
        valueAxis.dashLength = 2;
       
        valueAxis.unitPosition = "right";
        chart.addValueAxis(valueAxis);
    
        // CATEGORY AXIS
        chart.categoryAxis.autoGridCount = false;
        chart.categoryAxis.gridCount = 20;

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.type = "column";
        graph.colorField = "color"
        graph.valueField = "Score";
        graph.fillAlphas = 0.6;
        graph.balloonText = "[[value]]";
        chart.addGraph(graph);
        
        graph.lineColor = "#000000";
       valueAxis.title="Points Scored";
        // WRITE in div
        chart.write("chartdiv");
 
}


</script>
<script>
var a;
var v =  '<?php echo $v;?>'
var b;
var chart;
var initi=0;

function callsave(tempa,tempb,a,b,amount,whowon){
 
    $.ajax({
          url: "/Game2/test.php",
          type: 'POST',
         //dataType: 'text',
          data: {SubjectId:v,tempa:tempa,tempb:tempb,ascore:a,bscore:b,isbet:'A',amount:amount,whowon:whowon},
          
            error: function(xhr) {
              //Do Something to handle error
              console.log('error')
            }
          
          
    }); }

    function callsave1(tempa,tempb,a,b,amount,whowon){
 
    $.ajax({
          url: "/Game2/test.php",
          type: 'POST',
         //dataType: 'text',
          data: {SubjectId:v,tempa:tempa,tempb:tempb,ascore:a,bscore:b,isbet:'B',amount:amount,whowon:whowon},
          
            error: function(xhr) {
              //Do Something to handle error
              console.log('error')
            }
          
          
    }); }

function initval(){
a=0;
b=0;

}

initval();

function redirect () {
  window.location = "/Game2/page12.php";
}
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
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

  <script>$(document).keypress(function(e) {
  if(rounds>49){window.location = "/Game2/page12.php";}
    if(e.which == 49) {


      //to New round temp must be zero
       if( temp==0)

       {
      
     addval();

   }



else  {

  // USed to  bet on A 
  rounds=rounds+1;

  var tempa=a;//at time of bet
  var tempb=b;//at time of bet
  var amount=0;
  if(temporaryvar==0){
  addval(); 
  if((a-tempa)==0){

    amount=-1;
    whowon='B';
  }

  else { amount =1;whowon='A';}

  callsave(tempa,tempb,a,b,amount,whowon);}


   $("#buttons2").hide();

     $("#buttons1").show();

// store the value of A,B and time and change the buttons to previous stage

a=0;
b=0;

   temp=0;
   temporaryvar=0;

}
    }



    if(e.which == 50) {
       if( temp==0){
     $("#buttons1").hide();
     $("#buttons2").show();
     temp=1;
   }

   //BEt on B condition


   else{
    rounds=rounds+1;
  
    var tempa=a;//time of bet
  var tempb=b;// time of bet
    addval();
    var whowon= '';
    if((b-tempb)==0){

    amount=-1;
    whowon='A';
  }

  else { amount =1;whowon='B';}
 callsave1(tempa,tempb,a,b,amount,whowon);
      $("#buttons2").hide();
     $("#buttons1").show();
     a=0;
b=0;
      temporaryvar=1;
      temp=0;
   }

    }
    
});
  
   
</script>
<style type="text/css">#chartdiv {#chartdiv {
  width   : 5000%;
  height    : 5000px;
  font-size : 11px;
} 
  width   : 100px;
  height    : 350px;
  font-size : 11px;
}         </style>



 </head>
 
<body align='center'>
 <form name ='q'>
<div id="chartdiv"style="width: 1240px; height: 500px;"></div> 
<div id="buttons1">
 <button  type ="button" style="background-color:transparent"id="buyLetter" class="btn btn-default"aria-label="Center Align">
 Watch another round Press [ 1 ] </button>   
<button id="answer" style="background-color:transparent"type="button" class="btn btn-default" aria-label="Center Align">Bet 1$ on who scores next point Press[ 2 ]</button>
</div>
<div id= "buttons2" >

<button style="background-color:transparent" type ="button" id="buyLetter" class="btn btn-default"aria-label="Center Align">Bet On A! [ 1 ] </button>   
<button style="background-color:transparent"id="answer" type="button" class="btn btn-default" aria-label="Center Align">Bet on B! [ 2 ]</button>
  

    

</div>
<div class="pure-controls">
          

        </div>
          </form>
</body>
</html>
