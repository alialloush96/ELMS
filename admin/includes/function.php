<?php

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

function sendEmailValid($empName,$daysVlid,$nameValid){
  if($daysVlid==30){

    $mail = new PHPMailer;
    $subject="The " . $nameValid ."  Date Will Expire";

    $bodycontent='<p>Employee '.$empName.' '.$nameValid.' will end through 10 days</p>';
    $bodycontent2= '';
    sendEmail($mail,$_SESSION['email'],"Center Management",$subject,$bodycontent,$bodycontent2);
    return true;
  } else if($daysVlid!=30) {
    return false;
  }


}

// function to send email if visa / passport / card expired
function checkedSendEmail($checkvalid , $boolVal , $id,$checkvalid1){
  include('config.php');

  if($boolVal){

    $checkvalid=1;
    $sql1 = "update tblemployees set ".$checkvalid1."=:checkvalid  WHERE id=:id";
    $query1 = $dbh->prepare($sql1);
    $query1 -> bindParam(':id',$id, PDO::PARAM_STR);
    $query1 -> bindParam(':checkvalid',$checkvalid, PDO::PARAM_STR);
    $query1 -> execute();
  }
  else {
    $checkvalid=0;
    $sql1 = "update tblemployees set ".$checkvalid1."=:checkvalid  WHERE id=:id";
    $query1 = $dbh->prepare($sql1);
    $query1 -> bindParam(':id',$id, PDO::PARAM_STR);
    $query1 -> bindParam(':checkvalid',$checkvalid, PDO::PARAM_STR);
    $query1 -> execute();
  }

}


?>
