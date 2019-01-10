<?php
include("includes/db.php");
$user= $_SESSION['customer_email'];
 $get_customer="select * from customers where customer_email='$user'"; 
 $run_customer=mysqli_query($con,$get_customer);
  $row_customer=mysqli_fetch_array($run_customer);
  $c_id=$row_customer['customer_id'];
  $name=$row_customer['customer_name'];
  $email=$row_customer['customer_email'];
  $pass=$row_customer['customer_pass'];
  $image=$row_customer['customer_image'];
  $country=$row_customer['customer_country'];
  $city=$row_customer['customer_city'];
  $contact=$row_customer['customer_contact'];
  $address=$row_customer['customer_address'];

?>

                                                                     	
                                                                      <div style="padding:10; border-radius:10px;" align="center"> 
                                                                       <form action="" method="post" enctype="multipart/form-data">
                                                                       <table align="center" width="400" bgcolor="#FFFAFA" style="border-radius:10px;">
                                                                       <tr align="center" >
                                                                       <td style="padding:10px;" colspan="2"><h3>
                                                                      Update your Account
                                                                       </h3>
                                                                       </td>
                                                                      </tr>
                                                                       <tr>
                                                                       
                                                                      
                                                                       <td align="right"><img src="images/User_icon_BLACK-01.png" height="20" width="20" style="bottom:-600px;" ></td><td align="center">
                                                                       <input type="text" name="C_name" value="<?php echo $name;?>"size="50px" placeholder="User name" />                                                                       
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                                             <td align="right"><img src="images/email-icon-88472.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       
                                                                       <td align="center">
                                                                    <input type="text" name="email" value="<?php echo $email;?>"size="50px" placeholder="Your email address" >
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                                             <td align="right"><img src="images/256-256-9bf01d3a6da700873303e2b4197c3e99-lock.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       
                                                                       <td align="center">
                                                                       <input type="password" name="password"value="<?php echo $pass;?>" size="50px" placeholder="Your password" >
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                        <td align="right"><img src="../images/images.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                      <td align="left" colspan="2">
                                                                       <input type="file" name="c_image" /><img src="customer_image/<?php echo $image?>" width="75" height="90"/>
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
                                                                <td align="right"><img src="../images/44536.png" width="20" style="bottom:-600px;" ></td>
                                                                       <td colspan="2" style="right:-500">
                                                                       <select name="c_country"  disabled="disabled">
                                                                       <option><?php echo $country?></option>
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
                                                                       <td align="right"><img src="../images/city-building-icons-68708.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       <td align="right" colspan="2">
                                                                       <input type="text" name="c_city" value="<?php echo$city;?>"size="50"placeholder="city" >
                                                                       </td>
                                                                       
                                                                       </tr>
                                                                       <tr>
                                                                       <td align="right"><img src="../images/phone_icon.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                      <td align="right" colspan="2">
                                                                       <input type="text"  size="50"name="c_contact"value="<?php echo $contact;?>" placeholder="contact number" >
                                                                       </td>
                                                                       </tr>
                                                                       <tr>
                                                                       <td align="right"><img src="../images/contact-address-icon-4.png" height="20" width="20" style="bottom:-600px;" ></td>
                                                                       <td align="right" colspan="2">
                                                                       <input type="text" name="c_address" value="<?php echo $address;?>" placeholder="Address" size="50"required></textarea>
                                                                       </td>
                                                                       </tr>
                                                                        
                                                                       
                                                                       <tr>
                                                                       <td align="center" colspan="2">
                                                                       <input type="submit" value="Update" name="Update"/>
                                                                       </td>
                                                                       <td>
                                                                       </td>
                                                                       </tr>
                                                                       </table>
                                                                       
                                                                       </form>
                                                                       </div>
                                                                       
<?php
if(isset($_POST['Update'])){
	
		$ip = getIp();
		
		$customer_id=$c_id;
		$c_name = $_POST['C_name'];
		$c_email = $_POST['email'];
		$c_pass = $_POST['password'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		move_uploaded_file($c_image_tmp,"customer_image/$c_image");
		
		 $update_c = "update customers set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$customer_id'";
		 $run_update = mysqli_query($con, $update_c); 
		if($run_update)
		{
			echo"<script>alert('Your account has been succesfully updated!!')</script>";
			echo"<script>window.open('my_account.php','_self')</script>";
			
			}
		
		
		
	}



	



?>
