<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
	$eid=$_GET['editid'];
    $holiday=$_POST['holiday_name'];
	$fromdate=$_POST['from_date'];
	$date1= date("Y-m-d",strtotime($fromdate));
	$todate=$_POST['to_date'];
	$date2= date("Y-m-d",strtotime($todate));
	$ndays=$_POST['no_days'];
	$note=$_POST['note'];
	$date =date("Y-m-d");
     
    $query=mysqli_query($con, "update  tblholidays set holiday_name='$holiday',from_date = '$date1',to_date='$date2',no_days='$ndays',note='$note',create_date='$date' where ID=$eid");
    if ($query) {
    $msg="Holiday has been Update.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>
  <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Contact Form Admin | Update Holiday</title>
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
           Update Holiday
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Update Holiday
                </li>
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->

<form name="course" method="post" >        
        <section class="formatter" id="formatter">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Department in DML</h4>
 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
   <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblholidays where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>               <div class="card-body">
                    

  <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Holiday Name
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="holiday_name" type="text" name="holiday_name" required value="<?php echo $row['holiday_name'];?>">
                          </div>
                        </fieldset>
                      </div>
					                <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>From Date
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="from_date" type="text" name="from_date" required value="<?php echo $row['from_date'];?>">
                          </div>
                        </fieldset>
                      </div>
					                <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>To Date
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="to_date" type="text" name="to_date" required value="<?php echo $row['to_date'];?>">
                          </div>
                        </fieldset>
                      </div>
					                <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>No of Days
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="no_days" type="text" name="no_days" required value="<?php echo $row['no_days'];?>">
                          </div>
                        </fieldset>
                      </div>
					                <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Note
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="note" type="text" name="note" required value="<?php echo $row['note'];?>">
                          </div>
                        </fieldset>
                      </div>
				
                    </div>
<?php } ?>
 
<div class="row">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Update</button>
</div>
</div>



 </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Formatter end -->
      </form>  
     

      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('includes/footer.php');?>
  <!-- BEGIN VENDOR JS-->
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
    minDate: 0,
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

<?php }  ?>