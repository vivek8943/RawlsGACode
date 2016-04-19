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
   if (event.keyCode == 49) {
      // do a function
window.location = "#"
      //document.forms[0].submit();
   }
}

</script>
</head>
<body align='center'>
 <h3>Results</h3>
<br>


 <form name ='q'>

  <div style=' margin-left: 200px;' align='left'class="pure-controls">
          
       <P><br>
 <li> PLEASE DO NOT CLOSE THIS UNTIL WE PAY YOU!
</li>
<br><br> <table style="width:60%" border="2" > 
  <thead><th> iNumber  </th>


<th>  You Bet ON </th>

  <th>Who Won </th>
<th>Winnings in $ </th>

  </thead>
                 
                  <tbody>
                  <?php 
session_start();
$subjectId=$_SESSION["subjectId"];
echo "$subjectId";
                
            $server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));

$sql = "select Top 10 * from game2 where sessionid='$subjectId'";

$query = sqlsrv_query($conn, $sql);
if ($query === false)
{  
  exit("<pre>".print_r(sqlsrv_errors(), true));
}
#while ($row = sqlsrv_fetch_array($query))
# {  echo "<p>Hello, $row[ascore]!</p>";
#}
function disconnect(){
sqlsrv_free_stmt($query);
sqlsrv_close($conn);
}

$winningamount=0;
while($row = sqlsrv_fetch_array($query))
{
 
  echo"<tr align='center'><td>$row[5]</td>";

  echo"<td>$row[1]</td>";                
                  
  echo"<td>$row[9]</td>";                          
 
  echo"<td>$row[8]</td></tr>";
  $winningamount=$winningamount+$row[8];
                      
}$winningamount=$winningamount+10;


            echo "<tr align='center'><td>Total Winnings : </td>";
           echo"<td>$winningamount $$</td>";    
            ?>
            <td></td> <td></td>

              </tbody>
              </table>
            
        </div>
        <br>
             <button id="answer" style="background-color:transparent"type="button" class="btn btn-default" aria-label="Center Align">Continue Press[ 1 ]</button>

 </form>
</body>
</html>
