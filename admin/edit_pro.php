<?php
include("includes/db.php");
if(!isset($_SESSION['user_email']))
{
	echo"<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
	}
	else
	{
		

if(isset($_GET['edit_pro']))
{
	$get_id=$_GET['edit_pro'];
	$get_pro="Select * from product where product_id='$get_id'";
$run_pro=mysqli_query($con,$get_pro);
$i=0;
$row_pro=mysqli_fetch_array($run_pro);

	$pro_id=$row_pro['product_id'];
	$pro_title=$row_pro['product_title'];
	$pro_image=$row_pro['product_image'];
	$pro_price=$row_pro['product_price'];
	$pro_desc=$row_pro['product_desc'];
	$pro_keywords=$row_pro['product_keyword'];
	$pro_cat=$row_pro['product_cats'];
	$pro_brand=$row_pro['product_brand'];
	
	$get_cat="select * from categories where cat_id='$pro_cat'";
	$run_cat=mysqli_query($con,$get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$category_title=$row_cat['cat_title'];
	
	
	$get_brand="select * from brands where brand_id='$pro_brand'";
	$run_brand=mysqli_query($con,$get_brand);
	$row_brand=mysqli_fetch_array($run_brand);
	$brand_title=$row_brand['brand_title'];
	
}
?>
<html>
<head>
<title>Inserting_product</title>
<link rel="stylesheet" href="../styles/style2.css">

</head>
<body>
<form action=""  method="post" enctype="multipart/form-data">

<table  border="2px" width="795" align="center" bgcolor="#1DE9B6">
    <tr>
        <td colspan="2"><h2><center>Edit and Update product</center></h2></td>
    </tr>
        <tr>
        <td align="right"><b>Product Title:</b></td>
        <td><input type="text" name="product_title" value="<?php echo $pro_title;?>"></td>
        </tr>
                <tr>
                <td align="right"><b>Product categories:</b></td>
                <td>
                <select name="product_cat" >
                <option><?php echo $category_title;?></option>
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
<td align="right"><b>Product brand:</b></td>
<td><select name="product_brands" value="<?php echo $pro_brand;?>">
<option><?php echo $brand_title;?></option>
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
<td align="right"><b>Product image:</b></td>
<td><input type="file" name="product_image" formenctype="multipart/form-data"><img src="product_images/<?php echo $pro_image;?>"w width="65" height="65"></td>
</tr>
<tr>
<td align="right"><b>Product price:</b></td>
<td><input type="text" name="product_price" value="<?php echo $pro_price;?>"></td>
</tr>
<tr>
<td align="right"><b>Product description</b></td>
<td><textarea cols="50" rows="20" name="product_desc"> <?php echo $pro_desc;?></textarea></td>
</tr>

<tr>
<td align="right"><b>Product keyword:</b></td>
<td><input type="text" name="product_keyword" value="<?php echo $pro_keywords;?>"></td>
</tr>
<tr align="center">

<td colspan="2"><input type="submit" name="update_product" value="Update product"></td>
</tr>

</table>
</body>
</html>
<?php
if(isset($_POST['update_product']))
{
	$update_id=$pro_id;
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brands'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keyword=$_POST['product_keyword'];
	
	$product_image=$_FILES['product_image']['name'];
	$product_image_temp=$_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_temp,"product_images/$product_image");
	
	$update_product="update product set product_cats='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keyword='$product_keyword' where product_id='$update_id'";
	
	$run_product=mysqli_query($con,$update_product);
	if($run_pro)
	{
		echo"<script>alert('Products has been updated');</script>";
		echo"<script>window.open('index.php?view_product','_self')</script>";}
	
	}




?>
<?php } ?>









