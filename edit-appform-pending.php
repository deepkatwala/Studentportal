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
	$Studentclass=$_POST['Studentclass'];
    $contact=$_POST['contactno'];
	$pincode= $_POST['pincode'];
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
	
   $query=mysqli_query($con, "update tblstudentapplications set StudentClass='$Studentclass',Gender='$gender',Pincode='$pincode,dob='$dob' where Id='$cid'");
    if ($query) {
    $msg="Details  has been updated.";
	$msg = "update tblstudentapplications set StudentClass='$Studentclass',Gender='$gender',dob='$dob' where Id='$cid'";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
	  $msg ="update tblstudentapplications set StudentClass='$Studentclass',Gender='$gender',dob='$dob' where Id='$cid'";
    }

  
}
  

  ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Jainism Student Application Form</title>
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
           EDIT Student Application Form
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
                  <h4 class="card-title">Student Application Form</h4>

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
  <h5>Student Class(*)                    </h5>
   <div class="form-group">
   <!--input class="form-control white_bg" id="Empdept" name="Empdept"  value="<?php echo $row['Empdept'];?>" type="text" required readonly-->
   <select name="Studentclass" id="Studentclass" class="form-control white_bg" readonly>
     <option value="">Student Class</option>
      <?php $query=mysqli_query($con,"select * from tblcourse");
              while($r=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $r['CourseName'];?>"<?php if( $r['CourseName'] == $row['StudentClass']){ echo "selected"; } ?>><?php echo $r['CourseName']; ?></option>
                  <?php } ?> 
   </select>
    </div>
</fieldset>
                   
</div>

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Student Photo(*)                   </h5>
<td><img src="../user/userimages/<?php echo $row['userpic'];?>" width="200" height="150"></td>
</fieldset>                  
</div>
 </div>               
 <div class="row">

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Contact No(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="contactno" name="contactno" maxlength="10" value="<?php echo $row['contactno1'];?>" type="text" required>
                          </div>
                        </fieldset>
                      </div>
					  <div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Emergency Contact No(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="emergencycontact" name="emergencycontact" maxlength="10" value="<?php echo $row['contactno2'];?>" type="text" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>
<div class="row">
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>DOB(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="dob" name="dob"  type="date" value="<?php echo $row['dob'];?>" required>
          <small class="text-muted">DOB Must be in this format (YYYY-MM-DD)</small>
    </div>

</fieldset>                  
</div>
<div class="col-xl-4 col-lg-12">
 <fieldset>
  <h5>Blood Group(*)                 </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="blood_group" name="blood_group" value="<?php echo $row['Bloodgroup'];?>"  type="text" required>
                          </div>

                        </fieldset>
                      </div>
<div class="col-xl-4 col-lg-12"> 
 <fieldset>
  <h5>Gender(*)                 </h5>
   <div class="form-group">
   <select class="form-control white_bg" id="gender" name="gender"  required>
<option value="Boy"
<?php
if($row['gender'] == 'Boy') 
	 {  echo "selected";
 } 
 ?>
> Boy</option>
<option value="Girl"
<?php
if($row['gender'] == 'Girl') 
	 {  echo "selected";
 } 
 ?>
> Girl</option>

   </select>

   
                          </div>
                        </fieldset>
                      </div>

                    </div>

<div class="row" style="margin-top:1%">
  <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Address line1(*)                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="addressline1" name="addressline2" value="<?php echo $row['Addressline1'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
   <div class="col-xl-6 col-lg-12">
    <fieldset>
  <h5>Address line2(*)                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="addressline2" name="addressline2" value="<?php echo $row['Addressline2'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>City(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="city" name="city" value="<?php echo $row['city'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>State(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="state" name="state" value="<?php echo $row['State'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
  <div class="col-xl-4 col-lg-12">
    <fieldset>
  <h5>Pincode(*)                  </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="pincode" name="pincode" value="<?php echo $row['Pincode'];?>"   type="text" required>
    </div>
</fieldset>
  </div>
</div>
<div class="row">
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Student Hobby(*)                    </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="studenthobby" name="studenthobby"  value="<?php echo $row['StudentHobby'];?>" type="text" required>
          
    </div>

</fieldset>                  
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Student Qualification(*)                </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="studentq" name="studentq"  value="<?php echo $row['StudentQualification'];?>"  type="text" required>
                          </div>

                        </fieldset>
                      </div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Student Qualification (Dharma)(*)           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="studentqd" name="studentqd"  value="<?php echo $row['StudentQualificationD'];?>"  type="text" required>

                          </div>
                        </fieldset>
                      </div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Student School(*)           </h5>
   <div class="form-group">
	<input class="form-control white_bg" id="studentschool" name="studentschool"  value="<?php echo $row['StudentSchool'];?>"  type="text" required>

                          </div>
                        </fieldset>
                      </div>

                    </div>


<div class="row">
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Father Name</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Fathername" name="Fathername" value="<?php echo $row['FatherName'];?>"  type="text" >
    </div>
</fieldset>
                 
</div>

<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Father Qualification</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Fatherqualification" name="Fatherqualification" value="<?php echo $row['FatherQualification'];?>"   type="text" >
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Father Occupation</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="FatherOccupation" name="FatherOccupation" value="<?php echo $row['FatherOccupation'];?>"   type="text" >
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Native Place</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Nativeplace" name="Nativeplace" value="<?php echo $row['NativePlace'];?>"   type="text" >
    </div>
</fieldset>
                 
</div>
</div>
<div class="row">
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Mother Name</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Mothername" name="Mothername" value="<?php echo $row['MotherName'];?>"  type="text" >
    </div>
</fieldset>
                 
</div>

<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Mother Qualification</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="Motherqualification" name="Motherqualification" value="<?php echo $row['MotherQualification'];?>"   type="text" >
    </div>
</fieldset>
</div>
<div class="col-xl-3 col-lg-12">
 <fieldset>
  <h5>Mother Occupation</h5>
   <div class="form-group">
    <input class="form-control white_bg" id="MotherOccupation" name="MotherOccupation" value="<?php echo $row['MotherOccupation'];?>"   type="text" >
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

