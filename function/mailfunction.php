<?php
$errors = array();

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  $message = mysqli_real_escape_string($db, $_POST['message']);
  $phone_no = mysqli_real_escape_string($db, $_POST['phone_no']);
  
  
 if (empty($email)) { 
 array_push($errors, "Email is required!"); 
                    }
 if(filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
	  array_push($errors, "Invalid email address!");
	                                                  }
 if (empty($subject)) { 
 array_push($errors, "Please enter the subject!"); 
                      }
 if (empty($message)) { 
 array_push($errors, "Please type your message"); 
                    }
				
                                                                                                 
  if (count($errors) == 0) {
	echo"<script>alert('message has been sent!')</script>";
		echo"<script>window.open('index.php?my_account','_self');</script>";
                           }
						   else{
							   echo"<script>alert('message cannot be sent!')</script>";
		echo"<script>window.open('index.php?my_account','_self');</script>";
}
}
	?>
  