<?php

// some variables to control session



$servername = "localhost";
$username = "admin";
$password = "root";
$database = "authentication";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
  die("Unable to connect to the database ");
}

else{

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];


    if(strlen($uname)>0 and strlen($pass)>0 and $pass==$cpass ) {  //here i have validated the form on the basis of length 
               
      $sql = "SELECT * FROM data WHERE username = '$uname' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_num_rows($result);
      if($row==0){
        $sql = "INSERT INTO `data` (`username`, `password`) VALUES ('$uname', '$pass')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "Data inserted success";
        }
        else{
            echo "Failed";
        }
    }
    else{
        echo "username not available";
    }
    }
    else{
      echo "Enter a valid username and password";
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
    <title>session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>


  <!-- Navbar content -->
 <?php include './partials/navbar.php' ?>


<div class="container my-3">
    <h2>Signup here</h2>
    
<form action="./signup.php" method="POST"> 
  <div class="form-group my-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter email" name="username">
    
  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="cpassword">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>