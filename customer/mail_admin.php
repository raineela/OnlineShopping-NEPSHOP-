
 <?php
 ob_start();
 //include("connect.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

 if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

	 
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
    $mail->setFrom($email);      //from customer
   $mail->addAddress("nepshop11@gmail.com", 'Nep-Shop');     //  to admin (Add a recipient)
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

						
						

//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	 include("my_account.php");
	echo"<a href='my_account.php'>";
	
      
} 
catch (Exception $e) {
    echo 'Email could not be sent.';

}
 }
?>

<?php //include('function/mailfunction.php')?>
<html>
<head>
<title>custom email</title>
 <link rel="stylesheet" href="styles/stylepayment.css">
</head>
<body>
  <div class="header">
  	<h1>Mail</h1>
    <h2>All the fields are required to be filled</h2>
  </div>
  <form method="post" action="mail_admin.php" enctype="multipart/form-data">
   <div class="input-group">
    <label>Email</label>
  	  <input type="text" placeholder="your email" name="email">
    	</div>
    <div class="input-group">
    <label>Subject</label>
  	  <input type="text" placeholder="mail subject" name="subject">
    	</div>
    <div class="input-group">
    <label>Message</label>
  	  <textarea placeholder="mail message" input type="text" name="message"></textarea>
      </div>
                    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="submit"> Send </button>
  	</div>
 
  </form>

               
</body>
</html>