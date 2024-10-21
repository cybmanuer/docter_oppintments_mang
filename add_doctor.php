<!DOCTYPE html>
<html>
  <head>
    <title>Add a Doctor</title>
    <style>

body{
    background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6)), url("https://thumbs.dreamstime.com/b/stethoscope-calendar-page-date-blue-background-doctor-appointment-medical-concept-187068223.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 110vh;
}
   .container {
  width: 70%;
  margin: 0 auto;
  padding-top: 50px;
  text-align: center;
}

h1 {
  font-size: 3em;
  margin-bottom: 30px;
}

form {
  display: inline-block;
  text-align: left;
  padding: 30px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

label {
  font-size: 1.2em;
}

input[type="text"], input[type="tel"], input[type="email"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ccc;
  background-color: #fff;
  border-radius: 4px;
}

input[type="file"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #fff;
  border-radius: 4px;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
  font-size: 1.2em;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

    </style>
  </head>
  <body>
    <div class="container">
      <h1>Add a Doctor</h1>
      <form action="add_doctor.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" minlength="10" maxlength="10" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit">Add Doctor</button>
      </form>
    </div>
  </body>
</html>




<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = mysqli_connect("localhost", "root", "","eye");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    // Get the form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];  

    $sql = "SELECT * FROM doctor WHERE name='$name' AND phone='$phone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<script>alert('USER OR PHONE ALREDY EXITS');</script>";
    }
  else{
  // Upload the image file
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" ) {
    echo "Sorry, only JPG, JPEG, PNG Type files are allowed.";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      // Insert the doctor data into the database
    //   $location = "images/" . $files;
      $sql = "INSERT INTO doctor (name, address, phone, email, image) VALUES ('$name', '$address', '$phone', '$email', '$target_file')";

      if ($conn->query($sql) === TRUE) {  
        echo "<script>alert('Doctor added successfully!')</script> ";
      } else {
        echo "<script>alert('Doctor addeding FAILED!')</script> ";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

  // Close the database connection
  $conn->close();
}
?>
