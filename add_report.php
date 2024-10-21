<!DOCTYPE html>
<html>
<head>
	<title>Upload Test Report</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 20px;
			margin-top: 100px;
			background-color: #fff;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
			border-radius: 5px;
			width: 400px;
		}
		.form-group {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 20px;
			width: 100%;
		}
		label {
			font-size: 16px;
			margin-bottom: 10px;
		}
		input[type="text"], input[type="email"], input[type="file"] {
			width: 100%;
			padding: 10px;
			border: none;
			border-radius: 5px;
			background-color: #f4f4f4;
			font-size: 16px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px;
			font-size: 16px;
			cursor: pointer;
			transition: all 0.3s ease;
		}
		input[type="submit"]:hover {
			background-color: #0062cc;
		}
	</style>
</head>
<body><center>
	<div class="container">
		<h1>Upload Test Report</h1>
		<form method="post" action="add_report.php" enctype="multipart/form-data">
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" required>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" required>
			</div>
			<div class="form-group">
				<label>Test Report:</label>
				<input type="file" name="report_file" required>
			</div>
			<input type="submit" name="save" value="Upload Report">
		</form>
	</div></center>
</body></html>



<?php
	// connect to the database
$conn = mysqli_connect("localhost", "root", "","eye");
	

if (isset($_POST['save'])) {
	// handle file upload
    $name = $_POST['name'];
	$email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE u_name ='$name' AND email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows < 1) {
    echo "<script>alert('USER OR EMAIL NOT FOUND');</script>";
    }
  else{

	$name = $_POST['name'];
	$email = $_POST['email'];
	$report_file = $_FILES['report_file']['name'];
	$target_dir = "report/";
	$target_file = $target_dir . basename($_FILES["report_file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$extensions_arr = array("pdf");

	if (in_array($imageFileType,$extensions_arr)) {
		// insert record into the database
		$sql = "INSERT INTO report (name, email, file) VALUES ('$name', '$email', '$report_file')";
		mysqli_query($conn, $sql);

		// move uploaded file to the uploads folder
		move_uploaded_file($_FILES['report_file']['tmp_name'],$target_dir.$report_file);

           echo "<script>alert('report has been uploaded successfully.');</script>";

	} else {
        echo "<script>alert('Invalid file format. Only PDF files are allowed.');</script>";

        
	}
}
}
	mysqli_close($conn);
?>
