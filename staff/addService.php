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
		?>

<center>
 <h3> Add New Service </h3>
<form id="form1" name="form1" method="post" action="engineAddService.php">
		<table width="350" border="1" style="background-color:#7D6AF4">
			<tr>
				<td>Service Name</td>
				<td><label for="txtName"></label>
					<input type="text" name="txtName" id="txtName" /></td>
			</tr>
			<tr>
				<td>Price (RM)</td>
				<td><label for="txtPrice"></label>
					<input type="double" name="txtPrice" id="txtPrice" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="smtSend" class = "button button-warning" id="smtSend" value="SAVE" />
				<input type="reset" class = "button button-warning" name="smtClear" id="smtClear" onClick="return confirm ('Successfully added new service.');" value="CLEAR" /></td>
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