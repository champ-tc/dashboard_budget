<?php

//action.php

include('database_connection.php');

if($_POST['action'] == 'edit')
{
 $data = array(
  ':list'  => $_POST['list'],
  ':quantity'  => $_POST['quantity'],
  ':type'   => $_POST['type'],
  ':budget'  => $_POST['budget'],
  ':procurement'  => $_POST['procurement'],
  ':remain'   => $_POST['remain'],
  ':overall'  => $_POST['overall'],
  ':date_finish'  => $_POST['date_finish'],
  ':id_group'   => $_POST['id_group'],
  ':ID'    => $_POST['ID']
 );

 $query = "
 UPDATE tb_investment 
 SET list = :list, 
 quantity = :quantity, 
 type = :type,
 budget = :budget, 
 procurement = :procurement,
 remain = :remain, 
 overall = :overall,
 date_finish = :date_finish, 
 id_group = :id_group
 WHERE ID = :ID
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM tb_investment 
 WHERE ID = '".$_POST["ID"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>