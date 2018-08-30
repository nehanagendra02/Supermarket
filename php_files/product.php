<!doctype html>
<html>
	<head>
		<title>Transactions list</title>
				<style>
body {
    background-image: url("background1.jpg");
}
</style>
	</head>
	<body>
		
		
		<?php 
			include 'connect.php';
			//if(isset($_POST['id'])){
				$query="select prod_trans.trans_id,prod_trans.prod_id,product.name,prod_trans.quantity,transaction.final_amount
						from prod_trans
						join transaction on prod_trans.trans_id=transaction.trans_id
						join product on prod_trans.prod_id=product.prod_id;";
				$result=mysqli_query($conn,$query);
				echo "<h3>Transaction Details are:<h3>";
				echo "<table border='1'>
						<tr>
							<th>Trans_id</th>
							<th>Product_id</th>
							<th>Product_name</th>
							<th>Quantity</th>
							<th>Amount paid</th>
						</tr>";
				while($value=mysqli_fetch_array($result)){
					echo "<tr>
							<td>".$value['trans_id'].'</td>
							<td>'.$value['prod_id'].'</td>
							<td>'.$value['name'].'</td>
							<td>'.$value['quantity'].'</td>
							<td>'.$value['final_amount'].'</td>
						  </tr>';
				echo "<br>";}
			//}
		?>
	<form action="employee_page.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
	</body>
	
</html>