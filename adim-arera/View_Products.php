<h1 class="text-center text-success"> All Products</h1>
<table class="table table-bordered mt-5">
	<thead class="bg-info">
		<tr>
			<th>Product Id</th>
			<th>Product Title</th>
			<th>Product Image</th>
			<th>Product Price</th>
			<th>Total Sold</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody class="bg-secondary text-light">
		<?php
             $get_product="select * from `products`";
             $result=mysqli_query($con,$get_product);
             $number=0;
             while ($row=mysqli_fetch_assoc($result)) {
             	$product_id=$row['product_id'];
             	$product_title=$row['product_title']; 
             	$product_image1=$row['product_image1'];
             	$product_price=$row['product_price'];
             	$status=$row['status'];
             	$number++;
             	?>
             <tr class="text-center">
			<td><?php echo $number;?></td>
			<td><?php echo $product_title;?></td>
			<td><img  class="e-img" src='./pro/<?php echo $product_image1;?>'></td>
			<td><?php echo $product_price;?></td>
			<td>
				<?php
                 $get_count="select * from `orders_pending` where product_id=$product_id";
                 $result_count=mysqli_query($con,$get_count);
                 $rows_count=mysqli_num_rows($result_count);
                 echo $rows_count;

				?>
			</td>
			<td><?php echo $status;?></td>
			<td><a href='index.php?edit_products=<?php echo $product_id?>'><i style='font-size:18px' class='fas text-light'>&#xf044;</i></a></td>
			<td><a href='index.php?delete_products=<?php echo $product_id?>'><i style='font-size:18px' class='fas text-light'>&#xf1f8;</i></a> </td>
		</tr>
		<?php
             }
		?>
		
	</tbody>
	
</table>