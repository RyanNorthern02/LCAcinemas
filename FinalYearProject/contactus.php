<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" type="text/css" href="contactus.CSS">

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
                <a class="nav-link" href="loginpage.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registration.HTML">Register</a>
            </li>
        </ul>
    </div>
</nav>
<body>
    <div class="container">
        <div class="form">
          <div class="contact-info">
            <h3 class="title">Get in touch with our team!</h3>
                <div class="media border p-3">
                    <img src="Profile.png" class="rounded">
                        <div class="media-body">
                        <h4>Ryan Northern </small></h4>
                    <div class="information">
                        <img src="img/emailaddress.jpg" class="icon"/>
                        <p>ryannorthern@gmail.com</p>
                </div>      
                </div>
                </div>
                <div class="media border p-3">
                    <img src="Profile.png" class="rounded">
                        <div class="media-body">
                        <h4>Paul Northern </small></h4>
                      <div class="information">
                        <img src="img/emailaddress.jpg" class="icon"/>
                        <p>pn@yahoo.com</p>
                    </div>
                  </div>
              </div>
            <div class="social-media">
              <h4>View our Social Media Accounts :</h4>
              <div class="social-icons">
              <a href="https://www.youtube.com/">
                <img src="img/youtube.png" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
              </a>
              <a href="https://www.instagram.com/">
                <img src="img/instagram.jpg" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
              </a>
              <a href="https://www.facebook.com/">
                <img src="img/facebook.jpg" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
              </a>
              </div>
            </div>
          </div>
          <div class="contact-form">
            <form action="contactus-process.php" autocomplete="on" method="post">
              <h3 class="title">Contact us</h3>
              <div class="input-container">
                <input type="text" name="name" class="input" />
                <label for="name">Username</label>
                <span>Username</span>
              </div>
              <div class="input-container">
                <input type="email" name="email" class="input" />
                <label for="email">Email</label>
                <span>Email</span>
              </div>
              <div class="input-container textarea">
                <textarea name="message" class="input"></textarea>
                <label for="message">Message</label>
                <span>Message</span>
              </div>
              <button type="submit" name="submit" class="btn btn-dark">Send</button>
            </form>
          </div>
        </div>
      </div>
        <div class="textwidget" style="background-color: gray; color: white;">
                <span>&copy; LCAcinemas. All rights reserved.
        </div>
  <script src="ContactUs.js"></script>
</body>
</html>