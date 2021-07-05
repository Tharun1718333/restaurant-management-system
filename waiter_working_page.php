<!DOCTYPE html>
<html>
<body>

<h1>ORDERS TO BE DELIVERED</h1>

<?php
$conn = mysqli_connect("localhost", "root", "", "no_sense_hotel");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$waiter_id = $_REQUEST['waiter_id'];
$waiter_name_getter = "SELECT name
FROM waiter 
WHERE (id = '$waiter_id');";
$waiter_names = mysqli_query($conn, $waiter_name_getter);
$waiter_name = $waiter_names->fetch_array()[0] ?? '';
echo "WELCOME " . "$waiter_name";
echo "<br>";
$stmt = "Select * from waiter_orders";

  $result = mysqli_query($conn, $stmt);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["order_id"]. "- . . . . menu_id : " . $row["menu_id"]. "- . . . . customer_id". $row["customer_id"]."- . . . . .quantity".$row["quantity"]."-   TIME PREPARED".$row["prepared_time"]. "<br>";
    }
}
?>
<form action="order_completion.php" method = "post" autocomplete="off">
  <div class="container">
    <p>Please PREPARE.</p>
    <hr>

    <label for="order_id"><b>order_id<br /></b></label>
    <input type="number" placeholder="1" name="order_id" id="order_id" required>
    <br />
    <?php echo "yourid" ?>;
    <br />
    <input type="text" name="waiter_id" value="<?php echo htmlspecialchars($waiter_id); ?>" readonly>
    <br />
    <button type="submit" class="loginbtn">ORDER DELIVERED</button>
  </div>

</form>
</body>
</html>