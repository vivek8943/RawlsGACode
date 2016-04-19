<!DOCTYPE HTML>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="css/main.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">

function msg(){

alert("Your Information is being saved!");

}


</script>

<style>
.error {color: #FF0000;}
</style>

</head>
<body align='center'>
<?php

session_start(); 

$v=rand(1000,9999);

session_start(true);
echo "<h2><strong>Your Unique iNumber:$v</h2>" ; 
$_SESSION["subjectId"]=$v;


// define variables and set to empty values
?>

 <h3 align='center'>Please Enter the following Information</h3>
 <br>
 <br>
 <br>
<form method='POST'action='savecontact.php' onSubmit=msg();>
<table border='1' align='center'>
  <tr ><td >
       
            <label for="name">Name</label></td>
           <td>  <input id="name" type="text" name='name' placeholder="Enter Your Name">
     </td></tr>
    
       

 <tr ><td >  
            Email Address</td>
           <td> <input id="email" type="email" name='email' placeholder="Enter Your Email Address">
      </td></tr>

       
      <tr><td>   <div class="pure-control-group">
      Gender</td>
            <td>
        <input id="option-two" type="radio" name="gender" value="MALE" >
      Male
  

    
        <input id="option-three" type="radio" name="gender" value="FEMALE">
       Female
          </td></tr>
</div>
 <tr ><td >  
      Do you currently use nicotine or tobacco: </td >  
      <td >   <input type="radio" name="currentlytobacco" value="Daily" checked> Daily
  <input type="radio" name="currentlytobacco" value="Ocassionally"> Ocassionally
  <input type="radio" name="currentlytobacco" value="notatall"> Not At All  

 </tr ></td >  

<tr ><td >  
      In the past did you use nicotine or tobacco</td >  
      <td >   <input type="radio" name="pasttobacco" value="Daily" checked> Daily
  <input type="radio" name="pasttobacco" value="Ocassionally"> Ocassionally
  <input type="radio" name="pasttobacco" value="notatall"> Not At All  

 </tr ></td >  

 <tr ><td >  
      The last time you used tobacco was</td >  
      <td >   <input type="radio" name="lasttobacco" value="Less than an hour ago" checked> Less than an hour ago
  <input type="radio" name="lasttobacco" value="Between one and twenty-four hours"> Between one and twenty-four hours<br>
  <input type="radio" name="lasttobacco" value=" Between one day and one week "> Between one day and one week 
   <input type="radio" name="lasttobacco" value="More than a week ago"> More than a week ago
    <input type="radio" name="lasttobacco" value="Never"> Never

 </tr ></td >  
 <tr ><td >  

      The last time you used an attention deficit hyperactivity disorder (ADHD) drug such as, <BR>Adderall, Ritalin, Concerta, Strattera, Vyvanse or others, was:</td >  
      <td >   <input type="radio" name="drug" value="Less than an hour ago" checked> Less than an hour ago
  <input type="radio" name="drug" value="Between one and twenty-four hours"> Between one and twenty-four hours<br>
  <input type="radio" name="drug" value=" Between one day and one week "> Between one day and one week 
   <input type="radio" name="drug" value="More than a week ago"> More than a week ago
    <input type="radio" name="drug" value=">Never">Never

 </tr ></td >  


</table>

<BR>
        <div class="pure-controls">
          

            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
   
</form>
</body>


</html>
