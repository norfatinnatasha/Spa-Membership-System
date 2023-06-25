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
		$booking_id = $_POST["txtBookID"]; 
		$cust_id = $_POST["txtCustID"];
		$service_id = $_POST["txtServiceID"];
		$appt_date = $_POST["txtDate"]; 
		$appt_time = $_POST["txtTime"];
		$payment_fee = $_POST["txtPrice"]; 
		$status = $_POST["txtStatus"];


		$sql = "UPDATE booking
				SET cust_id = '".$cust_id."',service_id = '".$service_id."',appt_date ='".$appt_date."', appt_time = '".$appt_time."', payment_fee = '".$payment_fee."', appt_status = '".$status."' WHERE booking_id = '".$booking_id."'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error());
		if($query)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewBook.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewBook.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=..LoginForm.php\"/>";
?>

</body>
</html>