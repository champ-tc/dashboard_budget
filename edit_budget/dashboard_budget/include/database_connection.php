<?php

//database_connection.php

// $connect = new PDO("mysql:host=localhost; dbname=budget_envocc", "root", "");
// $connect->exec("set names utf8");

$connect = new PDO("mysql:host=localhost; dbname=budget_envocc", "budget_envocc", "Env044!@#");
$connect->exec("set names utf8");

?>