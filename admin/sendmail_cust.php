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
   $mail->addAddress($email);     //  to mee (Add a recipient)
    

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

<?php //include('function/mailfunction.php')?>
<html>
<head>
<title>custom email</title>
 <link rel="stylesheet" href="styles/stylepayment.css">
 <script type="text/javascript" language="javascript">
 function validateform()
					{
						var z=document.forms["myform"]["email"].value;
							if(z == null || z == "")
									{
									alert("Empty email");
									return false;
									}
												else
	
													var atpos=document.myform.email.value.indexOf("@");
													var dotpos=document.myform.email.value.lastIndexOf(".com");
															if(atpos<1|| dotpos<atpos+2 || dotpos+2 >= z.length)
																{
																	alert("not a valid email");
																	return false;
		
																}
					
					return true;
					}
					</script>
</head>
<body>
  <div class="header">
    <h2>All the fields are required to be filled.</h2>
  </div>
  <form method="post" action="sendmail_cust.php" enctype="multipart/form-data" onSubmit="return validateform()" name="myform">
    <div class="input-group">
    <label>To</label>
  	  <input type="text" placeholder="customer email" name="email">
      	</div>
    <div class="input-group">
    <label>Topic</label>
  	  <input type="text" placeholder="mail subject" name="subject">
    	</div>
    <div class="input-group">
    <label>Message</label>
  	  <textarea placeholder="mail message" input type="text" name="message"></textarea>
      </div>
       <div class="input-group">
    <label>Attachment</label>
      <input type="file" placeholder="choose file" name="attachment">
      </div>
                    
  	<div class="input-group">
  	  <button type="submit" class="btn" name="submit"> Send Mail </button>
  	</div>
 
  </form>

               
</body>
</html>