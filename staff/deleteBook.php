<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>SAFAS SPA MEMBERSHIP SYSTEM</title> 
<link type="text/css" href="../css/navbar.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="../img/favicon.ico"/>
<link type="text/css" href="../css/edit_del.css" rel="stylesheet">
<link href="../css/table.css" rel="stylesheet">
<?php include("../connection.php");
 ?>
 
 <style>
body {
  background-image: url('https://img.freepik.com/premium-photo/white-grey-marble-texture-background-natural-pattern-with-high-resolution-tiles-luxury-stone-floor-seamless-glitter-interior-exterior_38607-418.jpg?w=2000');

}
</style>
</head>

<body>
<form align="right" name="form1" method="post" action="../Logout.php"> 
 <label class="logoutLblPos"> 
 <input name="submit2" type="submit" class = "button button-warning" id="submit2" value="LOG OUT"> 
 </label> 
 </form> 
<div id="header"> 
<a href="menuStaff.php" class="logo"> 
 <center> <img src="../img/logo.png" alt="LOGO" height="250" width="500"> 
 </center> </a> </div> 
 <div class="topnav">  
 <ul> 
 <li><a href="menuStaff.php">Home</a></li> 
 <li><a href="viewCust.php">Customer</a></li> 
 <li><a href="viewCategory.php">Membership</a></li> 
 <li><a href="ViewService.php">Spa Service</a></li> 
 <li><a href="ViewBook.php">Appointment</a></li> 
 </ul> 
 </div>
 
 <?php
if(isset($_SESSION["log"]) && ($_SESSION["log"]==2))
{
	if(isset($_GET['booking_id']))
	{
		$booking_id= $_GET['booking_id'];

		$sql = "SELECT * FROM booking WHERE booking_id = '".$booking_id."'";
		$query = mysqli_query($conn,$sql) or die("Query Fail");
		$data = mysqli_fetch_array($query);

		?>
		
		<center>
		<h3> Delete Appointment </h3>
		<form id="form1" name="form1" method="post" action="engineDelBook.php">
		  <table width="635" border="1">
			<tr>
			  <td width="92">Booking ID</td>
			  <td width="527"><?php echo $booking_id ?>
							  <input type="hidden" name="booking_id" id="booking_id"  value="<?php echo $booking_id ?>"/></td>
			</tr>
			<tr>
			  <td>Customer ID</td>
			  <td><?php echo $data["cust_id"]?></td>
			</tr>
			<tr>
			  <td>Service ID</td>
			  <td><?php echo $data["service_id"]?></td>
			</tr>
			<tr>
			  <td>Appointment Date</td>
			  <td><?php echo $data["appt_date"]?></td>
			</tr>
			<tr>
			  <td>Appointment Time</td>
			  <td><?php echo $data["appt_time"]?></td>
			</tr>
			<tr>
			  <td>Payment fee (RM)</td>
			  <td><?php echo $data["payment_fee"]?></td>
			</tr>
			<tr>
			  <td>Status</td>
			  <td><?php echo $data["appt_status"]?></td>
			</tr>
			<tr>
			  <td colspan="2"><input type="submit" class = "button button-warning" onClick="return confirm ('Delete appointment details?');" name="smtSend" id="smtSend" value="DELETE" /></td>
			</tr>
		  </table>
		</form> </center>
<?php
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewBook.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>	
</body>
</html>
