<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" href="style.css">
</head>
<style>
*{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
body{
	background-color: black;
    background-image: url("https://i.pinimg.com/originals/1b/f8/bc/1bf8bc815c4bd35bac0a5524eb13e09e.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    /* background-size: contain; */
}
.login-box{
	width: 280px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	color: #fff;
}
.login-box h2{
	text-align: center;
	margin-bottom: 40px;
    font-size: 30px;
}
.login-box .user-box{
	position: relative;
}
.login-box .user-box input{
	width: 100%;
	padding: 10px 0;
	font-size: 16px;
	color: #fff;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #fff;
	outline: none;
	background: transparent;
}
.login-box .user-box label{
	position: absolute;
	top: 0;
	left: 0;
	padding: 10px 0;
	font-size: 20px;
    font-weight: 700;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
	color: #fff;
	pointer-events: none;
	transition: 0.5s;
}
.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label{
	top: -20px;
	left: 0;
	color: #00bfff;
	font-size: 16px;
}
.login-box input[type="submit"]{
	background: transparent;
	border: none;
	outline: none;
	color: #fff;
	background: #00bfff;
	padding: 10px 20px;
	cursor: pointer;
	border-radius: 5px;
    font-weight: 600;
}
.login-box input[type="submit"]:hover{
	background-color: #006699;
	color: #fff;
}

a{
    color: white;
    text-decoration: none;
}
p :hover{
    padding: 10px;
    border-radius: 10px;
    color: black;
    background-color: white;
    text-decoration: none;
}
</style>
<body>
	<div class="login-box">
		<h2> ADMIN LOGIN    </h2>
		<form method="post" action="admin_login.php">
			<div class="user-box">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="user-box">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
			<input type="submit" name="submit" value="LOGIN">
            <br/><br/><br/><center>
            <p><a href="user_login.php">LOGIN AS USER</a></p></center>
		</form>
	</div>
</body>
</html>
<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'eye';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if(!$conn){
		die('Could not connect: ' . mysqli_error());    
	}
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM admin WHERE a_name = '".$username."' AND a_pass = '".$password."'";
		
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) > 0){
			header("Location: admin_home.php");
		}else{
			// echo "<p>Invalid Login</p>";
            echo"<script>alert('INVALID USER OR PASSWORD')</script>";
		}
	}
?>
