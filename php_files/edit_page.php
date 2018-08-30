<!DOCTYPE HTML>
<?php
include "connect.php";
session_start();
$n=$_SESSION['a'];
?>
<html>

<head>
<title>Edit page</title>
</head>
<body>		
		<h1>Enter new Address full</h1>
		<br/>
		<form method = "post">
			house no : <input type="text" name="houseno">
			<br/><br/>
			area : <input type="text" name="area">
			<br/><br/>
			locality : <input type="text" name="locality">
			<br/><br/>
			city : <input type="text" name="city">
			<br/><br/>
			state : <input type="text" name="state">
			<br/><br/>
			pin code : <input type="text" name="pin">
			<br/><br/>
			<input type="submit" name="submit">
		</form>
	</body>
	<?php
		if(isset($_POST['submit']))
		{
			if(isset($_POST['houseno']))
			{
				$hno1=$_POST['houseno'];
				$sql="update emp_Address set Hno='$hno1' where Emp_id=$n;
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
			}
			if(isset($_POST['area']))
			{
				$area1=$_POST['area'];
				$sql="update emp_Address set Area='$area1' where Emp_id=$n;
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
			}
			if(isset($_POST['locality']))
			{
				$loc1=$_POST['locality'];
				$sql="update emp_Address set locality='$loc1' where Emp_id=$n;
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
			}
			if(isset($_POST['city']))
			{
				$city1=$_POST['city'];
				$sql="update emp_Address set city='$city1' where Emp_id=$n;
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
			}
			if(isset($_POST['state']))
			{
				$state1=$_POST['state'];
				$sql="update emp_Address set state='$state1' where Emp_id=$n;
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
			}
			echo "New address added successfully";
		}
	
	?>
</html>