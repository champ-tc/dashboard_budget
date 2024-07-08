<?php session_start();  
include("database_connection.php");
  $level = $_SESSION["User_level"];
  if($level!='2'){
    Header("Location: logout.php");  
  } 
?>