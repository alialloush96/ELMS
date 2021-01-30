<?php

 function sendEmail($mail,$empemail,$empname,$adminemail,$superevmail,$subject,$bodycontent,$bodycontent2){

   $mail->Encoding = 'base64';

   $mail->isSMTP();                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;               // Enable SMTP authentication
   $mail->Username = '';   // SMTP username
   $mail->Password = '';   // SMTP password
   $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 587;                    // TCP port to connect to

   // Sender info
   $mail->setFrom($empemail, $empname);
   // $mail->addReplyTo('hanadiokla@gmail.com', 'CodexWorld');

   // Add a recipient
   $mail->addAddress($adminemail);//ad

   $mail->addCC($superevmail);
   //$mail->addBCC('bcc@example.com');

   // Set email format to HTML
   $mail->isHTML(true);

   // Mail subject
   $mail->Subject = $subject;

   // Mail body content
   $bodyContent = $bodycontent;
   $bodyContent .=$bodycontent2;
   $mail->Body    = $bodyContent;

   // Send email
   if(!$mail->send()) {
       echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
   } else {
       echo 'Message has been sent.';
   }
   // // Add attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');
   // $mail->addAttachment('/assets/images', 'mountains1.png'); // Optional name
     //your code

 }

?>
