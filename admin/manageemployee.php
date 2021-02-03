<?php

include('includes/config.php');
include('includes/function.php');
include('../includes/myFunctions.php');




$lifetime=86400;
session_start();
setcookie('myCookie',session_id(),time()+$lifetime);

// $lifetime=86400;
// setcookie('sessid', $sessionid,time()+$lifetime);
// session_start();


error_reporting(0);


if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{
// code for Inactive  employee
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee.php');
}

// code for make employee as supervisor
    if(isset($_GET['empid']))
    {
        $id=$_GET['empid'];
        $roll=1;
        $sql = "update tblemployees set roll=:roll  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id, PDO::PARAM_STR);
        $query -> bindParam(':roll',$roll, PDO::PARAM_STR);
        $query -> execute();
        header('location:manageemployee.php');
    }


//code for active employee
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();

header('location:manageemployee.php');
}


//code for make supervisor as employee
    if(isset($_GET['supid']))
    {
        $id=$_GET['supid'];
        $roll=0;
        $sql = "update tblemployees set roll=:roll  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':id',$id, PDO::PARAM_STR);
        $query -> bindParam(':roll',$roll, PDO::PARAM_STR);
        $query -> execute();

        header('location:manageemployee.php');
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Admin | Manage Employees</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="FreeIT" />

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">


        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
/* Our editemployee */
#example{
  display: block;
  overflow-x: auto;
  white-space: nowrap;
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>

       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Manage EmployesWWW</div>
                    </div>

                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Employees Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>Sr no</th>
                                            <th>Emp Id</th>
                                            <th>Full Name</th>
                                            <th>Department</th>
                                             <th>Status</th>
                                            <th>Role</th>
                                            <th>Passport </th>
                                            <th>Card </th>
                                            <th>Visa </th>
                                             <th>Reg Date</th>
                                             <th>Objects</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
<?php $sql = "SELECT EmpId,FirstName,LastName,Department,Status,RegDate,id,roll,Passport_valid,idcard_valid, Visa_valid  from  tblemployees";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{


foreach($results as $result)
{
  $daysVisa=deffirentDate($result->Visa_valid);
  $daysPassport=deffirentDate($result->Passport_valid);
  $daysCard=deffirentDate($result->idcard_valid);
  $empname=$result->FirstName.' '.$result->LastName;
  if(isset($_COOKIE["myCookie"])){
      setcookie("myCookie", "", time()-60);
  } else{
    sendEmailValid($empname,$daysVisa, "Visa");
      sendEmailValid($empname,$daysPassport, "Passport");
        sendEmailValid($empname,$daysCard, "Card");
  }






?>
    <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($result->EmpId);?></td>
        <td><?php echo htmlentities($result->FirstName);?>&nbsp;<?php echo htmlentities($result->LastName);?></td>
        <td><?php echo htmlentities($result->Department);?></td>

         <td><?php $stats=$result->Status;
if($stats){
         ?>
             <a class="waves-effect waves-green btn-flat m-b-xs">Active</a>
             <?php } else { ?>
             <a class="waves-effect waves-red btn-flat m-b-xs">Inactive</a>
             <?php } ?>
         </td>
        <td><?php $roll=$result->roll;
            if($roll){
                ?>
                <a class="waves-effect waves-green btn-flat m-b-xs"
                   href="manageemployee.php?supid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to make this Employee as supervisor?');""
                >Supervisor</a>
            <?php } else { ?>
                <a class="waves-effect waves-red btn-flat m-b-xs"
                   href="manageemployee.php?empid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to make  this supervisror as employee?');""
                >Employee</a>
            <?php } ?>
        </td>
          <td <?php if($daysPassport<=30){?>style="background:lightcoral;"<?php }?>><?php echo htmlentities($result->Passport_valid);?></td>
          <td <?php if($daysCard<=30){?>style="background:lightcoral;"<?php }?> ><?php echo htmlentities($result->idcard_valid);?></td>
          <td <?php if($daysVisa<=30){?>style="background:lightcoral;"<?php }?>><?php echo htmlentities($result->Visa_valid);?></td>
          <td><?php echo htmlentities($result->RegDate);?></td>
          <td><a href="objectrateemp.php?empid=<?php echo htmlentities($result->id);?>">show object</a></td>

          <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>"><i class="material-icons">mode_edit</i></a>
              <?php if($result->Status==1)
               {?>
              <a href="manageemployee.php?inid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to inactive this Employe?');"" > <i class="material-icons" title="Inactive">clear</i>
              <?php } else {?>
          <a href="manageemployee.php?id=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to active this employee?');""><i class="material-icons" title="Active">done</i>
          <?php } ?> </td>
      </tr>
    <?php

               ?>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>

       <script></script>



    </body>
</html>
<?php } ?>
