<?php

$con=mysqli_connect("localhost","root","","shopping");
//getting user ip add
function getIp() {
	global $con;
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
function updatecount($x)
{
 global $con; 
 $sql_query ="select * from product where product_id=$x ";
    $result = mysqli_query($con, $sql_query);
    //$count= mysqli_num_rows($result);
    if(mysqli_num_rows($result)>0)
    {
    while($row =  mysqli_fetch_array($result))
    {
    $c=$row["count"];
     
	 $c=$c+1;
	 echo"Total views=".$c;
    
 $insert = "UPDATE  product  set count = '$c' where product_id = $x";
 mysqli_query($con, $insert);
    }
  }
}
function view()
{
global $con;
	$sql_query="Select * from PRODUCT order by count desc limit 0,4";
	$show=mysqli_query($con,$sql_query);
	while($row= mysqli_fetch_array($show))
	{
		
		
		$view=$row['count'];
		
		$pro_id = $row['product_id'];
		$pro_cat = $row['product_cats'];
		$pro_brand = $row['product_brand'];
		$pro_title = $row['product_title'];
		$pro_price = $row['product_price'];
		$pro_image = $row['product_image'];
		
		echo "<div  class='well well-lg text wow fadeinleft' style='height:240; width: 200px; float: left; margin-left:50px; margin-top:10px; margin-right:10px;background-color:transparent;'>
				
		
		<a href='details.php?pro_id=$pro_id' >
					<img src='admin/product_images/$pro_image' width='120' height='110' style='padding:15px;'/>
					</a>
					<p style='font-size:14px;'>$pro_title</p>
					<p>($view)</p>
		
		</div>";
		}
	
	
}

function cart()
{
	if(isset($_GET['add_cart']))
	{
		global $con;
		$ip=getIp();
		$pro_id=$_GET['add_cart'];
		$check_pro="select * from cart where ip_add='$ip' and p_id='$pro_id' ";
		$run_check=mysqli_query($con,$check_pro);
		if (mysqli_num_rows($run_check)>0)
		{
			echo"";}
			
			
		else
		{
			$insert_pro="Insert into cart(p_id,ip_add) values('$pro_id','$ip') ";
			$run_pro=mysqli_query($con,$insert_pro);
			echo"<script>windows.open('index.php','_self')</script>";}	
			
		}
	
	
	}
function total_items()
{
	global $con;
	
	if(isset($_GET['add_cart']))
	{
		
		$ip=getIp();
		$get_items="SELECT * FROM CART WHERE ip_add='$ip'";
		$run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
		}
	else
	{
		
		$ip=getIp();
		$get_items="SELECT * FROM CART WHERE ip_add='$ip'";
		$run_items=mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
		}
		echo $count_items;
	
	}
function total_price()
{
	global $con;
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
				
				}
			
			
			}
	
	echo $total.""."rs";
}



function getcats()
{
	global $con;
	$get_cats="select * from categories";
	$run_cats=mysqli_query($con,$get_cats);
	while($row_cats=mysqli_fetch_array($run_cats))
	{
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		
		echo"<li><a href='dupindex.php?cat=$cat_id'>$cat_title</a></li>";
		}
	
	
	
	}
function getbrands()
{
	global $con;
	$get_brands="select * from brands";
	$run_brands=mysqli_query($con,$get_brands);
	while($row_brands=mysqli_fetch_array($run_brands))
	{
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
		
		echo"<li><a href='dupindex.php?brand=$brand_id'>$brand_title</a></li>";
		}
	
	
	
	}

function get_Pro()
{
	
	if(!isset($_GET['cat']))
	{
	if(!isset($_GET['brand']))
	{
		
	
	global $con; 
	
	$get_pro = "select * from product order by RAND() LIMIT 0,6";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cats'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
	
		echo "
				<div  class='well well-lg' style='height:auto; width: 250px; float: left; margin-left:50px; margin-top: 30px; font-size:12px;background-color:#BEB5B5;color:black;  '>
				<div class='text wow fadeIn>
				
					
					<font color='#000000'>
					<a href='details.php?pro_id=$pro_id' >
					<img src='admin/product_images/$pro_image' width='160' height='150' style='padding:15px;'/>
					</a>
					<p style='font-size:'>$pro_title</p>
					<p><b><center>$pro_price rs </center></b></p>	
					<center><a href='checkout.php?add_cart=$pro_id'>
<button type='submit' style='background-color:transparent; border-color:transparent; cursor:pointer;'><img src='../Shopping/images/Add-To-Cart-Button-PNG-Pic.png' height='25' width='100'></button></a></center>
				</font>
				</div>
				</div>
		
		
		";
	
	}
	}
}
}

