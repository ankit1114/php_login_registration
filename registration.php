<!DOCTYPE html>
<html>
<head>
	<title> User Registration</title>
</head>
<body>
	<div>
		<form action="registration.php" method="post">
			<div class="container">
			<h1>Registration form</h1>
				<p>fill the form with correct value</p>
				<label for="first name"> <b> first name</b></label><br>
				<input type="text" name="first name" required><br>	

				<label for="last name"> <b> last name</b></label><br>
				<input type="text" name="last name" required><br>

				<label for="email"> <b> email</b></label><br>
				<input type="text" name="email" required><br>

				<label for="contact number"> <b>contact number</b></label><br>
				<input type="text" name="contact number" required><br>

				<label for="password"> <b>password</b></label><br>
				<input type="password" name="password" required><br>
       
				<input type="submit" name="submit" value="signUp">


			</div>
		</form>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ankit";

	$conn=mysqli_connect($servername,$username,$password,$dbname);
	
	
	if ($conn) {
		echo"connection ok";
	}
	else
	{
		die("Connection error: " . mysqli_connect_error());	
	}

	if(isset($_POST["submit"])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email']; 
		$contact_number = $_POST['contact_number'];
		$password = $_POST['password'];
		$sql = "INSERT INTO `loginankit` (`id`, `first_name`, `last_name`, `email_id`, `contact_number`, `password`) VALUES (NULL, '$first_name', '$last_name', '$email', '$contact_number', '$password')";
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>
	</div>

</body>
</html>