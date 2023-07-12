<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
	 
$cid=$_GET['aticid'];


    

	

$ret=mysqli_query($con,"select  tblstudentapplications.Id as aticid,tblstudentapplications.idCardNo,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from tblstudentapplications inner join tbluser on tbluser.ID=tblstudentapplications.UserId where tblstudentapplications.Id='$cid'");
   
//$url =" http://203.112.156.63/DMLINTERNAL/Employeekyc/admin/view-appform.php?aticid=$cid";
$url2 = $row['idCardNo'];
 //echo $url;
while ($row=mysqli_fetch_array($ret)) {

$firstname = $row['FirstName'];
$lastname  =  $row['LastName'];
echo $firstname. $lastname;


?>


<html>
<body>
<div id="wrapper">
 <form method="post" action="generate_code.php?aticid=<?php echo $row['aticid'];?>">
  <input type="text" name="qr_text" value= "<?php echo $row['idCardNo'] ?>" >
  <input type="text" name="qr_name" value= "<?php echo $firstname?> <?php echo $lastname?>">
  <input type="submit" name="generate_text" value="Generate">
 </form>
</div>
</body-->
</html-->
  <?php } ?>
  <?php } ?>






