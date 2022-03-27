<html>
<body>

Welcome <?php echo $_POST["vname"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<br>

<?php

$name=$_POST["vname"];
$email=$_POST["email"];
$reason=$_POST["reason"];


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
// $sql = "CREATE TABLE volunteerform (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      volunteername VARCHAR(30) NOT NULL,
//       Email VARCHAR(30) NOT NULL,
//        reason VARCHAR(100) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table  created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }
    
//     $conn->close();

// new record Inserted
$sql = "INSERT INTO volunteerform (volunteername,email,reason)
VALUES ('$name', '$email','$reason')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

</body>
</html>