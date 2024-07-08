<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost; dbname=budget_envocc", "root", "Env044!@#");
// $connect = new PDO("mysql:host=localhost; dbname=budget_envocc", "root", "");
$connect->exec("set names utf8");
?>