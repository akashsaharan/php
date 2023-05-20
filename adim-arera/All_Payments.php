<h3 class="text-center text-success">All Payment</h3>
<table class="table table-bordered mt-5">
	<thead class="bg-info text-center">
		<?php
         $get_payment="select * from `user_paymenys`";	
         $result=mysqli_query($con,$get_payment);
         $row_count=mysqli_num_rows($result);
         echo "<tr>
			<th>Sl no</th>
			<th>Invoice Number</th>
			<th> Amount</th>
			<th>Payment Mode</th>
			<th>Order Date</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody class='bg-secondary text-center text-light'>";
            
         if ($row_count==0) {
         	echo"<h2 class='text-center text-danger'> No Payment yet</h2>";
         }else{
         	$number=0;
         	while ($row_data=mysqli_fetch_assoc($result)) {
         		$payment_id =$row_data['payment_id'];
         		$order_id=$row_data['order_id'];
         		$invoice_number=$row_data['invoice_number'];
         		$amount=$row_data['amount'];
         		$payment_mode=$row_data['payment_mode'];
         		$date=$row_data['date'];
         		$number++;
         		echo"<tr>
			<td>$number</td>
			<td>$invoice_number</td>
			<td>$amount</td>
			<td>$payment_mode</td>
			<td>$date</td>
			<td><a href=''><i style='font-size:18px' class='fas text-light'>&#xf1f8;</i></a> </td>
		</tr>";
         	}
         }
		?>
		
		
	</tbody>
</table>	
