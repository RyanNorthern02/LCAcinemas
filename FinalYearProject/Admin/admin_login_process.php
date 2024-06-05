<?php
session_start();

// Admins set password and username
$admin_username = 'admin';
$admin_password = 'password';

// Check if the login button is clicked
if ($_POST['username'] === $admin_username && $_POST['password'] === $admin_password) {
    // Login is successful
    $_SESSION['admin_logged_in'] = true;
    header('Location: dashboard.php');
} else {
    // Login has failed
    header('Location: login.php');
}