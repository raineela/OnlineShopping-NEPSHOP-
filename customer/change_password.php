<h1 style="text-align:center; padding:10; position:relative; right:20">
. Change Your Password</h1>
<br />
<form action="" method="post">
<b>current password:<input type="password" name="current_pass" size="30" required="required"/><br /><br />


New password:&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="new_pass" size="30" required/><br /><br />


New password:&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="new_pass_again" size="30" placeholder="Enter new password again" required="required"/><br /><br />

<input type="submit" value="Change password" name="change_pass" /></b>
</form
<?php 
include("includes/db.php");
if(isset($_POST['change_pass']))
{
	$user=$_SESSION['customer_email'];
	$current_pass=$_POST['current_pass'];
	$new_pass=$_POST['new_pass'];
	$new_again=$_POST['new_pass_again'];
	$sel_pass="select * from customers where customer_pass='$current_pass' AND customer_email='$user'";
	$run_pass=mysqli_query($con,$sel_pass);
	$check_pass=mysqli_num_rows($run_pass);
	if($check_pass==0)
	{
		echo"<script>alert('Your current password is incorrect')</script>";
		exit();
		}
	if($new_pass!=$new_again)
	{
		echo"<script>alert('New password do not match')</script>";
		exit();
		}	
		else
		{
			$update_pass="update customers set customer_pass='$new_pass' where customer_email='$user'";
			$run_update=mysqli_query($con,$update_pass);
			echo"<script>alert('Your password was successfully updated')</script>";
			echo"<script>window.open('my_account.php','_self')</script>";
	}

}

?>