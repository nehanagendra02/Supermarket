<!doctype html>
<html>
	<head>
		<title>New customer page</title>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
	</head>
	<body>
		<form method ="post">
			<h3>Adding customer details:</h3>
			<h4>Enter customer name:</h4>
			<input type="text" name ="cust_name">
			<h4>Enter customer Housenumber</h4>
			<input type ="text" name="cust_hno">
			<h4>Enter customer Area</h4>
			<input type ="text" name="cust_area">
			<h4>Enter customer locality</h4>
			<input type ="text" name="cust_locality">
			<h4>Enter customer city</h4>
			<input type ="text" name="cust_city">
			<h4>Enter customer state</h4>
			<input type ="text" name="cust_state">
			<h4>Enter customer pincode</h4>
			<input type ="number" name="cust_pincode">
			<input type="submit" name ="button" value="submit"> 
		</form>	
		
		
		<?php 
			include 'connect.php';
			if(isset($_POST['button'])){
			if(isset($_POST['cust_name'])){
				$cust_name=$_POST['cust_name'];
				$query="insert into customer(name) values ('$cust_name')";
				$result=mysqli_query($conn,$query);
				echo "New Customer Added ";
				$query1="select * from customer order by cust_id desc limit 1";
				$result1=mysqli_query($conn,$query1); 
				$value=mysqli_fetch_array($result1);
				$cust_id=$value['cust_id'];
			}
			else echo ".Customer name not entered";
			if( isset($_POST['cust_hno']) && isset($_POST['cust_area']) && isset($_POST['cust_locality']) && isset($_POST['cust_city']) && isset($_POST['cust_state']) &&
						isset($_POST['cust_pincode'])){
				$cust_hno=$_POST['cust_hno'];
				$cust_area=$_POST['cust_area'];
				$cust_locality=$_POST['cust_locality'];
				$cust_city=$_POST['cust_city'];
				$cust_state=$_POST['cust_state'];
				$cust_pincode=$_POST['cust_pincode'];
				$query2="insert into cust_address values($cust_id,'$cust_hno','$cust_area','$cust_locality','$cust_city','$cust_state',$cust_pincode)";
				$result2=mysqli_query($conn,$query2); 
			}}
		?>
	<form action="employee_page.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>
		
	</body>
</html>





