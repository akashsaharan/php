<?php
include('../includes/connect1.php');
if(isset($_POST['Insert_Products'])){

        $product_tile = $_POST['product_title'];
        $description = $_POST['Description'];
        $product_keywords = $_POST['product_Keywords'];
        $product_category = $_POST['product_categories'];
        $product_brands = $_POST['product_Brands'];
        $product_price = $_POST['product_Price'];
        $product_status = 'true';


        // accessing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // accessing image tmp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        // checking empty condition
        if($product_tile == '' or $description== '' or $product_keywords== '' or $product_category== '' or $product_brands== '' or $product_price== '' or $product_image1== '' or $product_image2== '' or $product_image3== '')
        {
            echo "<script>alert('Please fill all the available fields.')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./pro/$product_image1");
            move_uploaded_file($temp_image2,"./pro/$product_image2");
            move_uploaded_file($temp_image3,"./pro/$product_image3");

            // insert query
            $insert_products = "insert into `products` (product_title, Product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) values ('$product_tile', '$description', '$product_keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price',NOW(), '$product_status')";
            $result_query = mysqli_query($con, $insert_products);
            if($result_query)
            {
                echo "<script>alert('Successfully inserted the products.')</script>";
            } 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>insert product</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light mt-5 ">
 <h1 class="text-center">Insert Products</h1>
 <!-- -------------form------------ -->
 <form action="" method="post" enctype="multipart/form-data">
 	<!-- ----------title----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_title" class="form-label" >Product title</label>
 		<input type="text" name="product_title" id="product_title" class="form-control"
 		placeholder="Enter Product title" autocomplete="off" required="required">
 	</div>
 	<!-- ----------Description----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="Description" class="form-label" >Product Description</label>
 		<input type="text" name="Description" id="Description" class="form-control"
 		placeholder="Enter Product Description" autocomplete="off" required="required">
 	</div>
 	<!-- ----------Keywords----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_Keywords" class="form-label" >Product Keywords</label>
 		<input type="text" name="product_Keywords" id="product_Keywords" class="form-control"
 		placeholder="Enter Product Keywords" autocomplete="off" required="required">
 	</div>
 	<!-- ----------categories----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<select name="product_categories" id="" class="form-select">
 			<option value="">select a categories</option>
 			<?php
                $select_categories="select * from `categories`";
                $result_category= mysqli_query($con,$select_categories);
                while($row_data=mysqli_fetch_assoc($result_category)) {
                	$category_title=$row_data['category_title'];
                	$category_id=$row_data['category_id'];
                	echo"<option value='$category_id'>$category_title </option>";
                }
                ?>
 			
 			
 		</select>
 	</div>
 	<!-- ----------Brands----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<select name="product_Brands" id="" class="form-select">
 			<option value="">select a Brands</option>
 			<?php
                $select_brands="select * from `brands`";
                $result_brands= mysqli_query($con,$select_brands);
                while($row_data=mysqli_fetch_assoc($result_brands)) {
                	$brands_title=$row_data['brands_tittle'];
                	$brands_id=$row_data['brands_id'];
                	echo "<option value='$brands_id'> $brands_title</option> ";
                }
                ?>
 			
 		</select>
 	</div>
 	<!-- ----------image1----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_image1" class="form-label" >Product image1</label>
 		<input type="file" name="product_image1" id="product_image1" class="form-control"
 		 autocomplete="off" required="required">
 	</div>
 	<!-- ----------image2----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_image2" class="form-label" >Product image2</label>
 		<input type="file" name="product_image2" id="product_image2" class="form-control"
 		 autocomplete="off" required="required">
 	</div>
 	<!-- ----------image3----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_image3" class="form-label" >Product image3</label>
 		<input type="file" name="product_image3" id="product_image3" class="form-control"
 		 autocomplete="off" required="required">
 	</div>
 	<!-- ----------Price----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
 		<label for="product_Price" class="form-label" >Product Price</label>
 		<input type="text" name="product_Price" id="product_Price" class="form-control"
 		placeholder="Enter Product Price" autocomplete="off" required="required">
 	</div>
 	<!-- ----------submit----------- -->
 	<div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" class="border-0 p-2 bg-info" name="Insert_Products" value="Insert Products">
    </div>
 </form>
</body>
</html>	

