<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <style>

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body{
    height: 100vh;
}

.container {
  /* max-width: 1200px; */
  margin: 0 auto;
  /* padding: 20px; */
  width: 100%;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 0;
  border-bottom: 1px solid #ccc;
  background-color: black;
  width: 100%;
  margin: 0%;
}

.navbar img {
  height: 70px;
  margin-right: 10px;
  margin-left: 3%;
}

.navbar ul {
  display: flex;
  list-style: none;
}

.navbar li {
  margin-right: 20px;
}
.navbar li :hover{
    color: black;
    background-color: #fff;
    border-radius: 5px;
    


}

.navbar li a {
  text-decoration: none;
  color: #333;
  color: white;
  font-weight: bold;
  font-size: 18px;
  text-transform: uppercase;
  font-weight: 700;
  padding: 10px;

}

.main-content {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  margin-top: 5%;
}

.card {
  width: 30%;
  margin-bottom: 20px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
  margin-top: 10%;
}

.card-image {
  height: 200px;
  overflow: hidden;
}

.card-image img {
  width: 100%;
  height: auto;
}

.card-title {
  padding: 10px;
  background-color: #333;
  color: #fff;
  font-weight: bold;
  text-align: center;
}
p{
    color: #fff;
    float: left;
    margin-left: -47%;
    font-size: 20px;
}
span{
    color: goldenrod;
    font-size: 22px;
}
a{
    text-decoration: none;
}

  </style>
  <body>
    <div class="container">
      <nav class="navbar">
        <img src="eye.png" alt="Logo"><p><span>E</span>YE<span> C</span>ARE<span> S</span>YSTEM</p>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">ABOUT US</a></li>
          <li><a href="#">CONTACT US</a></li>
          <li><a href="admin_login.php">Logout</a></li>
        </ul>
      </nav>

      <div class="main-content">
        <div class="card"><a href="add_doctor.php" alt="ADD DOCTORS"/>
          <div class="card-image">
            <img src="https://www.mygp.com/wp-content/uploads/2017/05/573774-PLOMDL-386.jpg" alt="Card Image">
          </div>
          <div class="card-title">
            ADD DOCTORS
          </div>
        </div></a>

        <div class="card"><a href="view_book.php">
          <div class="card-image">
            <img src="https://images.unsplash.com/photo-1624969862293-b749659ccc4e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YXBwb2ludG1lbnR8ZW58MHx8MHx8&w=1000&q=80" alt="Card Image">
          </div>
          <div class="card-title">
            VIEW APPOINTMENTTTT
          </div>
        </div>

        <div class="card"><a href="add_report.php">
          <div class="card-image">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMDXhJ0e-408QMt3wf07d1ETIiXqaDeeohUg&usqp=CAU" alt="Card Image">
          </div>
          <div class="card-title">
            ADD REPORT
          </div>
        </div></a>

      </div>
    </div>
  </body>
</html>
