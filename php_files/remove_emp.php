<html>
<head>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
<body>
	<h3>Enter the leaving details only if the employee is not working with the firm now</h3><br/>
	<form method="post">
		Enter employee id : <input type="text" name="id"/><br/>
		Enter leaving date : <input type="text" name="ldate"/><br/>
		<input type="submit" name="edit" value="Edit"/>
	</form>
	<form action="employee_page.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
	<?php
		include "connect.php";
		if(isset($_POST['edit']))
		{
			if(isset($_POST['ldate'])&&isset($_POST['id']))
			{
				$ldate1=$_POST['ldate'];
				$id1=$_POST['id'];
				$sql="update employee set leaving_date='$ldate1' where Emp_id=$id1;
				";
				$result=mysqli_query($conn,$sql);
				if($result)
					echo "Successful";
				echo mysqli_error($conn);
			}
			else{
				echo '<br/>';
				echo "Enter all the fields";}
		}
		
	
	?>
</body>
</html>