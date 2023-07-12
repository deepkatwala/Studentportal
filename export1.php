<?php  
include('includes/dbconnection.php');
$sql = "select tblstudentapplications.Id as apid,tblstudentapplications.StudentClass, tbluser.FirstName,tbluser.LastName,tbluser.MobileNumber,tbluser.Email from  tblstudentapplications inner join tbluser on tbluser.ID=tblstudentapplications.UserId where tbladmapplications.AdminStatus is null";
$setRec = mysqli_query($con, $sql);  
$columnHeader = '';  
$date=date("Y-M-d");
$columnHeader = "Id" . "\t" . "Employee Department" . "\t" . "First Name" . "\t". "Last Name" . "\t". "Moblie Number" . "\t". "Email ID" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=$date Pending application.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 


.

