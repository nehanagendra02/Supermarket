<!DOCTYPE HTML>
<?php
include "connect.php";
session_start();
$n=$_SESSION['a'];
?>
<html>

<head>
<title>Add new employee</title>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
<body>		
		<h1>Enter details</h1>
		<br/>
		<form method = "post">
			Employee id : <input type="text" name="eid">
			<br/><br/>
			Employee name : <input type="text" name="name">
			<br/><br/>
			Designation : <input type="text" name="desig">
			<br/><br/>
			Department : <input type="text" name="dept">
			<br/><br/>
			Join date : <input type="text" name="jdate">
			<br/><br/>
			Salary : <input type="text" name="sal">
			<br/><br/>
			Default Password : <input type="text" name="pass">
			<br/><br/>
			<h2>Address details</h2>
			house no : <input type="text" name="houseno">
			<br/><br/>
			area : <input type="text" name="area">
			<br/><br/>
			locality : <input type="text" name="locality">
			<br/><br/>
			city : <input type="text" name="city">
			<br/><br/>
			state : <input type="text" name="state">
			<br/><br/>
			pin code : <input type="text" name="pin">
			<br/><br/>
			Phone number : <input type="text" name="phoneno">
			<br/><br/>
			<input type="submit" name="submit">
		</form>
	</body>
	<?php
		if(isset($_POST['submit']))
		{
			if(isset($_POST['desig']))
			{
				$des1=$_POST['desig'];
				$sql="select desig_id from designation where desig_name='$des1'; 
				";
				$result=mysqli_query($conn,$sql);
				$value= mysqli_fetch_array($result);
			}
			if(isset($_POST['eid']))
			{
				$eid1=$_POST['eid'];
			}
			else
				$eid1=NULL;
			
			if(isset($_POST['name']))
			{
				$name1=$_POST['name'];
			}
			else
				$name1=NULL;
			
			if(isset($_POST['desig']))
			{
				$desig1=$value['desig_id'];
			}
			else
				$desig1=NULL;
			
			if(isset($_POST['dept']))
			{
				$dept1=$_POST['dept'];
			}
			else
				$dept1=NULL;
			
			if(isset($_POST['jdate']))
			{
				$jdate1=$_POST['jdate'];
			}
			else
				$jdate1=NULL;
			
			if(isset($_POST['sal']))
			{
				$sal1=$_POST['sal'];
			}
			else
				$sal1=NULL;
			
			if(isset($_POST['pass']))
			{
				$pass1=$_POST['pass'];
			}
			else
				$pass1=NULL;
			
			if(isset($_POST['houseno']))
			{
				$hno1=$_POST['houseno'];
			}
			else
				$hno1=NULL;
			
			if(isset($_POST['area']))
			{
				$area1=$_POST['area'];
			}
			else
				$area1=NULL;
			
			if(isset($_POST['locality']))
			{
				$loc1=$_POST['locality'];
			}
			else
				$loc1=NULL;
			
			if(isset($_POST['city']))
			{
				$city1=$_POST['city'];
			}
			else
				$city1=NULL;
			if(isset($_POST['state']))
			{
				$state1=$_POST['state'];
			}
			else
				$state1=NULL;
			if(isset($_POST['pin']))
			{
				$pin1=$_POST['pin'];
			}
			else
				$pin1=NULL;
			if(isset($_POST['phoneno']))
			{
				$ph1=$_POST['phoneno'];
			}
			else
				$ph1=NULL;
			
			$sql="insert into employee values ($eid1,$desig1,'$name1','$dept1','$jdate1',$sal1,'$pass1',NULL);";
			$result=mysqli_query($conn,$sql);
			echo mysqli_error($conn);
			echo '<br/>';
			$sql2="insert into emp_phoneno values ($eid1,$ph1);";
			$result2=mysqli_query($conn,$sql2);
			echo mysqli_error($conn);
			echo '<br/>';
			$sql1="insert into emp_Address values ($eid1,'$hno1','$area1','$loc1','$city1','$state1','$pin1');";
			$result1=mysqli_query($conn,$sql1);
			echo mysqli_error($conn);
			echo '<br/>';
			if($result && $result1 && $result2)
			echo "Entered successfully";
			echo '<br/>';
			echo '<a href="employee_page.php">back to your dashboard</a>';
		}
	
	?>
</html>