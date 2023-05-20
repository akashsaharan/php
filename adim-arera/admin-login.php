<?php
include('../includes/connect1.php');
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin-login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
</head>
<body>
     <div class="container-fluid">
  	<h1 class="text-center my-5"> Admin Login</h1>
  	<div class="row">
  		  <div class="col-md-6 px-5">
  		  	  <img src="../images/mobile-login-concept-illustration_114360-83.webp" style=" width: 100%;">
  		  </div>
  		   <div class="col-md-6 p-5">
  		  	     <form action="" method="post" enctype="multipart/form-data">
  				<!-- ----------Username----------- -->
           <div class="form-outline mb-4 mt-4">
 		        <label for="admin_username" class="form-label" >Username</label>
 		        <input type="text" name="admin_username" id="admin_username" class="form-control"
 		        placeholder=" Enter your Adminname" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------password----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="admin_password" class="form-label" >password</label>
 		        <input type="password" name="admin_password" id="admin_password" class="form-control"
 		        placeholder=" Enter your password" autocomplete="off" required="required">
 	        </div>
 	        <div class="mt-4 pt-2">
 	        	<input type="submit" name="admin_login" value="Login" class="bg-info border-0 p-2">
 	        	<!-- <p class="small fw-bold mt-2 pt-1 mb-5">Don't have an account ? <a href="admin-regestration.php" class="text-danger"> Register</a></p> -->

 	        </div>
  				
  			</form>
  			
  		  </div>
  	</div>
</body>
</html>
<?php
  if(isset($_POST['admin_login'])){
    $admin_username=$_POST['admin_username'];
     $admin_password=$_POST['admin_password'];

     $select_query="select * from `admin_table` where admin_name='$admin_username'";
     $result=mysqli_query($con,$select_query);
     $rows_count=mysqli_num_rows($result);
     $row_data=mysqli_fetch_assoc ($result);
       if($rows_count>0){
        $_SESSION['admin_name']=$admin_username;
      if(password_verify($admin_password,$row_data['admin_password'])){
           echo"<script>alert('login sucessfull ')</script>";
            echo"<script>window.open('index.php','_self')</script>";
     }else{
        echo"<script>alert('invalid credentails ')</script>";
     }
  }}
?>