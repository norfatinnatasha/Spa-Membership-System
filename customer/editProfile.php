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
<style>
body {
  background-image: url('https://img.freepik.com/premium-photo/white-grey-marble-texture-background-natural-pattern-with-high-resolution-tiles-luxury-stone-floor-seamless-glitter-interior-exterior_38607-418.jpg?w=2000');

}
</style>
<?php include("../connection.php");
function active_radio_button($value,$input){
    $result =  $value==$input?'checked':'';
    return $result;
}
 ?>
</head>

<body>
<form align="right" name="form1" method="post" action="../Logout.php"> 
 <label class="logoutLblPos"> 
 <input name="submit2" type="submit" class = "button button-warning" id="submit2" value="LOG OUT"> 
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
	<form id="form1" name="form1" method="post" action="editCustEngine.php">
	<br>
	  <fieldset>
	  <legend>YOUR INFORMATION</legend>
	 <center>
	  <table width="635" border="1">
		<tr>
				<td width="92">ID</td>
				<td width="527"><label for="txtCustID"></label>
					<input type="text" name="txtCustID" id="txtCustID"  value="<?php echo $cust_id ?>" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><label for="txtName"></label>
					<input type="text" name="txtName" id="txtName" value="<?php echo $data["cust_name"]?>"/></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
				<input type="radio" name="txtGender" value="M" <?php echo active_radio_button("M", $data['cust_gender'])?>>Male
				<input type="radio" name="txtGender" value="F" <?php echo active_radio_button("F", $data['cust_gender'])?>>Female
				</td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><label for="txtPhone"></label>
				<input type="text" name="txtPhone" id="txtPhone" value="<?php echo $data["cust_phonenum"]?>"/></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
				<td><label for="txtBirthdate"></label>
				<input type="date" name="txtBirthdate" id="txtBirthdate" value="<?php echo $data["cust_birthdate"]?>"/></td>
			</tr>
			<tr>
				<td>Registration Date</td>
				<td><label for="txtRegdate"></label>
				<input type="date" name="txtRegdate" id="txtRegdate" value="<?php echo $data["cust_regdate"]?>" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Membership</td>
				<td><label for="txtMembership"></label>
				<input type="text" name="txtMembership" id="txtMembership" value="<?php echo $data["membership"]?>" readonly="readonly"/></td>
			</tr>

		<tr>
		<td colspan="2"><input type="submit" onClick="return confirm ('Update profile?');" class = "button button-warning" value="UPDATE" /><a href="viewProfile.php"></a></td>
		</tr>
		</table>  </center>
	  </fieldset>
	  <p>&nbsp;</p>
	</form>
<?php
}
else
	echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>	
</body>
</html>