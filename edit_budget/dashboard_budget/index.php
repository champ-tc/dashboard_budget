<?php 
    session_start();
    unset($_SESSION["User_level"]);;
    header('location: login.php');
?>