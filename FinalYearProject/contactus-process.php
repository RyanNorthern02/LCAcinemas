<?php 
//creating connection to finalproject database
$mysqli = new mysqli("localhost", "root", "Lisnaskea2024!", "finalproject");

//checking connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

//check whether submit button is pressed or not
if((isset($_POST['submit'])))
{
    //fetching and storing the data from contact us form
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $message = $mysqli->real_escape_string($_POST['message']);

    //Inserting the variable data into the database
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $name, $email, $message);

    //Execute the query and return a message with redirection to the Home Page
    if (!$stmt->execute()) {
        die('Error occured [' . $mysqli->error . ']');
    } else {
        echo "<script type='text/javascript'>alert('Thank you! We will get in touch with you soon.'); window.location='homepage.php';</script>";
    }
}

?>