 <?php
session_start();// start the session variable
if($_SESSION['uid'])// check that session variable have some value or not
	echo "";////$_SESSION['uid'] for debugging purpose
else
 header('location:../login.php');// redirect the login.php page
include("header.php");// include the header file
include("titlehead.php");// include the titlehead.php file;
include("../dbcon.php");// include the connection file
$sid = $_GET['sid'];// get the value of sid variable through url
$sql = "SELECT * FROM `student` WHERE `id` = '$sid'";
$run = mysqli_query($con,$sql);// run the sql query
$data = mysqli_fetch_assoc($run);// convert the data from array to associtivate array
?>
<form method="post" action="updatedata.php" enctype="multipart/form-data">
<table border="1" align="center" style="width:70%; margin-top:40px;">
<tr>
<th>Roll No</th>
<td><input type="text" name="rollno" placeholder="Enter the Roll No" value="<?php echo $data['rollno'] ?>" required/></td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="fname" placeholder="Enter the Full Name" value="<?php echo $data['name']; ?>"  required/></td>
</tr>
<tr>
<th>City</th>
<td><input type="text" name="city" placeholder="Enter the City" value="<?php echo $data['city'] ?>" required/></td>
</tr>
<tr>
<th>Parents Contact No.</th>
<td><input type="number" name="pcon" placeholder="Enter the Parents Contact Number" value="<?php echo $data['pcont'] ?>" required/></td>
</tr>
<tr>
<th>Standard</th>
<td><input type="text" name="std" placeholder="Enter the Standard" value="<?php echo $data['standard'] ?>" required/></td>
</tr>
<tr>
<th>Image</th>
<td><input type="file" name="img"/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="hidden" name="sid" value="<?php echo $data['id'];?>"/><!--hidden field for send the value of id varaible-->
<input type="submit" name="submit" value="Update"/></td>
</tr>
</table>
</form>
</body>
</html>