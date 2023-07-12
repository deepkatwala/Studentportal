<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
   // print_r($_POST);exit
    $cid=$_GET['aticid'];
	$empdept=$_POST['Empdept'];
    $empdesignation=$_POST['Empdesignation'];
    $contact=$_POST['contactno'];
    $dob=$_POST['dob'];
    $nationality=$_POST['nationality'];
    $gender=$_POST['gender'];
    $coradd=$_POST['coradd'];
    $peradd=$_POST['peradd'];
	$emercontact=$_POST['emergencycontact'];
	$panno=$_POST['pancardno'];
	$aadharno=$_POST['aadharno'];
	$blood =$_POST['blood_group'];
    $dec=$_POST['declaration'];
    $sign=$_POST['signature'];
	$bankname=$_POST['Bank_name'];
	$branchname=$_POST['Branch_name'];
	$bankacoount=$_POST['Bank_account'];
	$ifsc=$_POST['IFSC'];
      $doj= $_POST['DOJ'];
      $admrmk=$_POST['AdminRemark'];
      $admsta=$_POST['AdminStatus'];
	  $empcode =$_POST['emp_code'];
 
/*$orderdate = explode('-', $doj);
$year = $orderdate[0];
$month   = $orderdate[1];
$day  = $orderdate[2]; 
$query1=mysqli_query($con, "update tbladmapplications set Empdept='$empdept',Empdesignation='$empdesignation',DOJ='$doj',contactno='$contact', AdminRemark='$admrmk',AdminStatus='$admsta' where ID='$cid'");
 if ($query1)
 { 

$ret1=mysqli_query($con,"select tbladmapplications.*,tblcourse.* from  tbladmapplications inner join tblcourse on tblcourse.CourseName=tbladmapplications.Empdept where tbladmapplications.ID='$cid'");
while ($row=mysqli_fetch_array($ret1)) {
	
	$p=$row['COURSE_ID'];
	$a=$row['counter'];
	$b= $a+1;
	if($p <=9)
	{
	$c= '0'.$p.$month.$year.'0'.$b;
	$empcode=$c;
	
	}
	
	else 
	{
	$c= $p.$month.$year.'0'.$b;
	$empcode=$c;
	}
	

}

$b=$b++;
$query2=mysqli_query($con,"update tblcourse set counter ='$b' where Course_ID='$p'");	
 } 
  
else{
	$ms="Error in update";
}*/
	
   $query=mysqli_query($con, "update tbladmapplications set Empdept='$empdept',gender='$gender',emergencycontact='$emercontact',pancardno='$panno',aadharno='$aadharno',blood_group='$blood',DOJ='$doj',Bank_name='$bankname',Bank_account='$bankacoount',Branch_name='$branchname',IFSC='$ifsc',CorrespondenceAdd='$coradd',PermanentAdd='$peradd' ,Empdesignation='$empdesignation',contactno='$contact',dob='$dob',emp_code='$empcode', AdminRemark='$admrmk',AdminStatus='$admsta' where ID='$cid'");
    if ($query) {
    $msg="Details  has been updated.";
	header("location:selected-application.php");
	//$msg = "update tbladmapplications set Empdept='$empdept',Empdesignation='$empdesignation',gender='$gender',emergencycontact='$emercontact',contactno='$contact', AdminRemark='$admrmk',AdminStatus='$admsta' where ID='$cid'";
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

  <title>Employee Kyc DML</title>
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
           EDIT KYC FORM
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application Form
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
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
$ret=mysqli_query($con,"select tblstudentapplications.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from  tblstudentapplications inner join tbluser on tbluser.ID=tblstudentapplications.UserId where tblstudentapplications.Id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>StudentClass(*)                    </h5>
   <div class="form-group">
   <select name="Empdept" id="Empdept" class="form-control white_bg" readonly>
     <option value="<?php echo $row['StudentClass'];?>">Student Class</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($r=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $r['CourseName'];?>"<?php if( $r['CourseName'] == $row['StudentClass']){ echo "selected"; } ?>><?php echo $r['CourseName']; ?></option>
                  <?php } ?> 
   </select-->
    </div>
</fieldset>
                   
</div>

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Employee Photo(*)                   </h5>
<td><img src="../user/userimages/<?php echo $row['UserPic'];?>" width="200" height="150"></td>
</fieldset>                  
</div>
 </div>               
 <div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Employee Designation(*)                    </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="Empdesignation" name="Empdesignation"  value="<?php echo $row['Empdesignation'];?>" type="text" required>
    </div>
</fieldset>               
</div>
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Contact No(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="contactno" name="contactno" maxlength="10" value="<?php echo $row['contactno'];?>" type="text" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>DOB(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="dob" name="dob"  type="date" value="<?php echo $row['DOB'];?>" required>
          <small class="text-muted">DOB Must be in this format (YYYY-MM-DD)</small>
    </div>

</fieldset>                  
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Nationality(*)                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="nationality" name="nationality" value="<?php echo $row['Nationality'];?>"  type="text" required>
                          </div>

                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12"> 
 <fieldset>
  <h5>Gender(*)                 </h5>
   <div class="form-group">
   <select class="form-control white_bg" id="gender" name="gender"  required>
<option value="Male"
<?php
if($row['gender'] == 'Male') 
	 {  echo "selected";
 } 
 ?>
>Male</option>
<option value="Female"
<?php
if($row['gender'] == 'Female') 
	 {  echo "selected";
 } 
 ?>
>Female</option>
<option value="Transgender"
<?php
if($row['gender'] == 'Transgender') 
	 {  echo "selected";
 } 
 ?>>Transgender</option>
   </select>

   
                          </div>
                        </fieldset>
                      </div>

                    </div>

<div class="row" style="margin-top:1%">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Correspondence Address(*)                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="coradd" name="coradd" value="<?php echo $row['CorrespondenceAdd'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <fieldset>
  <h5>Permanent Address(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="peradd" name="peradd" value="<?php echo $row['PermanentAdd'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Emergency Contact(*)                    </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="emergencycontact" name="emergencycontact" maxlength="10" value="<?php echo $row['emergencycontact'];?>" type="text" required>
          
    </div>

</fieldset>                  
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Pancard Number(*)                </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="pancardno" name="pancardno" maxlength="10" value="<?php echo $row['pancardno'];?>"  type="text" required>
                          </div>

                        </fieldset>
                      </div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Aadhar No(*)           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="aadharno" name="aadharno" maxlength="12" value="<?php echo $row['aadharno'];?>"  type="text" required>

                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Blood Group(*)           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="blood_group" name="blood_group" maxlength="6" value="<?php echo $row['blood_group'];?>"  type="text" required>

                          </div>
                        </fieldset>
                      </div>

                    </div>


<div class="row">
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Bank Name</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Bank_name" name="Bank_name" value="<?php echo $row['Bank_name'];?>"  type="text" >
    </div>
</fieldset>
                 
</div>

<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Branch Name</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Branch_name" name="Branch_name" value="<?php echo $row['Branch_name'];?>"   type="text" >
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Account Number</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Bank_account" name="Bank_account" value="<?php echo $row['Bank_account'];?>"   type="text" >
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>IFSC Code</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="IFSC" name="IFSC" value="<?php echo $row['IFSC'];?>"   type="text" >
    </div>
</fieldset>
                 
</div>
</div>
<div class="row">
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Date Of Joining </h5>
   <div class="form-group">
    <input class="form-control white_bg" type="Date" name="DOJ" value ="<?php echo $row ['DOJ'];?>" placeholder="yyyy-mm-dd"  required="true" readonly>
    </div>
</fieldset>
                 
</div>

<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Employee Code</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="emp_code" name="emp_code" value="<?php  echo $row['emp_code'];?>" type="text"  required readonly='true'>
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Admin Status</h5>
   <div class="form-group">
    <select name="AdminStatus" class="form-control white_bg" id="AdminStatus" name="AdminStatus">
	
	<option value="1"<?php 
	if($row['AdminStatus'] == 'Selected') 
	{ 
	echo "selected";
	}
	?> >Selected</option>
     <option value="2" 
	 <?php 
	 if($row['AdminStatus'] == 'Rejected') 
	 {  echo "selected";
 } 
 ?>
 >Rejected</option>
   </select>
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Admin Remark</h5>
   <div class="form-group">
    <textarea name="AdminRemark" placeholder="" rows="12" cols="14" input class="form-control white_bg"   type="text"><?php echo $row['AdminRemark']?></textarea>
    </div>
</fieldset>
                 
</div>
</div>




</hr>
<div class="row" style="margin-top: 5%">
  
<div class="col-xl-6 col-lg-12"><h4 class="card-title"><b>Declartion</b></h4> <hr />
</div>
</div>
 <div class="row">
<div class="col-xl-6 col-lg-12">
<h5><b>I hereby state that the facts mentioned above are true to the best of my knowledge and belief.</b></h5>
 </div>
 </div>               
<div class="row"> 
<div class="col-xl-4 col-lg-12">
<fieldset>
 <input class="form-control white_bg" id="signature" name="signature" placeholder="Signature"  value="<?php echo $row['Signature']?>" required readonly="true"> 
 </fieldset>  
</div>
</div>
<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button>
</div>
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

<?php } ?>

      
        


            





<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
</div>
</div>



 </div>
                </div>
              </div>


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

</body>
</html>

