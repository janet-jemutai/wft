<?php
include('db.php');
include('cfunction.php');
$query = '';
$output = array();
$query .= "SELECT * FROM claims ";
if(isset($_POST["search"]["value"]))
{ 
 $query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR claim_type LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR claim_description LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR code LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY code DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 
 $sub_array = array();
 $sub_array[] = $row["name"];
 $sub_array[] = $row["code"];
 $sub_array[] = $row["claim_type"];
  $sub_array[] = $row["claim_description"];
  
 $sub_array[] = '<button type="button" name="view" id="'.$row["code"].'" class="btn btn-warning btn-xs view">VIEW</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>