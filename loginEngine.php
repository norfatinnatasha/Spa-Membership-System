<?php
  session_start();
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOG IN FORM</title>
<?php include("connection.php"); ?>
</head>

<body>
<?php
$username = $_POST["txtIDNum"];
$psswd = $_POST["txtPsswd"];
$level = $_POST["radUser"];

if($level=="customer")
{
	$query = "SELECT * FROM customer WHERE cust_id = '".$username."' AND password = '".$psswd."'";
}
else
{
	$query = "SELECT * FROM staff WHERE staff_id = '".$username."' AND password = '".$psswd."'";
}
$result = mysqli_query($conn,$query);
$numRow = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($numRow == 0)//for failed
    echo "<meta http-equiv=\"refresh\" content=\"2;URL=LoginForm.php\"/>";
else  //failed
{
	if($level=="customer")
	{
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=customer/menuCustomer.php\"/>";
		$_SESSION["cust_id"]=$row["cust_id"];
		$_SESSION["cust_name"]=$row["cust_name"];
		$_SESSION["log"] = 1;
	}
	else
	{
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=staff/menuStaff.php\"/>";
		$_SESSION["staff_id"]=$row["staff_id"];
		$_SESSION["staff_name"]=$row["staff_name"];
		$_SESSION["log"] = 2;
	}
}
?>
</body>
</html>