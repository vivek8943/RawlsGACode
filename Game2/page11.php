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
function fn(){alert("vive")}

window.onkeypress = function(event) {
   if (event.keyCode == 49) {
    

var x= document.getElementById('code').value;

if(x == "Genes")

  {

window.location = "/Game2/game.php"

  }
  else {alert ('Enter Correct Code');}


   }
}


</script>
</head>
<body align='center'>
 <h3>Instructions</h3>
<br><br>
 <form name ='q'>

  <div style=' margin-left: 500px;' align='left'class="pure-controls">
          
       <P>
 
<li>Enter the Code: <INPUT type='text' id='code' name='code'>  </input>

<br>

<br><br>
            
        </div>
                 <button id="answer" style="background-color:transparent"type="button" class="btn btn-default" aria-label="Center Align"> Continue Press[ 1 ] </button>
 </form>
</body>
</html>
