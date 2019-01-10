<?php
include("includes/db.php");
if(isset($_GET['delete_my_order']))
{
	$delete_id=$_GET['delete_my_order'];
	$delete_my_order="delete from cart where p_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_my_order);
	if($run_delete)
	{
		echo"<script>alert('Order has been deleted')</script>";
		echo"<script>window.open('my_account.php?my_orders','_self');</script>";
		
		}
	}
	?>