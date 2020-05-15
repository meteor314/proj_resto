<?php
session_start();
require('connect_db.php');
            require 'email/class.phpmailer.php';
			require 'email/class.smtp.php';
			$mail = new PHPMailer;
			$mail->CharSet = 'UTF-8';
			$sql="SELECT email FROM member";
			foreach ($db->query($sql) as $row) {
				$mail->AddAddress($row['email']);
			  print_r($row['email']);
			}
			$txt = '
				<div style=" background:#eee;" align="center"> <br />
				
					<div  style="font-family : freemono; width: 350px; background-color: white; padding: 5px; ;">
						<h1  style="color: white; background: #242943; width: 100%; text-align: center; height: 120px;"> Commande de plat!</h1> <br /> 
						<img src="cid:logo_2u" alt="Le logo du site e-encyclopedia" width="180px">
						<hr />
                    
                        Votre plat est prêt ! </i>
					</div>  <br />
			   
			    </div>
				
				';
			//
			$mail->Subject = 'Commnde est prêt !';
			$mail->Body = $txt;
			$mail->isHTML(true);
			$mail->IsSMTP();
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'ssl://smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Port = 465;
			//existing gmail address as user name
			$mail->Username = 'meteor31415@gmail.com';
			//Set the password of  gmail address here
			$mail->Password = 'rrhnzncaijqzvids';
			if(!$mail->send()) {
			  	$error =  'Email is not sent.  PLease try again! <br />';
			  	$error =  'Email error: ' . $mail->ErrorInfo;
		      	//$error = $db->prepare("DELETE FROM member WHERE email = ?" );
		      	//$error->execute(array($email) );
			} else {
			  $error =  'Email has been sent. ';    
	           // $updateText = $db->prepare("UPDATE member SET token = 3 WHERE email = ?");
	            //$updateText->execute(array($email) );
			}
/* send email */