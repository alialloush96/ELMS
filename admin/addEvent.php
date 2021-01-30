<?php
include('includes/config.php');




session_start();
error_reporting(0);



if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
$empid=$_SESSION['eid'];
$leavetype=$_POST['leavetype'];
$description=$_POST['description'];

    $datetime=$_POST['datetime'];
    $cometime=$_POST['cometime'];


$status=0;
$isread=0;
if($datetime > $cometime){
                $error=" ToDate should be greater than FromDate ";
 }else{
   $sql="INSERT INTO tblleaves(LeaveType,Description,Status,IsRead,empid,leaveTime,comeTime) VALUES(:leavetype,:description,:status,:isread,:empid,:datetime,:cometime)";
   $query = $dbh->prepare($sql);
   $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
   $query->bindParam(':datetime',$datetime,PDO::PARAM_STR);
   $query->bindParam(':cometime',$cometime,PDO::PARAM_STR);
   $query->bindParam(':description',$description,PDO::PARAM_STR);
   $query->bindParam(':status',$status,PDO::PARAM_STR);
   $query->bindParam(':isread',$isread,PDO::PARAM_STR);
   $query->bindParam(':empid',$empid,PDO::PARAM_STR);
   $query->execute();
   $lastInsertId = $dbh->lastInsertId();
   if($lastInsertId)
   {
   $msg="Leave applied successfully";

   }
   else
   {
   $error="Something went wrong. Please try again";
   }

 }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title>Admin | Add Event</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="FreeIT" />

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
    <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
</head>
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

  </style>

    </head>
    <body>
  <?php include('includes/header.php');?>

       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title"></div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3> Add Event</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php }
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


<div class="input-field col m12 s12">
  <label for="empName">Employee name</label>
  <input id="empName" name="empName" type="text" autocomplete="off" required>
</div>

<div class="input-field col m12 s12">
  <label for="eventtName">Event name</label>
  <input id="eventName" name="eventName" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
          <div class="form-group">
            <label for="eventime">Event Date</label>
            <input type="text" class="form-control" id="eventime" name="eventime" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy HH:MM" data-inputmask-placeholder="dd/mm/yyyy  hh:mm" required>
          </div>
</div>

</div>
      <button type="submit" name="add" id="add" class="waves-effect waves-light btn indigo m-b-xs">Add</button>

                                                </div>
                                            </div>
                                        </section>


                                        </section>
                                    </div>
                                </form>
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
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        <script src="../assets/js/pages/form-input-mask.js"></script>
        <script src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>



		<script>
           $('input').inputmask();
        </script>



         <script type="textt/javascript">


         </script>



    </body>
</html>
<?php } ?>
