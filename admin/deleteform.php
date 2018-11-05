<?php
include('../dbcon.php');// include the connection file
	$sid = $_REQUEST['sid'];// get the sid variable through url
	$qry ="DELETE FROM `student` WHERE `id`= '$sid'";
	$run = mysqli_query($con,$qry);// run the sql query
	if($run == true)
	{
		?>
	<script>
	alert('Data Delete Successfully...');// alert box for showing message
	window.open('deletestudent.php','_self');// window.open function 
	</script>
	<?php
	}
?>