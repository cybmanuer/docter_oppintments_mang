<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	font-family: Arial, Helvetica, sans-serif;
	background-color: #f1f1f1;
    background-image: url("https://cdn.wallpapersafari.com/31/96/ulU7ky.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
}

.container {
	width: 50%;
	margin: 50px auto;
	background-color: #fff;
	padding: 20px;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

h1 {
	text-align: center;
	margin-bottom: 20px;
}

form {
	display: flex;
	flex-direction: column;
}

label {
	margin-top: 10px;
}

input[type=text], input[type=email], input[type=password], input[type=tel] {
	padding: 10px;
	border-radius: 5px;
	border: none;
	margin-bottom: 20px;
    border: 1px black solid;
}

input[type=submit] {
	background-color: #4CAF50;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

input[type=submit]:hover {
	background-color: #3e8e41;
}

</style>
<body>
	<div class="container">
		<h1>Registration Form</h1>
		<form action="user_reg.php" method="POST">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>

			<label for="phone">Phone Number</label>
			<input type="tel" id="phone" name="phone" minlength="10" maxlength="10" required>

			<label for="email">Email</label>
			<input type="email" id="email" name="email" required>

			<label for="password">Password</label>
			<input type="password" id="password" name="password" maxlength="15" minlength="6" required>

			<label for="confirm_password">Confirm Password</label>
			<input type="password" id="confirm_password" name="confirm_password" minlength="6" maxlength="15" required>

			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>

<?php
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $conn = mysqli_connect("localhost", "root", "","eye");
    $u_name = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $u_pass = $_POST['password'];
    $c_pass = $_POST['confirm_password'];

    $sql = "SELECT * FROM users WHERE u_name='$u_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('USER OR PHONE ALREDY EXITS');</script>";
    }
    else if ($u_pass != $c_pass) {
        echo "<script>alert('PASSWORD NOT MATCHED');</script>";
        
    }    
    else{
    $u_name = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $u_pass = $_POST['password'];
    $c_pass = $_POST['confirm_password'];
    $exists=false;
    
        $sql = "INSERT INTO users (u_name, u_pass, email, phone) VALUES ('$u_name', '$u_pass', '$email', '$phone')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
}
    
?>

<?php
    if($showAlert){
    echo "<script>alert('REGISTRATION SUCESS')</script>";
    }
    if($showError){
    echo "<script>alert('REGISTRATION FAILED')</script>";
    }
?>

