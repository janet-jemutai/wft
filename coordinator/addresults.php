<?php
  
  include_once ('../connect.php');

  $error = false;
  $nameError = "";
  $admissionError = "";
  $mathsError = "";
  $englishError = "";
  $kiswahiliError = "";
    $chemistryError = "";
    $biologyError = "";
    $physicsError="";
    $religiousError = "";
  $historyError = "";
  $geographyError = "";
  $agricultureError = "";
  $businessError = "";
    $home_scienceError = "";
    $drawingError = "";
    $frenchError="";
    $musicError = "";
  $mean_gradeError = "";
    $cpositionError = "";
    $opositionError = "";
    $attendanceError="";
     $behaviorError = "";
    $perfomanceError="";
    $errMSG = "";
  $Succmsg="";
   //end of error declaration

  if ( isset($_POST['addresults']) ) {
    
    // clean inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name  = strip_tags($name );
    $name = htmlspecialchars($name );
    
    $admission = trim($_POST['admission']);
    $admission = strip_tags($admission); 
    $admission = htmlspecialchars($admission);

    $maths = trim($_POST['maths']);
    $maths = strip_tags($maths);
    $maths = htmlspecialchars($maths);

    $english = trim($_POST['english']);
    $english = strip_tags($english);
    $english = htmlspecialchars($english);

    $kiswahili = trim($_POST['kiswahili']);
    $kiswahili = strip_tags($kiswahili);
    $kiswahili = htmlspecialchars($kiswahili);

    $chemistry = trim($_POST['chemistry']);
    $chemistry = strip_tags($chemistry);
    $chemistry = htmlspecialchars($chemistry);


    $biology = trim($_POST['biology']);
    $biology = strip_tags($biology);
    $biology = htmlspecialchars($biology);

    $physics = trim($_POST['physics']);
    $physics  = strip_tags($physics );
    $physics = htmlspecialchars($physics );
    
    $religious = trim($_POST['religious']);
    $religious = strip_tags($religious); 
    $religious = htmlspecialchars($religious);

    $history = trim($_POST['history']);
    $history = strip_tags($history);
    $history = htmlspecialchars($history);

    $geography = trim($_POST['geography']);
    $geography = strip_tags($geography);
    $geography = htmlspecialchars($geography);

    $agriculture = trim($_POST['agriculture']);
    $agriculture = strip_tags($agriculture);
    $agriculture = htmlspecialchars($agriculture);

    $business = trim($_POST['business']);
    $business = strip_tags($business);
    $business = htmlspecialchars($business);


    $home_science = trim($_POST['home_science']);
    $home_science = strip_tags($home_science);
    $home_science = htmlspecialchars($home_science);

    $name = trim($_POST['name']);
    $name  = strip_tags($name );
    $name = htmlspecialchars($name );
    
    $drawing = trim($_POST['drawing']);
    $drawing = strip_tags($drawing); 
    $drawing = htmlspecialchars($drawing);

    $french = trim($_POST['french']);
    $french = strip_tags($french);
    $french = htmlspecialchars($french);

    $music = trim($_POST['music']);
    $music = strip_tags($music);
    $music = htmlspecialchars($music);

    $mean_grade = trim($_POST['mean_grade']);
    $mean_grade = strip_tags($mean_grade);
    $mean_grade = htmlspecialchars($mean_grade);

    $cposition = trim($_POST['cposition']);
    $cposition = strip_tags($cposition);
    $cposition = htmlspecialchars($cposition);


    $oposition = trim($_POST['oposition']);
    $oposition = strip_tags($oposition);
    $oposition = htmlspecialchars($oposition);


      $attendance = trim($_POST['attendance']);
    $attendance = strip_tags($attendance);
    $attendance = htmlspecialchars($attendance);

    $behavior = trim($_POST['behavior']);
    $behavior = strip_tags($behavior);
    $behavior = htmlspecialchars($behavior);


    $perfomance = trim($_POST['perfomance']);
    $perfomance = strip_tags($perfomance);
    $perfomance = htmlspecialchars($perfomance);
     
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
    //subjects validation
    if (empty($maths )) {
      $error = true;
      $mathsError = "Please Select Grade.";
    }
    else{
      $error=false;
    }
    if (empty($english )) {
      $error = true;
      $englishError = "Please Select Grade.";
    }
    else{
      $error=false;
    }
    if (empty($kiswahili )) {
      $error = true;
      $kiswahiliError = "Please Select Grade.";
    }
    else{
      $error=false;
    }
    if (empty($chemistry )) {
      $error = true;
      $chemistryError = "Please Select Grade.";
    }
    else{
      $error=false;
    }
    if (empty($biology )) {
      $error = true;
      $biologyError = "Please Select Grade.";
    }
else{
      $error=false;
    }
    if (empty($physics )) {
      $error = true;
      $physicsError = "Please Select Grade.";
    }
    else{
      $error=false;
    }
    if (empty($religious )) {
      $error = true;
      $religiousError = "Please Select Grade.";
    }
    else{
      $error=false;
    }
    if (empty($mean_grade )) {
      $error = true;
      $mean_gradeError = "Please Select Mean Grade.";
    }
    else{
      $error=false;
    }
    if (empty($cposition )) {
      $error = true;
      $cpositionError = "Please enter scholar class Position.";
    }

         else if (!preg_match("/^[0-9]+$/",$cposition )) {
      $error = true;
      $cpositionError = "must be digits only";
    }
    else{
      $error = false;
    }

      if (empty($oposition )) {
      $error = true;
      $opositionError = "Please enter scholar Overal Position.";
    }
         else if (!preg_match("/^[0-9]+$/",$oposition )) {
      $error = true;
      $opositionError = "must be digits only";
    }
    else{
      $error = false;
    }
    if (empty($attendance )) {
      $error = true;
      $attendanceError = "Please comment on  scholar class attendance.";
    } else if (strlen($attendance) < 3) {
      $error = true;
      $attendanceError = "  must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$attendance )) {
      $error = true;
      $attendanceError = "must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    if (empty($behavior )) {
      $error = true;
      $behaviorError = "Please comment on  scholar  behavior.";
    } else if (strlen($behavior) < 3) {
      $error = true;
      $behaviorError = "  must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$behavior )) {
      $error = true;
      $behaviorError = "must contain alphabets and space.";
    }
    else{
      $error=false;
    }
    if (empty($perfomance )) {
      $error = true;
      $perfomanceError = "Please comment on  scholar class perfomance.";
    } else if (strlen($perfomance) < 3) {
      $error = true;
      $perfomanceError = "  must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$perfomance )) {
      $error = true;
      $perfomanceError = "must contain alphabets and space.";
    }
    else{
      $error=false;
    }

    // if there's no error, continue to insert
    if( !$error ) {
  $sql="INSERT INTO results(name,admission, mathematics, english, kiswahili, chemistry, biology,physics,religious_education,history,geography,agriculture,business,home_science,art_drawing,french,music,mean_grade,class_position,overal_position,attendance,behavior,perfomance)
  VALUES('$name', '$admission','$maths', '$english', '$kiswahili', '$chemistry', '$biology','$physics','$religious','$history','$geography','$agriculture','$business','$home_science','$drawing','$french','$music','$mean_grade','$cposition','$oposition','$attendance','$behavior','$perfomance')";
  if(mysqli_query($conn, $sql)){
    $Succmsg="Results Added  successfully";
    
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
<center><h2><b>Add Results</b></h2>
    <img src="" class="logo"></center>
    <span class="text text-success"><?php echo $Succmsg;?> </span>
    <form class="form-group" method="post" action="addresults.php">
      
        <label><b>Name</b></label><br/>
        <span class="error">*<?php echo  $nameError;?></span>
        <input type="text" name="name"class="form-control" placeholder="Enter Your Name" autocomplete="off">
      <br/>
      <label><b>Admission/Code</b></label><br/>
      <span class="error">*<?php echo  $admissionError;?></span>
        <input type="number" name="admission"class="form-control" placeholder="Enter Your Admission"  autocomplete="off">
      <br/>
      <label><b>Mathematics</b></label><br/>
      <span class="error">*<?php echo  $mathsError;?></span>
      <select class="form-control" name="maths"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>English</b></label><br/>
      <span class="error">*<?php echo  $englishError;?></span>
      <select class="form-control" name="english"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Kiswahili</b></label><br/>
     <span class="error">*<?php echo  $kiswahiliError;?></span>
      <select class="form-control" name="kiswahili"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Chemistry</b></label><br/>
      <span class="error">*<?php echo  $chemistryError;?></span>
      <select class="form-control" name="chemistry"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Biology</b></label><br/>
     <span class="error">*<?php echo  $biologyError;?></span>
      <select class="form-control" name="biology"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Physics</b></label><br/>
      <span class="error">*<?php echo  $physicsError;?></span>
      <select class="form-control" name="physics"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Religious Education</b></label><br/>
      <span class="error">*<?php echo  $religiousError;?></span>
      <select class="form-control" name="religious"> 
      <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>History and Government</b></label><br/>
      <select class="form-control" name="history"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Geography</b></label><br/>
      <select class="form-control" name="geography"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Agriculture</b></label><br/>
      <select class="form-control" name="agriculture">
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Business Studies</b></label><br/>
      <select class="form-control" name="business"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Home Science</b></label><br/>
      <select class="form-control" name="home_science"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Arts and Drawing</b></label><br/>
      <select class="form-control" name="drawing"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>French</b></label><br/>
      <select class="form-control" name="french"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Music</b></label><br/>
      <select class="form-control" name="music"> 
        <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Mean Grade</b></label><br/>
      <span class="error">*<?php echo  $mean_gradeError;?></span>
      <select class="form-control"  name="mean_grade">
      <option value="">Select Grade</option>
        <option value="A(12)">A(12)</option>
        <option value="A-(11)">A-(11)</option>
        <option value="B+(10)">B+(10)</option>
        <option value="B(9)">B(9)</option>
        <option value="B-(8)">B-(8)</option>
        <option value="C+(7)">C+(7)</option>
        <option value="C(6)">C(6)</option>
        <option value="C-(5)">C-(5)</option>
        <option value="D+(4)">D+(4)</option>
        <option value="D(3)">D(3)</option>
        <option value="D-(2)">D-(2)</option>
        <option value="E(1)">E(1)</option></select>
        
      <br/>
      <label><b>Class Position</b></label>
     <span class="error">*<?php echo  $cpositionError;?></span>
      <input type="number" name="cposition" class="form-control" 
      autocomplete="off" size="3" placeholder="Class Position"> <br/>
      <label><b>Overal  Position</b></label>
      <span class="text text-danger"><?php echo  $opositionError;?></span>
      <input type="number" name="oposition" class="form-control" 
      autocomplete="off" size="3" placeholder="Overal Position"> <br/>
      

    <label><b>Class Attendance</b></label>
   <span class="error">*<?php echo  $attendanceError;?></span>
    <textarea class="form-control" name="attendance" 
     autocomplete="off" placeholder="comment on the class attendance"></textarea><br/>
    <label><b>Behavior Comment</b></label>
   <span class="error">*<?php echo  $behaviorError;?></span>
    <textarea class="form-control" name="behavior"  autocomplete="off" placeholder="comment on the  student Behavior"></textarea><br/>
    <label><b>Perfomance Comment</b></label>
  <span class="error">*<?php echo  $perfomanceError;?></span>
    <textarea class="form-control" name="perfomance"  autocomplete="off" placeholder="comment on the student perfomance"></textarea><br/>
    <input type="submit" class="btn btn-info" name=addresults value="Save Changes">

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
   