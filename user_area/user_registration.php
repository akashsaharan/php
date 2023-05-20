<?php
include('../includes/connect1.php');
include('../function/common fuction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User_registration</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container-fluid">
  	<h1 class="text-center my-3">New User Registration</h1>
  	<div class="row d-flex align-items-center justify-content-center">
  		<div class="col-lg-12 col-xl-6">
  			<form action="" method="post" enctype="multipart/form-data">
  				<!-- ----------Username----------- -->
           <div class="form-outline mb-4">
 		        <label for="User_username" class="form-label" >Username</label>
 		        <input type="text" name="User_username" id="User_username" class="form-control"
 		        placeholder=" Enter your Username" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------email----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="User_email" class="form-label" >Email</label>
 		        <input type="email" name="User_email" id="User_email" class="form-control"
 		        placeholder=" Enter your Email" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------image----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="User_image" class="form-label" >User image</label>
 		        <input type="file" name="User_image" id="User_image" class="form-control"
 		         required="required">
 	        </div>
 	        <!-- ----------password----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="User_password" class="form-label" >password</label>
 		        <input type="password" name="User_password" id="User_password" class="form-control"
 		        placeholder=" Enter your password" autocomplete="off" required="required">
 	        </div>
 	        <!-- ---------- confirm password----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="Conf_User_password" class="form-label" >Confirm password</label>
 		        <input type="password" name="Conf_User_password" id="Conf_User_password" class="form-control"
 		        placeholder=" Confirm password" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------Adderss----------- -->
           <div class="form-outline mb-4">
 		        <label for="User_Adderss" class="form-label" >Adderss</label>
 		        <input type="text" name="User_Adderss" id="User_Adderss" class="form-control"
 		        placeholder=" Enter your Adderss" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------Contact----------- -->
           <div class="form-outline mb-4">
 		        <label for="User_Contact" class="form-label" >Contact</label>
 		        <input type="text" name="User_Contact" id="User_Contact" class="form-control"
 		        placeholder=" Enter your mobile number" autocomplete="off" required="required">
 	        </div>
 	        <div class="mt-4 pt-2">
 	        	<input type="submit" name="user_register" value="Register" class="bg-info border-0 p-2">
 	        	<p class="small fw-bold mt-2 pt-1">Already have an account ? <a href="user_login.php" class="text-danger"> Login</a></p>
 	        </div>
  				
  			</form>
  			
  		</div>
  	</div>
  	
  </div>
</body>
</html>
<!-- ---------php-------- -->
<?php
 if(isset($_POST['user_register'])){
 	$User_username=$_POST['User_username'];
 	$User_email=$_POST['User_email'];
 	$User_password=$_POST['User_password'];
 	$hash_password=password_hash($User_password,PASSWORD_DEFAULT);	
 	$Conf_User_password=$_POST['Conf_User_password'];
 	$User_Adderss=$_POST['User_Adderss'];
 	$User_Contact=$_POST['User_Contact'];
 	$User_image=$_FILES['User_image']['name'];
 	$User_image_tmp=$_FILES['User_image']['tmp_name'];
 	$user_ip=getIPAddress();
 
  $select_query="select * from `user_table` where username='$User_username'";
  $reslut=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($reslut);
  if($rows_count>0){
  	echo"<script>alert('username already exit ')</script>";
  }else if($User_password!=$Conf_User_password){
   echo"<script>alert('passwords do not match ')</script>";
  }
  else{
   move_uploaded_file($User_image_tmp,"./user_images/$User_image");
  $insert_query=" insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_adderss,user_mobile) values('$User_username','$User_email','$hash_password','$User_image','$user_ip','$User_Adderss','$User_Contact')";
  $sql_execute=mysqli_query($con,$insert_query);
  if( $sql_execute){
  	echo"<script>alert('data is succesfuly ')</script>";
  }
  else{
  	die(mysqli_error($con));
  }
  }
  $select_card_item="select * from `cart_details` where ip_address='$user_ip'";
  $reslut_cart=mysqli_query($con,$select_card_item);
  $rows_count=mysqli_num_rows($reslut_cart); 
  if($rows_count>0){
  	$_SESSION['username']=$User_username;
  	echo"<script>alert('you have item in your cart ')</script>";
  	echo"<script>window.open('checkout.php')</script>";
  }else{
  	echo"<script>window.open('../index.php')</script>";
  }
}
?>