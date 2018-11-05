<?php
session_start();// start the session variable
if($_SESSION['uid'])// check that session variable have some value or not
	echo "";////$_SESSION['uid'] for debugging purpose
else
 header('location:../login.php');// redirect the login.php page
include("header.php");// include the header file
include("titlehead.php");// include the titlehead.php file
?>
<form action="deletestudent.php" method="post">
<table border="1" align="center">
<tr>
<th>Enter the Standard</th>
<td><input type="number" name="standard" placeholder="Enter the Standard" required="required"/></td>
</tr>
<tr>
<th>Enter the Name</th>
<td><input type="text" name="sname" placeholder="Enter the Name" required="required"/></td>
</tr>
<tr align="center">
<td colspan="2"><input type="submit" name="submit"  value="Search"/></td>
</tr>
</table>
</form>
<table align="center" width="80%" border="1" style="margin-top:10px">
<tr style="background-color:#000;color:#fff;">
<th>No</th>
<th>Image</th>
<th>Name</th>
<th>RollNo</th>
<th>Delete</th>
</tr>
<?php
if(isset($_POST['submit']))// check that submit button is clicked or not
{
	$standard = $_POST['standard'];// get the value of standard input field
	$sname = $_POST['sname'];// get the value of sname input field
	include('../dbcon.php');// include the connection file
	$sql = "SELECT * FROM `student` WHERE `name` LIKE '%$sname%' AND `standard` = '$standard'";
	$run = mysqli_query($con,$sql);// run the sql query and get the result
	if(@mysqli_num_rows($run) < 1)// '@' character suprress the warning and mysqli_num_rows function check the num of the given result
	{
		echo "<tr align='center'><td colspan='5'>No record Found</td></tr>";
	}
	else
	{
		$count =0;
		while($data = mysqli_fetch_assoc($run))// mysqli_fetch_assoc function convert the result into an assoctitave array[named array]
		{
			$count++;
			?>
				<tr>
				<td><?php echo $count;?></td>
				<td><img src="../dataimage/<?php echo $data['image'];?>" style="max-width:100px;"/></td>
				<td><?php echo $data['name'];?></td>
				<td><?php echo $data['rollno'];?></td>
				<td><a href="deleteform.php?sid=<?php echo $data['id']?>">Delete</a></td><!--make query string-->
				</tr>
			
			
		<?php	
		}
	}
}
?>
</table>
