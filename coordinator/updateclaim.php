<?php
include('db.php');
include('cfunction.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
   "UPDATE claims 
   SET name = :name, claim_type = :claim_type,claim_description = :claim_description
   WHERE code = :code
   "
  );
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':claim_type' => $_POST["claim_type"],
    ':claim_description' => $_POST["claim_description"],
    ':code'   => $_POST["code"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   