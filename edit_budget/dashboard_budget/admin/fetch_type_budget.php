<?php

//fetch.php

include('../include/database_connection.php');

$column = array("id_type", "type", "budget", "disbursement");

$query = "SELECT * FROM tb_type_budget ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE type LIKE "%'.$_POST["search"]["value"].'%" 
 OR budget LIKE "%'.$_POST["search"]["value"].'%" 
 OR disbursement LIKE "%'.$_POST["search"]["value"].'%"

 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_type ASC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id_type'];
 $sub_array[] = $row['type'];
 $sub_array[] = $row['budget'];
 $sub_array[] = $row['disbursement'];

 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM tb_type_budget";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);

?>
