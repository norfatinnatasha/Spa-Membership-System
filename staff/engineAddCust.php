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

		$cust_name = $_POST["txtName"];
		$cust_gender = $_POST["txtGender"];
		$cust_phonenum = $_POST["txtPhone"];
		$cust_birthdate = $_POST["txtBirthdate"];
		$cust_regdate = $_POST["txtRegdate"];
		$membership = $_POST["txtMembership"];
		$password = $_POST["txtPassword"];

		$sql = "INSERT INTO customer (cust_name, cust_gender, cust_phonenum, cust_birthdate, cust_regdate, membership, password)
        VALUES('".$cust_name."','".$cust_gender."','".$cust_phonenum."','".$cust_birthdate."','".$cust_regdate."','".$membership."','".$password."')";
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		//$result = mysqli_query($connection,$sql) or die(mysql_error());
		if($result)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewCust.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=addCust.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>