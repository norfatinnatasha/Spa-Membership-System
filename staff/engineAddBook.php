<?php
	session_start();
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAFAS SPA MEMBERSHIP SYSTEM</title>
<?php include("../connection.php"); ?>
</head>

<body>

<?php
if(isset($_SESSION["log"]) && ($_SESSION["log"]==2))
{
	if(isset($_POST["smtSend"]))
	{

		$cust_id = $_POST["txtCustID"];
		$service_id = $_POST["txtServiceID"];
		$appt_date = $_POST["txtDate"]; 
		$appt_time = $_POST["txtTime"];
		$payment_fee = $_POST["txtPrice"]; 
		$status = $_POST["txtStatus"];

		$sql = "INSERT INTO booking (cust_id, service_id, appt_date, appt_time, payment_fee, appt_status)
        VALUES('".$cust_id."','".$service_id."','".$appt_date."','".$appt_time."', '".$payment_fee."','".$status."')";
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		//$result = mysqli_query($connection,$sql) or die(mysql_error());
		if($result)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewBook.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=addBook.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>