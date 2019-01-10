<?php
include("includes/db.php");
include("bootstrap.php");
?>
<div style="padding:50px; padding-top:10px; font-family:'Times New Roman', Times, serif; font-size:12px;">
<form method="post" action="#">
<table width="400" align="center" bgcolor="#CCCCCC">
<tr align="center">
<td style="padding:15">Login </td>
</tr>
<tr>
<td align="center">
<input type="text" name="email" placeholder="Type your email" size="50px;" required="required"><br><br>

</td>
</tr>
<td align="center" colspan="2">
<input type="password" name="pass" placeholder="password" size="50" required="required"><br>
</td>
<br>
<br>

<tr>
<td colspan="2" align="right">
<a href="checkout.php?forgot_pass" style="text-decoration:none; font-size:12px; font-family:Arial, Helvetica, sans-serif"><font color="#FF6600"> 
Forgot password ?</a>
</font>
</td>
</tr>
<tr>
<td align="center">
<input type="submit" name="login" value="Login" style="cursor:pointer;">
</td>
</tr>
</table>


</form>
<h4>Don't have an account? <a href="customer_register.php" style="text-decoration:none">Create new account.</a></h4>
<?php
if(isset($_POST['login']))
{
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];
	$sel_c="select * from customers where customer_email='$c_email' and customer_pass='$c_pass'";
	$run_c=mysqli_query($con,$sel_c);
	$check_customer=mysqli_num_rows($run_c);
	if($check_customer==0)
	{
		echo"<script>alert('password or email is incorrect please try again');</script>";
		
		exit();
		}
$ip= getIP();
$sel_cart="select * from cart where ip_add='$ip'";
$run_cart=mysqli_query($con,$sel_cart);
$check_cart=mysqli_num_rows($run_cart);
if($check_customer>0 && $check_cart==0)
{
	$_SESSION['customer_email']=$c_email;
	echo"<script>alert('You logged in successfully , Thanks!!')</script>";
	echo"<script>window.open('customer/my_account.php','_self')</script>";
}
else
{
	$_SESSION['customer_email']=$c_email;
	echo"<script>alert('You logged in successfully , Thanks!!')</script>";
	echo"<script>window.open('checkout.php','_self')</script>";
	}
}
?>

</div>