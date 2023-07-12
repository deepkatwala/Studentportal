<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
	  
	  $cid=$_GET['aticid'];

?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>College Admission Management System</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
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
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           View Application
          </h3>

          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Selected Application
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
<table class="table mb-0">
 <thead>
                <tr>
                  <th>S.NO</th>
				  <th>Employee Name</th>
                  <th>From Date</th>
                   <th>To Date</th>
                   <th>Total days</th>
				   <th>Total leaves</th>
				   <th>Present day</th>
				   <th>Salary</th>
                   <th>Action</th>
                </tr>
              </thead>

<?php
  $query2 =mysqli_query($con,"select tbladmapplications.ID as uid,tblsalary.id as acid,tblsalary.from_date as fid,tblsalary.to_date as tid,tblsalary.no_days as nid,tblsalary.no_leaves as lday,tblsalary.present_days as pday,tblsalary.net_pay1 as net,tbluser.* from tbladmapplications inner join tblsalary on tbladmapplications.UserId = tblsalary.userid inner join tbluser on tbladmapplications.Userid=tbluser.ID where tbladmapplications.ID='$cid'");

$cnt=1;
while ($row = mysqli_fetch_array($query2))
{

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
				  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                  <td><?php  echo $row['fid'];?></td>
                  <td><?php  echo $row['tid'];?></td>
				  <td><?php  echo $row['nid'];?></td>
				  <td><?php  echo $row['lday'];?></td>
				  <td><?php  echo $row['pday'];?></td>
				  <td><?php  echo $row['net'];?></td>
                  
         
                  <td><a href="view-monthlybreakup.php?acid=<?php echo $row['acid'];?>" title="view Salary Breakup"><i class="la la-money"></i></a> | <a href="edit-monthlybreakup.php?acid=<?php echo $row['acid'];?>" title="edit Salary Breakup"><i class="la la-edit"></i></a>   </td>
                  </td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>


</table>           
 
<?php }
	  ?>
