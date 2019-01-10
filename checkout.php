<?php
session_start();
include("function/function.php");
include("bootstrap.php");
?>

<html>

<head>
	<title>Nepshop.com</title>
    <link rel="stylesheet" href="styles/newstyle.css" media="all">
    <link rel="stylesheet" href="styles/animate.css-master/animate.css">
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
</head>
	<body>
    <!--main wrapper starts here!-->
    <div class="main_wrapper">
     <div class="head_wrapper" style=" margin:-15;">
    	<img src="images/nepal_640.png" height="150" width="180" style="margin-left:80">
    			<a href="index.php"><img src="images/nep.png" height="100" width="500" align="right" style="margin-top:50px;"></a>
                 
               
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
   
    
  </div>
</nav><!--menubar ends here!-->
                
                
                
         										<div class="content_wrapper" style="width:1200px;"><!--content wrapper starts here!-->
         
        	 												
         														<?php /*?><div id="sidebar" style="background-color:#06C">
                                                            			<div style="text-align:center; color:#FFF; background-color:#09c; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Category
                                                                	</div>
                                                                   <ul id="cats">
                                                                    <?php
                                                                    getcats();?>
                                                                    </ul>
                                                                    <div style="text-align:center; color:#FFF; background-color:#09c; 
                                                                		font-size:18px; padding:5px; border-radius:5px;">																														
                                                                		Brands
                                                                	</div>
                                                                    <ul id="cats">
                                                                    <?php
                                                                    getbrands();?>
                                                                    
                                                                   
                                                                    </ul>
                                                                
                                                                
                                                               		 </div><?php */?>
                                                                     
                                                                   <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" style="margin-left:-200px; margin-top:50px;">
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px"><font color="white">
                                                                     <?php 
																	 if(isset($_SESSION['customer_email']))
																	 {
																		 echo"<b>Welcome </b>&nbsp;" . $_SESSION['customer_email']."&nbsp;   <b style='color:White'>your</b>";
																		 }
																		 else
																		 {
																		echo"<b>Welcome guest&nbsp;&nbsp;</b>";	 
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
                                                     
                                                                     </span>

                                                                     </div>
                                                                     	
                                                                        <div id="product_box" style="background-color:#EBEBEB; width:850; margin-left:-200; margin-top:0px;" >
                                                                        <?php
																		if(!isset($_SESSION['customer_email']))
																		{
																			include("customer_login.php");
																			
																			}
																			else
																			{
																				include("payment.php");}
	
																		

  ?>                                                                     
																	   
																	    </div>
                                                                     </div>
                                                                      
                                                            
                                                            
                                                            
                                                           		
         
         										</div><!--content wrapper ends here!-->
                                                
                                                <!--<div id="blank" style="padding:50px; clear:both">
                                                <hr>
                                                
                                                </div>
                                              
                    <div id="blank" style="clear:both;">
                                             <center><h3>This is footer</h3></center>
                                               
                                                </div>                             
         -->
                                                
    
    </div><!--main wrapper ends here!-->
    
    
    
    
    
    </body>

</html>

