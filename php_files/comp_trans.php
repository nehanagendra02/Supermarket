<!doctype html>
<html>
	<head>
		<title>Complete Transaction page</title>
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
			
			
				$trans_id=$_SESSION['trans_id'];
				$query="select product.name , product.price,prod_trans.quantity,section.offer
						from product 
						join prod_trans
						on prod_trans.prod_id=product.prod_id and prod_trans.trans_id=$trans_id
						join section 
						on section.sec_id=product.sec_id";
				$result=mysqli_query($conn,$query);
				$num=mysqli_num_rows($result);
				if($num!=0){
				echo "<h3>Transaction Details are:<h3>";
				echo "<table border='1'>
						<tr>
							<th>Product_name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Actual_Amount</th>
							<th>Offer</th>
							<th>Final_Amount</th>
						</tr>";
				$quantity1=0;
				$final_amt1=0;
				while($value=mysqli_fetch_array($result)){
					echo "<tr>
							<td>".$value['name'].'</td>
							<td>'.$value['price'].'</td>
							<td>'.$value['quantity'].'</td>
							<td>'.($value['price'] * $value['quantity']).'</td>
							<td>'.$value['offer'].'</td>';
					$offer1=1-($value['offer']/100);
					$final_amt=$value['price'] * $offer1 * $value['quantity'] ;
					echo	'<td>'.$final_amt.'</th>
						  </tr>';
					echo "<br>";
					// $quantity1=$quantity1 + $value['quantity'];
					$final_amt1=$final_amt1+$final_amt;
	;			}
				echo "</table>";
				$counter=$_SESSION['counter'];
				$cust_id=$_SESSION['cust_id'];
				if($cust_id!=-1){
					 $query4="select * from customer where cust_id=$cust_id";
					 $result4=mysqli_query($conn,$query4);
					 $value1=mysqli_fetch_array($result4);
					 $offer2=1-($value1['offer']/100);
					 $final_amt2=$final_amt1* $offer2;
					}
				else 
					 $final_amt2=$final_amt1;
					$query3="update transaction set counter=$counter where trans_id=$trans_id";
					// $query1="update transaction set no_of_prod=$quantity1 where trans_id=$trans_id";
					$query2="update transaction set Act_amount=$final_amt1 where trans_id=$trans_id";
					$query5="update transaction set final_amount=$final_amt2 where trans_id=$trans_id";
					// $result1=mysqli_query($conn,$query1);
					$result2=mysqli_query($conn,$query2);
					$result3=mysqli_query($conn,$query3);
					$result5=mysqli_query($conn,$query5);
					echo "<br>";
					echo 'Amount to be paid:'."$final_amt2" ;
					
				}
				else 
					echo "No product selected";
						
			
		?>
		<br/>
	<form action="cust_prod.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
	</body>
</html>