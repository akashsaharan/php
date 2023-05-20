<?php
include('../includes/connect1.php');
include('../function/common fuction.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>payment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    	img
    	{
    		width: 90%;
    		margin: auto;
    		display: block;
    	}
    	body{
        overflow-x: hidden;
      }
    </style>
</head>
<body>
	<?php
    $user_ip=getIPAddress();
    $get_user="select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];

	?>
  <div class="container">
     <h2 class="text-center text-info mt-4 mb-4">Payment Option</h2>
     <div class="row d-flex justify-content-center align-items-center my-3">
     	<div class="col-md-6">
     		<a href="https://www.paypal.com"><img src="../images/UPI.webp"> </a>
     	</div>
     	<div class="col-md-6"> 
     		<a href="order.php?user_id=<?php echo $user_id;?>"><h2 class="text-center"> Pay Offline</h2></a>
     	</div>
     	
     </div> 	
  </div>	
</body>
</html>