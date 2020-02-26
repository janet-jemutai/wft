<?php
include_once ('connect.php');

	$error = false;
	$nameError = "";
	$passwordError = "";
	
    
    //end of error declaration

	$errMSG = "";
	$Succmsg="";
if(isset($_POST['login'])){
// clean  inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name  = strip_tags($name );
		$name = htmlspecialchars($name );
		
		$password = trim($_POST['password']);
		$password = strip_tags($password); 
		$password = htmlspecialchars($password);

		if (empty($name )) {
			$error = true;
			$nameError = "Please enter your name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = " Name  must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name )) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		if (empty($password )) {
			$error = true;
			$passwordError = "Please enter your password!.";
		}
         else if (!preg_match("/^[0-9]+$/",$password )) {
			$error = true;
			$passwordError = "must be digits only";
		}
		else{
			$error = false;
		}

		// if there's no error, continue to signup
		if( !$error ) {
			//encrypt password.
			$password =md5($password);
			$sql="SELECT * FROM login WHERE username ='$name' AND password ='$password'";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result)>0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['role']=='admin'){
				$_SESSION['name']=$row['name'];
				header('location:admin.php');


					}
				else if($row['role']=='champion'){
				$_SESSION['name']=$row['name'];
				header('location:champion.php');

						
					}
			 else if($row['role']=='coordinator'){
			 	$_SESSION['name']=$row['name'];
				header('location:coordinator.php');

						
					}
					
        
    }
				
				# code...
			}

		

				header('location: admin.php');
			

}
}


?>
