<!DOCTYPE HTML>
<html>
<head>
<title>Valley View Furniture</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Milonga' rel='stylesheet' type='text/css'>
<script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 
</head>
<body>
 
      </div>  
  </div>    
   <div class="wrap">
     <div class="main">
      <div class="content">
        <h2>Product Details</h2>
        <div class="section group">
        <div class="cont span_3_of_3">
               
              <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                       <th>Description</th>
                      <th>Location</th>
                      <th>Quantity OnHand</th>
                      <th>Reorder Point</th>
                      <th>Scheduled Receipts</th>
                      <th>ReOrder Quantity</th>
                      <th>Quantity backordered</th>
                       <th>Finish</th>
                      <th>Unit Price</th> 
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
            $server = "bamsql2";
$options = array(  "UID" => "genes",  "PWD" => "Genes12",  "Database" => "genes");
$conn = sqlsrv_connect($server, $options);
if ($conn === false) 
die("<pre>".print_r(sqlsrv_errors(), true));

$sql = "select * from game2";
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
while($row = sqlsrv_fetch_array($query))
{
    echo"<tr><td>$row[0]</td>";
    echo"<td>$row[1]</td>";
    echo"<td>$row[2]</td>";
    echo"<td>$row[3]</td>";
    echo"<td>$row[4]</td>";

    
  
}
             
          disconnect();  ?>
              </tbody>
              </table>
            
               
        </div>
        
     </div> 
  
</body>
</html>
