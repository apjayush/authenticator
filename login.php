<?php

// some variables to control session



$servername = "localhost";
$username = "admin";
$password = "root";
$database = "authentication";

$loggedin ='false';

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
  die("Unable to connect to the database ");
}
else{
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "hey";
    $uname = $_POST['username'];
    $pass = $_POST['password'];
  
    $sql = "SELECT * FROM data WHERE username= '$uname' ";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_num_rows($result);

    echo $row;

   if($row==1){
      while($row=mysqli_fetch_assoc($result)){
        if($row['password']==$pass){
          session_start();
          $_SESSION['loggedin']= 'true';
          header('Location: ./welcome.php');
        }
        else{
          echo "Incorrect password";
        }
      }
   }
   else{
    echo "Invalid credentials";
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
    <title>Document</title>
</head>
<body>
    <?php include './partials/navbar.php' ?>

    <div class="container my-3">
    <h2>Login here</h2>
    
<form action="./login.php" method="POST"> 
  <div class="form-group my-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter email" name="username">
    
  </div>
  <div class="form-group my-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-success">Login</button>
  <a href="./signup.php"><button type="button" class="btn btn-success mx-3">Signup here </button></a>
</form>
</div>
</body>
</html>