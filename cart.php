<?php
include('includes/connect1.php');
include('function/common fuction.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ecomerce website</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
	  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style >
       .footer
      {
         
         bottom: 0;
      }
      .cart-img
      {
         width: 80px;
         height: 80px;
         object-fit: contain;
      }
    </style>
</head>
<body>
   <!-- ======= first child ======= -->
  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid p-2 px-4">
      <a class="navbar-brand text-white" href=""><i class="fa fa-shopping-cart" style="font-size:48px;color:black;"></i></a>
      <button class="navbar-toggler text-uppercase font-weight-bold bg-white text-black rounded " type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarResponsive">
         <ul class="navbar-nav ">
           <li class="nav-item ">
             <a class="nav-link text-black" href="index.php">Home </a>
           </li>
           <li class="nav-item">
             <a class="nav-link " href="dispaly_all.php">Products</a>
           </li>
          <?php
                      if(isset($_SESSION['username'])) {
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                    </li>";
                      }else{
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                    </li>";
                      }
                    ?>
           <li class="nav-item">
             <a class="nav-link" href="#">Contact</a>
           </li>           
           <li class="nav-item">
             <a class="nav-link " href="cart.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i><sup><?php cart_item(); ?></sup></a>
           </li>
       </ul>
      </div>
   </div>    
 </nav>  
 <!-- calling cart function -->
 <?php
 cart();
 ?>
 <!-- ======= second child ======= -->
  <nav class="navbar navbar-expand-lg bg-secondary">
  	<ul class="navbar-nav ">
  	  <?php
             if (!isset($_SESSION['username'])) {
                  echo " <li class='nav-item'>
                <a class='nav-link text-white' href='#''>Welcome guest</a>
            </li>";
              }
              else{
                 echo " <li class='nav-item'>
                <a class='nav-link text-white' href='#''>Welcome ".$_SESSION['username']."</a>
            </li>";
              }
              if (!isset($_SESSION['username'])) {
                  echo " <li class='nav-item'>
                <a class='nav-link text-white' href='./user_area/user_login.php''>Login</a>
            </li>";
              }
              else{
                 echo " <li class='nav-item'>
                <a class='nav-link text-white' href='./user_area/logout.php''>Logout</a>
            </li>";
              }
            ?>
    </ul>       
  </nav>
  <!-- ======= third child ======= -->
  <div class="container-fluid bg-ligth">
  	<h3 class="text-center">Hiddin</h3>
  	<p class="text-center">commr adser asdghtsx </p>
  	
  </div>
  <!-- ======= third child ======= -->
  <div class="container">
     <div class="row">
        <form action="" method="post">
        <table class="table table-border text-center">
            <!-- php code -->
            <?php
           $ip = getIPAddress();
           $total_price=0;
           $cart_query="select * from `cart_details` where ip_address='$ip'";
           $result= mysqli_query($con,$cart_query);
           $result_count=mysqli_num_rows($result);
           if($result_count>0){
            echo"<thead>
               <tr>
                 <th>Product tittle</th>
                 <th>Product image</th>
                 <th>Quantity</th>
                 <th>Total price</th>
                 <th>Remove</th>
                 <th colspan='2'>Operations</th>
               </tr>
           </thead>
           <tbody>";
           while($row=mysqli_fetch_array($result)) {
           $product_id=$row['product_id'];
           $select_products="select * from `products` where product_id='$product_id'";
           $result_product= mysqli_query($con,$select_products);
           while($row_product_price=mysqli_fetch_array($result_product)) {
            $product_price=array($row_product_price['product_price']);
            $price_table=$row_product_price['product_price'];
            $product_title=$row_product_price['product_title'];
            $product_image1=$row_product_price['product_image1'];
            $product_values=array_sum($product_price);
            $total_price+= $product_values;
         
            ?>
              <tr>
                 <td> <?php echo $product_title ?></td>
                 <td><img src="./adim-arera/pro/<?php echo $product_image1?>" class="cart-img"> </td>
                 <td><input type="text" name="qtys" class="form-input w-50"> </td>
                 <?php
                  $ips = getIPAddress();
                   if(isset($_POST['update_cart'])){
                    $quantities=$_POST['qtys'];
                $updates_cart="update `cart_details` set quantity=$quantities  where ip_address='$ips'";
                    $result_products_quantity=mysqli_query($con,$updates_cart);
                    $total_price=$total_price*$quantities;
                   }
                 ?>
                 <td><?php echo $price_table ?>/-</td>
                 <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"> </td>
                 <td>
                    <input type="submit" name="update_cart" value="Update" class="bg-info px-3 border-0 py-2">
                     <input type="submit" name="remove_cart" value="Remove"class="bg-info px-3 border-0 py-2">
                 </td>
              </tr>
           <?php
                } 
            }
        }
         else{
            echo"<h2 class='text-center text-danger'> Cart is empty</h2>";
         }
           ?>   
           </tbody>
          
        </table>
       <!-- -----subtotal---- -->
    <div class="d-flex">
        <?php
          $ip = getIPAddress();
           $cart_query="select * from `cart_details` where ip_address='$ip'";
           $result= mysqli_query($con,$cart_query);
           $result_count=mysqli_num_rows($result);
           if($result_count>0){
           echo"<h4 class='px-3'>subtotal:<strong class='text-info'> $total_price/-</strong></h4>
            <input type='submit' name='Continue_shopping' value='Continue shopping'class='bg-info px-3 border-0 '>
          <button class='bg-secondary p-3 mx-2 border-0'><a href='./user_area/checkout.php''>Checkout</a></button>";
           }
           else{
             echo"<input type='submit' name='Continue_shopping' value='Continue shopping'class='bg-info px-3 border-0 '>";
           }
           if(isset($_POST['Continue_shopping'])){
            echo"<script>window.open('index.php','_self')</script>";
           }

        ?>
     </div> 
  </div>
  </div>
</form>
<!-- function to remove item -->
<?php 
  function remove_cart_item(){
  global  $con;
  if(isset($_POST['remove_cart'])){
  foreach ($_POST['removeitem'] as  $remove_id) {
      echo $remove_id;
      $delete_query="Delete from  `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if( $run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
  }
}
}

echo $remove_item=remove_cart_item();
 ?>
 
</body>
</html>