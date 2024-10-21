<!DOCTYPE html>
<html>
<head>
	<title>Eye Care Appointment Booking System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>

body{
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url("https://thumbs.dreamstime.com/b/stethoscope-calendar-page-date-blue-background-doctor-appointment-medical-concept-187068223.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 110vh;
}
.container {
	max-width: 600px;
	margin: 0 auto;
	padding: 20px;
	background-color: #f2f2f2;
    background-color: #b1b1b74f;
    /* background-image: url("https://thumbs.dreamstime.com/b/stethoscope-calendar-page-date-blue-background-doctor-appointment-medical-concept-187068223.jpg"); */
	border-radius: 5px;
    
}

h1 {
	text-align: center;
	margin-bottom: 30px;
}
form{
    margin-left: 3%;
}

form label {
	display: block;
	margin-bottom: 10px;
}

form input[type="text"],
form input[type="email"],
form input[type="date"],
form input[type="time"],
form textarea {
	width: 90%;
	padding: 10px;
	margin-bottom: 20px;
	border-radius: 5px;
	border: none;
	background-color: #ddd;

}

form input[type="submit"] {
	display: block;
	margin: 0 auto;
	padding: 10px 20px;
	background-color: #4CAF50;
	color: #fff;
	border-radius: 5px;
	border: none;
	cursor: pointer;
}

form input[type="submit"]:hover {
	background-color: #3e8e41;
}

</style>
<body>
	<div class="container">
		<h1>Book an Appointment</h1>
		<form method="post" action="book.php">
			<label for="name">Name:</label>
			<input type="text" name="name" required>
			<label for="email">Email:</label>
			<input type="email" name="email" required>
			<label for="phone">Phone:</label>
			<input type="text" name="phone" maxlength="10" minlength="10" required>
			<label for="date">Date:</label>
			<input type="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
			<label for="time">Time:</label>
			<input type="time" name="time" required>
			<label for="message">Message:</label>
			<textarea name="message" required></textarea>
			<input type="submit" value="Book Appointment">
		</form>
	</div>
</body>
</html>



<?php
$showAlert = false;
$showError = false;



if($_SERVER["REQUEST_METHOD"] == "POST"){
    // to check if the time and date is booked or not
    $date = $_POST["date"];
    $time = $_POST["time"];
    $conn = mysqli_connect("localhost", "root", "","eye");
    $sql = "SELECT * FROM book WHERE date='$date' AND time='$time' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    echo "<script>alert('PLEASE SELECT OTHER TIME');</script>";
    }
    else{
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $message = $_POST["message"];
        $exists=false;

        $sql = "INSERT INTO book (name, email, phone, date, time, message) VALUES ('$name', '$email', '$phone', '$date', '$time', '$message')";
        $result = mysqli_query($conn, $sql);
    }
        if ($result){
            $showAlert = true;
        }
    
    else{
        $showError = "Something Went Wrong";
    }
}
    
?>


<?php
    if($showAlert){
    echo "<script>alert('Booking Completed.')</script>";
    }
    if($showError){
    echo "<script>alert('Try Again.')</script>";
    }
    ?>































