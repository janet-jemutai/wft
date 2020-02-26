<?php

include('db.php');
include("afunction.php");

if(isset($_POST["work_id"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM admin WHERE work_id = :work_id"
 );
 $result = $statement->execute(
  array(
   ':work_id' => $_POST["work_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Admin Deleted';
 }
}



?>