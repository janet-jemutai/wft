<?php
include('db.php');
include('sfunction.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
   "UPDATE scholar 
   SET name = :name, branch = :branch, form = :form 
   WHERE admission = :admission
   "
  );
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':branch' => $_POST["branch"],
    ':form' => $_POST["form"],
    ':admission'   => $_POST["admission"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   