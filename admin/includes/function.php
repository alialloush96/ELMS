<?php
error_reporting(0);
 include('../../includes/myFunctions.php');

 ///Import PHPMailer classes into the global namespace
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require '../PHPMailer/Exception.php';
 require '../PHPMailer/PHPMailer.php';
 require '../PHPMailer/SMTP.php';

  function setDate($date){
    $getdate = str_replace('/', '-', $date);
    $setDate=date("Y-m-d", strtotime($getdate) );
    return $setDate;
  }


function deffirentDate($val_valid){
  $start_date=strtotime($val_valid);
  $end_date=strtotime(date("Y-m-d"));
  $defferint=abs($end_date-$start_date);
  $days=round(((($defferint/60)/60)/24),0);

  return $days;

}
?>


<?php

function sendEmailValid($empName,$daysVlid,$nameValid){

  if($daysVlid==0){

    $mail = new PHPMailer;
    $subject="The " . $nameValid ."  Date Will Expire";

    $bodycontent='<p>Employee '.$empName.' '.$nameValid.' will end through 10 days</p>';
    $bodycontent2= '';
    sendEmail($mail,$_SESSION['email'],"Center Management",'reeham.new21@gmail.com','hanadiokla@gmail.com',$subject,$bodycontent,$bodycontent2);
  }

}
?>
