<?php 

include("database.php");

//Pulling data from coming soon table
$conn = new connect();
$tbl = "comingsoon";
$result = $conn->select_all($tbl);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coming Soon</title>
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
                <a class="nav-link" href="ContactUs.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="loginpage.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registration.HTML">Register</a>
            </li>
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
<body>
  <div class="row">
    <div class="movie">
      <?php
      //Displaying the data from the coming soon table
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){

        $gen=$conn->select("genre",$row["genre_id"]);
        $genre=$gen->fetch_assoc();
        ?>
          <div class="movie-item">
                  <img src=<?php echo $row["movie_picture"];?> alt="Movie 1">
                  <h3 class="text-center mt-2"><?php echo $row["title"];?></h3>
                  <p><b>Release Date: </b> <?php echo $row["release_date"];?></p>
                  <p><b>Genre: </b> <?php echo $genre["genre_name"];?></p>
                  <p><b>Description: </b> <?php echo $row["description"];?></p>
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