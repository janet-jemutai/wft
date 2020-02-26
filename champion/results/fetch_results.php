<?php
include('db.php');
include('rfunction.php');
$query = '';
$output = array();
$query .= "SELECT name,admission,mean_grade,class_position,overal_position,perfomance FROM results ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR admission LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR mean_grade LIKE "%'.$_POST["search"]["value"].'%" ';
 
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY admission DESC ';
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
 $sub_array[] = $row["admission"];
 $sub_array[] = $row["mean_grade"];
  $sub_array[] = $row["class_position"];
   $sub_array[] = $row["overal_position"];
  $sub_array[] = $row["perfomance"];
  
 $sub_array[] = '<button type="button" name="view" id="'.$row["admission"].'" class="btn btn-warning btn-xs view">VIEW</button>';

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