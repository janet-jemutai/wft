<?php
if (isset($_POST["addchampion"])) {
	$name= $_POST['name'];
	$id= $_POST['ID'];
	$branch= $_POST['branch'];
	$role= $_POST['role'];
	$email= $_POST['email'];
	$pass= $_POST['pass'];
	$confirmpass= $_POST['cpassword'];
	$phonenumber= $_POST['phone'];
	$sql="INSERT INTO champion(name,password, work_id, email, role, phone_numer, branch)
	VALUES('$name', '$pass','$id', '$email', '$role', '$phonenumber', '$branch')";
	if(mysqli_query($conn, $sql)){
		echo "data inserted";
		
		}
		else{
			echo mysqli_error($conn);
	}
	
	# code...
}
?>