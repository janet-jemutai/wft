<?php
include('db.php');
include('cfunction.php');
if(isset($_POST["code"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM claims 
  WHERE code = '".$_POST["code"]."' 
  LIMIT 1"
 );
 $statement->execute(); 
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
 	$output['code'] = $row["code"];
  $output["name"] = $row["name"];
  $output["claim_type"] = $row["claim_type"];
    $output["claim_description"] = $row["claim_description"];
 }
 echo json_encode($output);
}
?>
   