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
        //echo "OREDER PLACED SUCCESFULLY"; 
        // Taking all 3 values from the form data(input)
        $order_id =  $_REQUEST['order_id'];
        $chef_id = $_REQUEST['chef_id'];
          
        // Performing insert query execution
        // here our table name is chef,waiter,customer
            $max_num = "SELECT order_id
            FROM chef_orders 
            WHERE (order_id = '$order_id');";
            $max_id = mysqli_query($conn, $max_num);
            if($max_id)
            { 
            $row = mysqli_fetch_array($max_id,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($max_id);
            //echo nl2br("$count \n");
           // echo "OREDER PLACED SUCCESFULLY";    
            if($count == 1)
            {   
                //echo "OREDER PLACED SUCCESFULLY";
                $max_order_id = "SELECT *
                FROM chef_orders
                WHERE (order_id = '$order_id');";
                $current_order_result = mysqli_query($conn, $max_order_id);
                $current_order = $current_order_result->fetch_assoc();
                $menu_id = $current_order["menu_id"];
                $customer_id = $current_order["customer_id"];
                $quantity = $current_order["quantity"];
                $t = $current_order["ordered_time"];
                date_default_timezone_set('Asia/Kolkata');
                $prepared_time =date('Y-m-d H:i:s');
                $sql = "INSERT INTO waiter_orders  VALUES ('$order_id','$menu_id','$customer_id','$chef_id','$quantity','$t','$prepared_time');";
                if(mysqli_query($conn, $sql)){
                    echo "OREDER UPADTED SUCCESFULLY";
                    $delete_order = "DELETE FROM chef_orders where order_id = $order_id";
                    if(mysqli_query($conn, $delete_order))
                    {

                    }
                    echo '<a href="chef_working_page.php">prepare more</a>';
                }
                else{
                    echo "PLEASE PREPARE A VALID ORDER " 
                        . mysqli_error($conn);
                    }
                //echo '<a href="customer_working_page.php">order more</a>';
            } 
            else{
                echo "PLEASE PREPARE A VALID ORDER " 
                    . mysqli_error($conn);
                }
            }
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>