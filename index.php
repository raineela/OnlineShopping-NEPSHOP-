<?php
session_start();
include("function/function.php");
include("bootstrap.php");
?>

<html>

<head>
	<title>Nepshop.com</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <link rel="stylesheet" href="styles/animate.css-master/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/styles.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
</head>
	<body>
    <!--main wrapper starts here!-->
    <div class="main_wrapper">
    
    
    	<div class="head_wrapper" style=" margin:-15;"><!--head wrapper starts here!-->
    			<img src="images/nepal_640.png" height="150" width="180" style="margin-left:80" class='animated bounce'>
    			<a href="index.php"><img src="images/nep.png" height="100" width="500" align="right" style="margin-top:50px";class='animated bounce'></a>
                
                
                               
               
                </div><!--head wrapper ends here!-->
                					
                             
                                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar sticky-top " style="width:1340px; padding-bottom:10px;">
  
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
      <input class="form-control mr-sm-2" type="search" placeholder="Search"  siaria-label="Search" name="user_query">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
    </form>
  </div>
</nav>
<!--menubar ends here!-->
                
               
                
         										<div class="content_wrapper" class="animated fadeIn"><!--content wrapper starts here!-->
         <?php /*?>
        	 												<?php if(isset($_SESSION['customer_email']))
															{
         														echo"<div id='sidebar' style='background-color:#00008B'>
                                                            			<div style='text-align:center; color:#FFF; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;'>																														
                                                                		Category
                                                                	</div>
                                                                   <ul id='cats'>
                                                                    
																	<?php
                                                                    getcats();?>
                                                                    </ul>
                                                                    <div style='text-align:center; color:#FFF; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;'>																														
                                                                		Brands
                                                                	</div>
                                                                    <ul id='cats'>
                                                                    
																	<?php
                                                                    getbrands();?>
                                                                    <hr>
                                                                    <h2 style='color:#F63; font-family:'Confetti Stream'>Recommended products</h2><hr>
                                                                    <div style='height:700px;overflow:hidden'>;
                                                                 recom();
																 </div>
                                                                    <a href='recom.php'>Show more</a>
                                                                    ";
                                                                    ?>
                                                                    
                                                                  else
                                                                  { <?php */?>
                                                                   <div class="fadeIn">
                                                                    <div id="sidebar" style="background-color:#06C">
                                                            			<div style="text-align:center; color:#FFF; font-size:12px; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Category
                                                                	</div>
                                                                   <ul id="cats">
                                                                    <?php
                                                                    getcats();?>
                                                                    </ul>
                                                                    <div style="text-align:center; color:#FFF; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Brands
                                                                	</div>
                                                                    <ul id="cats">
                                                                    
																	<?php
                                                                    getbrands();?>
                                                                   
                                                                   
                                                                   
                                                                    </ul>
                                                                
                                                                
                                                               		 </div></div>
                                                                     
                                                                    <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" >
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px"><font color="white">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		 echo"<b>Welcome </b>&nbsp;";
																		 customer();
																		 }
																		 else
																		 {
																		echo"<b>Welcome guest  </b>";	 
																			 }
																	 ?>
                                                                    
                                                                  </font>   
                                                                     <font color="white">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		echo"Total-items:  ";
																		total_items();
																		echo"  Total-price:  ";
																		total_price();
																		echo" <a href='cart.php' style='text-decoration:none; color:#FF0'>Goto Cart&nbsp;&nbsp;</a>";
																		 }
																		 else
																		 {
																		 
																			 }
																	 ?>
                                                                     </font>
                                                                     
                                                                     <?php
																	 if(!isset($_SESSION['customer_email']))
																	 {
																		 echo"<a href='checkout.php' style='color:White; text-decoration:none;'>&nbsp;&nbsp;Login&nbsp;&nbsp;</a>";
																		 }
																	 else
																	 {
																		 echo"<a href='logout.php'  style='color:White;  text-decoration:none;'>Logout&nbsp;&nbsp;</a>";
																		 }
																		 
																	 ?>
                                                                     
                                                     
                                                                     </span>
                                                                     

                                                                     </div>
                                                            		 <div class="animated fadeIn">
																	<div class="container">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:850px; margin-left:50px;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/facebook_cover___headphones_by_beats_by_azazelfire-d6v2jh0.jpg" alt="New york" style="width:850px;">
      </div>
      <div class="item ">
        <img src="images/850--315.jpg" alt="Los Angeles" style="width:850px;">
      </div>

      <div class="item">
        <img src="images/beats-wallpaper-facebook-cover.jpg"alt="Chicago" style="width:850px;;">
      </div>
    
      <div class="item">
        <img src="images/msi-nightblade_mi-fb_banner-851x315.jpg" alt="New york" style="width:850px;">
      </div>
      
      <div class="item">
        <img src="images/01a26c3a7e7c47151b3345acd4a15e7d.jpg" alt="New york" style="width:850px;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
                                                                     </div>
																	<div class="animated fadeIn">
                                                                        <div id="product_box">
                                                                  
                                                                        <?php get_Pro();
																		      get_cat_Pro();
																			  get_brand_Pro(); 
																			  
                                                                        ?>
                                                                        

</div>
                                                                        </div>
                                                                     </div>
                                                                                     
                                                            <div id="views">
                                                            <h2>Buy these most viewed products?</h2>
                                                            <hr>
															<?php 
															view();
															?>
                                                            </div>
                                                            
                                                            
                                                           		
         
         										</div><!--content wrapper ends here!-->
                                               
                                                <div id="blank" style="padding:50px; clear:both">
                                                <hr>
                                                
                                                </div>
                                              
                                                 
         
                                                
    
    </div><!--main wrapper ends here!-->
   
                       
                        <div  class=" container-fluid well well-lg text wow fadein" style="height:auto; width:1300px; float: left; margin-left: 20px; margin-top: 30px; background-color:#333; color:#000">
                         
                         <h1 align="left"><b>Follow us at</b></h1>
                         <hr>
                        <div class="well well-lg text wow fadeinleft" style="height:auto; width:250px; float: left; margin-left: 20px;  background-color:transparent; color:#000; border:hidden;">
                         
                         <a href="#"><img src="images/image.png" height="100" width="100"></a>
                         </div>
                        <div class="well well-lg text wow animated fadeInRight" style="height:auto; width:250px; float: left; margin-left: 20px;  background-color:transparent; color:#000; border:hidden;">
                         <a href="#"><img src="images/twitter_PNG32.png" height="100" width="100" style="float:right;"></a>
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
   
    </body>

</html>

