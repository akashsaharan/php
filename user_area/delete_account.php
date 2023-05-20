
       <h3 class="text-danger my-4 text-center">Delete Account</h3>
       <form class="mt-5" action="" method="post">
       	   <div class="form-outline mb-4">
       	   	   <input type="submit" name="Delete_Account" value="Delete Account" class="form-control w-50 m-auto">
       	   </div>
       	    <div class="form-outline mb-4">
       	   	   <input type="submit" name="dont_Delete_Account" value="Don't Delete Account" class="form-control w-50 m-auto">
       	   </div>

       </form>
       <?php
         $username_session=$_SESSION['username'];
         if(isset($_POST['Delete_Account'])) {
         	$delete_query="delete from `user_table` where username='$username_session'";
         	$result=mysqli_query($con,$delete_query);
         	if($result){
         		session_destroy();
         		echo "<script>alert('Account Deleted Successfully')</script>";
         		echo "<script>window.open('../index.php','_self')</script>";
         	}
         }
         if(isset($_POST['dont_Delete_Account'])) {
         	echo "<script>window.open('profile.php','_self')</script>";
         }
       ?>
