<html>
<head>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
<body>

<?php
include "connect.php";
session_start();
$n=$_SESSION['a'];

$sql = "SELECT * FROM employee WHERE emp_id = '$n'";
$query = mysqli_query($conn,$sql);
while($value= mysqli_fetch_array($query))
	{
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
		$d=$value['desig_id'];
		$sql1 = "SELECT desig_name FROM designation WHERE desig_id = '$d'";
		$query1 = mysqli_query($conn,$sql1);
		$value1= mysqli_fetch_array($query1);
		echo "Designation : ".$value1['desig_name'];
		echo "<br/><br/><br/>";
		$b=$value['Emp_id'];
		
		$sql2 = "SELECT * FROM emp_Address WHERE Emp_id = '$b'";
		$query2 = mysqli_query($conn,$sql2);
		while($value2= mysqli_fetch_array($query2))
		{
			echo "Address of the employee : <br/>";
			echo " House number: ".$value2['Hno'];
			echo "<br/>";
			echo " Area: ".$value2['Area'];
			echo "<br/>";
			echo " locality: ".$value2['locality'];
			echo "<br/>";
			echo " city: ".$value2['city'];
			echo "<br/>";
			echo " state: ".$value2['state'];
			echo "<br/>";
			echo " Pin code: ".$value2['pincode']."\n";
			echo "<br/>";
			echo '<a href="edit_add.php">    edit</a>';
			echo "<br/>";
		}
		echo "<br/><br/><br/>";
		$b=$value['Emp_id'];
		
		$sql3 = "SELECT * FROM emp_phoneno WHERE Emp_id = '$b'";
		$query3 = mysqli_query($conn,$sql3);
		while($value3= mysqli_fetch_array($query3))
		{
			echo " Phone number: ".$value3['phoneno'];
			echo "<br/>";
			echo '<a href="edit_phone.php">    edit</a>';
			echo "<br/>";
		}
		if($d==1 && $value['Dept_name']=='HR')
		{
			echo '<br/>';
			echo '<a href="new_emp.php">Add new employee</a>';
			echo '<br/>';
			echo '<a href="promotion.php">Enter employee promotion details</a>';
			echo '<br/>';
			echo '<a href="remove_emp.php">update leaving date of an employee</a>';
			echo '<br/>';
			echo '<a href="see_emp.php">see all employees details</a>';
		}
		
		if($value['Dept_name']=='Sales')
		{
			echo '<br/>';
			echo '<a href="cust_prod.php">Add new transaction record</a>';
		}
		
		echo '<br/>';
		echo '<a href="stock.php">Bought new Stock ??</a>';
		echo '<br/>';
		echo '<a href="p_details.php">See Product details </a>';
		echo '<br/>';
			echo '<a href="product.php">see all transaction details</a>';
		if($d==1 && $value['Dept_name']=='Sales')
		{
			echo '<br/>';
			echo '<a href="newcustomer.php">Manage customers</a>';
		}
	}
?>
	<form action="login2.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
</body>
</html>