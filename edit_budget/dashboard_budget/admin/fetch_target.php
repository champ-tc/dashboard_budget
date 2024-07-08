<?php

//fetch.php

include('../include/database_connection.php');

$column = array("id", "name", "q1", "q2","q3", "q4", "percent");

$query = "SELECT * FROM tb_target ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE name LIKE "%'.$_POST["search"]["value"].'%" 
 OR q1 LIKE "%'.$_POST["search"]["value"].'%" 
 OR q2 LIKE "%'.$_POST["search"]["value"].'%"
 OR q3 LIKE "%'.$_POST["search"]["value"].'%" 
 OR q4 LIKE "%'.$_POST["search"]["value"].'%"
 OR percent LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id ASC ';
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
 $sub_array[] = $row['id'];
 $sub_array[] = $row['name'];
 $sub_array[] = $row['q1'];
 $sub_array[] = $row['q2'];
 $sub_array[] = $row['q3'];
 $sub_array[] = $row['q4'];
 $sub_array[] = $row['percent'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM tb_target";
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