function get_cat_Pro()
{
	
	if(isset($_GET['cat']))
	{
	
		$cat_id=$_GET['cat'];
		
	global $con; 
	
	$get_cat_pro = "select * from product where product_cats='$cat_id'";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	
	$count_cats=mysqli_num_rows($run_cat_pro);
	if($count_cats==0)
		{
		
		echo"<H2>There are no products in this category</h2>";
		}
	else
	{
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cats'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
		
	
		echo "
				<div id='single_product'>
				
					
					
					<a href='details.php?pro_id=$pro_id' >
					<img src='admin/product_images/$pro_image' width='160' height='150' style='padding:15px;'/>
					</a>
					<p>$pro_title</p>
					<p><b><center>$pro_price rs </center></b></p>	
					<center><a href='dupindex.php??pro_id=$pro_id'>
<button type='submit' style='background-color:transparent; border-color:transparent; cursor:pointer;'><img src='../Shopping/images/Add-To-Cart-Button-PNG-Pic.png' height='25' width='100'></button></a></center>
				
				</div>
		
		
		";
		}
	}
	
}
}

function get_brand_Pro()
{
	
	
	if(isset($_GET['brand']))
	{
		
	$brand_id=$_GET['brand'];
	global $con; 
	
	$get_brand_pro = "select * from product where product_brand='$brand_id'";

	$run_brand_pro = mysqli_query($con, $get_brand_pro);
	$count_brand=mysqli_num_rows($run_brand_pro);

	if($count_brand==0)
		{
		
		echo"<H2>There are no products in this brands</h2>";
		}
	else
	{
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	
		$pro_id = $row_brand_pro['product_id'];
		$pro_cat = $row_brand_pro['product_cats'];
		$pro_brand = $row_brand_pro['product_brand'];
		$pro_title = $row_brand_pro['product_title'];
		$pro_price = $row_brand_pro['product_price'];
		$pro_image = $row_brand_pro['product_image'];
	
		echo "
				<div id='single_product'>
				
					
					
					<a href='details.php?pro_id=$pro_id' >
					<img src='admin/product_images/$pro_image' width='160' height='150' style='padding:15px;'/>
					</a>
					<p>$pro_title</p>
					<p><b><center>$pro_price rs </center></b></p>	
					<center><a href='dupindex.php??pro_id=$pro_id'>
<button type='submit' style='background-color:transparent; border-color:transparent; cursor:pointer;'><img src='../Shopping/images/Add-To-Cart-Button-PNG-Pic.png' height='25' width='100'></button></a></center>
				
				</div>
		
		
		";
	
	}
	}
	}
	
}


?>
 <?php
													//getting the interests		
													
															
	
														function recom()
														
														{
														
														
															if(isset($_SESSION['customer_email']))
																		{
														global $con;
														$get_c="Select * from customers";
														$run_c=mysqli_query($con,$get_c);

														while($row_c=mysqli_fetch_array($run_c))
																{

																		$c_interest_b=$row_c['customer_interest_brands'];
																		$c_interest_p=$row_c['customer_interest_pro'];

																
																$get_pro = "select * from product where  product_keyword 												 																			like '%$c_interest_b%'";
															
																$run_pro = mysqli_query($con, $get_pro); 
																
																while($row_pro=mysqli_fetch_array($run_pro))
																{
																
																	$pro_id = $row_pro['product_id'];
																	$pro_cat = $row_pro['product_cats'];
																	$pro_brand = $row_pro['product_brand'];
																	$pro_title = $row_pro['product_title'];
																	$pro_price = $row_pro['product_price'];
																	$pro_image = $row_pro['product_image'];
																															
																	echo "
																	<hr>"."
																			<center></h3></h3></center>
																			<div id='recommended_product'>
																			
																
				
					
																
																<a href='details.php?pro_id=$pro_id' ><center>
																<img src='admin/product_images/$pro_image' width='160' 		     				 	 															height='150' style='padding:15px;'/></center>
																</a>
																<p><center>$pro_title</center></p>
																<p><b><center>$pro_price rs </center></b></p>	
																<center><a href='index.php??pro_id=$pro_id'>
											<button type='submit' style='background-color:transparent; border-color:transparent;                                            cursor:pointer;'><img src='../Shopping/images/Add-To-Cart-Button-PNG-Pic.png'     	 	 	 	                                     height='25' width='100'></button></a></center>
													
													
													</div>
													
													";
													
														}
													
	
	
  
																	}}
																	
																	
														}
															
	function customer()
{
	global $con; 
	
	$user= $_SESSION['customer_email'];
																   $get_img="select * from customers where customer_email='$user'"; 
																   $run_img=mysqli_query($con,$get_img);
																   $row_img=mysqli_fetch_array($run_img);
																   $c_image=$row_img['customer_image'];
																   $c_name=$row_img['customer_name'];
																   echo"$c_name";
																   }


?>															