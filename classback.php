<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


	  $cid=$_GET['aticid'];
	
  }

?>
<?php
//$cid=$_GET['aticid'];
 $eid=$_GET['editid'];
 
  //echo $eid;
$ret2 = mysqli_query ($con,"select * from tblcourse where COURSE_ID='$eid'");
while ($row1=mysqli_fetch_array($ret2))
{
$course = $row1['CourseName'];
//echo $course;
$ret=mysqli_query($con,"select tblstudentapplications.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from tblstudentapplications inner join tbluser on tbluser.ID= tblstudentapplications.UserId where  tblstudentapplications.Studentclass='$course'");
$cnt=1;
$id = mysqli_query($con	,"Select count(id) from tblstudentapplications where studentclass='$course'");
while ($row=mysqli_fetch_array($ret)) {
 for ($i=1; $i<=$id; $i++)
 {
 ?>
  <html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Jainism Id card</title>
		<link href="styles3.css" rel="stylesheet" type="text/css">
		<style>

body {
  -webkit-print-color-adjust: exact !important;
}
		</style>
	</head>
	<body>
	<div class="row">
	<?php echo $row['FirstName']; ?> -> <?php echo $row ['LastName']; ?> -> <?php echo $row['RollNo'];?>
	
	   <div id="background" style="left: 0px;top:150px;position: relative;margin-left: 250px; margin-right: auto; width: 308px; height: 1700px;overflow: hidden; z-index: 0">

	<div id="layer_1"><!--img src="images/images/layer_1.png"--></div>
			<!--div id="layer_2" style="font-weight:600;font-size:16px;"><img src="images/images/layer_2.png"></div-->
			<div id="layer_3" style="top:230px;font-weight:600;font-size:16px;"><?php echo $row['Addressline1'];?>,<?php echo $row['Addressline2'];?> <img src="images/images/layer_3.png"> </div>
			<div id="layer_4"><img src="images/images/layer_4.png"></div>
			<div id="layer_5"><img src="images/images/layer_5.png"></div>
			<div id="Address"style="font-weight:600;font-size:16px;><!--img src="images/images/Address.png"-->Address:-</div>
			<div id="ContactNo" style="font-weight:600;font-size:16px;top:336px;width:100px"><!--img src="images/images/ContactNo.png"-->Contact No:</div>
			<div id="layer_8" style="font-weight:600;font-size:16px;top:360px;"><?php echo $row['contactno1'];?><img src="images/images/layer_8.png"></div>
			<div id="layer_9" style="font-weight:600;font-size:16px;top:336px"><?php echo $row['contactno2'];?><img src="images/images/layer_9.png"></div>
			<div id="Thiscardisnottransfe" style="font-size:12px;font-weight:600;text-align:center;top:425px;width:285px"><!--img src="images/images/Thiscardisnottransfe.png"-->This card is not transfrable and it must be produced when demand by the school authorities.In case the card is lost it should be reported immediately to the school authorities.</div>
			<div id="IFFOUNDPLEASERETURNI"style="font-size:10px;font-weight:600;text-align:center;top:480px"><!--img src="images/images/IFFOUNDPLEASERETURNI.png"--> IF FOUND, PLEASE RETURN IT TO BELOW NUMBER</div>
			<div id="ManagedByRajparivarM" style="font-weight:600;font-size:10.5px;color:white"><!--img src="images/images/ManagedByRajparivarM.png"-->Managed By : Rajparivar (Mumbai) Contact No:+91 8877110082</div>
			<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
						<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
									<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
												<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
															<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
																		<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
																					<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
																								<div id="IdentityCard20232024"><img src="images/images/IdentityCard20232024.png"></div>
			<div id="ContactNo_0" style="font-weight:600;font-size:16px;top:358px;width:100px"><!--img src="images/images/ContactNo_0.png"-->Contact No:</div>
			<div id="Age"style="font-weight:600;font-size:16px;top:315px"><!--img src="images/images/Age.png"-->Age:-</div>
			<div id="layer_16" style="font-weight:600;font-size:16px; top:315px;margin-left:7px">   <?php echo $row['Age'];?> </div>
			<div id ="layer_16"><img src="images/images/layer_16.png"></div>
			</div>
			
 </body>
 </html>
 <?php } ?>
<?php }
?>
 <?php } ?>