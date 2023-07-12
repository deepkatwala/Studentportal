<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
	 $cid=$_GET['aticid']; 
	 $leavetype = $_POST['leave_type'];
	 $fromdate = $_POST['fromdate'];
	 $date1= date("Y-m-d",strtotime($fromdate));
	 $todate = $_POST['todate'];
	 $date2= date("Y-m-d",strtotime($todate));
	 $nodays = $_POST['no_days'];
	 $reason = $_POST['reason'];
	$adminstatus= $_POST['admin_status'];
	$adminremark =$_POST ['admin_remark'];
	$date = date("Y-m-d");
	
	
	
	$query=mysqli_query($con, "update  tblleavesapply set leave_type='$leavetype',from_date='$date1',to_date='$date2', no_days='$nodays',admin_status='$adminstatus',admin_remark='$adminremark',admin_approval_date='$date' where id='$cid'");
 
    if ($query) {
    $msg="Admin Remark and Admin Status has been updated.";
	header("location:approve-leaves.php");
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
  }
$ret2=mysqli_query($con,"select tbladmapplications.*,tblleavesapply.* from tbladmapplications inner join tblleavesapply on tblleavesapply.user_id=tbladmapplications.UserId where tblleavesapply.id='$cid'");
	while ($row1=mysqli_fetch_array($ret2))
	{
		$userid=$row1['UserId'];
		$sick=$row1['is_sickleave'];
		
		$personal=$row1['is_personalleave'];
		
		$casual=$row1['is_casualleave'];
		
		$study=$row1['is_studyleave'];
		
		$total1 =$row1['is_totalleave'];
		$nodays=$row1['no_days'];
		$leavetype=$row1['leave_type'];
		$admin=$row1['admin_status'];
		if($leavetype == "Sick Leave" && $admin == 2)
		{
			$sick = $sick - $nodays;
			
			
			
		}
		
		elseif($leavetype == "Casual Leave" && $admin == 2)
		{ 
			$casual=$casual - $nodays;
			
			
				
			
		}
		elseif($leavetype == "Personal Leave" && $admin == 2)
		{ 
			$personal = $personal - $nodays;
			
		}
		elseif($leavetype == "Study Leave" && $admin == 2)
		{
			$study  =  $study - $nodays;
			
		}
		
		else
		{
			echo "Deep is calling";
		}
		
	}
	$query2=mysqli_query($con,"update tbladmapplications set is_sickleave ='$sick',is_personalleave='$personal',is_casualleave='$casual',is_studyleave='$study' where UserId='$userid'");
	
	$ret3 = mysqli_query ($con,"select * from  tbladmapplications where UserId = '$userid'");
	while ($r2 = mysqli_fetch_array($ret3))
	{
		
		$userid1=$r2['UserId'];
		$sick=$r2['is_sickleave'];
		
		$personal=$r2['is_personalleave'];
		
		$casual=$r2['is_casualleave'];
		
		$study=$r2['is_studyleave'];
		
	
		
		$total = $sick + $personal + $study + $casual;
		
		$query3 = mysqli_query($con, "update tbladmapplications set is_totalleave = '$total' where UserId ='$userid1'");
	}  
  
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Employee Kyc</title>
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
           Employee KYC Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
		  <div class=row style="margin-left:430px">
		  <img src="logo.png" alt="Diamondmela Jewels Ltd"  width="300px" height="80px" align="center">
		  </div>
        </div>
   
      </div>
      <div class="content-body">

<form name="submit" method="post" enctype="multipart/form-data">        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Kyc Form</h4>

                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php
