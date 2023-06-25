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
		$cust_name = $_POST["txtName"];
		$cust_gender = $_POST["txtGender"];
		$cust_phonenum = $_POST["txtPhone"];
		$cust_birthdate = $_POST["txtBirthdate"];
		$cust_regdate = $_POST["txtRegdate"];
		$membership = $_POST["txtMembership"];


		$sql = "UPDATE customer 
				SET cust_name = '".$cust_name."',cust_gender = '".$cust_gender."',cust_phonenum = '".$cust_phonenum."',cust_birthdate = '".$cust_birthdate."',cust_regdate = '".$cust_regdate."',membership = '".$membership."' WHERE cust_id = '".$cust_id."'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error());
		if($query)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewCust.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewCust.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=..LoginForm.php\"/>";
?>

</body>
</html>