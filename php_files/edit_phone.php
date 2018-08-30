<!DOCTYPE HTML>
<?php
include "connect.php";
session_start();
$n=$_SESSION['a'];
?>
<html>

<head>
<title>Edit page</title>
<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
<body>		
		<h1>Enter new Phone number</h1>
		<br/>
		<form method = "post">
			New phone number : <input type="text" name="phoneno">
			<br/><br/>
			<input type="submit" name="submit">
		</form>
	<?php
		if(isset($_POST['submit']))
		{
			if(isset($_POST['phoneno']))
			{
				$pno1=$_POST['phoneno'];
				$sql="update emp_phoneno set phoneno='$pno1' where Emp_id=$n;
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
			}
			echo "New phone number added successfully";
		}
	
	?>
	<form action="employee_page.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
	</body>
</html>