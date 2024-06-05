<?php

// if the user is logged in, log them out
session_start();
unset($_SESSION['logged_in']); // logout the user by unsetting the logged in variable
header("Location: homepage.php"); // Redirection to homepage
exit;