$cid=$_GET['aticid'];
$ret=mysqli_query($con,"select tblleavesapply.*,tbluser.FirstName,tbluser.LastName from  tblleavesapply inner join tbluser on tbluser.ID=tblleavesapply.user_id where tblleavesapply.id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>


<div class="row">

<div class="col-xl-12 col-lg-12">
 <fieldset>
  <h5>Employeee Name(*)                    </h5>
   <div class="form-group">
   <input type="text" name='employee_name' id="employee_name" class="form-control white_bg" value ="<?php echo $row['FirstName'];?> <?php echo $row['LastName'];?>" readonly>
    
   
    </div>
</fieldset>
                   
</div>
<div class="col-xl-12 col-lg-12">
 <fieldset>
  <h5>Leave type(*)                    </h5>
   <div class="form-group">
   <select name="leave_type" id="leave_type" class="form-control white_bg">
     <option value="">Leave Type</option>
      <?php $query=mysqli_query($con,"select * from tblleavestype");
              while($r=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $r['leave_type'];?>"<?php if( $r['leave_type'] == $row['leave_type']){ echo "selected"; } ?>><?php echo $r['leave_type']; ?></option>
                  <?php } ?> 
   </select>
    
   
    </div>
</fieldset>
                   
</div>

 <div class="col-xl-12 col-lg-12">
                        <fieldset>
                          <h5>From Date
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="from_date" type=" " name="fromdate" value ="<?php echo $row['from_date'];?>">
                          </div>
                        </fieldset>
                      </div>
					
					  
					  <div class="col-xl-12 col-lg-12">
                        <fieldset>
                          <h5>To Date
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="to_date" type=" " name="todate"  value ="<?php echo $row['to_date'];?>">
                          </div>
                        </fieldset>
                      </div>
					  
					 
					  <div class="col-xl-12 col-lg-12">
                        <fieldset>
                          <h5>No of days
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="no_days" type="text" name="no_days"  value ="<?php echo $row['no_days'];?>">
                          </div>
                        </fieldset>
                      </div>
					 
					
					  <div class="col-xl-12 col-lg-12">
                        <fieldset>
                          <h5>Reason
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="reason" type="text" name="reason" value ="<?php echo $row['reason'];?>"readonly>
                          </div>
                        </fieldset>
                      </div> 
 <div class="col-xl-12 col-lg-12">
                        <fieldset>
                          <h5>Admin Remark
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" name="admin_remark" type="text" id="admin_remark"  value ="<?php echo $row['admin_remark'];?>">
                          </div>
                        </fieldset>
                      </div> 					 
					  
 

 <div class="col-xl-12 col-lg-12">
                        <fieldset>
                          <h5>Admin Status
                         
                          </h5>
                          <div class="form-group">

  <select name="admin_status" class="form-control white_bg" required="true" >
     <option value="1"<?php 
	if($row['AdminStatus'] == 'Approved') 
	{ 
	echo "selected";
	}
	?> >Approve</option>
     <option value="2" 
	 <?php 
	 if($row['AdminStatus'] == 'Not Approved') 
	 {  echo "selected";
 } 
 ?>
 >Not Approve</option>
   </select>
                          </div>
                        </fieldset>
                      </div> 
					 
					  
 
 </div>
  </div>
 <div class="row">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button>
</div>
</div>

                </div>
              </div>
            </div>
          </div>
        </section>
        <?php } ?>
        <!-- Formatter end -->
      </form>  
      </div>
    </div>
  </div>
<?php include('includes/footer.php');?>
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>
  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	  <script>
         $(function() {
            $("#from_date").datepicker({
    minDate: -30,
    maxDate: '+1Y+6M',
    onSelect: function (dateStr) {
        var min = $(this).datepicker('getDate'); // Get selected date
        $("#to_date").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
    }
});

$("#to_date").datepicker({
    minDate: '1',
    maxDate: '+1Y+6M',
    onSelect: function (dateStr) {
        var max = $(this).datepicker('getDate'); // Get selected date
        $('#datepicker').datepicker('option', 'maxDate',{ dateFormat: 'yyyy-mm-dd' }, max || '+1Y+6M'); // Set other max, default to +18 months
        var start = $("#from_date").datepicker("getDate");
        var end = $("#to_date").datepicker("getDate");
        var days = (end - start) / (1000 * 60 * 60 * 24);
        if (days==0)
        {
         c=1;
        $("#no_days").val(c);
        }
        else
        {
		days=days+1;
        $("#no_days").val(days);
    }
	}
});
         });
</script>
</body>
</html>
  <?php }?>
  