<!-- register page -->
<html>
<body>

Welcome <?php echo $_POST["ename"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<br>

<?php

$name=$_POST["ename"];
$eid=$_POST["eid"];

$email=$_POST["email"];
$pass=$_POST["password"];


$servername = "localhost";
$username = "root";
$password = "";
// once database is created then 
 $dbname = "charitywebsite";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Table created
// $sql = "CREATE TABLE admins (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//       ename VARCHAR(30) NOT NULL,
//       eid VARCHAR(30) NOT NULL,
//       Email VARCHAR(30) NOT NULL,
//        password VARCHAR(20) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table  created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }
    
//     $conn->close();

// new record Inserted
try{
    $sql = "INSERT INTO admins (ename,eid,email,pwd)
    VALUES ('$name','$eid' ,'$email','$pass')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      echo "eid should be unique";
    }
    
}catch(Exception $e)
{
    echo "Check your Employee id , it should be unique";
}

$conn->close();

 ?>

</body>
</html>