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
<?php include("../connection.php"); ?>
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
	if(isset($_GET['service_id']))
	{
		$service_id= $_GET['service_id'];

		$sql = "SELECT * FROM service WHERE service_id = '".$service_id."'";
		$query = mysqli_query($conn,$sql) or die("Query Fail");
		$data = mysqli_fetch_array($query);

		?>
		
		<center>
		<h3> Delete Service </h3>
		<form id="form1" name="form1" method="post" action="engineDelService.php">
		  <table width="635" border="1">
			<tr>
			  <td width="92">Service ID</td>
			  <td width="527"><?php echo $service_id ?>
							  <input type="hidden" name="service_id" id="service_id"  value="<?php echo $service_id ?>"/></td>
			</tr>
			<tr>
			  <td>Service Name</td>
			  <td><?php echo $data["service_name"]?></td>
			</tr>
			<tr>
			  <td>Price (RM)</td>
			  <td><?php echo $data["service_price"]?></td>
			</tr>
			<tr>
			  <td colspan="2"><input type="submit" class = "button button-warning" onClick="return confirm ('Delete service details?');" name="smtSend" id="smtSend" value="DELETE" /></td>
			</tr>
		  </table>
		</form> </center>
<?php
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=viewService.php\"/>";
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>	
</body>
</html>