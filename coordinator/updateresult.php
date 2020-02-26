<?php
include('db.php');
include('rfunction.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Edit")
 {
  $statement = $connection->prepare(
   "UPDATE results 
   SET name = :name, mean_grade = :mean_grade, class_position = :class_position, overal_position = :overal_position, perfomance = :perfomance
   WHERE admission = :admission
   "
  );
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':mean_grade' => $_POST["mean_grade"],
    ':class_position' => $_POST["class_position"],
      ':overal_position' => $_POST["overal_position"],
    ':perfomance' => $_POST["perfomance"],
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
   