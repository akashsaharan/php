<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
	<thead class="bg-info text-center">
		<?php
         $get_orders="select * from `user_orders`";	
         $result=mysqli_query($con,$get_orders);
         $row_count=mysqli_num_rows($result);
         echo "<tr>
			<th>Sl no</th>
			<th>Due Amount</th>
			<th>Invoice Number</th>
			<th>Total Products</th>
			<th>Order Date</th>
			<th>Status</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody class='bg-secondary text-center text-light'>";
            
         if ($row_count==0) {
         	echo"<h2 class='text-center text-danger'> No orders yet</h2>";
         }else{
         	$number=0;
         	while ($row_data=mysqli_fetch_assoc($result)) {
         		$order_id=$row_data['order_id'];
         		$user_id=$row_data['user_id'];
         		$amount_due=$row_data['amount_due'];
         		$invoice_number	=$row_data['invoice_number'];
         		$total_product=$row_data['total_product'];
         		$order_date=$row_data['order_date'];
         		$order_status=$row_data['order_status'];
         		$number++;
         		echo"<tr>
			<td>$number</td>
			<td>$amount_due</td>
			<td>$invoice_number</td>
			<td>$total_product</td>
			<td>$order_date</td>
			<td>$order_status</td>
			<td><a href=''><i style='font-size:18px' class='fas text-light'>&#xf1f8;</i></a> </td>
		</tr>";
         	}
         }
		?>
		
		
	</tbody>
</table>	
