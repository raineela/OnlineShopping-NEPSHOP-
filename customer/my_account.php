<?php
session_start();
include("function/function.php");
include("includes/db.php");
include("../bootstrap.php");
?>

<html>

<head>
	<title>Nepshop.com</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <link rel="stylesheet" href="styles/animate.css-master/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/styles.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
</head>
	<body>
    <!--main wrapper starts here!-->
    <div class="main_wrapper">
    
    
    	<div class="head_wrapper" style=" margin:-15;"><!--head wrapper starts here!-->
    			<img src="images/nepal_640.png" height="150" width="180" style="margin-left:80">
    			<a href="../index.php"><img src="images/nep.png" height="100" width="500" align="right" style="margin-top:50px;"></a>
                
                
                               
               
                </div><!--head wrapper ends here!-->
                					
                                    
                                    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary" style="width:1350px; padding-bottom:10px;">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="index.php">Home</a>
      </li>
       <li class="nav-item" style="padding-right:20px;">
        <a class="nav-link" href="all_product.php">All Products</a>
      </li>
      <li class="nav-item " style="padding-right:20px;">
        <?php if(!isset($_SESSION['customer_email']))
																	 {
																		 echo"<a class='nav-link' href='checkout.php' >Login</a>";
																		 }
																	 
																	 else
																	 {
																		 echo"<a class='nav-link' href='customer/my_account.php' >My Account&nbsp;&nbsp;</a>";
																		 }
																		 
																		 
																		 
																	 ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
     
    </ul>
   
    <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="user_query">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
  </div>
</nav><!--menubar ends here!-->
                
                
                
         										<div class="content_wrapper"><!--content wrapper starts here!-->
         
        	 												
         														<div id="sidebar" style="background-color:#00008B; margin-right:-200px;">
                                                            			<div style="text-align:center; color:#FFF; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		My Account
                                                                	</div>
                                                                   <ul id="cats">
                                                                   <?php
																   $user= $_SESSION['customer_email'];
																   $get_img="select * from customers where customer_email='$user'"; 
																   $run_img=mysqli_query($con,$get_img);
																   $row_img=mysqli_fetch_array($run_img);
																   $c_image=$row_img['customer_image'];
																   $c_name=$row_img['customer_name'];
																   echo"<img src='customer_image/$c_image' width='150' height='200'>";
																   
																   ?>
                                                                   
                                                                   
                                                                   <li><a href="my_account.php?my_order">My orders</a></li>
                                                                   <li><a href="my_account.php?edit_account">Edit account</a></li>
                                                                   <li><a href="my_account.php?change_password">Change password</a></li>
                                                                   <li><a href="my_account.php?delete_account">Delete account</a></li>
                                                                   <li><a href="../logout.php">Log out</a></li>
                                                                    </ul>
                                                                    </div>
                                                                   
                                                                
                                                                    <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" >
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px; color:black;">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		 echo"<b>Welcome </b>&nbsp;" . $_SESSION['customer_email'];
																		 }
																		 
																	 ?>
                                                                    
                                                                     <a href="../checkout.php"
                                                                    
                                                                      <?php
																	 if(!isset($_SESSION['customer_email']))
																	 {
																		 echo"<a href='checkout.php' style='color:White; text-decoration:none;'>Login&nbsp;&nbsp;</a>";
																		 }
																	 else
																	 {
																		 echo"<a href='logout.php'  style='color:White;  text-decoration:none;'>Logout&nbsp;&nbsp;</a>";
																		 }
																		 
																	 ?>
                                                                     
                                                     
                                                                     </span>
                                                                     

                                                                     </div>
                                                                     <!--<div id="outerbox">
<div id="sliderbox">

<img src="images/850--315.jpg">
<img src="images/bart_simpson_2-850x315.jpg">
<img src="images/beats-wallpaper-facebook-cover.jpg">
<img src="images/msi-nightblade_mi-fb_banner-851x315.jpg">
<img src="images/msi-twin_frozr_v-supreme_silence-facebook_banner-851x315.jpg">

</div>-->
</div>
                                                                     
                                                                     	
                                                                        <div id="product_box" style="background-color:#099; position:relative;left:150; top:70px;width:900px; color:black; padding-right:200px;">
                                                                       
                                                                       
<?php
if(!isset($_GET['my_order']))
{
	if(!isset($_GET['edit_account']))
	{
		if(!isset($_GET['change_password']))
		{
			if(!isset($_GET['delete_account']))
			{
				echo" <h1 style='position:relative; padding:10; right:50';>Welcome: $c_name</h1>
<b>you can see your orders in this <a href='my_account.php?my_order'>link</a></b>";
				}
			}
		
		
		}
	
	}
?>
<?php
if(isset($_GET['my_order']))
{
include("my_order.php");
}
if(isset($_GET['edit_account']))
{
include("edit_account.php");
}
if(isset($_GET['change_password']))
{
include("change_password.php");
}
if(isset($_GET['delete_account']))
{
include("delete_account.php");
}



?>

                                                                        </div>
                                                                     </div>
                                                                      
                                                            
                                                            
                                                            
                                                           		
         
         										</div><!--content wrapper ends here!-->
                                                
                                                <div id="blank" style="padding:50px; clear:both">
                                                <hr>
                                                
                                                </div>
                                              
                                                 
         
                                                
    
    </div><!--main wrapper ends here!-->
    <div  class=" container-fluid well well-lg text wow fadein" style="height:auto; width:1300px; float: left; margin-left: 20px; margin-top: 30px; background-color:#333; color:#000">
                         
                         <h1 align="left"><b>Follow us at</b></h1>
                        <div class="well well-lg text wow fadeinleft" style="height:auto; width:250px; float: left; margin-left: 20px;  background-color:transparent; color:#000; border:hidden;">
                         
                         <a href="#"><img src="../images/image.png" height="100" width="100"></a>
                         </div>
                        <div class="well well-lg text wow animated fadeInRight" style="height:auto; width:250px; float: left; margin-left: 20px;  background-color:transparent; color:#000; border:hidden;">
                         <a href="#"><img src="../images/twitter_PNG32.png" height="100" width="100" style="float:right;"></a>
                        </div>
                        
                        
                        <div class="well well-lg text wow animated fadeInRight" style="height:auto; width:250px; float: right; margin-left: 20px;  background-color: #999; color:#000; border:hidden;">
                        <h3 style="font-size:14px"><b>Contact no:01-4456456</b></h3>
                         <h3  style="font-size:14px"><b>Email:Nepshop@gmail.com</b></h3>
                         <h3 style="font-size:14px"><b>Location:Kapan,Kathmandu
                         				Kalanki,Kathmandu
                                        Naikap,Kathmandu</b></h3>
                        
                        </div>
                                              <p align="left"><h3 style="text-align:"> Copyright property of Nepshop &copy;</h3>
                                                </div>
    
    
    
    </div>
    
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    
    </body>

</html>

