<!DOCTYPE HTML>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/main.css">

<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body align='center'>
<?php

session_id( 'mySessionId' );
session_start(); 
// define variables and set to empty values
?>

 <h3 align='center'>Please Enter the following Information</h3>
 <br>
 <br>
 <br>
<form class="pure-form pure-form-aligned" method='POST'action='gamedemo.php'>
    <fieldset>
        <div class="pure-control-group">
            <label for="name">Name</label>
            <input id="name" type="text" name='name' placeholder="Enter Your Name">
        </div>
       <div class="pure-control-group">
            <label for="foo">R Number</label>
            <input id="foo" type="text" name="Rnumber" placeholder="Enter Your R Number">
        </div>
       

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name='email' placeholder="Enter Your Email Address">
        </div>

       
         <div class="pure-control-group">
       <label for="foo">Gender</label>
           <label for="option-two" class="pure-radio">
        <input id="option-two" type="radio" name="gender" value="MALE" >
      Male
  

    
        <input id="option-three" type="radio" name="gender" value="FEMALE">
       Female</label>
</div>
        <div class="pure-controls">
          

            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>
</body>


</html>
