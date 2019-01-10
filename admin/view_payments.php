<?php
if(!isset($_SESSION['user_email']))
{
	echo"<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else
	{
		
?>
<table width="795" align="center" bgcolor="#3399FF">
<tr align="center">
<td colspan="6"><h2>View all payments</h2></td>
</tr>
<tr align="center" bgcolor="#84FFFF">
<th>S.N</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Address</th>
<th>Phone no</th>
<th>Card no</th>
<th>Expires</th>
<th>CSC</th>
<th>Delete</th>

</tr>
<?php
include("includes/db.php");
$get_pay="Select * from payment";
$run_pay=mysqli_query($con,$get_pay);
$i=0;
while($row_pay=mysqli_fetch_array($run_pay))
{
	$pay_id=$row_pay['pay_id'];
	$pay_fname=$row_pay['first_name'];
	$pay_lname=$row_pay['last_name'];
	$pay_email=$row_pay['email'];
	$pay_address=$row_pay['address'];
	$pay_phone=$row_pay['phone_no'];
	$pay_card=$row_pay['card_no'];
	$pay_expires=$row_pay['expires'];
	$pay_csc=$row_pay['csc'];
	$i++;
?>
<tr align="center">
<td><?php echo $pay_id;?></td>
<td><?php echo $pay_fname;?></td>
<td><?php echo $pay_lname;?></td>
<td><?php echo $pay_email;?></td>
<td><?php echo $pay_address;?></td>
<td><?php echo $pay_phone;?></td>
<td><?php echo $pay_card;?></td>
<td><?php echo $pay_expires;?></td>
<td><?php echo $pay_csc;?></td>
<td><a href="delete_pay.php?delete_pay=<?php echo $pay_id;?>">Delete</a></td>

</tr>
<?php }?>
</table>
<?php } ?>