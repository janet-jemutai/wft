<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
      //$password =md5($password);
   "UPDATE coordinator 
   SET name = :name, school = :school, email = :email,phone_numer = :phone_numer,password = :password 
   WHERE work_id = :work_id
   "
  );
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':school' => $_POST["school"],
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
   