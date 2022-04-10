<!-- dashboard page -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <title>Dashboard</title>

    <style>
        body {
            background-color: black;
        }

        nav {

            background-color: #ffb703;
        }
        .holder{
            
            display: grid;
            grid-template-columns: auto auto  auto;
        }

        .box {

            width: 150px;
            height: 150px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 10%;
            background: #ffb703;
            margin: auto;
            margin-top: 5%;
           
            
        }


        table {
            color: aliceblue;

        }

        .box-text{
            color: aliceblue;
            padding-top: 10%;
            padding-left: 10%;
               height: 100%;
               width :100%
             
           
        }
    </style>

</head>

<body>
<?php
if($_SESSION["ename"]) {
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
   

    $query="select * from donateform";
    $result = $conn->query($query);
    $count=$result->num_rows;
    //Get total of amount
   
?>


    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
            aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fab fa-facebook-f"></i> Donations
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Profile </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info"
                        aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="dashboard.php">My account</a>
                        <a class="dropdown-item" href="logout.php">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!--/.Navbar -->
    <div class="holder">
        <div class="box">
           <?php
              $amtquery =$conn->query("SELECT sum(amount) FROM donateform");
              $sum = $amtquery->fetch_assoc();
            //   echo $sum['sum(amount)'];
          ?>
        
          <h3 class="box-text">
          Total Amount
            <?php
             echo $sum['sum(amount)'];
            ?>
        </h3>
        </div>
        <div class="box">
        <h3 class="box-text">
           Total Donor<br>
            <?php
             echo $count;
            ?>
        </div>
        <div class="box">
        <h3 class="box-text">
          Total Amount
            <?php
             echo $sum['sum(amount)'];
            ?>
        </div>
    </div>
  

    <div class="container mt-4 ">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>DonateDate</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                <?php while( $rows = $result->fetch_assoc()) 
                    { 
                    ?> 
                    <tr> <td><?php echo $rows['id']; ?></td> 
                    <td><?php echo $rows['Donorname']; ?></td> 
                    <td><?php echo $rows['Email']; ?></td> 
                    <td><?php echo $rows['Amount']; ?></td> 
                    <td><?php echo $rows['reg_date']; ?></td> 
                    </tr> 
                <?php 
                           } 
                      ?> 
                </tr>


            </tbody>
        </table>
    </div>




    <?php
}else echo "<h1>Please login first .</h1>";
?>



</body>

</html>