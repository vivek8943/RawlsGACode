<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

<?php 

 

function dbcall(){

session_start(); 
$seubid=(string)session_id();
$server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));

$rno=$_POST['Rnumber'];
        $name=$_POST['name'];
            $email=$_POST['email'];
             $gender=$_POST['gender'];
$sql = "insert INTO dbo.contactinfo values('$rno','$name','$email','$gender')";
$query = sqlsrv_query($conn, $sql);
if ($query === false)
{  
  exit("<pre>".print_r(sqlsrv_errors(), true));
}
#while ($row = sqlsrv_fetch_array($query))
# {  echo "<p>Hello, $row[ascore]!</p>";
#}
sqlsrv_free_stmt($query);

sqlsrv_close($conn);
}
         
    if($rno){
    echo 'Your Id '.$rno. '!'.$seubid;

  }
  dbcall();
?>
<script type="text/javascript">
var temp=0;
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
 chartData =[{"Player":"1","Score":a,"color":"#ffdf97"},{"Player":"2","Score":b,"color":"#3db8c7"}]
        
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "Player";
         chart.rotate = true;
       

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

        // WRITE in div
        chart.write("chartdiv");
 
}


</script>
<script>
var a;
var b;
var chart;
var initi=0;

function callsave(){
 
    $.ajax({
          url: "/Game2/test.php",
          type: 'POST',
         //dataType: 'text',
          data: {SubjectId:11,ascore:a,bscore:b,isbet:0},
          
            error: function(xhr) {
              //Do Something to handle error
              console.log('error')
            }
          
          
    }); }
    function callsave1(){
 
    $.ajax({
          url: "/Game2/test.php",
          type: 'POST',
         //dataType: 'text',
          data: {SubjectId:11,ascore:a,bscore:b,isbet:1},
          
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
   
    if(e.which == 49) {
       if( temp==0){
      
     addval();

   }

else  {
 callsave();
 
   $("#buttons2").hide();

     $("#buttons1").show();

// store the value of A,B and time and change the buttons to previous stage

a=0;
b=0;

   temp=0;

}
    }



    if(e.which == 50) {
       if( temp==0){
     $("#buttons1").hide();
     $("#buttons2").show();
     temp=1;
   }
   else{
 callsave1();
      $("#buttons2").hide();
     $("#buttons1").show();
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
<body >

<div id="chartdiv"style="width: 1240px; height: 500px;"></div> 
<div id="buttons1">
 <button  type ="button" id="buyLetter" class="btn btn-default"aria-label="Center Align">Play! [ 1 ] </button>   
<button id="answer" type="button" class="btn btn-default" aria-label="Center Align">Bet ! [ 2 ]</button>
</div>
<div id= "buttons2" >

<button  type ="button" id="buyLetter" class="btn btn-default"aria-label="Center Align">Bet On A! [ 1 ] </button>   
<button id="answer" type="button" class="btn btn-default" aria-label="Center Align">Bet on B! [ 2 ]</button>
  
  
    

</div>
<form action='game.php'>
<div class="pure-controls">
          
<br><br>
            <button type="submit" class="pure-button pure-button-primary">Next </button>
        </div></form>
</body>
</html>
