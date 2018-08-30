<!doctype html>
<html>
	<head>
		<title>Product list</title>
				<style>
body {
    background-image: url("background1.jpg");
}
</style>
	</head>
	<body>
		<?php 
			include "connect.php";	
					$query="select * from product";
					$result=mysqli_query($conn,$query);
					$num=mysqli_num_rows($result);
					echo "<h3>Product Details are:<h3>";
					echo "<table border='1'>
							<tr>
								<th>Product_id</th>
								<th>Product name</th>
								<th>Price</th>
								<th>Type</th>
								<th>Stock</th>
								<th>Brand</th>
							</tr>";
					while($value=mysqli_fetch_array($result)){
						echo "<tr>
								<td>".$value['prod_id'].'</td>
								<td>'.$value['name'].'</td>
								<td>'.$value['price'].'</td>
								<td>'.$value['type'].'</td>
								<td>'.$value['stock'].'</td>
								<td>'.$value['brand'].'</td>
							  </tr>';
					echo "<br>";}
					echo "<form action='employee_page.php' method='post'>
		<input type='submit' name='back' value='Go back !!'/>
	</form>";				
			?>
	
	</body>
</html>