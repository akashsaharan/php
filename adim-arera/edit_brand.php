<?php
   if (isset($_GET['edit_brand'])) {
   	  $edit_brand=$_GET['edit_brand'];

   	  $get_edit_brand=" select * from `brands` where 	brands_id=$edit_brand";
   	  $result=mysqli_query($con,$get_edit_brand);
   	  $row=mysqli_fetch_assoc($result);
   	  $brands_title=$row['brands_tittle'];
   	  // echo $category_title;
   }

   if (isset($_POST['update_brands'])) {
   	  $brand_title=$_POST['brands_title'];

   	  $update_brands=" update `brands`  set brands_tittle='$brand_title 'where 	brands_id=$edit_brand";
   	  $result_brands=mysqli_query($con,$update_brands);
   	  if($result_brands){
   	  	echo "<script>alert('brands updated successfully')</script>";
        echo "<script>window.open('./index.php?View_Brands','_self')</script>";
   	  }
   	}
?>


<div class="container">
	<h2 class="text-center">Edit Brands</h2>
	<form action="" method="post" class="text-center">
		<div class="form-outline mb-4 m-auto w-50">
			 <label class="form-label" for="brands_title">brands title</label>
			 <input type="text" name="brands_title" id="brands_title" class="form-control" value="<?php echo $brands_title;?>">
		</div>
		<input type="submit" name="update_brands" value="Update brands" class="bg-info  border-0 p-3">
	</form>
</div>