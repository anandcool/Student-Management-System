<?php
session_start(); // start the session variable
if($_SESSION['uid'])// check that session variable have some value or not
	echo "";//$_SESSION['uid'] for debugging purpose
else
{
 header('location:../login.php');// redirect the login.php page
}
include("header.php");// include the header file
include("titlehead.php");// include the titlehead.php file
?>
<div class="dashboard">
<table border="1" style="width:50%;" align="center">
<tr>
<td>1.</td><td><a href="addstudent.php">Insert Student Details</a></td>
</tr>
<tr>
<td>2.</td><td><a href="updatestudent.php">Update Student Details</a></td>
</tr>
<tr>
<td>3.</td><td><a href="deletestudent.php">Delete Student Details</a></td>
</tr>
</table>
</div>
</body>
</html>