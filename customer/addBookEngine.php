<?php
	session_start();
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAFAS SPA MEMBERSHIP SYSTEM</title>
<?php include("../connection.php"); ?>

<style>
body {
  background-image: url('https://img.freepik.com/premium-photo/white-grey-marble-texture-background-natural-pattern-with-high-resolution-tiles-luxury-stone-floor-seamless-glitter-interior-exterior_38607-418.jpg?w=2000');

}
</style>
</head>

<body>

<?php
if(isset($_SESSION["log"]) && ($_SESSION["log"]==2))
{
	if(isset($_POST["smtSend"]))
	{
		$service_id = $_POST["txtServiceID"];
		$appt_date = $_POST["txtDate"]; 
		$appt_time = $_POST["txtTime"];

		$sql = "INSERT INTO booking
        VALUES('".$service_id."','".$appt_date."','".$appt_time."')";
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error());
		//$result = mysqli_query($connection,$sql) or die(mysql_error());
		if($result)
		    echo "<meta http-equiv=\"refresh\" content=\"2;URL=menuCustomer.php\"/>";
	     else
		     die(mysqli_error());
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=book_appt.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>