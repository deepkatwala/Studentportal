<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
	 
$cid=$_GET['aticid'];

if(isset($_POST['generate_text']))
{
 include('phpqrcode/qrlib.php'); 
 $text=$_POST['qr_text'];
 $qr=$_POST['qr_name'];
 $folder="images/";
 $file_name="$qr.png";
 $file_name1=$folder.$file_name;
 QRcode::png($text,$file_name1);
 echo"<img src='images/$qr.png' width='200px' height='200px'>";
 
 //To Display Code Without Storing
 //QRcode::png($text,$qr);
 
 $query =mysqli_query($con,"update tblstudentapplications set qr_text='$text', qr_name='$qr', file_name='$file_name1' where Id='$cid'");
 
 if ($query)
 {
	 echo "Data inserted succssfully";
 }
 else 
 {
	 echo "something went wrong ";
 }
 
}
  }
?>