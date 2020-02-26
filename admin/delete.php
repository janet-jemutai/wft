<?php

include('db.php');
include("function.php");

if(isset($_POST["work_id"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM champion WHERE work_id = :work_id"
 );
 $result = $statement->execute(
  array(
   ':work_id' => $_POST["work_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>