<?php 
session_start(); 

$server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));
$name=$_POST["name"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$currentlytobacco=$_POST["currentlytobacco"];
$pasttobacco=$_POST["pasttobacco"];
$lasttobacco=$_POST["lasttobacco"];
$drug=$_POST["drug"];
$subjectId=$_SESSION["subjectId"];
echo "<h2><strong>Your Unique iNumber:$subjectId</h2>" ; 
$sql = "insert INTO dbo.game2contact values('$subjectId','$name','$email','$gender','$currentlytobacco','$pasttobacco','$lasttobacco','$drug')";
$query = sqlsrv_query($conn, $sql);
if ($query === false)
{  
	exit("<pre>".print_r(sqlsrv_errors(), true));
}
#while ($row = sqlsrv_fetch_array($query))
#	{  echo "<p>Hello, $row[ascore]!</p>";
#}
sqlsrv_free_stmt($query);

sqlsrv_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Rules!</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style> body {
    margin-top: 500px;
    margin-bottom: 500px;
    margin-right: 350px;
    margin-left: 1200px;
}</style>
<link rel="stylesheet" type="text/css" href="css/main.css">

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>

<script>
function fn(){alert("vive")}

window.onkeypress = function(event) {
   if (event.keyCode == 49) {
    

var x= document.getElementById('code').value;

if(x == "data")

	{

window.location = "/Game2/index.php"

	}
	else {alert ('Enter Correct Code');}


   }
}

</script>
</head>
<body align='center'>
 <h3>Instructions</h3>
<br><br>
 <form name ='q' onsubmit='fn()'>

  <div style=' margin-left: 200px;' align='left'class="pure-controls">
          
       <li>Thank you for the answers, we will pause here for a moment to collect a cheek swab.</li> <br>
 

<li>  Please show the researcher the following number so (s)he can mark your sample. 
</li><br>

<li>When the swab is done you will be given a code to continue.</li>
<br>
 
<li>Enter the Code: <INPUT type='text' id ='code'name='code'>  </input>
<br><br><br>
            
        </div>

               <button id="answer" style="background-color:transparent"type="submit" class="btn btn-default" aria-label="Center Align">Continue Press[ 1 ]</button>

 </form>
</body>
</html>
