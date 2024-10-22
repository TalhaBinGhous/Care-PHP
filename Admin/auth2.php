<?php 

if(!session_id()){
    session_start();
}

if(!isset($_SESSION['username'])){
    header("location: login2.php");
}
?>