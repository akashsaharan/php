<?php
include('../includes/connect1.php');
include('../function/common fuction.php');
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User_Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      body{
        overflow-x: hidden;
      }
    </style>
</head>
<body>
  <div class="container-fluid">
  	<h1 class="text-center my-3"> User Login</h1>
  	<div class="row d-flex align-items-center justify-content-center">
  		<div class="col-lg-12 col-xl-6">
  			<form action="" method="post" enctype="multipart/form-data">
  				<!-- ----------Username----------- -->
           <div class="form-outline mb-4">
 		        <label for="User_username" class="form-label" >Username</label>
 		        <input type="text" name="User_username" id="User_username" class="form-control"
 		        placeholder=" Enter your Username" autocomplete="off" required="required">
 	        </div>
 	        <!-- ----------password----------- -->
 	        <div class="form-outline mb-4 ">
 		        <label for="User_password" class="form-label" >password</label>
 		        <input type="password" name="User_password" id="User_password" class="form-control"
 		        placeholder=" Enter your password" autocomplete="off" required="required">
 	        </div>
 	        
 	        
 	        
 	        <div class="mt-4 pt-2">
 	        	<input type="submit" name="user_login" value="Login" class="bg-info border-0 p-2">
 	        	<p class="small fw-bold mt-2 pt-1 mb-5">Don't have an account ? <a href="user_registration.php" class="text-danger"> Register</a></p>
 	        </div>
  				
  			</form>
  			
  		</div>
  	</div>
  	
  </div>
</body>
</html>
<?php
  if(isset($_POST['user_login'])){
    $user_username=$_POST['User_username'];
     $user_password=$_POST['User_password'];

     $select_query="select * from `user_table` where username='$user_username'";
     $result=mysqli_query($con,$select_query);
     $rows_count=mysqli_num_rows($result);
     $row_data=mysqli_fetch_assoc ($result);
     $user_ip=getIPAddress();

      $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
       $select_cart=mysqli_query($con,$select_query_cart);
       $rows_count_cart=mysqli_num_rows($select_cart);
       if($rows_count>0){
        $_SESSION['username']=$user_username;
      if(password_verify($user_password,$row_data['user_password'])){
        if($rows_count==1 and $rows_count_cart==0){
          $_SESSION['username']=$user_username;
           echo"<script>alert('login sucessfull ')</script>";
            echo"<script>window.open('profile.php','_self')</script>";
        }else{
          $_SESSION['username']=$user_username;
          echo"<script>alert('login sucessfull ')</script>";
            echo"<script>window.open('payment.php','_self')</script>";
        }
      }else{
        echo"<script>alert('invalid credentails ')</script>";
     }

     }else{
        echo"<script>alert('invalid credentails ')</script>";
     }
  }
?>