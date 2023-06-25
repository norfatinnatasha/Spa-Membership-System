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
function active_radio_button($value,$input){
    $result =  $value==$input?'checked':'';
    return $result;
}
 ?>
 <style>
 td, th {
  border: 2px solid #843935;

}

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
<a href="menuCustomer.php" class="logo"> 
 <center> <img src="../img/logo.png" alt="LOGO" height="250" width="500"> 
 </center> </a> </div> 
 <div class="topnav">  
 <ul> 
 <li><a href="menuCustomer.php">Home</a></li> 
 <li><a href="Services.php">Our Service</a></li> 
 <li><a href="Categories.php">Membership</a></li> 
 <li><a href="viewProfile.php">Profile</a></li> 
 <li><a href="aboutUs.php">About Us</a></li> 
 </ul> 
 </div>
 
 <?php
if(isset($_SESSION["log"]) && ($_SESSION["log"]==1))
{
	$cust_id = $_SESSION['cust_id'];

	$sql = "SELECT * FROM customer WHERE cust_id = '".$cust_id."'";
	$query = mysqli_query($conn,$sql) or die("Query Fail");
	$data = mysqli_fetch_array($query);

	?>
	<br>
	<form name="form_reg" action="editProfile.php">
	  <fieldset>
	  <legend>YOUR INFORMATION</legend>
	 <center>
	  <table width="635" border="1">
		<tr>
				<td width="92"><b>ID</b></td>
				<td width="527"><label for="txtCustID"></label>
					<?php echo $cust_id ?></td>
			</tr>
			<tr>
				<td><b>Name</b></td>
				<td><label for="txtName"></label>
					<?php echo $data["cust_name"]?></td>
			</tr>
			<tr>
				<td><b>Gender</b></td>
				<td><label for="txtGender"></label>
				<?php echo $data["cust_gender"]?></td>
			</tr>
			<tr>
				<td><b>Phone Number</b></td>
				<td><label for="txtPhone"></label>
				<?php echo $data["cust_phonenum"]?></td>
			</tr>
			<tr>
				<td><b>Date of Birth</b></td>
				<td><label for="txtBirthdate"></label>
				<?php echo $data["cust_birthdate"]?></td>
			</tr>
			<tr>
				<td><b>Registration Date</b></td>
				<td><label for="txtRegdate"></label>
				<?php echo $data["cust_regdate"]?></td>
			</tr>
			<tr>
				<td><b>Membership</b></td>
				<td><label for="txtMembership"></label>
				<?php echo $data["membership"]?></td>
			</tr>

		<tr>
		<td colspan="2"><input type="submit" class = "button button-warning" value="EDIT" /></td>
		</tr>
		</table>  </center>
	  </fieldset> </form>
	  <p>&nbsp;</p>

<?php
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>	
</body>
</html>