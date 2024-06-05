<?php
session_start();

// Check if the admin is logged in correctly
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Admin not logged in, redirecting to the login page
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="login&reg.CSS">

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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="position:sticky; display: flex; justify-content: space-between;">
  <!-- Links -->
  <img src="LCAcinemas.png" style="width:175px; height:175px;" class="logo">
  <div style="width: 100%; text-align: center; color: white;">
    <h1>Welcome, Admin!</h1>
  </div>
  <div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5" style="background-color: lightgrey; border-radius: 10px; padding: 20px;">
                <form action="modify_movie.php" method="post" enctype="multipart/form-data">
                    <h2>Add a Movie</h2>
                    <hr>
                    <label for="title">Title:</label><br>
                        <input type="text" id="title" name="title" required><br>
                    <label for="genre_id">Genre ID:</label><br>
                        <input type="number" id="genre_id" name="genre_id"><br>
                    <label for="duration">Duration:</label><br>
                        <input type="text" id="duration" name="duration"><br>
                    <label for="release_date">Release Date:</label><br>
                        <input type="date" id="release_date" name="release_date" required><br>
                    <label for="description">Description:</label><br>
                        <textarea id="description" name="description"></textarea><br>
                    <label for="movie_picture">Movie Picture:</label><br>
                        <input type="file" id="movie_picture" name="movie_picture"><br>
                        <hr>
                    <input type="submit" value="Add Movie">
                </form>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5" style="background-color: lightgrey; border-radius: 10px; padding: 20px;">
                <form action="remove_movie.php" method="post">
                    <h2>Remove a Movie</h2>
                    <hr>
                    <label for="id">Movie ID:</label><br>
                        <input type="number" id="id" name="id" required><br>
                        <hr>
                        <input type="submit" value="Remove Movie">
                </form>
            </div>
        </div>
    </div>
    <div class="textwidget" style="background-color: gray; color: white;">
                <span>&copy; LCAcinemas. All rights reserved.
    </div>
</body>
</html>