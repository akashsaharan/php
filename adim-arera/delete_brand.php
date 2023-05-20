<?php
  if (isset($_GET['delete_brand'])) {
  	  $delete_brand=$_GET['delete_brand'];

  	  $delete_query="delete from  `brands` where brands_id  =$delete_brand";
  	  $result_del=mysqli_query($con,$delete_query);
  	  if ($result_del) {
  	  		echo "<script>alert('brands deleted successfully')</script>";
        echo "<script>window.open('./index.php?View_Brands','_self')</script>";
  	  }
  }

?>