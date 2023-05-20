<h1 class="text-center text-success"> All Brands</h1>
<table class="table table-bordered mt-5">
	<thead class="bg-info text-center">
		<tr>
			<th>Sl no</th>
			<th>Brands Title</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody class="bg-secondary text-light text-center">
   		<?php
             $select_Brands="select * from `brands`";
             $result_Brands=mysqli_query($con,$select_Brands);
             $number=0;
             while ($row=mysqli_fetch_assoc($result_Brands)) {
             	$Brands_id=$row['brands_id'];
             	$Brands_title=$row['brands_tittle'];
               $number++;            
		?>
		<tr>
			<td><?php echo $number;?></td>
			<td><?php echo $Brands_title;?></td>
			<td><a href='index.php?edit_brand=<?php echo$Brands_id ?>'><i style='font-size:18px' class='fas text-light'>&#xf044;</i></a></td>
			<td><a href='index.php?delete_brand=<?php echo$Brands_id ?>'type="button" class="" data-toggle="modal" data-target="#exampleModal"><i style='font-size:18px' class='fas text-light'>&#xf1f8;</i></a> </td>
		</tr>
		<?php
		 }
		?>
	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Are you sure you want to delete this . 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?delete_brand=<?php echo$Brands_id ?>"type="button" class="text-light text-decoration-none" >YES</a></button>
      </div>
    </div>
  </div>
</div>