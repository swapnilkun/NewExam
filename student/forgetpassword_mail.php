<?php
include('include/configure.php');

		if(!isset($_POST['email']) || empty($_POST['email'])){

		    
			redirect_to('index.php?blank=1');
		} 
		else
		{
			$query="select * from student where student_email='".$_POST['email']."'";
			$result_set = mysqli_query($con,$query);
			confirm_query($result_set);
			if (mysqli_num_rows($result_set) == 1)
			{
				$found_user = mysqli_fetch_array($result_set);
				$query_center=mysqli_fetch_array(mysqli_query($con,"select * from teacher where c_id='".$found_user['center_id']."'"));



				$to =$_POST['email'];
				
				$subject=constant('TI_MAIL_FORGET_SUBJECT')." ".$found_user['student_name'];
               
				$message .= "<b style='font-size:20px;line-height:25px'>". htmlspecialchars($query_center['centername'], ENT_QUOTES) ." (" . htmlspecialchars($query_general_setting['g_organization'], ENT_QUOTES) . ")</b>,<br><br>\n";

				$message .= "Hello " . htmlspecialchars($found_user['student_name'], ENT_QUOTES) . ",<br><br>\n";
				$message .= "<b>Your Email:</b> " . htmlspecialchars($_POST['email'], ENT_QUOTES) . "<br>\n";
				$message .= "<b>Your Password: </b>" . htmlspecialchars($found_user['password'], ENT_QUOTES) . "<br><br><br>\n";
				$message .= "<b style='font-size:15px;line-height:20px'>Best Regards,</b><br>\n";	
				$message .= $query_center['centername']."<br>\n";
				$message .= "<b>Contact:</b> ".$query_center['phoneno']."<br>\n";
                
				$headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-1\r\n";			
				$headers .= "From: \"" . $query_general_setting['g_organization'] . "\" <" . $query_general_setting['g_email'] . ">\r\n";
				$headers .= "Reply-To: Auto generated mail. Please not replay.\r\n";
				
				$message = utf8_decode($message);
				
				$mail_sent=mail($to, $subject, $message, $headers);
				
				if ($mail_sent){
				redirect_to('index.php?forget=1');
				}else{
				redirect_to('index.php?error=error');
				}


			}
			else
			{
				
				redirect_to('index.php?mail=1');
			}
		}
		?>