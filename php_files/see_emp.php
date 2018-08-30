<html>
<head>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
	<body>
		<form method="post">
			Enter employee number : <input type="text" name="emp">
			<br/><br/>
			<input type="submit" name="submit">
		</form>
		<form action="employee_page.php" method="post">
			<input type="submit" name="back" value="Go back !!"/>
		</form>
	</body>
</html>

<?php
include "connect.php";
if(isset($_POST['submit']))
{
	if(isset($_POST['emp']))
	{
		$b=$_POST['emp'];
	
		$sql = "SELECT * FROM employee where Emp_id=$b";
		$query = mysqli_query($conn,$sql);
		while($value= mysqli_fetch_array($query))
			{
				echo "<br/>";
				echo "<br/>";
				echo "Employee Id : ".$value['Emp_id'];
				echo "<br/>";
				echo "<br/>";
				echo "Employee Name : ".$value['Name'];
				echo "<br/>";
				echo "<br/>";
				echo "Employee Department : ".$value['Dept_name'];
				echo "<br/>";
				echo "<br/>";
				echo "Joining date : ".$value['join_date'];
				echo "<br/>";
				echo "<br/>";
				echo "Salary : ".$value['salary'];
				echo "<br/>";
				echo "<br/>";
				if($value['leaving_date'] != "NULL")
				{
					echo "Leaving date : ".$value['leaving_date'];
					echo "<br/>";
					echo "<br/>";
				}
				$d=$value['desig_id'];
				$sql1 = "SELECT desig_name FROM designation WHERE desig_id = '$d'";
				$query1 = mysqli_query($conn,$sql1);
				$value1= mysqli_fetch_array($query1);
				echo "Designation : ".$value1['desig_name'];
				echo "<br/><br/><br/>";
			}
	}
}
?>