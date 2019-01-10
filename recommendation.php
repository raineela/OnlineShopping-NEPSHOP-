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
         
        	 												
         														<!--<div id="sidebar" style="background-color:#00008B">
                                                            			<div style="text-align:center; color:#FFF; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Category
                                                                	</div>
                                                                   <ul id="cats">
                                                                    <?php
                                                                    ?>
                                                                    </ul>
                                                                    <div style="text-align:center; color:#FFF; background-color:#DC143C; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Brands
                                                                	</div>
                                                                    <ul id="cats">
                                                                    
																	<?php
                                                                    ?>
                                                                    
                                                                   
                                                                    </ul>
                                                                
                                                                
                                                               		 </div>-->
                                                                     
                                                                    <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" style="left:-200px;" >
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px;">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		 echo"<b>Welcome </b>&nbsp" . $_SESSION['customer_email']."&nbsp";
																		 }
																		 else
																		 {
																		echo"<b>Welcome guest</b>";	 
																			 }
																	 ?>
                                                                    
                                                                     
                                                                     <font color="white">;
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
                                                                     <!--<div id="outerbox">
<div id="sliderbox">

<img src="images/850--315.jpg">
<img src="images/bart_simpson_2-850x315.jpg">
<img src="images/beats-wallpaper-facebook-cover.jpg">
<img src="images/msi-nightblade_mi-fb_banner-851x315.jpg">
<img src="images/msi-twin_frozr_v-supreme_silence-facebook_banner-851x315.jpg">

</div>
</div>-->
                                                                     
                                                                     	
                                                                        <div id="product_box">
                                                                       <center><h3>We will like to know you better<br>
please choose the options you find best</h3></center>
                                                                       <br>
																		
                                                                        
                                                                        <form action="recommendation.php" method="post" enctype="multipart/form-data">
                                                                       <table align="center" width="400" bgcolor="#FFFAFA">
                                                                       
                                                                      <tr>
                                                                       <td colspan="5">
                                                                       <b>1)What brands do you use the most?</b>
                                                                       </td>
                                                                       </tr>
                                                                       <tr><td colspan="2" align="center"></td>
																	   <td><input type="text" name="interest_brands" placeholder="Eg:samsung,dell,apple..."></td></tr>
                                                                       
                                                                       <tr>
                                                                       <td colspan="5">
                                                                       <b>1)What kind of products do you like?</b>
                                                                       </td>
                                                                       </tr>
                                                                       <tr><td colspan="2" align="center"></td>
																	   <td><input type="text" name="interest_products" placeholder="Eg:Clothes,laptops,mobiles..."></td>
                                                                       </tr>
                                                                      <tr>
                                                                      <td>
                                                                      </td>
                                                                      <tr>
                                                                      <tr>
                                                                      <td>
                                                                      </td>
                                                                      <tr><tr>
                                                                      <td>
                                                                      </td>
                                                                      <tr>
																		<tr>
                                                                       <td align="center" colspan="5">
                                                                       <input type="submit" value="Submit" name="submit"/>
                                                                       </td>
                                                                       </table>
                                                                        
                                                                        </form>
                                                                   

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

<?php
if(isset($_POST['submit'])){
	
		$ip = getIp();
		
		$interest_brands = $_POST['interest_brands'];
		$interest_pro = $_POST['interest_products'];
	
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_interest_brands,customer_interest_pro,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$interest_brands','$interest_pro','$c_image')";
		 $run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Thanks for the cooperation, Enjoy!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		
		}
	}



	



?>