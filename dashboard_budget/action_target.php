<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':name'  => $_POST['name'],
  ':q1'  => $_POST['q1'],
  ':q2'   => $_POST['q2'],
  ':q3'  => $_POST['q3'],
  ':q4'  => $_POST['q4'],
  ':percent'   => $_POST['percent'],
  ':id'    => $_POST['id']
 );

 $query = "
 UPDATE tb_target 
 SET name = :name, 
 q1 = :q1, 
 q2 = :q2,
 q3 = :q3, 
 q4 = :q4,
 percent = :percent
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM tb_target 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>