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

		$service_name = $_POST["txtName"];
		$service_price = $_POST["txtPrice"];

		$sql = "INSERT INTO service (service_name, service_price)
        VALUES('".$service_id."','".$service_name."','".$service_price."')";
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		//$result = mysqli_query($connection,$sql) or die(mysql_error());
		if($result)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewService.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=addService.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>