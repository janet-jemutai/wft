
<?php
  
  include_once ('../connect.php');

  $error = false;
  $nameError = "";
  $work_idError = "";
  $branchError = "";
  $roleError = "";
  $emailError = "";
    $passwordError = "";
    $phoneError = "";
    $cpasswordError="";
    
    //end of error declaration

  $errMSG = "";
  $Succmsg="";
  

  if ( isset($_POST['addchampion']) ) {
    
    // clean  inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name  = strip_tags($name );
    $name = htmlspecialchars($name );
    
    $work_id = trim($_POST['work_id']);
    $work_id = strip_tags($work_id); 
    $work_id = htmlspecialchars($work_id);

    $branch = trim($_POST['branch']);
    $branch = strip_tags($branch);
    $branch = htmlspecialchars($branch);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['pass']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $cpassword = trim($_POST['cpassword']);
    $cpassword = strip_tags($cpassword);
    $cpassword = htmlspecialchars($cpassword);


    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

      

    // name validation
    if (empty($name )) {
      $error = true;
      $nameError = "Please enter Champion name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = " Name  must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name )) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    }
    //work id validation
    if (empty($work_id )) {
      $error = true;
      $work_idError = "Please enter Champion Work ID!.";
    }
        
    else{
      $error = false;
    }
    //branch validation.
    if (empty($branch )) {
      $error = true;
      $branchError = "Please enter Champion branch.";
    } else if (strlen($branch) < 3) {
      $error = true;
      $branchError = " Branch must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$branch )) {
      $error = true;
      $branchError = "Branch must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    //email validation

    if (empty($email )) {
      $error = true;
      $emailError = "Please enter Champion email.";
    } else if (strlen($email) < 3) {
      $error = true;
      $emailError = " Email  must have atleat 3 characters.";
    }
    //password validation
    if (empty($password )) {
      $error = true;
      $passwordError = "Please enter Champion password.";
    } else if (strlen($password) < 3) {
      $error = true;
      $passwordError = "password must have atleat 3 characters.";
    } else if (!preg_match("/^[0-9]+$/",$password )) {
      $error = true;
      $passwordError = "password must contain alphabets and space.";
    }
    if ($password != $cpassword ) {
      $error = true;
      $cpasswordError = "Your passwords do not match.";
    }
      
    //phone number validation
    if (empty($phone )) {
      $error = true;
      $phoneError = "Please enter Champion Phone Number";
    }

    else if (!preg_match("/^[0-9]+$/",$phone )) {
      $error = true;
      $phoneError = "must be digits.";
    }
    
    else{
      $error = false;
    }
    
    
    // if there's no error, continue 
    if( !$error ) {
      $password =md5($password);
  $sql="INSERT INTO champion(name,password, work_id, email, role, phone_numer, branch)
  VALUES('$name', '$password','$work_id', '$email', 'champion', '$phone', '$branch')";
  if(mysqli_query($conn, $sql)){
    $sql1="INSERT INTO login(id,username,password,role) VALUES(
    '$work_id','$name','$password','champion')";
    if(mysqli_query($conn, $sql1)){
    $Succmsg="Champion added successfully";
    
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
    <title>coordinator </title>
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
            
            <li><a href="../admin.php">Home </a> </li>
            <li><a href="view.php">Manage Champions</a> </li>
            <li><a href="viewadmin.php">  Manage Administrators </a> </li>
            
            
            
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
    background-color:white;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:0px;
    margin-right: 0px;
   }
  </style>

    <center><h2><b>Add champion</b></h2>
    <img src="" class="logo"></center>
    <span class="text text-success"><?php echo $Succmsg;?> </span>
    <form class="form-group" method="POST" action="addchampion.php" id="addchampion"> 
                    <label><b>Name</b></label><br/>
         <span class="error">*<?php echo $nameError; ?></span>

        <input type="text" name="name"class="form-control" placeholder="Enter Your Name" autocomplete="off" autofocus="" id="name">
      <br/>
      
        <label><b>Work ID</b></label><br/>
        <span class="error">*<?php echo $work_idError; ?></span>

        <input type="text" name="work_id"  class="form-control" placeholder="Enter Your Work ID"  autocomplete="off" id="work_id">
      <br/>
      
      <span class="error">*</label><br/>
        <span class="text text-danger"><?php echo $branchError; ?></span>

        <input type="text" name="branch"class="form-control" placeholder="Enter Your Branch"  autocomplete="off" id="branch">
      <br/>
      
    <span class="error">*</label><br/>
      <span class="text text-danger"><?php echo $emailError; ?></span>

        <input type="Email" name="email"class="form-control" placeholder="Enter Your Email"  autocomplete="off" id="email">
      <br/>
      
      
        <span class="error">*</label><br/>
        <span class="text text-danger"><?php echo $passwordError; ?></span>

        <input type="Password" name="pass"class="form-control" placeholder="Enter Your Password"  autocomplete="off" id="password">
      <br/>
      
        <label><b>Confirm Password</b></label><br/>
        <span class="error">*<?php echo $cpasswordError; ?></span>

        <input type="password" name="cpassword" class="form-control"placeholder="Enter Your Password" autocomplete="off" id="cpassword">
      <br/>
      
        <label><b>Phone Number</b></label><br/>
        <span class="error">*<?php echo $phoneError; ?></span>

        <input type="Number" name="phone"class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" size="10" id="phonenumber">
      <br/>
      <input type="submit" class="btn_add" name="addchampion" value="Save Changes">

    </form>

    
  </div>
  <div class="col-md-3"></div>
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