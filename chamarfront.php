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
$ret=mysqli_query($con,"select tblstudentapplications.*,tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from tblstudentapplications inner join tbluser on tbluser.ID= tblstudentapplications.UserId where  tblstudentapplications.Studentclass='Chamar'");
$cnt=1;
$id = mysqli_query($con	,"Select count(id) from tblstudentapplications where studentclass='Chamar'");
while ($row=mysqli_fetch_array($ret)) {
 for ($i=1; $i<=$id; $i++)
 {
 	$class= $row['StudentClass'];

	 if($class=="CHAMAR")
	{ ?>
<style>
#layer_11
{
	background-color:RED;
}
</style>

	<?php } ?>
	<?php
	if($class=="DESHNA")
	{ ?>
<style>
#layer_11
{
	background-color:BLUE;
}
</style>

	<?php } ?>
	<?php
	if($class=="PRADAKSHINA")
	{
		?>
<style>
#layer_11
{
	background-color:PINK;
}
</style>

	<?php } ?>
	<?php
	if($class=="CHHATRA")
	{?>
<style>
#layer_11
{
	background-color:BROWN;
}
</style>

	<?php } ?>
	<?php
	if($class=="SIHAASAN")
	{?>
<style>
#layer_11
{
	background-color:YELLOW;
}
</style>

	<?php } ?>
	<?php
	if($class=="DIVYADHWANI")
	{?>
<style>
#layer_11
{
	background-color:GREEN;
}
</style>

	<?php } ?>
	
	<?php
	if($class=="PRAATIHAARYA")
	{?>
<style>
#layer_11
{
	background-color:GREEN;
}
</style>

	<?php } ?>
		<?php
	if ($class=="INDRADHWAJA")
	{?>
<style>
#layer_11
{
	background-color:ORANGE;
}
</style>

	<?php } ?>
			<?php
	if($class=="KALPAVRUKSH")
	{?>
<style>
#layer_11
{
	background-color:PURPLE;
}
</style>

	<?php } ?>
<?php
	 if($class=="PARSHADAA")
	{?>
<style>
#layer_11
{
	background-color:RED;
}
</style>

	<?php } ?>
	<?php
	 if($class=="BHAMANDAL")
	{?>
<style>
#layer_11
{
	background-color:BLUE;
}
</style>

	<?php } ?>
	<?PHP
		 if($class=="DHARMACHAKRA")
	{?>
<style>
#layer_11
{
	background-color:PINK;
}
</style>

	<?php } ?>
	
		<?PHP
		 if($class=="PRAATIHAARYA")
	{?>
<style>
#layer_11
{
	background-color:GREEN;
}
</style>

	<?php } ?>
			<?PHP
		 if($class=="DEVDUNDHUBHI")
	{?>
<style>
#layer_11
{
	background-color:BLACK;
}
</style>

	<?php } ?>






	

	
<html xmlns="http://www.w3.org/1999/xhtml">
	  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>psdtowebFRONT1.psd</title>
	
    <link href="images/styles.css" rel="stylesheet" type="text/css">

<style>
@media print {
   body {
      -webkit-print-color-adjust: exact;
   }
   
}
.print:last-child {
     page-break-after: auto;
}
</style>
  </head>
 

  <body>
            <div id = "background" style="height:1730px">
			<div id="L1Image"><img src="images/L1Image.png"></div>
			<!--div id="layer_2"style="background-color:red"><img src="images/layer_2.png"-- ></div-->
			<div id="classname" style="font-weight:600; text-align:center;color:white;font-size:20px"><!--img src="images/classname.png"--><?php echo $row['StudentClass']?></div>
			<div id="RollNo"><!--img src="images/RollNo.png"--></div>
			<div id="IDCardNo"style="Font-weight:600;"><!--img src="images/IDCardNo.png" -->IDCardNo:</div>
			<div id="MJMU0001" style="Font-weight:600;"><!--img src="images/MJMU0001.png"--><?php echo $row['idCardNo']?></div>
			<div id="Image"><img src="../user/userimages/<?php echo $row['userpic'];?>" width="117px" height="98px"></div>
			<div id="layer_8"><!--img src="images/layer_8.png"--></div>
			<div id="Namemiddilenamesur" style="Font-weight:600;text-align:center"><!--img src="images/Namemiddilenamesur.png"--><?php echo $row['FirstName']?> <?php echo $row['FatherName']?> <?php echo $row['LastName']?></div>
			<div id="L1Image_0"><!--img src="images/L1Image_0.png"--></div>
			<div id="layer_11"><!--img src="images/layer_11.png"--></div>
			<div id="classname_0" style="font-weight:600; text-align:center;color:white;font-size:15px"><!--img src="images/classname_0.png"--> <?php echo $row['StudentClass']?></div>
			<div id="RollNo_0"style="Font-weight:600; font-size:16px;width:100px"><!--img src="images/RollNo_0.png"-->Roll No:<?php echo $row['RollNo']?></div>
			<div id="IDCardNo_0"><!--img src="images/IDCardNo_0.png"--></div>
			<div id="MJMU0001_0"><!--img src="images/MJMU0001_0.png"--></div>
			<div id="Image_0" style= "top:688px"><img src="<?php echo $row['file_name'];?>" width="90px" height="90px"> </div>
			<div id="layer_17"><!--img src="images/layer_17.png"--></div>
			<div id="Namemiddilenamesur_0"><!--img src="images/Namemiddilenamesur_0.png"--></div>
			<!--div id="Layer0copy"><img src="images/Layer0copy.png"></div-->
			
			<!--div id="RollNo_1"><img src="images/RollNo_1.png"></div-->
			<!--div id="IDCardNo_1"><img src="images/IDCardNo_1.png"></div>
			<div id="MJMU0001_1"><img src="images/MJMU0001_1.png"></div-->
			<!--div id="Namemiddilenamesur_1"><img src="images/Namemiddilenamesur_1.png"></div-->
			<!--div id="Layer0copy_0"><img src="images/Layer0copy_0.png"></div-->
			<!--div id="layer_26"><!--img src="images/layer_26.png"--><!--/div-->
			<!--div id="RollNo_2"><img src="images/RollNo_2.png"> </div-->
			<!--div id="IDCardNo_2"><img src="images/IDCardNo_2.png"></div>
			<div id="MJMU0001_2"><img src="images/MJMU0001_2.png"></div>
			<div id="Namemiddilenamesur_2"><img src="images/Namemiddilenamesur_2.png"></div-->
			<div id="Layer2" style="left:372px;top:335px;"><img src="images/layer_4.png" width="117px" height="106px"></div>
		</div>
 </body>
 </html>
<?php }?>
<?php }?>