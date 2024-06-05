<?php

// Connect to the finalproject database
$host = 'localhost';
$username = 'root';
$password = 'Lisnaskea2024!';
$dbname = 'finalproject';

//Check the request to remove movie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        $conn = mysqli_connect($host, $username, $password, $dbname);

        //Check the database connection
        if (mysqli_connect_errno()) {
            die("Connection error: " . mysqli_connect_error());
        }

        // Delete the movie from the database
        $sql = "DELETE FROM movies WHERE id = ?";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die("SQL error: " . mysqli_error($conn));
        }

        // Bind the movie ID to the SQL statement
        mysqli_stmt_bind_param($stmt, "i", $id);

        //Execute  movie removal statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Movie removed successfully!";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Movie ID is missing";
    }
} else {
    echo "Invalid request method";
}


// Redirect back to the dashboard
header('Location: dashboard.php');
?>