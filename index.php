<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Student Management System</title>
</head>
<body>
<h3 align="right" style="margin-right:20px"><a href="login.php">Admin Login</a></h3>
<form action="index.php" method="post">
<table style="width:30%" align="center" border="1">
<tr>
<td colspan="2" align="center">Student Information </td>
</tr>
<tr>
<td align="left">Choose Standard</td>
<td>
<select name="std">
<option value="1">1st</option>
<option value="2">2 st</option>
<option value="3">3st</option>
<option value="4">4st</option>
<option value="12">12st</option>
</select>
</td>
</tr>
<tr>
<td align="left">Enter Rollno </td>
<td><input type="text" name="rollno"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Show Info"  />
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))// check  that submit  button is clicked or not
{
$std = $_POST['std'];// get the value of std variable using post method
$rollno = $_POST['rollno']; // get the value of rollno variable using post method
include('dbcon.php');// include the connection file
include('function.php');// include the function file
showdetails($std,$rollno);
}
?>