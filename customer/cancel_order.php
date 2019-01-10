
 <?php
 ob_start();
 
 session_start();

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
    $mail->Subject = "Your Order cancellation has been requested";
    $mail->Body    = "Dear $email your order cancellation has been requested.Please look forward for further emails required for the process.Thank YOU!!"

						."Check out Your order "?>
                        <html>
						<a href='customer/my_account.php'><p>here</p></a>
						<?php
						

//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Order cancellation has been requested.';
      
} 
catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

}
 }
?>

<?php include('function/paymentfun.php')?>
