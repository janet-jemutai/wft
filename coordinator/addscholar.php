
<?php
  
  include_once ('../connect.php');

  $error = false;
  $nameError = "";
  $admissionError = "";
  $branchError = "";
  $formError = "";
  //end of error declaration
    $errMSG = "";
  $Succmsg="";
  if ( isset($_POST['addscholar']) ) {
    
    // clean  inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name  = strip_tags($name );
    $name = htmlspecialchars($name );
    
    $admission = trim($_POST['admission']);
    $admission = strip_tags($admission); 
    $admission = htmlspecialchars($admission);

    $branch = trim($_POST['branch']);
    $branch = strip_tags($branch);
    $branch = htmlspecialchars($branch);

    $form = trim($_POST['form']);
    $form = strip_tags($form);
    $form = htmlspecialchars($form);
      
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
    
    if (empty($admission )) {
      $error = true;
      $admissionError = "Please enter scholar admission.";
    }
         else if (!preg_match("/^[0-9]+$/",$admission )) {
      $error = true;
      $admissionError = "must be digits only";
    }
    else{
      $error = false;
    }
    
    if (empty($branch )) {
      $error = true;
      $branchError = "Please enter the scholar branch.";
    } 
    else if (strlen($branch) < 3) {
      $error = true;
      $branchError = " Branch must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$branch )) {
      $error = true;
      $branchError = "Branch must contain alphabets and space.";
    }
    if (empty($form )) {
      $error = true;
      $formError = "Please select scholar form.";
    } 
    // if there's no error, continue to insert.
    if( !$error ) {

  $sql="INSERT INTO scholar(name,admission,branch, form)
  VALUES('$name', '$admission','$branch','$form')";
  if(mysqli_query($conn, $sql)){
    $Succmsg="Scholar Added successfully";
    
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

   <center><h2><b>Add Scholar</b></h2>
    <img src="" class="logo"></center>
    <span class="text text-success"><?php echo $Succmsg;?> </span>
    <form class="form-group" method="POST" action="addscholar.php">
      <label><b>Name</b></label><br/>
     <span class="error">*<?php echo $nameError;?></span>
        <input type="text" name="name"class="form-control" placeholder="Enter Your Name" autocomplete="off">
      <br/>
      
        <label><b>Admission</b></label><br/>
       <span class="error">*<?php echo $admissionError;?></span>
        <input type="varchar" name="admission"  class="form-control" placeholder="Enter Your Admission"  autocomplete="off">
      <br/>
      
        <label><b>Branch</b></label><br/>
       <span class="error">*<?php echo $branchError;?></span>
        <input type="text" name="branch"class="form-control" placeholder="Enter Your Branch"  autocomplete="off">
      <br/>
      <label><b>Form</b></label><br/>
      <span class="error">*<?php echo $formError;?></span>
        <select class="form-control" name="form">
          <option value="">Select Form</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <br/>
      <input type="submit" class="btn_add" name="addscholar" value="Save Changes"></form>
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
