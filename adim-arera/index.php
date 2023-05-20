<?php
include('../includes/connect1.php');
include('../function/common fuction.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>adim</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    	.adimg
    	{
    		width: 100%;
    		object-fit: contain;
    	}
      .e-img
      {
        width: 12%;
        object-fit: contain;
      }
    	.footer
    	{
    		
    		bottom: 0;
    	}
    </style>
</head>
<body>
	 <!-- ======= first child ======= -->
  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid p-2 ">
      <a class="navbar-brand text-white" href=""><i class="fa fa-shopping-cart" style="font-size:48px;color:black;"></i></a>
         <div class="d-flex ms-auto my-2 my-lg-0">
         
         <?php
              if (!isset($_SESSION['admin_name'])) {
                  echo " Welcome guest";
              }
              else{
                 echo "Welcome ".$_SESSION['admin_name']."";
              }
            ?>
         </div>
      </div>
   </div>    
 </nav>  
 <!-- ======= second child ======= -->
   <div class="container-fluid bg-light text-center p-3">
       <h4>Mange Details</h4>	
   </div>
  <!-- ======= third child ======= -->
 <div class="container-fluid bg-secondary">
 	<div class="row">
 	   <div class="col-md-1 py-2 ">
       <?php
                 $admin_name=$_SESSION['admin_name'];
                 $admin_image="select * from `admin_table` where admin_name='$admin_name'";
                 $admin_image=mysqli_query($con,$admin_image);
                 $row_image=mysqli_fetch_array($admin_image);
                 $admin_image=$row_image['admin_image'];
                
                 echo"<img src='admin_images/$admin_image' class='adimg'>";
            
             ?>
       <?php
              if (!isset($_SESSION['admin_name'])) {
                  echo " Admin name";
              }
              else{
                 echo "<p class='text-light'>".$_SESSION['admin_name']."</p>";
              }
            ?>
 	   	 
 	   </div> 
 	   <div class="col-md-11 px-5 py-2">
 	   	  <button><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-2">Insert Products</a> </button>
 	   	  <button><a href="index.php?View_Products" class="nav-link text-light bg-info my-1 p-2">View Products</a> </button>
 	   	  <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-2">Insert Categories</a> </button>
 	   	  <button><a href="index.php?View_Categories" class="nav-link text-light bg-info my-1 p-2">View Categories</a> </button>
 	   	  <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1 p-2">Insert Brand</a> </button>
 	   	  <button><a href="index.php?View_Brands" class="nav-link text-light bg-info my-1 p-2">View Brands</a> </button>
 	   	  <button><a href="index.php?All_orders" class="nav-link text-light bg-info my-1 p-2">All Orders</a> </button>
 	   	  <button><a href="index.php?All_Payments" class="nav-link text-light bg-info my-1 p-2">All Payments</a> </button>
 	   	  <button><a href="index.php?List_Users" class="nav-link text-light bg-info my-1 p-2">List Users</a> </button>
 	   	  <button><a href="logout.php" class="nav-link text-light bg-info my-1 p-2">Logout</a> </button>
 	   </div>
 		
 	</div>
 	
 </div>
  <!-- -----------forth child------------- -->
  <div class="container my-3">
  	<?php
       if(isset($_GET['insert_category'])) {
       	include('insert-categries.php');
       }
       if (isset($_GET['insert_brands'])) {
       	include('insert-brands.php');
       }
       if (isset($_GET['View_Products'])) {
        include('View_Products.php');
       }
       if (isset($_GET['edit_products'])) {
        include('edit_products.php');
       }
       if (isset($_GET['delete_products'])) {
        include('delete_products.php');
       }
       if (isset($_GET['View_Categories'])) {
        include('View_Categories.php');
       }
       if (isset($_GET['View_Brands'])) {
        include('View_Brands.php');
       }
        if (isset($_GET['edit_category'])) {
        include('edit_category.php');
       }
        if (isset($_GET['edit_brand'])) {
        include('edit_brand.php');
       }
       if (isset($_GET['delete_category'])) {
        include('delete_category.php');
       }
       if (isset($_GET['delete_brand'])) {
        include('delete_brand.php');
       }
       if (isset($_GET['All_orders'])) {
        include('All_orders.php');
       }
       if (isset($_GET['All_Payments'])) {
        include('All_Payments.php');
       }
       if (isset($_GET['List_Users'])) {
        include('List_Users.php');
       }
  	?>
  	
  </div>
  <!-- -----------last child------------- -->
  <div class="footer bg-info p-3 container-fluid">
  	<p class="text-center">Degsined by Akash -2022</p>
  </div>  
</body>
</html>