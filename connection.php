<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<br>

<?php

$name=$_POST["name"];
$email=$_POST["email"];
$amount=$_POST["amount"];


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

// // Create database
// $sql = "CREATE DATABASE charitywebsite";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }

// $conn->close();

// Table created
// $sql = "CREATE TABLE donateform (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//      Donorname VARCHAR(30) NOT NULL,
//       Email VARCHAR(30) NOT NULL,
//       Amount int NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table  created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }
    
//     $conn->close();

// new record Inserted
$sql = "INSERT INTO donateform (donorname,email,amount)
VALUES ('$name', '$email','$amount')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

</body>
</html>