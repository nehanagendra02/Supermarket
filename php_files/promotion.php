<html>
<head>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
<body>
	<h3>Enter the Promotion details</h3><br/>
	<form method="post">
		Enter employee id : <input type="text" name="id"/><br/><br/>
		Enter old position : <input type="text" name="opos"/><br/><br/>
		Enter new position : <input type="text" name="npos"/><br/><br/>
		Enter new salary : <input type="text" name="sal"/><br/><br/>
		<input type="submit" name="submit" value="submit"/>
	</form>
	<form action="employee_page.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
	<?php
		include "connect.php";
		$n=1;
		if(isset($_POST['submit']))
		{
			if(isset($_POST['opos'])&&isset($_POST['id'])&& isset($_POST['npos'])&&isset($_POST['sal']))
			{
				$opos1=$_POST['opos'];
				$id1=$_POST['id'];
				$npos1=$_POST['npos'];
				$sal1=$_POST['sal'];
				$sql="select * from promotion where Emp_id=$id1;
				";
				$result=mysqli_query($conn,$sql);
				while($value= mysqli_fetch_array($result))
				{
					$n=$n+1;
				}
				
				$sql="insert into promotion values ($n,$id1,'$opos1','$npos1');
				";
				$result=mysqli_query($conn,$sql);
				echo mysqli_error($conn);
				$sql="update employee set salary='$sal1' where Emp_id=$id1;
				";
				$result=mysqli_query($conn,$sql);
				if($result)
					echo "Successful";
			}
			else{
				echo '<br/>';
				echo "Enter all the fields";}
		}
	?>
</body>
</html>