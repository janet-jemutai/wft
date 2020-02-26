<?php
include('db.php');
include('afunction.php');
if(isset($_POST["work_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM admin 
  WHERE work_id = '".$_POST["work_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["branch"] = $row["branch"];
    $output["email"] = $row["email"];
  $output["password"] = $row["password"];
    $output["phone_numer"] = $row["phone_numer"];
  
 }
 echo json_encode($output);
}
?>
   