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
			Enter product id : <input type="text" name="id">
			<br/><br/>
			Enter stock : <input type="text" name="stock">
			<br/><br/>
			<input type="submit" name="submit">
		</form>
		<form action="employee_page.php" method="post">
			<input type="submit" name="back" value="Go back !!"/>
		</form>
		<form action="stock.php" method="post">
			<input type="submit" name="Another" value="Add another product"/>
		</form>
	</body>
</html>

<?php
include "connect.php";
if(isset($_POST['submit']))
{
	if(isset($_POST['stock']) && isset($_POST['id']))
	{
		$b=$_POST['id'];
		$c=$_POST['stock'];
		$sql = "select stock from product where prod_id=$b;";
		$query = mysqli_query($conn,$sql);
		while($value= mysqli_fetch_array($query))
		{
			$r = $c + $value['stock'];
		}
			$sql = "update product set stock = $r where prod_id=$b;";
			$query = mysqli_query($conn,$sql);
			echo mysqli_error($conn);
		
	}
}
?>