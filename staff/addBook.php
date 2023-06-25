<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>SAFAS SPA MEMBERSHIP SYSTEM</title> 
<link rel="icon" type="image/x-icon" href="../img/favicon.ico"/>
<link type="text/css" href="../css/navbar.css" rel="stylesheet">
<link type="text/css" href="../css/edit_del.css" rel="stylesheet">
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
 <li><a href="viewCategory.php">Memberships</a></li> 
 <li><a href="ViewService.php">Spa Service</a></li> 
 <li><a href="ViewBook.php">Appointment</a></li> 
 </ul> 
 </div>
 
<?php
if(isset($_SESSION["log"]) && ($_SESSION["log"]==2))
{
		?>

<div class="wrapper">
	<div class="container">
<center>
 <h3> Create New Appointment </h3>
<form id="form1" name="form1" method="post" action="engineAddBook.php">
		<table width="600" border="1">
			<tr>
				<td>Customer Name</td>
				<td><select name="txtCustID">
					<?php
						$sql = "SELECT * FROM customer";
						$query = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($query))
						{
					?>
							<option value="<?php echo $row["cust_id"];?>"><?php echo $row["cust_id"];?>
					<?php
			 
						}
					?>
					</select></td>
			</tr>
			<tr>
				<td>Service</td>
				<td><select name="txtServiceID">
					<?php
						$sql = "SELECT * FROM service";
						$query = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($query))
						{
					?>
							<option value="<?php echo $row["service_id"];?>"><?php echo $row["service_name"];?>
					<?php
			 
						}
					?>
					</select></td>
			</tr>
			<tr>
				<td>Appointment Date</td>
				<td><label for="txtDate"></label>
				<input type="date" name="txtDate" id="txtDate"/></td>
			</tr>
			<tr>
				<td>Appointment Time</td>
				<td><label for="txtTime"></label>
				<input type="time" name="txtTime" id="txtTime"/></td>
			</tr>
			<tr>
				<td>Payment fee (RM)</td>
				<td><label for="txtPrice"></label>
				<input type="double" name="txtPrice" id="txtPrice"/></td>
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
				<input type="radio" name="txtStatus" value="<?php echo $row["appt_status"];?>"><?php echo $row["status"];?>

					<?php
			 
						}
					?> </td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="submit" class = "button button-warning" name="smtSend" id="smtSend" onClick="return confirm ('Successfully created new appointment.');" value="SAVE" />
				<input type="reset" class = "button button-warning" name="smtClear" id="smtClear" value="CLEAR" /></td>
			</tr>
		</table>
		</form></center>
		
			

<?php
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>