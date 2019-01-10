<!DOCTYPE>
<?php
session_start();

?>
<html>
<head>
<title>login</title>
<link rel="stylesheet" href="styles/loginstyle.css" media="all">
</head>
<body>
<div class="login">
<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out'];?></h2>
	<h1>Admin Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Let me in.</button>
    </form>
</div>
</body>
</html>
<?php
include("includes/db.php");
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$sel_user="select * from admins where user_email='$email' and user_pass='$pass'";
	$run_user=mysqli_query($con,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	if($check_user==0)
	{
		
		echo"<script>alert('Password or email is wrong!!Try again.')";
		
		}
	else
	{
	$_SESSION['user_email']=$email;
	echo"<script>window.open('index.php?Logged_in=You have ssuccessfylly logged in!','_self')</script>";
		}
	
	
	}
?>