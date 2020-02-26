<?php
    
    //include_once 'connect.php';
   // $idError="";


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
            
            <li><a href="../../champion.php">Home </a> </li>
            <li><a href="../viewcoordinator.php">Manage Coordinators</a> </li>
            <li><a href="../results/viewresults.php"> Uploaded Results </a> </li>
            <li><a href="viewclaims.php">Uploaded Claims</a> </li>
           
            
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
                            <div class="col-md-8">
                            
                    <div class="container content" style="color: black; width: 80%">
                          <style>
   body
   {
    margin:0;
    padding:0;
    background-color:white;
   }
   .box
   {
    padding:20px;
    background-color:white;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:0px;
    margin-right: 0px;
   }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">UPLOADED CLAIMS</h1>
   
   <div class="table-responsive">
    
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th >Name</th>
       <th >Code</th>
       <th >Claim Type</th>
       <th >Description</th>
        <th >ACTION</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetchclaims.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });
 

 
 $(document).on('click', '.view', function(){
  var code = $(this).attr("id");
  $.ajax({
   url:"fetch_single.php",
   method:"POST",
   data:{code:code},
   dataType:"json",
   success:function(data)
   {
    window.location="c.php?code="+data.code;
    }
  })
 });
 
});
</script>
   

   
   

   

                    </div>
                
            </div>
        </div>
                </div>