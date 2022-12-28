<?php

session_start();

if(isset($_SESSION['loggedin'])){
    echo "welcome to welcome page";
}
else{
    header('Location: login.php');
}

include './logout.php';

?>
