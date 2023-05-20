<?php
 include('../includes/connect1.php');
 if(isset($_POST['insert_cat'])){
 	$category_title=$_POST['cat_title'];
 	// select data from database
 	$select_query=" Select * from `categories` where category_title='$category_title'";
 	$result_select= mysqli_query($con,$select_query);
 	$number=mysqli_num_rows($result_select);
 	if($number>0){
       echo "<script>alert('this category is present inside the database')</script>";
 	}else{
 	$insert_query=" insert into `categories` (category_title) values ('$category_title')";
 	$result= mysqli_query($con,$insert_query);
 	if ($result) {
 		echo "<script>alert('category has been inserted succesfully')</script>";
 	}
}
 }
?>
<form action="" method="post" class="mb-2">
	<div class="input-group w-90 mb-2">
		<span class="input-group-text bg-info" id="basaic-addon1"><i class=" fa-solid fa-receipt"></i></span>
	   <input type="text" name="cat_title" class="form-control" placeholder="insert categories" aria-label="username">
	</div>
	<div class="input-group w-10 mb-2 m-auto"> 
		<input type="submit" class="border-0 p-2 bg-info" name="insert_cat" value="insert categories">
	</div>   
</form>