<h1 class="text-center text-success"> All Categories</h1>
<table class="table table-bordered mt-5">
	<thead class="bg-info text-center">
		<tr>
			<th>Sl no</th>
			<th>Category Title</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody class="bg-secondary text-light text-center">
   		<?php
             $select_cat="select * from `categories`";
             $result_cat=mysqli_query($con,$select_cat);
             $number=0;
             while ($row=mysqli_fetch_assoc($result_cat)) {
             	$category_id=$row['category_id'];
             	$category_title=$row['category_title'];
                $number++;            
		?>
		<tr>
			<td><?php echo $number;?></td>
			<td><?php echo $category_title;?></td>
			<td><a href='index.php?edit_category=<?php echo$category_id ?>'><i style='font-size:18px' class='fas text-light'>&#xf044;</i></a></td>
			<td><a href='index.php?delete_category=<?php echo$category_id ?>'><i style='font-size:18px' class='fas text-light'>&#xf1f8;</i></a> </td>
		</tr>
		<?php
		 }
		?>
	</tbody>
</table>