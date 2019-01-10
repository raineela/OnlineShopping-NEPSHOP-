<?php
if(!isset($_SESSION['customer_email']))
{
	echo"<script>window.open('customer_login.php?Please login first!','_self')</script>";
	}
	else
	{
		
?>

<table width="795" align="center" bgcolor="#3399FF">
<tr align="center">
<td colspan="6"><h2>My Orders</h2></td>
</tr>
<tr align="center" bgcolor="#84FFFF">
<th>Procuct ID</th>
<th>Product Name</th>
<th>Product Quantity</th>
<th>Product Price</th>

</tr>
<?php
       $total=0;
	  // $pro_id=0;
	
	
		
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
				$single_price=$pp_price['product_price'];
				
				
				
	?>
	 <tr align="left" style="color:black">
              <td><?php echo$pro_id;?></td>
              <td><?php echo$product_title;?></td>
              <td></td>
              <td><?php echo$single_price."&nbsp;"."rs";?></td>
       
              
              </tr>   
              <?php }}?>
               <tr style="font-size:19px; color:black" align="right" bgcolor="#999999">
                <td colspan="4"><?php echo"Sub total :"." ".$total." "."rs";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
              	</tr>
                 <tr>
                 <td>
                 <form action="cancel_order.php" method="post">
                 <input  type="button" name="Cancel" value="Cancel order?" />
                 </form>
                </td>
                </tr>
                </table>
                <?php } ?>
				