<?php
    // include('./includes/connect1.php');
    function getproduct()
    {
        if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){

               global  $con;
                $select_query="select * from `products` order by rand() LIMIT 0,3";
                $result_query= mysqli_query($con,$select_query);
                while($row_data=mysqli_fetch_assoc($result_query)) {
                  $product_title=$row_data['product_title'];
                  $Product_Description=$row_data['product_description'];
                  $image=$row_data['product_image1'];
                  $price=$row_data['product_price'];
                  $product_id=$row_data['product_id'];
                  echo " <div class='col-md-4 mb-5'>
               <div class='card ' >
                      <img class='card-img-top' src='./adim-arera/pro/$image' alt='$product_title' >
                      <div class='card-body '>
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text mb-4'>$Product_Description</p>
                         <p class='card-text'>Price:$price/-</p>
                         <a href='index.php?add_to_cart=$product_id'' class='btn btn-secondary'>Add to cart</a>
                         <a href='product_details.php?product_id=$product_id'class='btn btn-info'>view more</a>
                      </div>
                   </div>
        
            </div>";
        }
               
   }
}
}
   // getting uniqe caregories
   function get_uniqe_caregories()
    {
        if(isset($_GET['category'])){
        $category_id=$_GET['category'];

               global  $con;
                $select_query="select * from `products`  where category_id=$category_id";
                $result_query= mysqli_query($con,$select_query);
                $num_of_rows= mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
                }
                while($row_data=mysqli_fetch_assoc($result_query)) {
                  $product_title=$row_data['product_title'];
                  $Product_Description=$row_data['product_description'];
                  $image=$row_data['product_image1'];
                  $price=$row_data['product_price'];
                  $product_id=$row_data['product_id'];
                  echo " <div class='col-md-4 mb-5'>
               <div class='card ' >
                      <img class='card-img-top' src='./adim-arera/pro/$image' alt='$product_title' >
                      <div class='card-body '>
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text mb-4'>$Product_Description</p>
                         <p class='card-text'>Price:$price/-</p>
                         <a href='index.php?add_to_cart=$product_id'' class='btn btn-secondary'>Add to cart</a>
                         <a href='product_details.php?product_id=$product_id'class='btn btn-info'>view more</a>
                      </div>
                   </div>
       
            </div>";
        }
               
   }
}
// getting uniqe brands
   function get_uniqe_brands()
    {
        if(isset($_GET['brands'])){
        $brands_id=$_GET['brands'];

               global  $con;
                $select_query="select * from `products`  where brand_id=$brands_id";
                $result_query= mysqli_query($con,$select_query);
                $num_of_rows= mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>This brand is not avilable for services</h2>";
                }
                while($row_data=mysqli_fetch_assoc($result_query)) {
                  $product_title=$row_data['product_title'];
                  $Product_Description=$row_data['product_description'];
                  $image=$row_data['product_image1'];
                  $price=$row_data['product_price'];
                  $product_id=$row_data['product_id'];
                  echo " <div class='col-md-4 mb-5'>
               <div class='card ' >
                      <img class='card-img-top' src='./adim-arera/pro/$image' alt='$product_title' >
                      <div class='card-body '>
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text mb-4'>$Product_Description</p>
                         <p class='card-text'>Price:$price/-</p>
                         <a href='index.php?add_to_cart=$product_id'' class='btn btn-secondary'>Add to cart</a>
                         <a href='product_details.php?product_id=$product_id'class='btn btn-info'>view more</a>
                      </div>
                   </div>
       
            </div> ";
        }
               
   }
}

   function getbrands()
   {
    global  $con;
   $select_brands="select * from `brands`";
                $result_brands= mysqli_query($con,$select_brands);
                while($row_data=mysqli_fetch_assoc($result_brands)) {
                    $brands_title=$row_data['brands_tittle'];
                    $brands_id=$row_data['brands_id'];
                    echo " <li class='nav-item'>
                   <a class='nav-link text-white '' href='index.php?brands=$brands_id''>$brands_title</a>
                </li>";
                }
            }
 function getcategroies()
   {
    global  $con;
     $select_categories="select * from `categories`";
                $result_category= mysqli_query($con,$select_categories);
                while($row_data=mysqli_fetch_assoc($result_category)) {
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo " <li class='nav-item'>
                   <a class='nav-link text-white '' href='index.php?category=$category_id''>$category_title</a>
                </li>";
                }
  }
   function search_data()
    {
               global  $con;
               if(isset($_GET['search_data_product'])){
                $search_data_product=$_GET['search_data'];
                $search_query="select * from `products` where product_keywords like '%$search_data_product%'";
                $result_query= mysqli_query($con,$search_query);
                $num_of_rows= mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No result match. No product found on this category</h2>";
                }
                while($row_data=mysqli_fetch_assoc($result_query)) {
                  $product_title=$row_data['product_title'];
                  $Product_Description=$row_data['product_description'];
                  $image=$row_data['product_image1'];
                  $price=$row_data['product_price'];
                  $product_id=$row_data['product_id'];
                  echo " <div class='col-md-4 mb-5'>
               <div class='card ' >
                      <img class='card-img-top' src='./adim-arera/pro/$image' alt='$product_title' >
                      <div class='card-body '>
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text mb-4'>$Product_Description</p>
                         <p class='card-text'>Price:$price/-</p>
                         <a href='index.php?add_to_cart=$product_id'' class='btn btn-secondary'>Add to cart</a>
                         <a href='product_details.php?product_id=$product_id'class='btn btn-info'>view more</a>
                      </div>
                   </div>
        
            </div>";
        }
               
   }
}
// getting all protuct
 function get_all_products()
    {
        if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){

               global  $con;
                $select_query="select * from `products` order by rand() ";
                $result_query= mysqli_query($con,$select_query);
                while($row_data=mysqli_fetch_assoc($result_query)) {
                  $product_title=$row_data['product_title'];
                  $Product_Description=$row_data['product_description'];
                  $image=$row_data['product_image1'];
                  $price=$row_data['product_price'];
                  $product_id=$row_data['product_id'];
                  echo " <div class='col-md-4 mb-5'>
               <div class='card ' >
                      <img class='card-img-top' src='./adim-arera/pro/$image' alt='$product_title' >
                      <div class='card-body '>
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text mb-4'>$Product_Description</p>
                         <p class='card-text'>Price:$price/-</p>
                         <a href='index.php?add_to_cart=$product_id'' class='btn btn-secondary'>Add to cart</a>
                         <a href='product_details.php?product_id=$product_id'class='btn btn-info'>view more</a>
                      </div>
                   </div>
       
            </div> ";
        }
               
   }
}
}
// veiw detail functin
function veiw_detail()
    {
         if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){
            $product_id=$_GET['product_id'];
                global  $con;
                $select_query="select * from `products` where product_id=$product_id";
                $result_query= mysqli_query($con,$select_query);
                while($row_data=mysqli_fetch_assoc($result_query)) {
                 $product_id=$row_data['product_id'];
                  $product_title=$row_data['product_title'];
                  $Product_Description=$row_data['product_description'];
                  $image=$row_data['product_image1'];
                  $image2=$row_data['product_image2'];
                  $image3=$row_data['product_image3'];
                  $price=$row_data['product_price'];
                  $product_id=$row_data['product_id'];
                  echo " <div class='col-md-4 mb-5'>
               <div class='card ' >
                      <img class='card-img-top' src='./adim-arera/pro/$image' alt='$product_title' >
                      <div class='card-body '>
                         <h5 class='card-title'>$product_title</h5>
                         <p class='card-text mb-4'>$Product_Description</p>
                         <p class='card-text'>Price:$price/-</p>
                         <a href='index.php?add_to_cart=$product_id'' class='btn btn-secondary'>Add to cart</a>
                         <a href='index.php'class='btn btn-info'>Go home</a>
                      </div>
                   </div>
        
            </div>
            <div class='col-md-8'>
                 <div class='row'>
                   <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'> Related images</h4>
                     
                   </div>
                   <div class='col-md-6'>
                     <img class='card-img-top' src='./adim-arera/pro/$image2' alt='$product_title' >
                   </div>
                   <div class='col-md-6'>
                     <img class='card-img-top' src='./adim-arera/pro/$image3' alt='$product_title' >
                   </div>
                 </div>
            
             </div>    ";
        }
               
   }
}
}
}
// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;

