<?php
session_start(); // start the session variable
if($_SESSION['uid'])// check that session variable have some value or not
	echo "";//$_SESSION['uid'] for debugging singh
else
{
 header('location:../login.php');// redirect the login.php page
}
include("header.php");// include the header file
include("titlehead.php");// include the titlehead.php file
?>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
<h1 align="center">Add Student </h1>
<table border="1" align="center" style="width:70%; margin-top:40px;">
<tr>
<th>Roll No</th>
<td><input type="text" name="rollno" placeholder="Enter the Roll No" required/></td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="fname" placeholder="Enter the Full Name" required/></td>
</tr>
<tr>
<th>City</th>
<td><input type="text" name="city" placeholder="Enter the City" required/></td>
</tr>
<tr>
<th>Parents Contact No.</th>
<td><input type="number" name="pcon" placeholder="Enter the Parents Contact Number" required/></td>
</tr>
<tr>
<th>Standard</th>
<td><input type="text" name="std" placeholder="Enter the Standard" required/></td>
</tr>
<tr>
<th>Image</th>
<td><input type="file" name="img"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Data Saved"/></td>
</tr>
</table>
</form>
</body>
</html>
<?php
include('../dbcon.php'); // include the connection file
if(isset($_POST['submit']))// check that submit button is clicked or not
{
	$rollno= $_POST['rollno'];// get the value of rollno input field
	$fname = $_POST['fname'];// get the value of fname input field
	$city = $_POST['city'];// get the value of city input field
	$pcon = $_POST['pcon'];// get the value of pcon input field
	$std = $_POST['std'];// get the value of std input field
	$imagename = $_FILES['img']['name'];// get the value of img input field
	$tmp_name = $_FILES['img']['tmp_name'];// get the value of img tmp_name input field
	move_uploaded_file($tmp_name,"../dataimage/$imagename");// move the image file in data-image folder
	$qry = "INSERT INTO `student`(`rollno`,`name`,`city`,`pcont`,`standard`,`image`) VALUES ('$rollno','$fname','$city','$pcon','$std','$imagename')";// insert query
	$run = mysqli_query($con,$qry);// fire the mysql query
	if($run == true)
		?>
	<script>
	alert("Data is Inserted");// Alert box 
	</script>
	<?php
}
?>