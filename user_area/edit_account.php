<?php
if (isset($_GET['edit_account'])) {
	$user_session_name=$_SESSION['username'];
	$select_query="select * from `user_table` where username='$user_session_name'";
	$result_query=mysqli_query($con,$select_query);
	$row_fetch=mysqli_fetch_assoc($result_query);
	$user_id=$row_fetch['user_id'];
	$username=$row_fetch['username'];
	$user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_adderss'];
	$user_mobile=$row_fetch['user_mobile'];
}
   
   if(isset($_POST['User_submit'])) {
      $update_id=$user_id;
      $username=$_POST['User_username'];
	  $user_email=$_POST['User_email'];
      $user_address=$_POST['User_address'];
      $user_mobile=$_POST['User_contact'];
      $user_image=$_FILES['User_image']['name'];
      $user_image_tmp=$_FILES['User_image']['tmp_name'];
      move_uploaded_file( $user_image_tmp,"./user_images/$user_image");

      //update query
      $update_data="update `user_table` set username='$username',user_email='$user_email',user_image='$user_image',user_adderss='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
         $result_query_update=mysqli_query($con,$update_data);
         if($result_query_update){
         	echo" <script>alert('data updated succesfully')</script>";
         	echo" <script>window.open('logout.php','_self')</script>";
         }
   }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>edit account</title>
</head>
<body>
<h3 class='text-success text-center mt-5 mb-3'>Edit Account</h3>
<form action="" method="post" enctype="multipart/form-data" class="text-center">
	<div class="form-outline mb-4 ">
 		<input type="text" name="User_username" class="form-control w-50 m-auto"
 		 value="<?php echo $username ;?>">
 	</div>
 	<div class="form-outline mb-4 ">
 		<input type="email" name="User_email"  class="form-control w-50 m-auto"
 		 value="<?php echo $user_email ;?>">
 	</div>
 	<div class="form-outline mb-4 w-50 m-auto d-flex ">
 		<input type="file" name="User_image"  class="form-control  m-auto">
 		  <img src="./user_images/<?php echo $user_image ?>" class="edit_imge">
 	</div>
 	<div class="form-outline mb-4 ">
 		<input type="text" name="User_address"  class="form-control w-50 m-auto"
 		 value="<?php echo $user_address ;?>">
 	</div>
 	<div class="form-outline mb-4 ">
 		<input type="text" name="User_contact"  class="form-control w-50 m-auto"
 		 value="<?php echo $user_mobile ;?>">
 	</div>
 	<input type="submit" name="User_submit" value="Update" class="bg-info border-0 p-2 mb-2  ">
</form>
</body>
</html>