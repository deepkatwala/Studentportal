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
	$doj= $_POST['DOJ'];
      $admrmk=$_POST['AdminRemark'];
      $admsta=$_POST['status'];
	  $empcode =$_POST['emp_code'];
 
$orderdate = explode('-', $doj);
$year = $orderdate[0];
$month   = $orderdate[1];
$day  = $orderdate[2]; 

$ret1=mysqli_query($con,"select tblstudentapplications.*,tblcourse.* from  tblstudentapplications inner join tblcourse on tblcourse.CourseName=tblstudentapplications.StudentClass where tblstudentapplications.ID='$cid'");
while ($row=mysqli_fetch_array($ret1)) {
	
	$p=$row['COURSE_ID'];
	$a=$row['counter'];
	$b= $a+1;
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

   
     
   $query=mysqli_query($con, "update  tbladmapplications set DOJ='$doj',emp_code='$empcode', AdminRemark='$admrmk',AdminStatus='$admsta' where ID='$cid'");
   echo ($query);
    if ($query) {
    $msg="Admin Remark and Admin Status has been updated.";
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

  <title>Jainism Student Portal</title>
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
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

  <div class="app-content content" style="margin-left:20px">
    <div class="content-wrapper">
      <div class="content-header row">
        <!--div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           View KYC Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">KYC Form
                </li>
                
              </ol>
            </div>
          </div-->
		 
        </div>
   
      </div>
	   <div class="row" style="margin-left:380px">
		  <img src="logo.png" alt="Diamondmela Jewels Ltd"  width="400px" height="120px">
		  </div>
		  <br/>
		  <div class="row" style=" margin-left:430px;">
		  <h2> Jainism Student Portal </h2>
		  
		  </div>
		  </br>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
 
 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php
$cid=$_GET['aticid'];
$ret=mysqli_query($con,"select tblstudentapplications.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from  tblstudentapplications inner join tbluser on tbluser.ID=tblstudentapplications.UserId where tblstudentapplications.Id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="2" class="table table-bordered mg-b-0">
<tr>
  <th> Student Name</th>
  <td><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></td>
</tr>
<tr>
  <th>Student Class</th>
  <td><?php echo $row['StudentClass'];?></td>
</tr>
<tr>
  <th>Student Photo</th>
  <td><img src="../user/userimages/<?php echo $row['userpic'];?>" width="250" height="250"></td>
</tr>
<tr>
<th>DOB </th>
  <td><?php echo $row['dob'];?></td>
</tr>
<tr>
<th>AGE</th>
  <td><?php echo $row['Age'];?></td>
</tr>
<tr>
<th>Gender</th>
  <td><?php echo $row['Gender'];?></td>
</tr>
<tr>
<th>Blood Group</th>
  <td><?php echo $row['Bloodgroup'];?></td>
</tr>
<tr>
<th>Student Adderess</th>
  <td><?php echo $row['Addressline1'];?>,<?php echo $row['Addressline2'];?></td>
</tr>
<tr>

<th>city</th>
  <td><?php echo $row['city'];?></td>
</tr>
<tr>

<th>State</th>
  <td><?php echo $row['State'];?></td>
</tr>
<tr>

<th>Pincode</th>
  <td><?php echo $row['Pincode'];?></td>
</tr>
<tr>

<th>Student Qualification</th>
  <td><?php echo $row['StudentQualification'];?></td>
</tr>
<tr>

<th>Student Qualification Dharma</th>
  <td><?php echo $row['StudentQualificationD'];?></td>
</tr>
<tr>

<th>Student School</th>
  <td><?php echo $row['StudentSchool'];?></td>
</tr>
<tr>

<th>Student Hobby</th>
  <td><?php echo $row['StudentHobby'];?></td>
</tr>
<tr>
<th>Adhar Card</th>
  <td><?php echo $row['StudentAadhar'];?></td>
</tr>
<tr>
<th>Contact no</th>
  <td><?php echo $row['contactno1'];?></td>
</tr>
<tr>
<th>Emergency Contact no</th>
  <td><?php echo $row['contactno2'];?></td>
</tr>
<tr>
<th>Native Place</th>
  <td><?php echo $row['NativePlace'];?></td>
</tr>

<tr>
<th>Father Name</th>
  <td><?php echo $row['FatherName'];?></td>
</tr>
<tr>
<th>Father Qualification</th>
  <td><?php echo $row['FatherQualification'];?></td>
</tr>
<tr>
<th>Father Occupation</th>
  <td><?php echo $row['FatherOccupation'];?></td>
</tr>

<tr>
<th>Mother Name</th>
  <td><?php echo $row['MotherName'];?></td>
</tr>
<tr>
<th>Mother Qualification</th>
  <td><?php echo $row['MotherQualification'];?></td>
</tr>
<tr>
<th>ID Card</th>
  <td><?php echo $row['idCardNo'];?></td>
</tr>
<th>Roll No</th>
  <td><?php echo $row['RollNo'];?></td>
</tr>









</table>

  

<p style="text-align: center;font-size: 20px">
  <input name="Submit2" type="submit" class="btn btn-success" style="color: red;font-size: 20px" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>







  <?php } ?>





</table>

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
  <script src="app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
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
   <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>

</body>
</html>

