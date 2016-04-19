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

<script>window.onkeypress = function(event) {
   if (event.keyCode == 49 || event.keyCode == 50) {
      // do a function
window.location = "/Game2/page2.php"
      //document.forms[0].submit();
   }
}

</script>
</head>
<body align='center'>
 <h3>Instructions</h3>
<br><br>
 <form name ='q'>

  <div style=' margin-left: 200px;' align='left'class="pure-controls">
          
         <li>In this experiment you will use the 1 and 2 key to make selections.</li><br><li>You will see instructions in bold that look like this: 

Thus, it is slightly different than clicking that you are familiar with.  Try it below:

       
</li><br>

<li>If you think you should click
press [1]
and If you think you should use a button
press [2]

</li><br><br><br>
            
        </div>
                 <button id="answer" style="background-color:transparent"type="button" class="btn btn-default" aria-label="Center Align"> Continue Press [1]</button>
                                  <button id="answer" style="background-color:transparent"type="button" class="btn btn-default" aria-label="Center Align"> Continue Press [2]</button>

 </form>
</body>
</html>
