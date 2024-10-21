<!DOCTYPE html>
<html>
<head>
	<title>View Test Report</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 20px;
		}

		th, td {
			text-align: left;
			padding: 20px;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		.container {
			max-width: 700px;
			margin: auto;
			padding: 20px;
		}

		.back-btn {
			display: inline-block;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: white;
			text-decoration: none;
			margin-top: 20px;
			border-radius: 4px;
		}

		.back-btn:hover {
			background-color: #3e8e41;
		}
        a{
            padding: 6px;
            background-color: black;
            color: white;
            font-size: 17px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
        }
	</style>
</head>
<body>
	<div class="container">
		<center><h1>Test Reports</h1></center><br/>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Report</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// connect to the database
                    $conn = mysqli_connect("localhost", "root", "","eye");

					// retrieve records from the database
					$sql = "SELECT * FROM report";
					$result = mysqli_query($conn, $sql);

					// output records as table rows
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>{$row['name']}</td>";
						echo "<td>{$row['email']}</td>";
						echo "<td><a href='report/{$row['file']}' target='_blank'>View Report</a></td>";
						echo "</tr>";
					}

					mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
