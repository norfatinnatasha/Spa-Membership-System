<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>SAFAS SPA MEMBERSHIP SYSTEM</title> 
<link rel="icon" type="image/x-icon" href="../img/favicon.ico"/>
<link type="text/css" href="../css/edit_del.css" rel="stylesheet">
<link type="text/css" href="../css/navbar.css" rel="stylesheet">
<?php include("../connection.php"); ?>

<style>

body {
  background-image: url('https://img.freepik.com/premium-photo/white-grey-marble-texture-background-natural-pattern-with-high-resolution-tiles-luxury-stone-floor-seamless-glitter-interior-exterior_38607-418.jpg?w=2000');

}

table {
    border-collapse: collapse;
    border-spacing: 0;
    -webkit-border-horizontal-spacing: 0px;
    -webkit-border-vertical-spacing: 0px;
	font-size:16px;
	margin:25px;
	margin-left:-10px;
}

td, th {
  border: 1px solid #000000;
  text-align: center;
  padding: 8px;
  margin-right:-30px;
}

tr {
	 background-color: #FFE2C2;
}
</style>
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
 if(isset($_POST["smtSearch"]))
   {
	  $status = $_POST["sltStatus"];
	  
	  
	  $sql = "SELECT * FROM booking  WHERE appt_status = ".$status." AND cust_id = '".$_SESSION["cust_id"]."'";
   }
   else
   {
	   $sql = "SELECT * FROM booking WHERE cust_id = '".$_SESSION["cust_id"]."'";
   }
    $query = mysqli_query($conn,$sql);
	$numRow = mysqli_num_rows($query);
		?>
		
		 <center> <h3>
		 Customer Name : <?php echo $_SESSION["cust_name"]; ?><br>
         Customer ID : <?php echo $_SESSION["cust_id"]; ?><br>
         </h3></center>

<center>
<form action="book_appt.php" method="post" name="frmView">
<table width="80%" border="1">
  <tr>
    <td width="20%"><b>Your Appointment :</b></td>

    <td>
    <select name="sltStatus">
      <option value="1">Upcoming</option>
      <option value="2">Completed</option>
      <option value="3">Cancelled</option>
    </select>
    </td>
    <td>
    <input name="smtSearch" class = "button button-warning" type="submit" value="SEARCH" />
    </td>
  </tr>
  <tr>
    <td colspan="4">
    
	<center>
    <table width="80%" border="1"  >
  <tr style="background-color:#AC644F">
    <td>No.</td>
    <td>ID</td>
	<td>Treatment</td>
	<td>Appointment Date</td>
    <td>Appointment Time</td>
	<td>Payment fee (RM)</td>
    <td>Status</td>
  </tr>
  <?php
  if($numRow > 0)
  {
	  $x=1;
      while($row = mysqli_fetch_array($query))
	  {
		  $sql2 = "SELECT * FROM customer WHERE cust_id = '".$row["cust_id"]."'";
		  $query2 = mysqli_query($conn,$sql2);
		  $result = mysqli_fetch_array($query2);
		  
		  $sql3 = "SELECT * FROM statusappt WHERE appt_status = ".$row["appt_status"];
          $query3 = mysqli_query($conn,$sql3);
          $row3 = mysqli_fetch_array($query3);
		  
		  $sql4 = "SELECT * FROM service WHERE service_id = ".$row["service_id"];
          $query4 = mysqli_query($conn,$sql4);
          $row4 = mysqli_fetch_array($query4);
		  
  ?>
  <tr style="background-color:#F6CCC0">
    <td><?= $x ?></td>
    <td><?=$row["cust_id"]?></td>
	<td><?=$row4["service_name"]?></td>
	<td><?=$row["appt_date"]?></td>
	<td><?=$row["appt_time"]?></td>
	<td><?=$row["payment_fee"]?></td>
    <td><?=$row3["status"]?></td>
  </tr>
  <?php
        $x++;
	  }
  }
  else
  {
  ?>
  <tr>
    <td colspan="4">No Record</td>

  </tr>
  <?php
  }
  ?>
</table> </center>

    
    </td>
  </tr>
</table>

</form> </center>
</body>
</html>