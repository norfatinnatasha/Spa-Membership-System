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
<link type="text/css" href="../css/table.css" rel="stylesheet">
<link type="text/css" href="../css/button.css" rel="stylesheet">
<link type="text/css" href="../css/edit_del.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php include("../connection.php"); ?>
<style>
body {
  background-image: url('https://img.freepik.com/premium-photo/white-grey-marble-texture-background-natural-pattern-with-high-resolution-tiles-luxury-stone-floor-seamless-glitter-interior-exterior_38607-418.jpg?w=2000');

} </style>
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
 <li><a href="viewService.php">Spa Service</a></li> 
 <li><a href="viewBook.php">Appointment</a></li> 
 </ul> 
 </div>
 
 <?php
if(isset($_SESSION["log"]) && ($_SESSION["log"]==2))
{
   $type_id = "";
   $sql = "SELECT * FROM category WHERE type_id LIKE '".$type_id."%'";
   $query = mysqli_query($conn,$sql) or die("Query fail");
  
?>
	<center><br>
	<h1>MEMBERSHIP</h1>
	<div class="text-box">
    <a href="addCategory.php" class="btn btn-white btn-animate">Add New Category</a>
    </div>

	<div class="table">
	<table>
	<tr style="background-color:#D49959">
		<td>ID</td>
		<td>Category</td>
		<td>Monthly fee (RM)</td>
	</tr>
	<?php
      $x=1;
      while($row = mysqli_fetch_array($query))
	  {
	?>
		<tr>
		<td><?php echo $row["type_id"]?></td>
		<td><?php echo $row["type_name"]?></td>
		<td><?php echo $row["price_session"]?></td>
		<td><a href = "editCategory.php?type_id=<?php echo $row["type_id"];?>" class = "button button-warning"><i class="fas fa-edit"></i> &nbsp;   Edit</a></td>
		<td><a href = "deleteCategory.php?type_id=<?php echo $row["type_id"];?>" class = "button button-warning"><i class="fas fa-trash"></i> &nbsp;  Delete</a></td>
		</tr>
	<?php
        $x++;
		}
	?>
	</table> </div> </center>
 
 
 <?php
	}
	else
		echo "<meta http-equiv=\"refresh\" content=\"2;URL=../LoginForm.php\"/>";
?>
</body>
</html>