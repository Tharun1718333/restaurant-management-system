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
        $name =  $_REQUEST['name'];
        $password = $_REQUEST['password'];
        $phone_number = $_REQUEST['phone_number'];
        $user_type = $_REQUEST['user_type'];
          
        // Performing insert query execution
        // here our table name is chef,waiter,customer
        if($user_type == "chef")
        {
        $max_num = "SELECT MIN(id)
        FROM chef;";
        $max_id = (int)mysqli_query($conn, $max_num);
        $max_id += 1;
        $sql = "INSERT INTO chef  VALUES ('max_id','$name', 
            '$password','$phone_number')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
            
            echo nl2br("\n$name\n $password\n "
                . " $phone_number");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
       } 
       if($user_type == "waiter")
        {
        $max_num = "SELECT MIN(id)
        FROM waiter;";
        $max_id = (int)mysqli_query($conn, $max_num);
        $max_id += 1;
        $sql = "INSERT INTO waiter  VALUES ('max_id','$name', 
            '$password','$phone_number')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
            
            echo nl2br("\n$name\n $password\n "
                . " $phone_number");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
       } 
       if($user_type == "customer")
        {
        $max_num = "SELECT MIN(id)
        FROM customer;";
        $max_id = (int)mysqli_query($conn, $max_num);
        $max_id += 1;
        $sql = "INSERT INTO customer  VALUES ('max_id','$name', 
            '$password','$phone_number')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
            
            echo nl2br(" dear  $name\n  your id is    $max_id\n "
                . " your phone number is $phone_number");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
       } 
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>