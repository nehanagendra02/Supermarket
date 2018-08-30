<!doctype html>
<html>
	<head>
		<title>Sales</title>
		<link rel="stylesheet" href="background.css">
				<style>
body {
    background-image: url("background1.jpg");
}
</style>
	</head>
	<body class="class">
		<form method="post">
			<h2>Product Name</h2>
			<input type="text" name="product_name">
			<br><br>
			<h2>Quantity</h2>
			<input type ="number" name="quantity">
			<br><br>
			<input type="submit" value="Add one">
			<br><br>
		</form>
		<form action="comp_trans.php">
			<input type="submit" value="Enter">
		</form>
			<?php 
				include "connect.php";
				if(isset($_POST['product_name'])){
					$prod=$_POST['product_name'];
					$price ="select * from product where name = '$prod'
					";
					$query=mysqli_query($conn,$price);
					$value=mysqli_fetch_array($query);
					
					if(isset($value["price"])){
						$quantity=$_POST['quantity'];
						$stock=($value["stock"]) - $quantity;
						
						if($stock >0){
						$query2="update product set stock=$stock where name='$prod'
						"; 
						$result=mysqli_query($conn,$query2);
						session_start();
						$trans_id1=$_SESSION['trans_id'];
						$prod_id1=$value['prod_id'];
						$query3="insert into prod_trans values($trans_id1,$prod_id1,$quantity);
						";
						$result1=mysqli_query($conn,$query3);
						}
						
						else 
							echo "<h5 >No stock</h5>";
					}
					
				}
			?>
		
	
	</body>
</html>