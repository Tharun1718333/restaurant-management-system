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
        $login_id =  $_REQUEST['login_id'];
        $login_password = $_REQUEST['login_password'];
        $login_user_type = $_REQUEST['login_user_type'];
          
        // Performing insert query execution
        // here our table name is chef,waiter,customer
        if($login_user_type == "chef")
        {
            $max_num = "SELECT id
            FROM chef 
            WHERE ((chef.id = '$login_id') and (chef.password = '$login_password'));";
            $max_id = mysqli_query($conn, $max_num); 
            $row = mysqli_fetch_array($max_id,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($max_id);
            //echo nl2br("$count \n");    
            if($count == 1)
            {
                
                
                echo '<a href="chef_working_page.php?chef_id='.urlencode($login_id).'">Bring me to nextPage</a>';
            } 
            else{
                echo "PLEASE REGISTER YOURSELF " 
                    . mysqli_error($conn);
                }
       } 
       if($login_user_type == "waiter")
        {
            $max_num = "SELECT id
            FROM waiter 
            WHERE ((waiter.id = '$login_id') and (waiter.password = '$login_password'));";
            $max_id = mysqli_query($conn, $max_num); 
            $row = mysqli_fetch_array($max_id,MYSQLI_ASSOC);
            $active = $row['active'];
            $count = mysqli_num_rows($max_id);
            //echo nl2br("$count \n");    
            if($count == 1)
            {
                
                echo '<a href="waiter_working_page.php?waiter_id='.urlencode($login_id).'">Bring me to nextPage</a>';
            } 
            else{
                echo "PLEASE REGISTER YOURSELF " 
                    . mysqli_error($conn);
                }
       } 
       if($login_user_type == "customer")
        {
        $max_num = "SELECT id
        FROM customer 
        WHERE ((customer.id = '$login_id') and (customer.password = '$login_password'));";
        $max_id = mysqli_query($conn, $max_num); 
        $row = mysqli_fetch_array($max_id,MYSQLI_ASSOC);
        $active = $row['active'];
        $count = mysqli_num_rows($max_id);
        //echo nl2br("$count \n");    
        if($count == 1)
        {
            
            
            echo '<a href="customer_working_page.php?customer_id='.urlencode($login_id).'">Bring me to nextPage</a>';
                
        } 
        else{
            echo "PLEASE REGISTER YOURSELF " 
                . mysqli_error($conn);
            }
       }  
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>