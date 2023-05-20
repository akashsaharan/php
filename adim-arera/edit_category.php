<?php
   if (isset($_GET['edit_category'])) {
   	  $edit_category=$_GET['edit_category'];

   	  $get_category=" select * from `categories` where category_id=$edit_category";
   	  $result=mysqli_query($con,$get_category);
   	  $row=mysqli_fetch_assoc($result);
   	  $category_title=$row['category_title'];
   	  // echo $category_title;
   }

   if (isset($_POST['update_category'])) {
   	  $cat_title=$_POST['Category_title'];

   	  $update_category=" update `categories`  set category_title='$cat_title 'where category_id=$edit_category";
   	  $result_cat=mysqli_query($con,$update_category);
   	  if($result_cat){
   	  	echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('./index.php?View_Categories','_self')</script>";
   	  }
   	}
?>


<div class="container">
	<h2 class="text-center">Edit Category</h2>
	<form action="" method="post" class="text-center">
		<div class="form-outline mb-4 m-auto w-50">
			 <label class="form-label" for="Category_title">Category title</label>
			 <input type="text" name="Category_title" id="Category_title" class="form-control" value="<?php echo $category_title;?>">
		</div>
		<input type="submit" name="update_category" value="Update Category" class="bg-info  border-0 p-3">
	</form>
</div>