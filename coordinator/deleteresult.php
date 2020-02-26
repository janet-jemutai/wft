<?php

include('db.php');
include("rfunction.php");

if(isset($_POST["admission"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM results WHERE admission = :admission"
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