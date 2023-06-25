<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="css/login.css" rel="stylesheet">
<link type="text/css" href="css/edit_del.css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="img/favicon.ico"/>
<title>SAFAS SPA MEMBERSHIP SYSTEM</title>
</head>

<body>
 <center> <img src="img/logo.png" alt="LOGO" height="230" width="460"> 
 </center>
 <br>
<div class="log-form">
<center>
		<h2> LOGIN </h2>
		<form  action="loginEngine.php" method="post" name="frmLogIn"> 
		
			 <input type="radio" name="radUser" id="radUser" value="customer"/>  Customer &nbsp;&nbsp;&nbsp;
			 <input type="radio" name="radUser" id="radUser" value="staff"/>  Staff <br><br>
		    <b>  User ID : </b> <br><br>
			<input type="text" placeholder="Enter ID Number" name="txtIDNum" id="txtIDNum" required> <br><br>
			<b>  Password : </b> <br><br>
			<input type="password" placeholder="Enter Password" name="txtPsswd" id="txtPsswd" required> <br><br>
			<button style="font-size:16px" type="submit" class = "button button-warning" onClick="return confirm ('Proceed to login?');" name="smtLogIn" id="smtLogIn">LOGIN</button>
		</form></center>
</div>
</body>
</html>