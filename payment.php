
 <?php
 ob_start();
 //session_start();

 //include("connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 if (isset($_POST['submit'])) {
		$email = $_POST['email'];
	 
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
 
  


  
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
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
   $mail->addAddress($email);     //  to mee (Add a recipient)
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Your payment";
    $mail->Body    = "Dear $email your payment is successful!!"

						."Check out Your orders from the website.Thank You "?>
                        <html>
						<a href='customer/my_account.php'><p>here</p></a>
						<?php
						

//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Your payment is successful!';
      
} 
catch (Exception $e) {
    echo 'Error in payment! Please enter your info correctly. ', $mail->ErrorInfo;

}
 }
?>

<?php include('function/paymentfun.php')?>
<html>
<head>
<title>Payment Form</title>
 <link rel="stylesheet" href="styles/style4.css">
</head>
<body>
  <div class="header">
  	<h1>Pay with debit or credit card</h1>
    <h2>We don’t share your financial details with the merchant.</h2>
  </div>
<form method="post" action="payment.php" enctype="multipart/form-data">
    <div class="input-group">
  	  <input type="text" placeholder="First name" name="first_name">
      	</div>
    <div class="input-group">
  	  <input type="text" placeholder="Last name" name="last_name">
  	</div>
    <div class="input-group">
  	  <input type="email" placeholder="Email" name="email">
  	</div>
  	<div class="input-group">
  	  <input type="password" placeholder="Password" name="password">
  	</div>
     <div class="input-group">
  	  <input type="text" placeholder="Billing address" name="address">
  	
    <div class="input-group">
  	  <label>Country</label><select> <option placeholder="nationality" value="nepal">Nepal</option>
                                                           <option placeholder="nationality" value="nepal">India</option>
                                                           <option placeholder="nationality" value="nepal">Bangladesh</option>
                                                           <option placeholder="nationality" value="nepal">Pakistan</option>
                                                           <option placeholder="nationality" value="nepal">Bhutan</option>
                                                           <option placeholder="nationality" value="nepal">Sri Lanka</option>
                                                           <option placeholder="nationality" value="nepal">China</option> 
                                                    </select>
                                                  
    </div>
                                                     
    <div class="input-group">
  	  <input type="text" placeholder="Phone number" name="phone_no">
  	</div>
    <div class="input-group">
  	  <input type="text" placeholder="Card number" name="card_no">
  	</div>
  	<div class="input-group">
  	  <input type="text" placeholder="Expires(MM/YY)" name="expires">
  	</div>
    <div class="input-group">
  	  <input type="text" placeholder="CSC(3 digit)" name="csc">
  	</div>
    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="submit">Agree & Pay</button>
  	</div>
 
  </form>
</body>
</html>