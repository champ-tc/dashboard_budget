<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':type'  => $_POST['type'],
  ':budget'  => $_POST['budget'],
  ':disbursement'   => $_POST['disbursement'],
  ':id_type'    => $_POST['id_type']
 );

 $query = "
 UPDATE tb_type_budget 
 SET type = :type, 
 budget = :budget, 
 disbursement = :disbursement
 WHERE id_type = :id_type
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM tb_type_budget 
 WHERE id_type = '".$_POST["id_type"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>