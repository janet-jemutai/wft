<?php



function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("SELECT name,admission,mean_grade,class_position,overal_position,perfomance FROM results");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>
