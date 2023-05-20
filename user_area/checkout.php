<?php
include('../includes/connect1.php');
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
    <style>
    .footer {

        bottom: 0;
    }
    </style>
</head>

<body>
    <!-- ======= first child ======= -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid p-2 px-4">
            <a class="navbar-brand text-white" href=""><i class="fa fa-shopping-cart"
                    style="font-size:48px;color:black;"></i></a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-white text-black rounded " type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarResponsive">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link text-black" href="../index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../dispaly_all.php">Products</a>
                    </li>
                   <?php
                      if(isset($_SESSION['username'])) {
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='profile.php'>My Account</a>
                    </li>";
                      }else{
                        echo"<li class='nav-item'>
                        <a class='nav-link' href='user_registration.php'>Register</a>
                    </li>";
                      }
                    ?>o
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
            

              </ul>
                <form class="d-flex ms-auto my-2 my-lg-0" action="search_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                        name="search_data">
                    <!-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
                    <input type="submit" name="search_data_product" value="Search" class="btn btn-outline-light">
                </form>
            </div>
        </div>
    </nav>
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
                <a class='nav-link text-white' href='./user_login.php''>Login</a>
            </li>";
              }
              else{
                 echo " <li class='nav-item'>
                <a class='nav-link text-white' href='logout.php''>Logout</a>
            </li>";
              }
            ?>
        </ul>
    </nav>
     <!-- ======= second child ======= -->
    <div class="container-fluid bg-ligth">
        <h3 class="text-center">Hiddin</h3>
        <p class="text-center">commr adser asdghtsx </p>

    </div>
    <!-- ======= third child ======= -->
    <div class="row px-1">
        <div class="col-md-12">
            <div class="row"> 
                 <?php
                   if (!isset($_SESSION['username'])) {
                       include('user_login.php');
                   }
                   else {
                       include('payment.php');
                   }
                 ?>
            </div>
            
        </div>
        
    </div>
    <!-- -----------last child------------- -->
    <div class="container-fluid bg-info p-3 footer">
        <p class="text-center">Degsined by Akash -2022</p>
    </div>
</body>

</html>