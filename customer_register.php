<?php
session_start();
include("function/function.php");
include("includes/db.php");
include("bootstrap.php")
?>

<html>

<head>
	<title>Nepshop.com</title>
    <link rel="stylesheet" href="styles/newstyle.css" media="all">
    <link rel="stylesheet" href="styles/animate.css-master/animate.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <script type="text/javascript" language="javascript">
			function validateform()
					{
							var x=document.forms["myform"]["C_name"].value;
							if(x == null || x == "" || x.length<3)
									{
										alert("Empty username");
										return false;
									}
							var z=document.forms["myform"]["email"].value;
							if(z == null || z == "")
									{
									alert("Empty email");
									return false;
									}
												else
	
													var atpos=document.myform.email.value.indexOf("@");
													var dotpos=document.myform.email.value.lastIndexOf(".com");
															if(atpos<1|| dotpos<atpos+2 || dotpos+2 >= z.length)
																{
																	alert("not a valid email");
																	return false;
		
																}
																
			
							var y=document.forms["myform"]["password"].value;
							if(y == null || y == "")
									{
										alert("Empty password");
										return false;
									}
								if( y.length<5)
								{
									alert("Password character is less then five");
									return false;
									}	
							var p=document.forms["myform"]["c_contact"].value;
							
							if( p == null || p == "")
							{ alert("Please enter phone number");
							return false;
							}
							if( isNaN(p))
							{ alert("Invalid number");
							return false;
							}
							if( p.length<10)
							{ alert("Number of digits is less then 10");
							return false;
							}
							
								
									
							return true;		
									
									
							
	
	
					}
	</script>
</head>
	<body>
    <!--main wrapper starts here!-->
    <div class="main_wrapper">
     <div class="head_wrapper" style=" margin:-15;">
    	<img src="images/nepal_640.png" height="150" width="180" style="margin-left:80">
    			<a href="index.php"><img src="images/nep.png" height="100" width="500" align="right" style="margin-top:50px;"></a>
                 
               
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
                                                                     
                                                                     <div id="shopping_bar"  style="margin-left:-150px; margin-top:20px;">
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
                                                                     	
                                                                       <div style="padding:30px; padding-top:20px; border-radius:10px; margin-right:200px;">
                                                                       <form action="customer_register.php" method="post" enctype="multipart/form-data" onSubmit="return validateform()" name="myform">
                                                                       <table align="center" width="400" bgcolor="#FFFAFA">
                                                                       <tr align="center" >
                                                                       <td style="padding:10px;" colspan="2"><h3>
                                                                       Create Account
                                                                       </h3>
                                                                       </td>
                                                                      </tr>
                                                                       <tr>
                                                                       
                                                                      
                                                                       <td align="right"><img src="images/User_icon_BLACK-01.png" height="20" width="20" style="bottom:-600px;" ></td><td align="center">
                                                                       <input type="text" name="C_name" size="50px" placeholder="User name" required>
                                                                       
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                                             <td align="right"><img src="images/email-icon-88472.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       
                                                                       <td align="center">
                                                                       <input type="text" name="email" size="50px" placeholder="Your email address" required>
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                                             <td align="right"><img src="images/256-256-9bf01d3a6da700873303e2b4197c3e99-lock.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       
                                                                       <td align="center">
                                                                       <input type="password" name="password" size="50px" placeholder="Your password" required>
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                        <td align="right"><img src="images/images.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                      <td align="left" colspan="2">
                                                                       <input type="file" name="c_image" required>
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                       <td>
                                                                       </td>
                                                                       </tr>
                                                                       </tr>
                                                                       <tr>
                                                                       <td>
                                                                       </td>
                                                                       </tr>

                                                                       <tr>
                                                                <td align="left"><img src="images/44536.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       <td colspan="2" style="right:-500">
                                                                       <select name="c_country" size="0" >
                                                                       <option>Select a country</option>
                                                                       <option>Afghanisthan</option>
                                                                       <option>bangladesh</option>
                                                                       <option>cloloumbia</option>
                                                                       <option>Dijiabouti</option>
                                                                       <option>UAE</option>
                                                                       <option>USA</option>
                                                                       <option>Nepal</option>
                                                                       
                                                                       </select>
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                       <td align="left"><img src="images/city-building-icons-68708.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       <td align="left" colspan="2">
                                                                       <input type="text" name="c_city" size="50"placeholder="city" required>
                                                                       </td>
                                                                       
                                                                       </tr>
                                                                       <tr>
                                                                       <td align="left"><img src="images/phone_icon.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                      <td align="left" colspan="2">
                                                                       <input type="text"  size="50"name="c_contact" placeholder="contact number" required>
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                       <td align="right"><img src="images/contact-address-icon-4.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       <td align="left" colspan="2">
                                                                       <textarea cols="52" rows="10" name="c_address"
                                                                       placeholder="Address" required></textarea>
                                                                       </td>
                                                                       </table>
                                                                       <center><h3>We will like to know you better<br>
please answer the questions to make your experience even better.</h3></center><table>
                                                                       </tr>
                                                                        
                                                                       <td colspan="2">
                                                                       <b>1)What brands do you use the most?</b>
                                                                       </td>
                                                                       </tr>
                                                                       <tr><td colspan="2" align="left"></td>
																	   <td><input type="text" name="interest_brands" placeholder="Eg:samsung,dell,apple..."></td></tr>
                                                                       
                                                                       <tr>
                                                                       <td colspan="2">
                                                                       <b>1)What kind of products do you like?</b>
                                                                       </td>
                                                                       </tr>
                                                                       <tr><td colspan="2" align="left"></td>
																	   <td><input type="text" name="interest_products" placeholder="Eg:Clothes,laptops,mobiles..."></td>
                                                                       </tr>
                                                                       
                                                                       <tr>
                                                                       <td align="center" colspan="2">
                                                                       <input type="submit" value="REGISTER" name="register"/>
                                                                       </td>
                                                                       <td>
                                                                       </td>
                                                                       </tr>
                                                                       </table>
                                                                       
                                                                       </form>
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
<?php
if(isset($_POST['register'])){
	
		$ip = getIp();
		
		$c_name = $_POST['C_name'];
		$c_email = $_POST['email'];
		$c_pass = $_POST['password'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
	    $interest_brands = $_POST['interest_brands'];
		$interest_pro = $_POST['interest_products'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
		
		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_interest_brands,customer_interest_pro,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$interest_brands','$interest_pro','$c_image')";
		 $run_c = mysqli_query($con, $insert_c); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		
		}
	}



	



?>
