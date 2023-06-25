<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>SAFAS SPA MEMBERSHIP SYSTEM</title> 

<link type="text/css" href="../css/navbar.css" rel="stylesheet">
<link type="text/css" href="../css/edit_del.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="../img/favicon.ico"/>
<link href="../css/table.css" rel="stylesheet">
<?php include("../connection.php");
function active_radio_button($value,$input){
    $result =  $value==$input?'checked':'';
    return $result;
}
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
 <input name="submit2" class = "button button-warning" type="submit" id="submit2" value="LOG OUT"> 
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
		$booking_id = $_GET['booking_id'];

		$sql = "SELECT * FROM booking WHERE booking_id = '".$booking_id."'";
		$query = mysqli_query($conn,$sql) or die("Query Fail");
		$data = mysqli_fetch_array($query);

		?>

<center>
 <h3> Update Appointment Details </h3>
<form id="form1" name="form1" method="post" action="engineEditBook.php">
		<table width="830" border="1" style="background-color:#7D6AF4">
			<tr>
				<td width="92">Booking ID</td>
				<td width="527"><label for="txtBookID"></label>
					<input type="text" name="txtBookID" id="txtBookID"  value="<?php echo $booking_id ?>" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td><select name="txtCustID">
					<?php
						$sql = "SELECT * FROM customer";
						$query = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($query))
						{
					?>
							<option value="<?php echo $row["cust_id"];?>" <?php if($data["cust_id"]==$row["cust_id"]) echo "selected"; ?>><?php echo $row["cust_name"];?>
					<?php
			 
						}
					?>
					</select></td>
			</tr>
			<tr>
				<td>Service</td>
				<td><select name="txtServiceID" value="<?php echo $data["service_id"]?>">
					<?php
						$sql = "SELECT * FROM service";
						$query = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($query))
						{
					?>
							<option value="<?php echo $row["service_id"];?>" <?php if($data["service_id"]==$row["service_id"]) echo "selected"; ?>><?php echo $row["service_name"];?>
					<?php
			 
						}
					?>
					</select></td>
			</tr>
			<tr>
				<td>Appointment Date</td>
				<td><label for="txtDate"></label>
				<input type="date" name="txtDate" id="txtDate" value="<?php echo $data["appt_date"]?>"/></td>
			</tr>
			<tr>
				<td>Appointment Time</td>
				<td><label for="txtTime"></label>
				<input type="time" name="txtTime" id="txtTime" value="<?php echo $data["appt_time"]?>"/></td>
			</tr>
			
			<tr>
				<td>Payment Fee (RM)</td>
				<td><label for="txtPrice"></label>
				<input type="double" name="txtPrice" id="txtPrice" value="<?php echo $data["payment_fee"]?>"/></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>
				<?php
						$sql = "SELECT * FROM statusappt";
						$query = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($query))
						{
					?>
				<input type="radio" name="txtStatus" value="<?php echo $row["status"];?>" <?php if($data["appt_status"]==$row["appt_status"]) echo "checked"; ?>><?php echo $row["status"];?>

					<?php
			 
						}
					?> 
			
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2"><input type="submit" class = "button button-warning" name="smtSend" onClick="return confirm ('Update appointment details?');" id="smtSend" value="SAVE" /></td>
			</tr>
		</table>
		</form></center>

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