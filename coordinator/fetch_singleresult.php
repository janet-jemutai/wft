<?php
include('db.php');
include('rfunction.php');
if(isset($_POST["admission"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT name,admission,mean_grade,class_position,overal_position,perfomance FROM results 
  WHERE admission = '".$_POST["admission"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["mean_grade"] = $row["mean_grade"];
    $output["class_position"] = $row["class_position"];
     $output["overal_position"] = $row["overal_position"];
    $output["perfomance"] = $row["perfomance"];
}
 echo json_encode($output);
}
?>
   