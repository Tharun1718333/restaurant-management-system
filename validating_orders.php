<!DOCTYPE html>
<html>
  
<head>
    <title>HELLO </title>
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "no_sense_hotel");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 3 values from the form data(input)
        $menu_id =  $_REQUEST['menu_id'];
        $quantity = $_REQUEST['quantity'];
        $customer_id = $_REQUEST['customer_id'];
          
        // Performing insert query execution
        // here our table name is chef,waiter,customer
            $max_num = "SELECT menu_id
            FROM menu 
            WHERE (menu_id = '$menu_id');";
            $max_id = mysqli_query($conn, $max_num);
            if($max_id)
            { 
            $row = mysqli_fetch_array($max_id,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($max_id);
            //echo nl2br("$count \n");    
            if($count == 1)
            {   
                $max_order_id = "SELECT order_id
                FROM chef_orders
                ORDER BY order_id DESC;";
                $order_id = mysqli_query($conn, $max_order_id);
                $new_order_id = $order_id->fetch_assoc();
                $order_id_passing_value = $new_order_id["order_id"]+1;
                date_default_timezone_set('Asia/Kolkata');
                $t=date('Y-m-d H:i:s');
                $sql = "INSERT INTO chef_orders  VALUES ('$order_id_passing_value','$menu_id','$customer_id','$quantity','$t')";
                if(mysqli_query($conn, $sql)){
                    echo "OREDER PLACED SUCCESFULLY";
                    echo '<a href="customer_working_page.php">order more</a>';
                }
                else{
                    echo "PLEASE GIVE A VALID ORDER " 
                        . mysqli_error($conn);
                    }
                //echo '<a href="customer_working_page.php">order more</a>';
            } 
            else{
                echo "PLEASE GIVE A VALID ORDER " 
                    . mysqli_error($conn);
                }
            }
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>