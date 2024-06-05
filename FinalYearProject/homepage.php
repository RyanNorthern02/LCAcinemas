<?php

session_start();
include("database.php");

//Pulling data from customer table
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM customer WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}

//Pulling data from movies table
$conn = new connect();
$tbl = "movies";
$result = $conn->select_all($tbl);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="homepage.CSS">
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
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="loginpage.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Registration.HTML">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <img src="img/LCAcinemas.png" style="width:175px; height:175px;" class="logo">
    <li class="nav-item">
    <h4 style="color:rgb(221, 213, 213); text-align: center;">Our social media accounts</h4>
    <hr>
    <a href="https://www.youtube.com/">
        <img src="img/youtube.png" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
    </a>
    <a href="https://www.instagram.com/">
        <img src="img/instagram.jpg" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
    </a>
    <a href="https://www.facebook.com/">
        <img src="img/facebook.jpg" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
    </a>
  </li>
</nav>
<div id="movieCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/catching_fire.jpg" class="carousel" alt="Catching Fire" style="width: 100%; height: 350px;">
    </div>
    <div class="carousel-item">
      <img src="img/GOF.jpg" class="carousel" alt="GOF" style="width: 100%; height: 350px;">
    </div>
    <div class="carousel-item">
      <img src="img/hallows.jpg" class="carousel" alt="Hallows" style="width: 100%; height: 350px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#movieCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#movieCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<body>
<div class="row">
    <div class="movie">
    <?php
    //Displaying the movies
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){

        $gen=$conn->select("genre",$row["genre_id"]);
        $genre=$gen->fetch_assoc();

          ?>
          <div class="movie-item">
                  <img src=<?php echo $row["movie_picture"];?> alt="Movie 1">
                  <h3 class="text-center mt-2"><?php echo $row["Title"];?></h3>
                  <p><b>Genre: </b> <?php echo $genre["genre_name"];?></p>
                  <p><b>Description: </b> <?php echo $row["Description"];?></p>
                  <a href="Ticket&SeatPage.php" class="btn btn-dark" role="button">Book Now</a>
          </div>
          <?php
            }
          }
        ?>
    </div>
</div>
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