<?php

//validation for name of user
if (empty($_POST["CustomerName"])) {
    die("Name is required");
}

//validation for email of user
if ( ! filter_var($_POST["CustomerEmail"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

//validations for password of user
if (strlen($_POST["CustomerPassword"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["CustomerPassword"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["CustomerPassword"])) {
    die("Password must contain at least one number");
}

if ($_POST["CustomerPassword"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

//hash the password so it remains secure
$CustomerPassword = password_hash($_POST["CustomerPassword"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

//insert the user into the database
$sql = "INSERT INTO customer (CustomerName, CustomerEmail, CustomerPassword)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//connect the parameters to the database
$stmt->bind_param("sss",
                  $_POST["CustomerName"],
                  $_POST["CustomerEmail"],
                  $CustomerPassword);
                  
if ($stmt->execute()) {

    //redirect to the success page
    header("Location: Registration-success.php");
    exit;
    
} else {
    
    //if the username or email already exists, return an error
    if ($mysqli->errno === 1062) {
        die("Username or email already exists, use a new one!");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}