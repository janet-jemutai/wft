  
<?php
  
  include_once ('../connect.php');


  $error = false;
  $nameError = "";
  $codeError = "";
  $typeError = "";
  $descriptionError = "";
  //end of error declaration
    $errMSG = "";
  $Succmsg="";
  if ( isset($_POST['addclaim']) ) {
    
    // clean inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name  = strip_tags($name );
    $name = htmlspecialchars($name );
    
    $code = trim($_POST['code']);
    $code = strip_tags($code); 
    $code = htmlspecialchars($code);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $description = trim($_POST['description']);
    $description = strip_tags($description);
    $description = htmlspecialchars($description);
        
    if (empty($name )) {
      $error = true;
      $nameError = "Please enter scholar name.";
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
    
    if (empty($code )) {
      $error = true;
      $codeError = "Please enter scholar code.";
    }
         else if (!preg_match("/^[0-9]+$/",$code )) {
      $error = true;
      $codeError = "must be digits only";
    }
    else{
      $error = false;
    }
    
    if (empty($type )) {
      $error = true;
      $typeError = "Please select claims type.";
    } 
    else{
      $error=false;
    }
    if (empty($description )) {
      $error = true;
      $descriptionError = "Please describe the claim.";
    } else if (strlen($description) < 3) {
      $error = true;
      $descriptionError = " Claim  must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$description )) {
      $error = true;
      $descriptionError = "Description must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    
    if( !$error ) {

  $sql="INSERT INTO claims(name,code,claim_type, claim_description)
  VALUES('$name', '$code','$type','$description')";
  if(mysqli_query($conn, $sql)){
    $Succmsg="Claim Added successfully";
    
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
            
            <li><a href="../coordinator.php">Home </a> </li>
          

            <li><a href="viewscholar.php">Manage Scholars</a> </li>
            <li><a href="viewresults.php">Manage Results</a> </li>
            <li><a href="viewclaim.php">Manage Claims</a> </li>
            <li><a href="results/viewresults.php"  target="_blank">Print All Results</a></li>
           
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

   <center><h2><b>Add Claim</b></h2>
    <img src="" class="logo"></center>
    <span class="text text-success"><?php echo $Succmsg;?> </span>
    <form class="form-group" method="POST" class="form" action="addclaim.php">
      <label><b>Name</b></label>
      <span class="error">*<?php echo $nameError;?></span>
      <input type="text" name="name" autocomplete="off" placeholder="Name" class="form-control"><br/>
      <label><b>Code</b></label>
      <span class="error">*<?php echo $codeError;?></span>
      <input type="text" name="code" autocomplete="off"  placeholder="Code" class="form-control"><br/>
      <label><b>Claim Type</b></label>
      <span class="error">*<?php echo $typeError;?></span>
      <select class="form-control" name="type">
        <option value="">Select Claim Type</option>
        <option value="Books">Books</option>
        <option value="Uniform">Uniform</option>
        <option value="Sports">Sports</option>
        <option value="Remidials">Remedials</option>
        <option value="tour">Tour</option>
        <option value="Meal">Meal</option>

      </select>
      <br/>
      <label><b>Claim Description</b></label>
      <span class="error">*<?php echo $descriptionError;?></span>
      <textarea class="form-control" name="description"  autocomplete="off" placeholder="Describe the claim"></textarea><br/>
    <input type="submit" class="btn btn-info" name="addclaim" value="Save Changes">

    </form>
  </div></div></div></div></div></div></body></html>
  
  
    
  
   
   