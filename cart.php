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
                					
                                    
                                    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary sticky-top" style="width:1350px; padding-bottom:10px;">
  
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
         
        	 												
         														<div id="sidebar" style="background-color:#06C">
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
                                                                
                                                                
                                                               		 </div>
                                                                     
                                                                    <div id="content_area">
                                                                    <?php cart();?>
                                                                     
                                                                     <div id="shopping_bar" >
                                                                     <span style=" float:right; line-height:50px; font-size:18px; font-padding:5px"><font color="white">
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
																		 echo"<a href='checkout.php' style='color:White; text-decoration:none;'>Login&nbsp;&nbsp;</a>";
																		 }
																	 else
																	 {
																		 echo"<a href='logout.php'  style='color:White;  text-decoration:none;'>Logout&nbsp;&nbsp;</a>";
																		 }
																		 
																	?>
                                                                      
                                                     
                                                                     </span>

                                                                     </div>
                                                                     	<div class="animated fadeIn">
                                                                        <div  class=" container-fluid well well-lg text wow fadein" style="height:auto; width:900px; float: left; margin-left: 20px; margin-top: 30px; background-color:#CCC; color:#000">
                                                                        <br>
<br>

                                                                       <form action="#" method="post" enctype="multipart/form-data">
                                                                       <table width="880" bgcolor="#666666">
                                                                       <tr align="center" style="font-size:20px">
                                                                       <th>Remove</th>
                                                                       <th>Product</th>
                                                                       
                                                                       <th>Total price</th>
                                                                       </tr>
          <?php
       $total=0;
	
	
		
		$ip=getIp();
		$sel_price="SELECT * FROM CART WHERE ip_add='$ip'";
		$run_price=mysqli_query($con,$sel_price);
		while($p_price=mysqli_fetch_array($run_price))
		{
			$pro_id=$p_price['p_id'];
			$pro_price="select * from product where product_id='$pro_id'";
			$run_pro_price=mysqli_query($con,$pro_price);
			while($pp_price=mysqli_fetch_array($run_pro_price))
			{
				$product_price=array($pp_price['product_price']);
				$values=array_sum($product_price);
				$total +=$values;
				$product_title=$pp_price['product_title'];
				$product_image=$pp_price['product_image'];
				$single_price=$pp_price['product_price'];
				
				
				
	?>
              
              <tr align="center">
              <td><input type="checkbox" name="remove[]" value="<?php echo$pro_id;?>"></td>
              <td>
<img src="admin/product_images/<?php echo$product_image;?>" width="80px" height="80px;"><br>
<?php echo$product_title;?><br><br>
</td>
             <?php /*?><!-- <td><input type="text" size="5px" name="qty" value=""/></td>
             <?php 
						if(isset($_POST['update_cart'])){
						
							$qty = $_POST['qty'];
							
							$update_qty = "update cart set qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							$_SESSION['qty']=$qty;
							
							$total = $total*$qty;
						}
						
						
						?>--><?php */?>
              
              
              <td><?php echo$single_price."&nbsp;"."rs";?></td>
              </tr>   
              
           
                <?php }}?>
                <tr style="font-size:19px" align="right" bgcolor="#999999">
                <td colspan="4"><?php echo"Sub total :"." ".$total." "."rs";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              	</tr>
                		<tr align="right">
                        <td><input type="submit" name="update_cart" value="update cart"></td>
                        <td><button><a href="all_product.php" style="text-decoration:none;">Continue shopping</a></button></td>
                        <td colspan="2"><button><a href="checkout.php" style="text-decoration:none;">Checkout</a></button></td>
                        
                        </tr>
                         </table>
                                                                       
                                                                       </form>
                                                                       
                       <?php 
		
	function updatecart(){
		
		global $con; 
		
		$ip = getIp();
		
		if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
			
			$run_delete = mysqli_query($con, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
		
		}
		if(isset($_POST['continue'])){
		
		echo "<script>window.open('index.php','_self')</script>";
		
		}
	
	}
	echo @$up_cart = updatecart();
	
	?>
             

                                                                        </div>
                                                                     </div>
                                                                      
                                                            </div>
                                                            
                                                            
                                                           		
         
         										</div><!--content wrapper ends here!-->
                                                
                                                <div id="blank" style="padding:50px; clear:both">
                                                <hr>
                                                
                                                </div>
                                              
                                                 
         
                                                
    
    </div><!--main wrapper ends here!-->
    <div  style="margin-top:50px;width:1300; padding:20px;height:100px;background-color:#191919	; clear:left;border-radius:5px;position:relative; color:#999;">
                                             <<center><b style="text-align:"> copyright property of Nepshop </b></center>
                                               
                                                </div>
    
    
    
    
    </body>

</html>

