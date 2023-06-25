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
 <input class = "button button-warning" name="submit2" type="submit" id="submit2" value="LOG OUT"> 
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
 <h3> Register New Customer </h3>
<form id="form1" name="form1" method="post" action="engineAddCust.php">
		<table width="600" border="1">
			<tr>
				<td>Name</td>
				<td><label for="txtName"></label>
					<input type="text" name="txtName" id="txtName" /></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
				<input type="radio" name="txtGender" value="M" >Male
				<input type="radio" name="txtGender" value="F" >Female
				</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><label for="txtPhone"></label>
				<input type="text" name="txtPhone" id="txtPhone"/></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td><label for="txtBirthdate"></label>
				<input type="date" name="txtBirthdate" id="txtBirthdate"/></td>
			</tr>
			<tr>
				<td>Registration Date</td>
				<td><label for="txtRegdate"></label>
				<input type="date" name="txtRegdate" id="txtRegdate"/></td>
			</tr>
			<tr>
				<td>Membership</td>
				<td><select name="txtMembership">
					<?php
						$sql = "SELECT * FROM category";
						$query = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($query))
						{
					?>
							<option value="<?php echo $row["type_name"];?>"><?php echo $row["type_name"];?>
					<?php
			 
						}
					?>
					</select></td>
			</tr>
			<tr>
            <td>Password</td>
            <td><label for="txtPassword"></label>
            <input type="password" name="txtPassword" id="txtPassword" /></td>
            </tr>
			<tr>
				<td colspan="2"><input type="submit" class = "button button-warning" name="smtSend" onClick="return confirm ('Successfully added new customer.');" id="smtSend" value="SAVE" />
				<input class = "button button-warning" type="reset" name="smtClear" id="smtClear" value="CLEAR" /></td>
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