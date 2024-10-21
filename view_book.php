<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "eye";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the database
$sql = "SELECT * FROM book";
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
<head>
    <title>Appointment Details</title>
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
    
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    margin-top: 5%;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th,
td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #4CAF50;
    color: #fff;
}

tr:hover {
    background-color: #f5f5f5;
}

</style>
<body>
    <div class="container">
        <h1>Appointment Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
