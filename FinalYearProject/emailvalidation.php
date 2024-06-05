<?php

//connect to the database
$mysqli = require __DIR__ . "/database.php";

//check if the email is available
$sql = sprintf("SELECT * FROM customer
                WHERE CustomerEmail = '%s'",
                $mysqli->real_escape_string($_GET["CustomerEmail"]));
                
$result = $mysqli->query($sql);

//if the email is available, return true
$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);