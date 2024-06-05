<?php
session_start();

//Connect to the database
$host = 'localhost';
$db   = 'finalproject';
$user = 'root';
$pass = 'Lisnaskea2024!';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if the login form is submitted
if(isset($_POST["submit"])){
  $CustomerEmail = $_POST["CustomerEmail"];
  $CustomerPassword = $_POST["CustomerPassword"];

  // Select the user from the database using the email
  $stmt = $conn->prepare("SELECT * FROM customer WHERE CustomerEmail = ?");
  $stmt->bind_param("s", $CustomerEmail);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  //check if the user is already registered
  if($result->num_rows > 0){
    // Verify the password hash
    if(password_verify($CustomerPassword, $row["CustomerPassword"])){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["logged_in"] = true;
      //redirect to homepage if credentials correct
      header("Location: homepage.php");
    }
    else{
      echo "<script>alert('Password Incorrect');</script>";
    }
  }
  else{
    echo "<script>alert('User Not Registered');</script>";
  }
}
?>

<html style="background-color: grey;">
<head>
  <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="Login&Reg.CSS">
  <meta charset="utf-8">
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  <script src="/js/validation.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="textwidget" style="background-color: gray; color: white; text-align: center;">
    <span>Contact us through | northern-r@ulster.ac.uk</span>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position:sticky; display: flex; justify-content: space-between;">
    <!-- Links -->
    <img src="img/LCAcinemas.png" style="width:175px; height:175px;" class="logo">
    <div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="HomePage.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comingsoon.php">Coming Soon</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ContactUs.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>
 <!--Main Body-->
    <form method="POST" action="loginpage.php" style="background-color: lightgrey; border-radius: 15px;">
      <header style="text-align: -webkit-center;">
        <h2>LOGIN</h2>
      </header>
      <hr>
        <label for="CustomerEmail">Email</label>
          <input type="email" name="CustomerEmail" id="CustomerEmail" placeholder="Enter Email" style="border-radius: 30px;" required value="">
        <label for="CustomerPassword">Password</label>
          <input type="password" name="CustomerPassword" id="CustomerPassword" placeholder="Enter Password" style="border-radius: 30px;" required value="">
        <hr>
          <button type="submit" name="submit" style="border-radius: 30px;"> Login</button>
      <div class="links">
        <a href="#">Forgot Password</a>
      </div>
      <div class="links">
        <a href="Registration.HTML">Register</a>
      </div>
    </form>
  </main>
  <footer style="background-color: #343a40; text-align: center; color:rgb(221, 213, 213); display: flex; justify-content: space-between;">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                  <h2 style="text-align: center; color: white;">Our Location!</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2287.720451714888!2d-7.323685324075718!3d55.0130651487251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485fe1efe6d7f353%3A0xd0d9fe360e040ba4!2sBrunswick%20Moviebowl!5e0!3m2!1sen!2suk!4v1707091770516!5m2!1sen!2suk" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <form>
                        <header>
                          <h1 style="color: white;">Cinema Opening Times</h1>
                        </header>
                        <div>
                          <p>Monday: 9am-9pm<br>
                            Tuesday: 9am-9pm<br>
                            Wednesday: 9am-9pm<br>
                            Thursday: 9am-9pm<br>
                            Friday: 8am-11pm<br>
                            Saturday: 8am-11pm<br>
                            Sunday: 10am-8pm
                          </p>
                        </div>
                      </form> 
                </div>
                <div class="col-md-6"> 
                    <header>
                          <h1 style="color: white;">Our Contacts!</h1>
                    </header>
                    <div class="media border p-3">
                        <div class="media-body">
                          <h4>Ryan Northern </small></h4>
                        <div class="information">
                          <p>ryannorthern@gmail.com</p>
                    </div>      
                  </div>
                </div>
                <div class="media border p-3">
                        <div class="media-body">
                        <h4>Paul Northern </small></h4>
                      <div class="information">
                        <p>pn@yahoo.com</p>                    
                    </div>
                  </div>
                </div>
            </div>
        </footer>
        <div class="textwidget" style="background-color: gray; color: white;">
                <span>&copy; LCAcinemas. All rights reserved.
        </div>
</body>
</html>