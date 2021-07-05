<!DOCTYPE html>
<html>
<body>

<h1>PLEASE ORDER</h1>

<?php
$conn = mysqli_connect("localhost", "root", "", "no_sense_hotel");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}
$customer_id = $_REQUEST['customer_id'];
$customer_name_getter = "SELECT name
FROM customer 
WHERE (id = '$customer_id');";
$customer_names = mysqli_query($conn, $customer_name_getter);
$customer_name = $customer_names->fetch_array()[0] ?? '';
echo "WELCOME " . "$customer_name";
echo "<br>";
$stmt = "Select * from menu ORDER BY menu_price";

  $result = mysqli_query($conn, $stmt);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["menu_id"]. " - itemname : " . $row["menu_name"]. "              price"."      " . $row["menu_price"]. "<br>";
    }
}
?>

<form action="validating_orders.php" method = "post" autocomplete="off">
  <div class="container">
    <p>Please ORDER.</p>
    <hr>

    <label for="menu_id"><b>menu_id<br /></b></label>
    <input type="number" placeholder="1" name="menu_id" id="menu_id" required>
    <br />
    <label for="quantity"><b>quantity<br /></b></label>
    <input type="number" placeholder="1" name="quantity" id="quantity" required>
    <br />
    <?php echo "yourid" ?>;
    <br />
    <input type="text" name="customer_id" value="<?php echo htmlspecialchars($customer_id); ?>" readonly>
    <br />
    <button type="submit" class="loginbtn">PLACE ORDER</button>
  </div>

</form>
</body>
</html>