// cart function  
function cart()
    {
        if(isset($_GET['add_to_cart'])){
               global  $con;
               $ip = getIPAddress();
               $get_product_id=$_GET['add_to_cart'];
                $select_query="select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
                $result_query= mysqli_query($con,$select_query);
                $num_of_rows= mysqli_num_rows($result_query);
                if($num_of_rows>0){
                    echo "<script>alert('This item is already present in cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }else{
                    $insert_query=" insert into `cart_details`(product_id,ip_address,quantity) values ($get_product_id,'$ip',0 )";
                    $result_query= mysqli_query($con,$insert_query);
                    echo "<script>alert('item is added to cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";

                }
        }
    }            
    // cart-item function  
function cart_item()
    {
        if(isset($_GET['add_to_cart'])){
               global  $con;
                $ip = getIPAddress();
                $select_query="select * from `cart_details` where ip_address='$ip'";
                $result_query= mysqli_query($con,$select_query);
                $num_of_rows= mysqli_num_rows($result_query);
                }else{
                 global  $con;
                $ip = getIPAddress();
                $select_query="select * from `cart_details` where ip_address='$ip'";
                $result_query= mysqli_query($con,$select_query);
                $num_of_rows= mysqli_num_rows($result_query);   
                }
                echo $num_of_rows;
        }
    // total price function
    function total_cart_price(){
           global  $con;
           $ip = getIPAddress();
           $total_price=0;
           $cart_query="select * from `cart_details` where ip_address='$ip'";
           $result= mysqli_query($con,$cart_query);
           while($row=mysqli_fetch_array($result)) {
           $product_id=$row['product_id'];
           $select_products="select * from `products` where product_id='$product_id'";
           $result_product= mysqli_query($con,$select_products);
           while($row_product_price=mysqli_fetch_array($result_product)) {
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price+= $product_values;
           } 
        }
        
        echo $total_price; 
    }

    //get user order details
     function get_user_order_details(){
          global  $con;
          $username=$_SESSION['username'];
          $get_detail="select * from `user_table` where username='$username'";
          $result_query= mysqli_query($con,$get_detail);
          while($row_query=mysqli_fetch_array($result_query)) {
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                 if(!isset($_GET['my_orders'])){
                     if(!isset($_GET['delete_account'])){
                        $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                        $result_orders_query= mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows( $result_orders_query);
                        if($row_count>0){
                            echo"<h3 class='text-success text-center mt-5 mb-3'>You have <span class='text-danger'>$row_count</span>pending orders</h3>
                            <p class='text-center'><a href='profile.php?my_orders'>
                            Orders details</p>";
                        }else{
                             echo"<h3 class='text-success text-center mt-5 mb-3'>You have <span class='text-danger'>Zero</span> pending orders</h3>
                            <p class='text-center'><a href='../index.php?my_orders'>
                           Explore products</p>";
                        }
                    }
                
                }    
            }
     }
}

                
?>
