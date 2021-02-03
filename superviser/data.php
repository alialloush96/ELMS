<?php
include('includes/config.php');
session_start();
$isread=0;
$sql = "SELECT tblleaves.id as lid,tblemployees.Department from tblleaves join tblemployees on tblleaves.empid=tblemployees.id where tblemployees.Department='$_SESSION[department]' and tblleaves.IsRead=:isread" ;
// $sql = "SELECT id from tblleaves where IsRead=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();
echo htmlentities($unreadcount);

?>
