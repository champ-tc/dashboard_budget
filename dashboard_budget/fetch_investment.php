<?php

//fetch.php

include('database_connection.php');

$column = array("ID", "list", "quantity", "type","budget", "procurement", "remain","overall", "date_finish", "id_group");

$query = "SELECT * FROM tb_investment ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE list LIKE "%'.$_POST["search"]["value"].'%" 
 OR quantity LIKE "%'.$_POST["search"]["value"].'%" 
 OR type LIKE "%'.$_POST["search"]["value"].'%"
 OR budget LIKE "%'.$_POST["search"]["value"].'%" 
 OR procurement LIKE "%'.$_POST["search"]["value"].'%"
 OR remain LIKE "%'.$_POST["search"]["value"].'%" 
 OR overall LIKE "%'.$_POST["search"]["value"].'%"
 OR date_finish LIKE "%'.$_POST["search"]["value"].'%" 
 OR id_group LIKE "%'.$_POST["search"]["value"].'%"
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
 $sub_array[] = $row['ID'];
 $sub_array[] = $row['list'];
 $sub_array[] = $row['quantity'];
 $sub_array[] = $row['type'];
 $sub_array[] = $row['budget'];
 $sub_array[] = $row['procurement'];
 $sub_array[] = $row['remain'];
 $sub_array[] = $row['overall'];
 $sub_array[] = $row['date_finish'];
 $sub_array[] = $row['id_group'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM tb_investment";
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
