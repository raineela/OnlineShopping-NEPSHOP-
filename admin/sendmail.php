<?php
include("includes/db.php");
$get_c="Select * from customers";
$run_c=mysqli_query($con,$get_c);
$i=0;
while($row_c=mysqli_fetch_array($run_c))
{
	$c_email=$row_c['customer_email'];
}
?>
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
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
			$file = "attachment/" . basename($_FILES['attachment']['name']);
			move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
		} else
			$file = "";

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
   $mail->addAddress( $c_email);     //  to mee (Add a recipient)
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
	$mail->addAttachment($file);

						
						

//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	echo "Email has been sent";
	
      
} 
catch (Exception $e) {
    echo 'Email could not be sent.';

}
 }
?>
<?php include("index.php");?>
<table width="795" bgcolor="transparent" align="right">
<tr align="center"></tr>
<tr align="center" bgcolor="#84FFFF">
<th> All the fields are required to be filled</th><tr>
<html>
<head>
<title>email</title>
 <link rel="stylesheet" href="styles/stylepayment.css">
</head>
<body>
<tr align="center"</h2>
  <form method="post" action="sendmail.php" enctype="multipart/form-data">
  <th> <div class="input-group">
    <label>Topic</label>
  	  <input type="text" placeholder="mail subject" name="subject">
    	</div></th>
  <th> <div class="input-group">
    <label>Message</label>
  	  <textarea placeholder="mail message" input type="text" name="message"></textarea>
      </div></th>
    <th> <div class="input-group">
    <label>Attachment</label>
      <input type="file" placeholder="choose file" name="attachment">
      </div></th></tr>
                    
  	<th><div class="input-group">
  	  <button type="submit" class="btn" name="submit"> Send Mail </button>
  	</div></th>
 </form>
               
</body>
</html>