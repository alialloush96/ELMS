<?php
include('includes/config.php');

$isread=0;
$sql = "SELECT id from tblleaves where IsRead=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();
echo htmlentities($unreadcount);

?>
