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
		$service_id = $_POST["service_id"]; 
		$sql = "DELETE FROM service WHERE service_id = '".$service_id."'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error());

		if($query)
					echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewService.php\"/>";
				 else
					 die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewService.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=..LoginForm.php\"/>";
?>

</body>
</html>