<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_GET) & !empty($_GET)){
		$id = $_GET['udid'];
		$sql = "DELETE FROM tbluser WHERE ID='$id'";
		if(mysqli_query($con, $sql)){
			header('location:user-detail.php');
		}
	}else{
		header('location: user-detail.php');
	}
  }
?>