<?php
    require 'phpmailer/PHPMailerAutoload.php';

    //we need to create an instance of PHPMailer
    $mail = new PHPMailer();

    //set where we are sending email
    $mail->addAddress('nepshop11@gmail.com', 'Senaid Bacinovic');

    //set who is sending an email
    $mail->setFrom('zlamsong22@gmail.com', 'Admin at CPI');

    //set subject
    $mail->Subject = "Test email!";

    //type of email
    $mail->isHTML(true);

    //write email
    $mail->Body = "<p>this is our email body</p><br><br><a href='http://google.com'>Google</a>";

    //include attachment
    $mail->addAttachment('fbcover.png', 'Facebook cover.png');

    //send an email
    if (!$mail->send())
        echo "Something wrong happened!";
    else
        echo "Mail sent";
?>
