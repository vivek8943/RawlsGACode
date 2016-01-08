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

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Word Guess</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="js/wordGuessdemo.js"></script>
<script src="js/admin.js"></script>
<script src="js/functions.js"> </script>
<style>
#feedback { font-size: 1.4em; }
#letterlist .ui-selecting { background: #FECA40; }
#letterlist .ui-selected { background: #F39814; color: white; }
#letterlist li { margin: 2px; padding: 0.4em; font-size: 1.4em; height: 18px;display:inline;}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
  background-color: #A4A4A4;
}
#container{ display: table-cell; vertical-align:middle}
</style>


</head>
<body align="center">
<p >Welcome to Word Guess Game !!</p>
<div id="container">
<div class='subjectid'id="SubjectId" ></div>
<div id="balance"></div>
<div id="gameBody">

<div id="wordArea" ></div>
<div class='letters'id="baughtLetters"></div>
<div id ="winNotice"> <h1> congrats you guessed correct</h1></div>
<div id ="loseNotice"> <h1> sorry you guessed wrong</h1></div>
<br/>
<br/>


<div id= "letterSelection" >
  
        <h4>Press 1 to scroll Left , Press 2 to scroll right and 3 to Confirm the letter</h4> 
      
  
        <ul id="letterlist" class="list-group">
          <li id="a">A</li> <li id="b">B</li>
          <li id="c">C</li> <li id="d">D</li> <li id="e">E</li>
          <li id="f">F</li> <li id="g">G</li> <li id="g">H</li>
          <li id="i">I</li> <li id="j">J</li> <li id="k">K</li>
          <li id="l">L</li> <li id="m">M</li> <li id="n">N</li>
          <li id="o">O</li> <li id="p">P</li> <li id="q">Q</li>
          <li id="r">R</li> <li id="s">S</li> <li id="t">T</li>
          <li id="u">U</li> <li id="v">V</li> <li id="w">W</li>
          <li id="x">X</li> <li id="y">Y</li> <li id="z">Z</li>
        </ul>
    
</div>
</div>
<div id="buttons">
<button  type ="button" id="buyLetter" class="btn btn-default"aria-label="Center Align">Buy a letter [ 1 ] </button>    
<button id="answer" type="button" class="btn btn-default" aria-label="Center Align">Enter the word [ 2 ]</button>
</div>
</div>

</body>
</html>