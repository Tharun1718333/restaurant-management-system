<!DOCTYPE html>
<html>
<body>

<h1>ADMIN PAGE</h1>

<?php
$conn = mysqli_connect("localhost", "root", "", "no_sense_hotel");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$stmt = "Select * from completed_orders ";

  $result = mysqli_query($conn, $stmt);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "menu id: " . $row["menu_id"]. " - customer_id : " . $row["customer_id"]. "             chef_id"."      " . $row["chef_id"]. " waiter_id". $row["waiter_id"]."<br>";
    }
}
$waiter_stmt = "Select waiter_id,count(*) from completed_orders group by waiter_id";
$waiter = mysqli_query($conn, $waiter_stmt);
if ($waiter->num_rows > 0) {
    // output data of each row
    while($row = $waiter->fetch_assoc()) {
      echo "waiter id: " . $row["waiter_id"]. " - count : " . $row["count(*)"]."<br>";
    }
}
$chef_stmt = "Select chef_id,count(*) from completed_orders group by chef_id";
$chef = mysqli_query($conn, $chef_stmt);
if ($chef->num_rows > 0) {
    // output data of each row
    while($row = $chef->fetch_assoc()) {
      echo "chef id: " . $row["chef_id"]. " - count : " . $row["count(*)"]."<br>";
    }
}
?>
</body>
</html>