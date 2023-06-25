<?php
session_start();
if($_SESSION["log"]==1)
{
	unset($_SESSION['cust_id']);
	unset($_SESSION['cust_name']);
}
else
{
	unset($_SESSION['staff_id']);
	unset($_SESSION['staff_name']);
}
unset($_SESSION['log']);
session_destroy();

echo "<meta http-equiv=\"refresh\" content=\"2;url=LoginForm.php\">";
?>
