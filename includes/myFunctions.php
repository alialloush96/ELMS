<?php
function sendEmailToEmp($mail,$empemail,$empname,$subject,$bodycontent,$bodycontent2){

  include('includes/config.php');
  $mail->Encoding = 'base64';

  $mail->isSMTP();                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;               // Enable SMTP authentication
  $mail->Username = 'reeham.new21@gmail.com';   // SMTP username
  $mail->Password = 'reeHam@123';   // SMTP password
  $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                    // TCP port to connect to

  // Sender info
  $mail->setFrom( $mail->Username , $empname);
  // $mail->addReplyTo('hanadiokla@gmail.com', 'CodexWorld');

  // Add a recipient
  $mail->addAddress($empemail);//ad
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

}

 function sendEmail($mail,$empemail,$empname,$subject,$bodycontent,$bodycontent2){

   include('includes/config.php');

   $adminemail="";
   $sql = "SELECT email  from  admin";
   $query = $dbh -> prepare($sql);
   $query->execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
   $cnt=1;
   if($query->rowCount() > 0)
   {


   foreach($results as $result)
   {
     $adminemail=$result->email;
   }
   }

   $supemail='';
   $sql = "SELECT EmailId  from  tblemployees where roll = 1";
   $query = $dbh -> prepare($sql);
   $query->execute();
   $results=$query->fetchAll(PDO::FETCH_OBJ);
   $cnt=1;
   if($query->rowCount() > 0)
   {


   foreach($results as $result)
   {
     $supemail=$result->EmailId;
   }
   }


   $mail->Encoding = 'base64';

   $mail->isSMTP();                      // Set mailer to use SMTP
   $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
   $mail->SMTPAuth = true;               // Enable SMTP authentication
   $mail->Username = 'reeham.new21@gmail.com';   // SMTP username
   $mail->Password = 'reeHam@123';   // SMTP password
   $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
   $mail->Port = 587;                    // TCP port to connect to

   // Sender info
   $mail->setFrom( $mail->Username , $empname);
   // $mail->addReplyTo('hanadiokla@gmail.com', 'CodexWorld');

   // Add a recipient
   $mail->addAddress($adminemail);//ad

   $mail->addCC( $supemail);
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

 }

?>
