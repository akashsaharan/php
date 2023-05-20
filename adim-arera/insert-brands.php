<?php
include('../includes/connect1.php');
 if(isset($_POST['insert_b'])){
 	$brand_title=$_POST['b_title'];
 	// select data from database
 	$select_query=" Select * from `brands` where brands_tittle='$brand_title'";
 	$result_select= mysqli_query($con,$select_query);
 	$number=mysqli_num_rows($result_select);
 	if($number>0){
       echo "<script>alert('this brand is present inside the database')</script>";
 	}else{
 	$insert_query=" insert into `brands` (brands_tittle) values ('$brand_title')";
 	$result= mysqli_query($con,$insert_query);
 	if ($result) {
 		echo "<script>alert('brand has been inserted succesfully')</script>";
 	}
}
 }
?>
<form action="	" method="post" class="mb-2">
	<div class="input-group w-90 mb-2">
		<span class="input-group-text bg-info" id="basaic-addon1"><i class=" fa-solid fa-receipt"></i></span>
	   <input type="text" name="b_title"b class="form-control" placeholder="insert brands" aria-label="username">
	</div>
	<div class="input-group w-10 mb-2 m-auto"> 
		<input type="submit" class=" bg-info my-3 p-2 border-0" name="insert_b" value="insert brands">
	</div>   
</form>