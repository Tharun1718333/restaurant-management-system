<!DOCTYPE html>
<html>
<body>

<h1>OREDERS TO BE PREPARED</h1>

<?php
$conn = mysqli_connect("localhost", "root", "", "no_sense_hotel");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$chef_id = $_REQUEST['chef_id'];
$chef_name_getter = "SELECT name
FROM chef 
WHERE (id = '$chef_id');";
$chef_names = mysqli_query($conn, $chef_name_getter);
$chef_name = $chef_names->fetch_array()[0] ?? '';
echo "WELCOME " . "$chef_name";
echo "<br>";
$stmt = "Select * from chef_orders";

  $result = mysqli_query($conn, $stmt);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["order_id"]. "- . . . . menu_id : " . $row["menu_id"]. "- . . . . customer_id". $row["customer_id"]."- . . . . .quantity".$row["quantity"]."-   TIME ORDERED".$row["ordered_time"]. "<br>";
    }
}
?>
<form action="validating_prepared_orders.php" method = "post" autocomplete="off">
  <div class="container">
    <p>Please PREPARE.</p>
    <hr>

    <label for="order_id"><b>order_id<br /></b></label>
    <input type="number" placeholder="1" name="order_id" id="order_id" required>
    <br />
    <?php echo "yourid" ?>;
    <br />
    <input type="text" name="chef_id" value="<?php echo htmlspecialchars($chef_id); ?>" readonly>
    <br />
    <button type="submit" class="loginbtn">ORDER PREPARED</button>
  </div>

</form>

</body>
</html>