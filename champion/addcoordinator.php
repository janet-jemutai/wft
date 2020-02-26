 <?php
  
  include_once ('../connect.php');

  $error = false;
  $nameError = "";
  $work_idError = "";
  $schoolError = "";
  $emailError = "";
    $passwordError = "";
    $phoneError = "";
    $cpassError="";
    
    //end of error declaration
    $errMSG = "";
  $Succmsg="";
  if ( isset($_POST['addcoordinator']) ) {
    
    // clean user inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name  = strip_tags($name );
    $name = htmlspecialchars($name );
    
    $work_id = trim($_POST['work_id']);
    $work_id = strip_tags($work_id); 
    $work_id = htmlspecialchars($work_id);

    $school = trim($_POST['school']);
    $school = strip_tags($school);
    $school = htmlspecialchars($school);


    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $cpass = trim($_POST['cpass']);
    $cpass = strip_tags($cpass);
    $cpassw = htmlspecialchars($cpass);


    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

      

    // basic name validation
    if (empty($name )) {
      $error = true;
      $nameError = "Please enter Coordinator name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = " Name  must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name )) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    //work id validation
    if (empty($work_id )) {
      $error = true;
      $work_idError = "Please enter Coordinator Work ID!.";
    }
         else if (!preg_match("/^[0-9]+$/",$work_id )) {
      $error = true;
      $work_idError = "must be digits only";
    }
    else{
      $error = false;
    }
    //branch validation.
    if (empty($school )) {
      $error = true;
      $schoolError = "Please enter Coordinator School.";
    } else if (strlen($school) < 3) {
      $error = true;
      $schoolError = " School must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$school )) {
      $error = true;
      $schoolError = "School must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    
    if (empty($email )) {
      $error = true;
      $emailError = "Please enter Coordinator email.";
    } else if (strlen($email) < 3) {
      $error = true;
      $emailError = " Email  must have atleat 3 characters.";
    }
    else{
      $error=false;
    }
    if (empty($password )) {
      $error = true;
      $passwordError = "Please enter Coordinator password.";
    } else if (strlen($password) < 3) {
      $error = true;
      $passwordError = "password must have atleat 3 characters.";
    } else if (!preg_match("/^[0-9]+$/",$password )) {
      $error = true;
      $passwordError = "password must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    if ($password != $cpass) {
      $error = true;
      $cpasswordError = "Your passwords do not match.";
    }
      
    //sacco loan validation
    if (empty($phone )) {
      $error = true;
      $phoneError = "Please enter Coordinator Phone Number";
    }

    else if (!preg_match("/^[0-9]+$/",$phone )) {
      $error = true;
      $phoneError = "must be digits.";
    }
    
    else{
      $error = false;
    }
    
    
    // if there's no error, continue to signup
      if( !$error ) {
      $password =md5($password);
  $sql="INSERT INTO coordinator(name,password, work_id, email, role, phone_numer, school)
  VALUES('$name', '$password','$work_id', '$email', 'coordinator', '$phone', '$school')";
  if(mysqli_query($conn, $sql)){
    $sql1="INSERT INTO login(id,username,password,role) VALUES(
    '$work_id','$name','$password','coordinator')";
    if(mysqli_query($conn, $sql1)){
    $Succmsg="Coordinator added successfully";
    
    }
    echo mysqli_error($conn);
    
    }
    else{
      echo mysqli_error($conn);
  }
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>champion </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="autor" content="wtf">
    <!--CSS-->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <script src="../assets/js/jquery.js" type="text/javascript"></script>
      <script src="../assets/js/bootstrap.js" type="text/javascript"></script>
       <script src="../assets/js/modernizr-2.8.1.js"></script>
          <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/dataTables.bootstrap.min.js"></script> 
        <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/css/dataTables.bootstrap.css" rel="stylesheet" />  
  
</head>
<body>
   <div class="sidebar">
    <div id="sidebar">
            <h2 class="padding-30" >Dashboard</h2>
            <ul class="list-group" style="background-color:rgb(36, 62, 95);">
            
            <li><a href="../champion.php">Home </a> </li>
            <li><a href="viewcoordinator.php">Manage Coordinators</a> </li>
            <li><a href="results/viewresults.php"> Uploaded Results </a> </li>
            <li><a href="claims/viewclaims.php">Uploaded Claims</a> </li>
            
            
            </ul>
        
    </div>
    </div>
    <div id="main">
            <div class="header">
                    <div class="container">
                        <div class="row">
                            <h1 class="padding-20 tCenter">
                                WINGS TO FLY
                            </h1>
            
                        </div>
                        <div class="row">
                            <div class="col-md-0"></div>
                            <div class="col-md-12">
                            
                    <div class="container content" style="color: black; width: 78%">
                          <style>
   body
   {
    margin:0;
    padding:0;
    background-color:white;
   }
   form
   {
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:0px;
    margin-right: 0px;
   }
  </style>

     <center><h2><b>Add Coordinator</b></h2>
    <img src="" class="logo"></center>
    <span class="error"><?php echo $Succmsg;?> </span>
    <form class="form-group" method="POST" action="addcoordinator.php">
      
        <label><b>Name</b></label><br/>
        <span class="error">*<?php echo $nameError;?> </span>
        <input type="text" name="name"class="form-control" placeholder="Enter Your Name"  autocomplete="off">
      <br/>
      
        <label><b>Work ID</b></label><br/>
        <span class="error">*<?php echo $work_idError;?> </span>
        <input type="varchar" name="work_id" class="form-control"  placeholder="Enter Your Work ID"  autocomplete="off">
      <br/>
      
        <label><b>School</b></label><br/>
       <span class="error">*<?php echo $schoolError;?> </span>
        <input type="text" name="school" class="form-control" placeholder="Enter Your School"  autocomplete="off">
      <br/>
      
        
      <label><b>Email</b></label><br/>
    <span class="error">*<?php echo $emailError;?> </span>
        <input type="Email" name="email" class="form-control" placeholder="Enter Your Email"  autocomplete="off">
      <br/>
      
      
        <label><b>Password</b></label><br/>
     <span class="error">*<?php echo $passwordError;?> </span>
        <input type="Password" name="password" class="form-control" placeholder="Enter Your Password"  autocomplete="off">
      <br/>
      
        <label><b>Confirm Password</b></label><br/>
        <span class="error">*<?php echo $cpassError;?> </span>
        <input type="password" class="form-control" name="cpass" class="form_inputs"placeholder="Enter Your Password"  autocomplete="off">
      <br/>
      
        <label><b>Phone Number</b></label><br/>
        <span class="error">*<?php echo $phoneError;?> </span>
        <input type="Number" class="form-control" name="phone"class="form_inputs" placeholder="Enter Coordinator Phone Number"  autocomplete="off">
      <br/>
      <input type="submit" class="btn btn-info" name="addcoordinator" value="Save Changes">

    </form>
    
  </div>
        <div class="col-md-3">
        
      </div>

</div>
</div>



</body>
<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js" type="text/javascript"></script>
       <script src="../assets/js/modernizr-2.8.1.js"></script>
       <script src="../assets/js/jquery-1.11.1.min.js"></script>
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/jquery.bootgrid.js"></script>
        <script src="../assets/js/jquery.bootgrid.fa.js"></script>
</html>
<style>
  body{

  }
</style>