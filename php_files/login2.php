<?php 
include "connect.php";
session_start();
$msg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST["name"])&&isset($_POST["password"])){
    $name = $_POST["name"];
    $password = ($_POST["password"]);
	 if ($name == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {
        $sql = "SELECT * FROM employee WHERE emp_id = '$name' AND password = '$password'";
        $query = mysqli_query($conn,$sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
            exit;
        }

        if (mysqli_num_rows($query) > 0) {
			echo "Log in successful\n";
            echo '<a href="employee_page.php">Next_Page</a>';
        }
		if (mysqli_num_rows($query) == 0){
			$msg = "Username and password do not match";
			echo $msg;
			}
		$_SESSION['a']=$name;
    }
	}
}
?>

<!DOCTYPE html>
<html>
<head>
		<style>
body {
    background-image: url("background1.jpg");
}
</style>
</head>
<body>
	<form name="frmregister" method="post" >
	<br><br><br>
	<h3>Employee Login:</h3><br>
		<table class="form" border="0"> 
			
			<tr>
				<th><label for="name"><strong>Username:</strong></label></th>
				<td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Password:</strong></label></th>
				<td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
			</tr>
			<tr>
			<td></td>
				<td class="submit-button-right">
				<input class="send_btn" type="submit" value="Submit" alt="Submit" title="Submit" /></td>				
			</tr>
		</table>
	</form>
	
	<form action="page1.php" method="post">
		<input type="submit" name="back" value="Go back !!"/>
	</form>

</body>
</html>
