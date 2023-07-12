<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_GET) & !empty($_GET)){
		$cid=$_GET['editid'];
		$sql = "DELETE FROM tblholidays WHERE ID='$cid'";
		if(mysqli_query($con, $sql)){
			header('location:manage-holiday.php');
		}
	}else{
		header('location:manage-holiday.php');
	}
  }
?>