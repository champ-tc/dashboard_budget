<?php session_start();  
include("database_connection.php");
  $level = $_SESSION["User_level"];
  if($level!='1'){
    Header("Location: logout.php");  
  } 
?>