<?php
include("includes/db.php");
?>
<html>
<head>
<title>Inserting_product</title>
<link rel="stylesheet" href="../styles/style2.css">

</head>
<body>
<form action="inserting_product.php"  method="post" enctype="multipart/form-data">

<table  width="795" align="center" bgcolor="transparent">
    <tr>
        <tr align="center" bgcolor="#84FFFF"><td colspan="2"><h2><center>Insert new product here</center></h2></td>
    </tr>
        <tr>
        <td align="left"><b>Product Title:</b></td>
        <td><input type="text" name="product_title"></td>
        </tr>
                <tr>
                <td align="left"><b>Product categories:</b></td>
                <td>
                <select name="product_cat">
                <option>Select a category</option>
                <?php
                $get_cats="select * from categories";
                    $run_cats=mysqli_query($con,$get_cats);
                    while($row_cats=mysqli_fetch_array($run_cats))
                    {
                        $cat_id=$row_cats['cat_id'];
                        $cat_title=$row_cats['cat_title'];
                        
                        echo"<option value='$cat_id'>$cat_title</option>";
                        }
                
                ?>
                </select>
                
                </td>
                </tr>
<tr>
<td align="left"><b>Product brand:</b></td>
<td><select name="product_brands">
<option>Select brands</option>
<?php
$get_brands="select * from brands";
	$run_brands=mysqli_query($con,$get_brands);
	while($row_brands=mysqli_fetch_array($run_brands))
	{
		$brand_id=$row_brands['brand_id'];
		$brand_title=$row_brands['brand_title'];
		
		echo"<option value='$brand_id'>$brand_title</option>";
		}
	

?>

</select>
</td>
</tr>
<tr>
<td align="left"><b>Product image:</b></td>
<td><input type="file" name="product_image" formenctype="multipart/form-data"></td>
</tr>
<tr>
<td align="left"><b>Product price:</b></td>
<td><input type="text" name="product_price"></td>
</tr>
<tr>
<td align="left"><b>Product description</b></td>
<td><textarea cols="50" rows="20" name="product_desc"></textarea></td>
</tr>

<tr>
<td align="left"><b>Product keyword:</b></td>
<td><input type="text" name="product_keyword"></td>
</tr>
<tr align="center">

<td colspan="2"><input type="submit" name="insert_post" value="Insert now"></td>
</tr>

</table>
</body>
</html>

<?php
if(isset($_POST['insert_post']))
{
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brands'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keyword=$_POST['product_keyword'];
	
	$product_image=$_FILES['product_image']['name'];
	$product_image_temp=$_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_temp,"product_images/$product_image");
	
	$insert_product="insert into
	 product(product_cats,product_brand,product_title,product_price,product_desc,product_image,product_keyword)
	 values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keyword')";
	
	$insert_pro=mysqli_query($con,$insert_product);
	if($insert_pro)
	{
		echo"<script>alert('Products has been inserted succesfully');</script>";
		echo"<script>window.open('index.php?insert_product','_self')</script>";
	}
	
	?>
    <?php
include("includes/db.php");
$get_c="Select customer_email from customers where customer_interest_brands=$product_brand";
$run_c=mysqli_query($con,$get_c);
$i=0;
while($row_c=mysqli_fetch_array($run_c))
    {
	$c_email=$row_c['customer_email'];
	$c_name=$row_c['customer_name'];
	$i++;

    }?>
<?php
ob_start();
 //session_start();

 //include("connect.php");
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

//require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
	
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
 
  


  
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP(); 
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
                   )
                               );
    $mail->Host = 'tls://smtp.gmail.com:587';                                    // Set 
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username =  'nepshop11@gmail.com' ;  //admin           // SMTP username
    $mail->Password =  'nepshop11pass';                         // SMTP password
  //  $mail->SMTPSecure = 'tls'; 
                             // Enable TLS encryption, `ssl` also accepted
   // $mail->Port = 587;
                                   // TCP port to connect to

    //Recipients
    $mail->setFrom("nepshop11@gmail.com", 'Nep-Shop');      //from me  (admin)
   $mail->addAddress($c_email);     //  to mee (Add a recipient)
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "New Arrival!";
    $mail->Body    = "Dear $c_name".
	                 "new $product_brand products has been arrived recently in our store.";
	$mail->addAttachment($file);

						
						

//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	echo "Email has been sent";
	
      
    } 
catch (Exception $e) {
    echo 'Email could not be sent.';

                     }
					 ?>
	
	
<?php } ?>







