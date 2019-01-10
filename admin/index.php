<?php
session_start();
if(!isset($_SESSION['user_email']))
{
	echo"<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else
	{
		
?>
<html>
<head>
<title>ADMINISTRATOR</title>
<link rel="stylesheet" href="styles/styles.css" media="all">
</head>
<body>
<div class="main_wrapper">
</div>
<div id="header">
<h1 align="center">
<b>
<a href="index.php" style="text-decoration:none; color:#000">The Admin Pannel</a>
</b></h1>
</div>

<div id="right">
<h3 align="center">Manage content</h3>

<a href="index.php?insert_product">Insert New product</a>
<a href="index.php?view_product" >View all product</a>
<a href="index.php?insert_cat" >Insert new category</a>
<a href="index.php?view_cats" >View all categories</a>
<a href="index.php?insert_brand" >Insert New Brand</a>
<a href="index.php?view_brands" >View all Brands</a>
<a href="index.php?view_customers" >View Customers</a>
<a href="index.php?view_orders" >View Orders</a>
<a href="index.php?view_payments" >View Payents</a>
<a href="index.php?sendmail_cust" >Send mail</a>
<a href="logout.php" >Admin Logout</a>


</div>
<div id="left">
<center><h1>Welcome to the admin pannels.</h1>
</center>


<div style="left:-200px;">
<?php
if(isset($_GET['insert_product']))
{
	include("inserting_product.php");
	}
if(isset($_GET['view_product']))
{
	include("view_products.php");
	}
	if(isset($_GET['delete_pro']))
{
	include("delete_pro.php");
}
if(isset($_GET['edit_pro']))
{
	include("edit_pro.php");
}
	if(isset($_GET['view_customers']))

{
	include("view_customers.php");
	}
	if(isset($_GET['insert_cat']))
{
	include("insert_cat.php");
	}
	if(isset($_GET['view_cats']))
{
	include("view_cats.php");
	}
	if(isset($_GET['edit_cat']))
{
	include("edit_cat.php");
	}
	if(isset($_GET['insert_brand']))
{
	include("insert_brand.php");
	}
	if(isset($_GET['view_brands']))
{
	include("view_brands.php");
	}
	if(isset($_GET['edit_brand']))
{
	include("edit_brand.php");
	}
	if(isset($_GET['sendmail_cust']))
{
	include("sendmail_cust.php");
	}
	if(isset($_GET['view_orders']))
{
	include("view_orders.php");
	}
	if(isset($_GET['view_payments']))
{
	include("view_payments.php");
	}
	
	

	
	


?>


</div>
</div>

</body>
</html>
<?php }?>