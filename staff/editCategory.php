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
	if(isset($_GET['type_id']))
	{
		$type_id = $_GET['type_id'];

		$sql = "SELECT * FROM category WHERE type_id = '".$type_id."'";
		$query = mysqli_query($conn,$sql) or die("Query Fail");
		$data = mysqli_fetch_array($query);

		?>

<center>
 <h3> Update Category Details </h3>
<form id="form1" name="form1" method="post" action="engineEditCategory.php">
		<table width="830" border="1" style="background-color:#7D6AF4">
			<tr>
				<td width="92">Category ID</td>
				<td width="527"><label for="txtTypeID"></label>
					<input type="text" name="txtTypeID" id="txtTypeID"  value="<?php echo $type_id ?>" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Category Name</td>
				<td><label for="txtName"></label>
					<input type="text" name="txtName" id="txtName" value="<?php echo $data["type_name"]?>"/></td>
			</tr>
			<tr>
				<td>Price per Session (RM)</td>
				<td><label for="txtPrice"></label>
				<input type="double" name="txtPrice" id="txtPrice" value="<?php echo $data["price_session"]?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class = "button button-warning" name="smtSend" onClick="return confirm ('Update category details?');" id="smtSend" value="SAVE" /></td>
			</tr>
		</table>
		</form></center>

<?php
}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewCategory.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>