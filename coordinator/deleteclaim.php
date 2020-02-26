<?php

include('db.php');
include("cfunction.php");

if(isset($_POST["code"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM claims WHERE code = :code"
 );
 $result = $statement->execute(
  array(
   ':code' => $_POST["code"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>