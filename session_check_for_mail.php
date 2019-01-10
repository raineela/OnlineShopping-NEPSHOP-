<html>
<head><title>session check for mail/customer</title></head>
<body> <center>
<?php
session_start();
include("function/function.php");
?>
 <?php
   if(isset($_SESSION['customer_email']))
	 {
	    include("mail_admin.php");
		echo"<a href='mail_admin.php'>";
	 } 
	 else
	 {
		  echo 'Please login to your account first!';
		  include("customer_login.php");
	 }
 ?>
 </center>
 </body>
 </html>