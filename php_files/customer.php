<!doctype html>
<html>
	<head>
		<title>Customer page</title>
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
			
				$query="select * from product";
				$result=mysqli_query($conn,$query);
				$num=mysqli_num_rows($result);
				echo "<h3>Product Details are:<h3>";
				echo "<table border='1'>
						<tr>
							<th>Product_name</th>
							<th>Price</th>
							<th>Brand</th>
						</tr>";
				while($value=mysqli_fetch_array($result)){
					echo "<tr>
							<td>".$value['name'].'</td>
							<td>'.$value['price'].'</td>
							<td>'.$value['brand'].'</td>
						  </tr>';
				echo "<br>";}
				
			?>
	<form action="page1.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
	</body>
</html>