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

<style>
body {
  background-image: url('https://img.freepik.com/premium-photo/white-grey-marble-texture-background-natural-pattern-with-high-resolution-tiles-luxury-stone-floor-seamless-glitter-interior-exterior_38607-418.jpg?w=2000');

}
</style>

</head>

<body>
<form align="right" name="form1" method="post" action="../Logout.php"> 
 <label class="logoutLblPos"> 
 <input name="submit2" class = "button button-warning" type="submit" id="submit2" onClick="return confirm ('Logging out from the system.');" value="LOG OUT"> 
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
 <h3>
 
<?php
	if(isset($_SESSION["log"]) && ($_SESSION["log"]==2))
	{
		echo "&nbsp; Staff ID : ".$_SESSION["staff_id"]."<br><br>";
		echo "&nbsp; &nbsp; &nbsp; &nbsp; Welcome, ".$_SESSION["staff_name"]." !<br>";
?></h3>
	
<div id="body"> 
<div id="featured"> 
 <center> <img src="../img/home.png" height="600" width="1340" alt="">  </center> 
</div> 

<?php
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>