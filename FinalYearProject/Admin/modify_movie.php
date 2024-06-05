<?php
// Connect to finalproject database
$db = new mysqli('localhost', 'root', 'Lisnaskea2024!', 'finalproject');

// Checking connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Insert a new movie into the database
$stmt = $db->prepare("INSERT INTO movies (title, genre_id, duration, release_date, description, movie_picture) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $title, $genre_id, $duration, $release_date, $description, $movie_picture);

// Execute the above insertion
$title = $_POST['title'];
$genre_id = $_POST['genre_id'];
$duration = $_POST['duration'];
$release_date = $_POST['release_date'];
$description = $_POST['description'];
$movie_picture = $_POST['movie_picture'];
$stmt->execute();

$stmt->close();
$db->close();

// Redirect back to the dashboard once the movie has been added
header('Location: dashboard.php');
?>