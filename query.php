
<?php

$con=mysqli_connect("10.12.40.14", "root", "AR#e@HibFe17", "softwere");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}
else 
{
	echo "connection successfull";
}

$result = mysqli_query($con,"SHOW FULL PROCESSLIST");

IF($result)
{
	$msg ="SHOW FULL PROCESSLIST";
}

?>