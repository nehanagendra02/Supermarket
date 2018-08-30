<!doctype html>
<html>
	<head>
		<title>Cust_prod page</title>
				<style>
body {
    background-image: url("background1.jpg");
}
</style>
	</head>
	<body >
		<form  method="post">
			<h4>Are you registered?</h4>
			If yes enter customer id, counter number and select "Submit" and then "Enter" <br/>
			If no enter counter number only and select "Submit" and then "Enter" <br/>
			<h4>If yes ,then enter your id:</h4>
			<input type="number" name="customer_id"/><br><br>
			<h4>Enter counter no.:</h4>
			<input type="number" name="counter"/><br><br>
			<input type="submit" name="submit" value="Submit"/><br><br>
		</form>
		<form action="sales.php">
			<input type="submit" value="Enter"/>
		</form>
		
		<?php 
			include "connect.php";
			if(isset($_POST['submit'])){
			$query4="insert into transaction(counter) values(NULL);";
				$result=mysqli_query($conn,$query4);
				$query5="select * from transaction order by trans_id desc limit 1;";
				$result1=mysqli_query($conn,$query5);
				$value=mysqli_fetch_array($result1);
				$trans_id=$value['trans_id'];
				$query6 = "update transaction set no_of_prod=0 where trans_id=$trans_id;";
				$result6=mysqli_query($conn,$query6);
				session_start();
				$_SESSION['trans_id']=$value['trans_id'];
			if(isset($_POST['customer_id'])){
				$cust_id=$_POST['customer_id'];
				$query="insert into cust_trans values ($cust_id,$trans_id)";
				$result2=mysqli_query($conn,$query);
				$_SESSION['cust_id']=$_POST['customer_id'];
			}
			else 
				$_SESSION['cust_id']=0;
			$_SESSION['counter']=$_POST['counter'];}
		?>
		</br/>
		<form action="employee_page.php" method="post">
			<input type="submit" name="back" value="Go back !!"/>
		</form>
	</body>
</html>