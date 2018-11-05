<?php
include('../dbcon.php');
if(isset($_POST['submit']))
{
	$rollno= $_POST['rollno'];
	$fname = $_POST['fname'];
	$city = $_POST['city'];
	$pcon = $_POST['pcon'];
	$std = $_POST['std'];
	$sid = $_POST['sid'];
	$imagename = $_FILES['img']['name'];
	$tmp_name = $_FILES['img']['tmp_name'];
	move_uploaded_file($tmp_name,"../dataimage/$imagename");
	$qry ="UPDATE `student` SET `rollno`= '$rollno',`name`='$fname',`city`='$city',`pcont`='$pcon',`standard`='$std',`image`='$imagename' WHERE `id`='$sid' ";
	$run = mysqli_query($con,$qry);
	if($run == true)
		?>
	<script>
	alert('Data is Update Successfully...');
	window.open('updatestudent.php?sid="<?php echo $sid?>"','_self');
	</script>
	<?php
}
?>