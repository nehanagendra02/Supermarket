<!docttype html>
<html>
	<head>
		<title> SuperMarket </title>
		<style>
			#button1{
				 height:50px; 
				 width:155px; 
				 margin: -20px -50px; 
				 position:absolute;
				 top:400; 
				 left:700;
				 font-size:200%
			}	
			#button2{
				 height:50px; 
				 width:155px; 
				 margin: -20px -50px; 
				 position:absolute;
				 top:500; 
				 left:700;
				 font-size:200%;
			}	
		</style>
		
				<style>
body {
    background-image: url("background1.jpg");
}
</style>
	</head>
	<body>
	<h1 style = "text-align : center"> SuperMarket </h1>
			<form action = "customer.php">
				<input type="submit" id="button1" value="Customer"/>
				<br/><br/>
			</form>
			<form action = "login2.php">
				<input type="submit" id="button2" value="Employee"/>
				<br/><br/>
			</form>
	</body>
</html>