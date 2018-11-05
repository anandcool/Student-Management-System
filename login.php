<?php
	session_start();
	if(isset($_SESSION['uid']))
	{
		header('location:admin/admindash.php');
	}
	else{
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
</head>
<body>
<h1 align="center">Admin Login </h1>
<form action="login.php" method="post">
<table align="center">
<tr>
<td>User Name</td><td><input type="text" name="uname" required/></td>
</tr>
<tr>
<td>Password</td><td><input type="password" name="pass" required/></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="login"/></td>
</tr>
</table>
</form>
</body>
</html>
<?php
include("dbcon.php");
if(isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	
	$qry = "SELECT * FROM `admin` WHERE username='$uname' AND password='$pass'";
	$run = mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);
	if($row<1)
	{
	?>
	<script> alert("UserName or Password is not Match");
	window.open('login.php','_self');
	</script>	
	<?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run); 
		$id = $data['id'];
		$_SESSION['uid'] = $id ;
		header('location:admin/admindash.php');
	}
	
}
?>