<?php

include('db.php');
include("sfunction.php");

if(isset($_POST["admission"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM scholar WHERE admission = :admission"
 );
 $result = $statement->execute(
  array(
   ':admission' => $_POST["admission"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>