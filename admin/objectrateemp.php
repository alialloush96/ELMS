<?php

include('includes/config.php');
include('includes/function.php');
// include('../includes/myFunctions.php');
// $re=$GET['empid'];
$re=$_GET['empid'];
session_start();


error_reporting(0);


if(strlen($_SESSION['alogin'])==0)
    {
header('location:index.php');
}
else{
// code for Inactive  employee
if(isset($_GET['obid']))
{
  echo "welcome";
// $id=$_GET['delid'];
// $sql = "delete from  objects  WHERE id=:id";
// $query = $dbh->prepare($sql);
// $query -> bindParam(':id',$id, PDO::PARAM_STR);
// $query -> execute();
 header("location:objectrateemp.php?empid=$re");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title>Employee | Manage object</title>

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
    </style>
</head>
    <body>
       <?php include('includes/header.php');?>

       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Manage Object</div>
                    </div>

                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Object Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>



                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>Object Name</th>
                                            <th>Description</th>
                                            <th>Rate</th>
                                        </tr>
                                    </thead>

                                    <tbody>
<?php $sql = "SELECT *  from  objects where emp_id='$_GET[empid]'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$countRate=0;
if($query->rowCount() > 0)
{


foreach($results as $result)
{



?>
    <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($result->object_name);?></td>
        <td><?php echo htmlentities($result->description);?>&nbsp;<?php echo htmlentities($result->LastName);?></td>
        <td>
          <input class="input-field col m2 s2" id='rate' name='rate' value="<?php echo htmlentities($result->rate);?>" >
          <label>%</label>
        </td>
        <td><?php echo $hend;?></td>


        <td>
          <a href="objectrateemp.php?obid=<?php echo htmlentities($result->id);?>"><i class="material-icons" title="Active">done</i></a>
       </td>

    </tr>
    <?php

    ?>
                                         <?php $cnt++;
                                         $countRate+=$result->rate;
                                       } }?>
                                    </tbody>
                                    <tfoot ><tr style="font-weight: bold; color:#00acc1;">
                                              <td colspan='3' >Total</td>
                                              <td colspan='3'>
                                                <input class="input-field col m3 s2" id='total' name='total' value="  <?php echo  $countRate; ?>  %" style="border:none;"  readonly >

                                              </td>
                                            </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
        <div class="left-sidebar-hover"></div>

        <!-- Javascripts -->
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
