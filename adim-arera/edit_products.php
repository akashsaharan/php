<?php
 if (isset($_GET['edit_products'])) {
 	$edit_id=$_GET['edit_products'];
 	$get_data="select * from `products` where product_id=$edit_id";
 	$result=mysqli_query($con,$get_data);
 	$row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description']; 
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

      //fetching cartegory name
      $select_category=" select * from `categories` where category_id=$category_id";
      $result_category=mysqli_query($con,$select_category);
      $row_category=mysqli_fetch_assoc($result_category);
      $category_title=$row_category['category_title'];
      
      //fetching brands name
      $select_brands=" select * from `brands` where brands_id=$brand_id";
      $result_brands=mysqli_query($con,$select_brands);
      $row_brands=mysqli_fetch_assoc($result_brands);
      $brands_title=$row_brands['brands_tittle'];
      
  }

?>
<div class="container">
	<h1 class="text-center my-4"> Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
    	<div class="form-outline mb-4 w-50 m-auto">
 		   <label for="product_title" class="form-label" >Product title</label>
 		   <input type="text" name="product_title" id="product_title" class="form-control"
 		    value="<?php echo $product_title?>"required="required">
 	   </div>
 	   <div class="form-outline mb-4 w-50 m-auto">
 		<label for="Description" class="form-label" >Product Description</label>
 		<input type="text" name="Description" id="Description" class="form-control"
 		 value="<?php echo $product_description?>"required="required">
 	</div>
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_Keywords" class="form-label" >Product Keywords</label>
 		<input type="text" name="product_Keywords" id="product_Keywords" class="form-control"
 		  value="<?php echo $product_keywords?>"required="required">
 	</div>
 	<div class="form-outline mb-4 w-50 m-auto">
 		<select name="product_categories" id="" class="form-select"required="required">
 			<option value="<?php echo $category_title?>"><?php echo $category_title?></option>
 			<?php
       $select_category_all=" select * from `categories`";
      $result_category_all=mysqli_query($con,$select_category_all);
      while($row_category_all=mysqli_fetch_assoc($result_category_all)){
      $category_title=$row_category_all['category_title'];
      $category_id=$row_category_all['category_id'];
          echo"<option value='$category_id'>$category_title</option>";
 			};?>	
 		</select>
 	</div>
 	<div class="form-outline mb-4 w-50 m-auto">
 		<select name="product_brand" id="" class="form-select"required="required">
 			<option value="<?php echo $brands_title?>"><?php echo $brands_title?></option>
 			<?php
      $select_brands_all=" select * from `brands`";
      $result_brands_all=mysqli_query($con,$select_brands_all);
      while($row_brands_all=mysqli_fetch_assoc($result_brands_all)){
      $brands_title=$row_brands_all['brands_tittle'];
       $brands_id=$row_brands_all['brands_id'];
        echo"<option value='$brands_id'>$brands_title</option>";
         };
          ?>
 			
 			
 		</select>
 	</div>
 	<!-- ----------image1----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_image1" class="form-label" >Product image1</label>
 		<div class="d-flex">
 		<input type="file" name="product_image1" id="product_image1" class="form-control"
 		 autocomplete="off" required="required">
 		 <img src="./pro/<?php echo $product_image1?>" class="e-img">
 		</div>
 	</div>
 	<!-- ----------image2----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_image2" class="form-label" >Product image2</label>
 		<div class="d-flex">
 		<input type="file" name="product_image2" id="product_image2" class="form-control "
 		  required="required">
 		 <img src="./pro/<?php echo $product_image2?>" class="e-img">
 		</div>
 	</div>
 	<!-- ----------image3----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_image3" class="form-label" >Product image3</label>
 		<div class="d-flex">
 		<input type="file" name="product_image3" id="product_image3" class="form-control "
 		 autocomplete="off" required="required">
 		 <img src="./pro/<?php echo $product_image3?>" class="e-img">
 		</div>
 	</div>
 	<!-- ----------Price----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_Price" class="form-label" >Product Price</label>
 		<input type="text" name="product_Price" id="product_Price" class="form-control"
 		value="<?php echo $product_price?>"required="required" >
 	</div>
     <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" class="border-0 p-2 bg-info" name="update_Products" value="Update Products">
    </div>
    </form>
</div>
<?php
 if (isset($_POST['update_Products'])) {
 	$product_title=$_POST['product_title'];
 	$Description=$_POST['Description'];
 	$product_Keywords=$_POST['product_Keywords'];
 	$product_categories=$_POST['product_categories'];
 	$product_brand=$_POST['product_brand'];
 	$product_Price=$_POST['product_Price'];

 	$product_image1=$_FILES['product_image1']['name'];
 	$product_image2=$_FILES['product_image2']['name'];
 	$product_image3=$_FILES['product_image3']['name'];

 	$tmp_image1=$_FILES['product_image1']['tmp_name'];
 	$tmp_image2=$_FILES['product_image2']['tmp_name'];
 	$tmp_image3=$_FILES['product_image3']['tmp_name'];

 	move_uploaded_file($tmp_image1,"./pro/$product_image1");
 	move_uploaded_file($tmp_image2,"./pro/$product_image2");
   move_uploaded_file($tmp_image3,"./pro/$product_image3");

   //query to update products
   $update_product="update `products` set product_title='$product_title',product_description='$Description',product_keywords='$product_Keywords',category_id='$product_categories',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_Price',date=NOW() where product_id=$edit_id";
       $result_update=mysqli_query($con,$update_product);
       if ( $result_update) {
       	  echo"<script>alert('updated successfully')</script>";
       	   echo"<script>window.open('./insert_product.php','_self')</script>";
       }
 }
?>