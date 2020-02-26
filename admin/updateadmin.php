<?php
include('db.php');
include('afunction.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
      $password =md5($password);
   "UPDATE admin 
   SET name = :name, branch = :branch, email = :email,phone_numer = :phone_numer,password = :password 
   WHERE work_id = :work_id
   "
  );
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':branch' => $_POST["branch"],
    ':email' => $_POST["email"],
    ':password' => $_POST["password"],
    ':phone_numer' => $_POST["phone"],
     ':work_id'   => $_POST["work_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }
}

?>
   