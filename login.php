<?php
     session_start();
    if(count($_POST)>0) 
    {
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

       if(isset($_POST['submit']))
       {
            $eid=$_POST['eid'];
            $password=$_POST['password'];

            $check_eid="select * from admins where eid='$eid'";
            $result = $conn->query($check_eid);

            echo "num rows ".$result->num_rows;
            $row = $result->fetch_assoc();
            // echo "<br>";
            // echo "".$row['ename'];
            // echo "".$row['eid'];
            if($result)
            {
              $check_password=$conn->query("select * from admins where pwd='$password'");
              
              if($check_password->num_rows)
              {
                 $_SESSION['ename']=$row['ename'];
                 $_SESSION['eid']=$row['eid'];

                ?>

              <script>
                alert("log in success");
                location.replace("dashboard.php");

                </script>
                <?php

                // echo "logged in successfully";

              }
              else
              {
                echo "wrong password";
              }
            }
            else
            {
              echo "wrong user id";
            }
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-6">
          <div class="row">
            <div class="col text-center">
              <h1>Login Admin</h1>
              <p class="text-h3"> Lorem ipsum dolor sit amet. </p>
              
            </div>
          </div>
          <form action="" method="post">
         
          <!-- <div class="row align-items-center">
             
             <div class="col mt-4">
               <input name="ename" type="text" class="form-control" placeholder="Employee Name">
             </div>
 
           </div> -->
           <div class="row align-items-center">
             
             <div class="col mt-4">
               <input name="eid"  type="text" class="form-control" placeholder="Employee ID" required="required">
               <span class="text-danger"> 
                     
                   </span> 
            </div>
 
           </div>
 
           <!-- <div class="row align-items-center mt-4">
             <div class="col">
               <input name="email" type="email" class="form-control" placeholder="Email">
             </div>
           </div> -->
 
           <div class="row align-items-center mt-4">
             <div class="col">
               <input name="password" type="password" class="form-control" placeholder="Password" required="required">
               <span class="text-danger"> 
                   
                   </span> 
            </div>
             <!-- <div class="col">
               <input type="password" class="form-control" placeholder="Confirm Password">
             </div> -->
           </div>
 
 
           <div class="row justify-content-start mt-4">
             <div class="col">
               <div class="form-check">
                 <label class="form-check-label">
                   <input type="checkbox" class="form-check-input">
                   I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
                 </label>
               </div>
                
               <div class="row align-items-center mt-4">
             <div class="col">
             <button type="submit" name="submit" class="btn btn-primary">Login</button>
             </div>
             </div>
             <div class="row align-items-center mt-4">
             <div class="col">
             <a href="register.html" >New User /Register Here </a>
             </div>
            </div>
             </form>
         



          </div>
          
        </div>
      </div>
    </div>
  </section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>