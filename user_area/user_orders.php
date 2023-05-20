<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user orders</title>
</head>
<body>
	<?php
       $username=$_SESSION['username'];
       $get_user="select * from `user_table` where username='$username'";
       $reslut=mysqli_query($con,$get_user);
       $row_fetch=mysqli_fetch_assoc($reslut);
       $user_id=$row_fetch['user_id'];
	?>
  <h3 class="text-center text-success mt-5 mb-2">All My Orders</h3>
  <table class="table table-bordered mt-5 text-center">
  	<thead class="bg-info">
  	<tr>
  		<th>Sl no</th>
  		<th>Amount due </th>
        <th>Total products</th>
        <th>Invioce number</th>
        <th>Date</th>
        <th>complete/incomplete</th>
        <th>Status</th>
  	</tr>
  	</thead>
  	<tbody class="bg-secondary text-light">
  		<?php
       $get_orders_details="select * from `user_orders` where user_id='$user_id'";
       $reslut_orders=mysqli_query($con,$get_orders_details);
       $number=1;
       while ($row_orders=mysqli_fetch_assoc($reslut_orders)) {
       	 $order_id=$row_orders['order_id'];
       	 $amount_due=$row_orders['amount_due'];
       	 $total_product=$row_orders['total_product'];
       	 $invoice_number=$row_orders['invoice_number'];
       	 $order_date=$row_orders['order_date'];
       	 $order_status=$row_orders['order_status'];
       	 if ($order_status=='pending') {
       	 	$order_status='incomplete';
       	 }else{
       	 	$order_status='complete';
       	 }
       	 echo "<tr>
  			<td>$number</td>
  			<td>$amount_due</td>
  			<td>$total_product</td>
  			<td> $invoice_number</td>
  			<td>$order_date</td>
  			<td>$order_status</td>";
        ?>
        <?php 
        if($order_status=='complete')
        {
          echo"<td>paid</td>";
        }else{
          echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
      </tr>";
        }
  		$number++;
       }

  		?>
  	</tbody>
  </table>
</body>
</html>