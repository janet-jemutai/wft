<?php
    
    //include_once 'connect.php';
   // $idError="";


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
                            <div class="col-md-8">
                            
                    <div class="container content" style="color: black; width: 78%">
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
 </head>
 <body>
  <div class="container box">
    <div class="row">
      <div class="col-md-2"></div>
    <div class="col-md-8">
   <h1 align="center">MANAGE SCHOLARS</h1>
   
   
 </div>
 <div class="col-md-2">
   <button type="submit" style="color: black;" class="btn btn-success">
     <a href="addscholar.php">Add New scholar</a>
   </button>
 </div>
  </div>
  
   
   <div class="table-responsive">
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th >Name</th>
       <th >Admission</th>
       <th >Branch</th>
       <th >Form</th>
       <th >Edit</th>
       <th >Delete</th>
      </tr>
     </thead>
    </table>
    
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit scholar</h4>
    </div>
    <div class="modal-body">
     <label> Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Branch</label>
     <input type="text" name="branch" id="branch" class="form-control" />
     <br />
     <label> Form</label>
     <select class="form-control" name="form" id="form">
       <option value="">Select Form</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
     </select>
     <br/>
     <div class="modal-footer">
     <input type="hidden" name="admission" id="admission" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetchscholar.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 3, 4],
    "orderable":false,
   },
  ],

 });
  $(document).on('submit', '#user_form', function(event){
  event.preventDefault();
 var name = $('#name').val();
  var branch = $('#branch').val();
  var admission = $('#admission').val();
  var form = $('#form').val();
  if(name!= '' && branch !='' && admission!='' && form !=''){
  $.ajax({
    url:"updatescholar.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#userModal').modal('hide');
     dataTable.ajax.reload();
    }
   });
}
else{
  alert("All fields are required");
}
  
  
 });

 
 $(document).on('click', '.update', function(){
  var admission = $(this).attr("id");
  $.ajax({
   url:"fetch_singlescholar.php",
   method:"POST",
   data:{admission:admission},
   dataType:"json",
   success:function(data)
   {
    $('#userModal').modal('show');
    $('#name').val(data.name);
    $('#branch').val(data.branch);
    $('#form').val(data.form);
    $('.modal-title').text("Edit scholar");
    $('#admission').val(admission);
    $('#action').val("Edit");
    $('#operation').val("Edit");
   }
  })
 });
 
 $(document).on('click', '.delete', function(){
  var admission = $(this).attr("id");
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"deletescholar.php",
    method:"POST",
    data:{admission:admission},
    success:function(data)
    {
     alert(data);
     dataTable.ajax.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
 
 
});
</script>
   

                    </div>
                
            </div>
        </div>
                </div>