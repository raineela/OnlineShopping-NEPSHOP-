<?php
include("includes/db.php");
if(isset($_GET['delete_pay']))
{
	$delete_id=$_GET['delete_pay'];
	$delete_pay="delete from payment where pay_id='$delete_id'";
	$run_delete=mysqli_query($con,$delete_pay);
	if($run_delete)
	{
		echo"<script>alert('Payment has been deleted')</script>";
		echo"<script>window.open('index.php?view_payments','_self');</script>";
		
		}
	}
	?>