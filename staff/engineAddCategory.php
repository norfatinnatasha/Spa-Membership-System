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
		$type_name = $_POST["txtName"];
		$price_session = $_POST["txtPrice"];

		$sql = "INSERT INTO category (type_name, price_session)
        VALUES('".$type_name."','".$price_session."')";
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		//$result = mysqli_query($connection,$sql) or die(mysql_error());
		if($result)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewCategory.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=addCategory.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>