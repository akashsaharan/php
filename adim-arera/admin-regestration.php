<?php
include('../includes/connect1.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin-Registration</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
  	 <h1 class="text-center my-5">Admin Registration</h1>
  	 <div class="row">
  	 	<div class="col-md-6 p-5">
  	 		<img src="../images/istockphoto-1013435204-612x612.jpg" style=" width:90%;">
  	 	</div>
  	 	<div class="col-md-6 p-3">
  	 		 <form action="" method="post" enctype="multipart/form-data">
  				<!-- ----------Username----------- -->
           <div class="form-outline mb-4">
 		        <label for="admin_username" class="form-label" >Username</label>
 		        <input type="text" name="admin_username" id="admin_username" class="form-control"
 		        placeholder=" Enter your Username" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------email----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="admin_email" class="form-label" >Email</label>
 		        <input type="email" name="admin_email" id="admin_email" class="form-control"
 		        placeholder=" Enter your Email" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------image----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="admin_image" class="form-label" >User image</label>
 		        <input type="file" name="admin_image" id="admin_image" class="form-control"
 		         required="required">
 	        </div>
 	        <!-- ----------password----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="admin_password" class="form-label" >password</label>
 		        <input type="password" name="admin_password" id="admin_password" class="form-control"
 		        placeholder=" Enter your password" autocomplete="off" required="required">
 	        </div>
 	        <!-- ---------- confirm password----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="Conf_amin_password" class="form-label" >Confirm password</label>
 		        <input type="password" name="Conf_admin_password" id="Conf_amin_password" class="form-control"
 		        placeholder=" Confirm password" autocomplete="off" required="required">
 	        </div>
 	         <div class="mt-4 pt-2">
 	        	<input type="submit" name="admin_register" value="Register" class="bg-info border-0 p-2">
 	        	<p class="small fw-bold mt-2 pt-1">Already have an account ? <a href="admin-login.php" class="text-danger"> Login</a></p>
 	        </div>
  	 	</div>
  	 </div>
  </div>
</body>
</html>
<?php
 if(isset($_POST['admin_register'])){
 	$admin_username=$_POST['admin_username'];
 	$admin_email=$_POST['admin_email'];
 	$admin_password=$_POST['admin_password'];
 	$hash_password=password_hash($admin_password,PASSWORD_DEFAULT);	
 	$Conf_admin_password=$_POST['Conf_admin_password'];
 	$admin_image=$_FILES['admin_image']['name'];
 	$admin_image_tmp=$_FILES['admin_image']['tmp_name'];
 	
  $select_query="select * from `admin_table` where admin_name='$admin_username'";
  $reslut=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($reslut);
  if($rows_count>0){
  	echo"<script>alert('username already exit ')</script>";
  }else if($admin_password!=$Conf_admin_password){
   echo"<script>alert('passwords do not match ')</script>";
  }
  else{
   move_uploaded_file($admin_image_tmp,"./admin_images/$admin_image");
  $insert_query=" insert into `admin_table` (admin_name,admin_email,admin_password,admin_image) values('$admin_username','$admin_email','$hash_password','$admin_image')";
  $sql_execute=mysqli_query($con,$insert_query);
  if( $sql_execute){
  	echo"<script>alert('Register is succesfuly ')</script>";
  }
  else{
  	die(mysqli_error($con));
  }
  }}
?>