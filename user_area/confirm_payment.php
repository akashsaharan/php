<?php
include('../includes/connect1.php');
session_start();
if (isset($_GET['order_id'])) {
	$order_id=$_GET['order_id'];
	$select_data="select * from  `user_orders` where order_id=$order_id";
	$result=mysqli_query($con,$select_data);
	$row_fetch=mysqli_fetch_assoc($result);
	$invoice_number=$row_fetch['invoice_number'];
	$amount_due=$row_fetch['amount_due'];
}
if (isset($_POST['confirm_payment'])) {
	$invoice_number=$_POST['invioce_number'];
	$amount=$_POST['amount'];
	$payment_option=$_POST['payment_option'];
	$insert_data="insert into  `user_paymenys` (order_id,invoice_number,amount,payment_mode) values($order_id,$invoice_number,$amount,'$payment_option')";
	$result=mysqli_query($con,$insert_data);
	if($result){
			echo"<script>alert('payment_successfull')</script>";
			echo"<script>window.open('profile.php?my_orders','_self')</script>";
	}
	$update_orders="update `user_orders`set order_status='complete' where order_id=$order_id";
	$result_orders=mysqli_query($con,$update_orders);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>confirm payment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
</head>
<body class="bg-secondary">
	<div class="container ">
		<h1 class="text-center my-5 text-light">Confirm Payment </h1>
		<form action="" method="post">
    <div class="form-outline my-4 text-center w-50 m-auto">
    	<input type="text" class="form-control w-50 m-auto" name="invioce_number" value=" <?php echo $invoice_number ?>">
    </div> 
     <div class="form-outline mt-4 text-center w-50 m-auto">
     	<label class="text-light">amount</label>
    	<input type="text" class="form-control w-50 m-auto" name="amount"value=" <?php echo $amount_due ?>">
    </div>
     <div class="form-outline my-4 text-center w-50 m-auto">
     	<select name="payment_option" class="form-select w-50 m-auto">
     		<option>Selct Payment Mode</option>
     		<option>UPI</option>
     		<option>Netbanking</option>
     		<option>Paypal</option>
     		<option>Cash on Delivery</option>
     	</select>
    </div> 
     <div class="form-outline mt-4 text-center w-50 m-auto">
    	<input type="submit" class="bg-info py-2 px-3 mt-5 border-0" name="confirm_payment" value="confirm">
    </div>
  	
  </form>
	</div>
</body>
</html>