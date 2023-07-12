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
$cid=$_GET['aticid'];
$ret=mysqli_query($con,"select tbladmapplications.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from  tbladmapplications inner join tbluser on tbluser.ID=tbladmapplications.UserId where tbladmapplications.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>psdtowebIDcardfront.psd</title>
		<link href="psdnewfront/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="background">
			<!--div id="Background"><img src="psdnewfront/images/Background.png"></div-->
			<div id="Layer1"><img src="psdnewfront/images/Layer1.png"></div>
			<div id="Rectangle1"><img src="<?php echo $row['file_name'];?>" width="150px" height="150px"></div>
			<div id="wwwdiamondmelacom"><img src="psdnewfront/images/wwwdiamondmelacom.png"></div>
			<div id="NAMESURNAME" style= "color:#512352;font-family:Futura,Trebuchet MS,Arial,sans-serif;font-size:30px;letter-spacing:1.5px;font-weight:bold;align:center;left:240px"><!--img src="psdnewfront/images/NAMESURNAME.png"--><?php echo $row['FirstName'];?>   <?php echo $row['LastName'];?></div>
			<div id="NAMESURNAME1" style= "color:#512352;font-family:Futura,Trebuchet MS,Arial,sans-serif;font-size:20px;letter-spacing:1.5px;font-weight:normal;align:center;left:220px"><!--img src="psdnewfront/images/NAMESURNAME.png"-->(<?php echo $row['Empdesignation'];?>)</div>
			
			<div id="DesignationEmployeen" style= "color:#512352;font-family:Futura,Trebuchet MS,Arial,sans-serif;font-size:20px;letter-spacing:1.5px;left:149px;font-weight:normal;align:center;left:230px"><!--img src="psdnewfront/images/DesignationEmployeen.png"--> Employee no.: <?php echo $row['emp_code']; ?> <br/><br/> Blood Group: <?php echo $row['blood_group'];?> <br/><br/> Contact: <?php echo $row['contactno'];?></div>
			
			<div id="Layer0copy"><img src="psdnewfront/images/Layer0copy.png"></div>
			<div id="AuthorizedSignature1"style= "color:#512352;font-family:Futura,Trebuchet MS,Arial,sans-serif;font-size:20px;letter-spacing:1.5px;font-weight:normal">Diamond Mela Jewels Ltd.<br/><img src="psdnewfront/images/sign2.jpg" width="180px" height="130px"></div>
			<div id="AuthorizedSignature"><img src="psdnewfront/images/AuthorizedSignature.png"></div>
			<div id="RoundedRectangle1"><!--img src="psdnewfront/images/RoundedRectangle1.png"--><img src="../user/userimages/<?php echo $row['UserPic'];?>" width="200px" height="250px"></div>
		</div>
 </body>
 </html>
<?php }?>