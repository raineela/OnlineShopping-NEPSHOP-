<h2 style=" color:white;position:relative; padding:50;right:50;top:0;">DO you really want to delete your account??</h2>
<form action="" method="post" style=" position:relative; bottom:100;right:50;padding:50; text-align:center">
<input type="submit" name="Yes"value="YES" style=" padding:10; border-radius:5px; cursor:pointer" >&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="No"value="NO" style=" padding:10; border-radius:5px; cursor:pointer">

</form>
<?php
include("includes/db.php");
$user=$_SESSION['customer_email'];
if(isset($_POST['Yes']))
{
	$delete_customer="delete from customers where customer_email='$user'";
	$run_customer=mysqli_query($con,$delete_customer);
	echo"<script>alert('we are sorry :( your account has been deleted')</script>";
	echo"<script>window.open('../index.php','_self')</script>";
	}
if(isset($_POST['No']))
{
	echo"<script>alert('Dont waste my time ');</script>";
	}
?>