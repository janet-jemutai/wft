  <?php
    
    include_once 'connect.php';
    $idError="";
    session_start();
 


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="autor" content="wtf">
    <!--CSS-->
    <link rel="stylesheet" type="text/css"  media="screen" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css"  media="screen" href="assets/css/jquery.bootgrid.css">
    <link rel="stylesheet" type="text/css"  media="screen" href="assets/css/jquery.bootgrid.min.css">
    
  
</head>
<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:0px;
    margin-right: 0px;
   }
  </style>
<body>
    <div class="sidebar">
    <div id="sidebar">
            <h2 class="padding-30" >Dashboard</h2>
            <ul class="list-group" style="background-color:rgb(36, 62, 95);">
            
            <li><a href="admin.php">Home </a> </li>
            <li><a href="admin/view.php">Manage Champions</a> </li>
            <li><a href="admin/viewadmin.php">  Manage Administrators </a> </li>
            
            
            
            </ul>
        
    </div>
    </div>
    <div id="main">
            <div class="header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                            <h1 class="padding-20 tCenter">
                                WINGS TO FLY
                            </h1>
                        </div>
                        <div class="col-md-2"><button type="submit" style="color: black;"  class="btn btn-success">
     <a href="index.php">LOGOUT</a>
   </button>
                            
                        </div>

            
                        </div>
                         <div class="row">
                            <div class="col-md-0"></div>
                            <div class="col-md-8">
                            
                    <div class="container content" style="color: black; width: 80%">
            
                    </div>
            
                </div>