<?php
$nameError = "";
	$passwordError = "";
    $loginerror ="";
?>
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
                
               
            }

        
                 $loginerror = "User not Recognised";
                          

}
}


?>


    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link href="assets/css/jquery.bootgrid.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div class="container">
                        <div class="row">
                            <div class="col-md-3 ">
                            </div>
                             <div class="col-md-6 ">
                                <!--<div id="card">
                                <div class="card"
                                <div class="form">-->
                                    <div class="panel-group" style="padding-top: 100px;">
                                 <div class="panel panel-default">
                              <div class="panel-body">

                                    <form role="form" action="index.php" method="POST" class="form-group" >
                                        <div class="panel-heading"> LOGIN INTO WINGS TO FLY PLATFORM</div>
                                        <span class="error" style="color: red;"><?php echo $loginerror;?></span><br/>
                                        <label>User Name</label><br/>
                                        <span class="error" style="color: red;">*<?php echo $nameError;?></span>
                                         <input type= "text" name="name" autocomplete="off" class="form-control" placeholder="please enter your name"> <br/>
                                         
                                         <label>Password</label><br/>
                                         <span class="error " style="color: red;">*<?php echo $passwordError;?></span>
                                         <input type= "password" name="password" class="form-control" placeholder="please enter your password"> <br/> 
                                         <button class="btn btn-primary" name="login">LOGIN</button> 
                                         </form>
                                  
                              </div>
                                         </div>
                                     </div>
                                    
                                     </div>
                                      <div class="col-md-3 ">
                                      </div>
                                         </div>
                                         </div>
                                         </div>
                                         </div>
                                         </div>          
    
    <style>
.errror{
    color: red;
}
        
    </style>


   
  

</body>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>
       <script src="assets/js/modernizr-2.8.1.js"></script>
       <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/jquery.bootgrid.js"></script>
        <script src="assets/js/jquery.bootgrid.fa.js"></script> 
</html>