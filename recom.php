<?php
session_start();
include("function/function.php");
?>

<html>

<head>
	<title>Nepshop.com</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <link rel="stylesheet" href="styles/animate.css-master/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/styles.css">
    
</head>
	<body>
    <!--main wrapper starts here!-->
    <div class="main_wrapper">
    
    
    	<div class="head_wrapper" style=" margin:-15;"><!--head wrapper starts here!-->
    			<img src="images/nepal_640.png" height="150" width="180" style="margin-left:80">
    			<a href="index.php"><img src="images/nep.png" height="100" width="500" align="right" style="margin-top:50px;"></a>
                
                
                               
               
                </div><!--head wrapper ends here!-->
                					
                                    
                                    <div class="menubar"><!--menubar starts here!-->
                                    
                                    <ul>
                                    <li><a href="index.php">Home</a></li><li>
                                    <a href="all_product.php">All products</a></li><li>
                                    <a href="customer_register.php">Sign-up</a></li><li>
                                   <?php
																	 if(!isset($_SESSION['customer_email']))
																	 {
																		 echo"<a href='checkout.php' style='color:White; text-decoration:none;'>Login&nbsp;&nbsp;</a>";
																		 }
																	 else
																	 {
																		 echo"<a href='customer/my_account.php' style='color:White; text-decoration:none;'>My Account&nbsp;&nbsp;</a>";
																		 }
																		 
																		 
																		 
																	 ?></li> <li>
                                    <a href="cart.php">Shopping cart</a></li><li>
                                    <a href="contact.php">Contact us</a></li>
                                    </ul>
                                    
                                    		<div id="form">
                                         		<form method="get" action="results.php" enctype="multipart/form-data">
                                                <input type="text" name="user_query" placeholder="Search a product" size="50px"  style="border-radius:3px; ">
                                                <input type="submit" name="search" value="search" style="border-radius:4px">
                                              
                                                </form>
                                    
                                    		</div>	
                                            </div>
                                    
                                    
                					</div><!--menubar ends here!-->
                
                
                
         										<div class="content_wrapper"><!--content wrapper starts here!-->
         
        	 												
         														<div id="sidebar" style="background-color:#00008B">
                                                            			<div style="text-align:center; color:#FFF; background-color:#DC143C; 
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
                                                                    <hr>
                                                                    <h3 style='color:#F63'>Recommended products</h3><hr>
                                                                    <div>
																	<?php
																	recom();
																	?></div>
                                                                    
                                                                   
                                                                    </ul>
                                                                
                                                                
                                                               		 </div>
                                                                     
                                                                    <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" >
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		 echo"<b>Welcome </b>&nbsp;" . $_SESSION['customer_email']."&nbsp;   <b style='color:White'>your</b>";
																		 }
																		 else
																		 {
																		echo"<b>Welcome guest</b>";	 
																			 }
																	 ?>
                                                                    
                                                                     
                                                                     <font color="white"><b> &nbsp;shopping-cart</b>&nbsp;
                                                                     Total-items:&nbsp;<?php total_items();?>  &nbsp;&nbsp;Total-price:&nbsp;<?php total_price(); ?>&nbsp;</font>
                                                                     <a href="cart.php" style="text-decoration:none; color:#FF0">Goto Cart&nbsp;&nbsp;</a>
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
                                                            		
																	<div id="outerbox">
																	<div id="sliderbox">
																	<img src="images/850--315.jpg">
																	<img src="images/bart_simpson_2-850x315.jpg">
																	<img src="images/beats-wallpaper-facebook-cover.jpg">
																	<img src="images/msi-nightblade_mi-fb_banner-851x315.jpg">
												<img src="images/msi-twin_frozr_v-supreme_silence-facebook_banner-851x315.jpg">

														</div>
														</div>
                                                                     
																	
                                                                        <div id="product_box">
                                                                      
                                                                        <?php get_Pro();
																		      get_cat_Pro();
																			  get_brand_Pro(); 
                                                                        ?>

                                                                        </div>
                                                                     </div>
                                                                      
                                                            
                                                            
                                                            
                                                           		
         
         										</div><!--content wrapper ends here!-->
                                                
                                                <div id="blank" style="padding:50px; clear:both">
                                                <hr>
                                                
                                                </div>
                                              
                                                 
         
                                                
    
    </div><!--main wrapper ends here!-->
    <div  style="margin-top:50px;width:1300; padding:20px;height:100px;background-color:#191919	; clear:left;border-radius:5px;position:relative; color:#999;">
                        <center><b style="text-align:"> copyright property of Nepshop </b></center>
                                               
                                                </div>
    
    
    
    
    </body>

</html>

