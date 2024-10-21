<!DOCTYPE html>
<html>
<head>
	<title>Doctor Information</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}
		.card {
			display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #fff;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);
			padding: 20px;
			margin: 20px;
			border-radius: 5px;
			width: 300px;
			height: 400px;
			transition: all 0.3s ease;
		}
		.card:hover {
			transform: translateY(-10px);
			box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.3);
		}
		.card img {
			width: 200px;
			height: 200px;
			object-fit: cover;
			border-radius: 50%;
			margin-bottom: 20px;
		}
		.card h2 {
			font-size: 24px;
			margin-bottom: 10px;
		}
		.card p {
			font-size: 16px;
			line-height: 1.5;
			margin-bottom: 10px;
			text-align: center;
		}
	</style>
</head>
<body>
    <center><h1>DOCTORS LIST</h1></center>
	<div class="container">
        
		<?php
			// connect to the database
	
            $conn = mysqli_connect("localhost", "root", "","eye");

			// select all doctors from the database
			$sql = 'SELECT * FROM doctor';
			$result = mysqli_query($conn, $sql);

			// loop through the results and display each doctor in a card
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<div class="card">';
				echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
				echo '<h2>' . $row['name'] . '</h2>';
				echo '<p>' . $row['address'] . '</p>';
				echo '<p>' . $row['phone'] . '</p>';
				echo '<p>' . $row['email'] . '</p>';
				echo '</div>';
			}

			// close the database connection
			mysqli_close($conn);
		?>
	</div>
</body>
</html>
