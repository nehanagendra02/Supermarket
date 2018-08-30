<?php
		session_start();
		include "connect.php";
		
		$u_name2 = $_SESSION["link_name"];
		$pass2 = $_SESSION["link_pass"];
		echo $_SESSION["link_name"];
		if(isset($u_name2)&&isset($pass2)){
			$query="select password from employee where emp_id='$u_name2';
			";
		echo $pass2;
		$result = mysqli_query($conn,$query);
		while($value= mysqli_fetch_array($result))
		{echo $value['password'];
			if($value['password']==$pass2)
			{
				echo "corrrect";
			}
			else
				echo "wrong password go back!!";
		}
		}
?>
<html>
<body>
	<h1>Employee details : </h1>
	<p>
</body>
	

</html>