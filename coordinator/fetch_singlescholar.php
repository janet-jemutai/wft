<?php
include('db.php');
include('sfunction.php');
if(isset($_POST["admission"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM scholar 
  WHERE admission = '".$_POST["admission"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["branch"] = $row["branch"];
    $output["form"] = $row["form"];
}
 echo json_encode($output);
}
?>
   