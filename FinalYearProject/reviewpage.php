<?php

session_start();

//Connect to the database
$host = 'localhost';
$db   = 'finalproject';
$user = 'root';
$pass = 'Lisnaskea2024!';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select from ticket table to get the last booking made
$sql = "SELECT * FROM ticket ORDER BY id DESC LIMIT 1";

// Execute the SQL statement
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();
$ticket = $result->fetch_assoc();

// Store the booking details in the session
$_SESSION['movies_id'] = $ticket['movies_id'];
$_SESSION['show_time_id'] = $ticket['show_time_id'];
$_SESSION['booking_date'] = $ticket['booking_date'];
$_SESSION['price'] = $ticket['price'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Review</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="ticket&seatpage.css">
    <script src="https://js.stripe.com/v3/"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
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
                <a class="nav-link" href="loginpage.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<form>
<div>
    <h2>Review Your Booking</h2>
    <hr>
    <p>Movie: <?php echo isset($_SESSION['movies_id']) ? $_SESSION['movies_id'] : 'Not selected'; ?></p>
    <hr>
    <p>Show Time: <?php echo isset($_SESSION['show_time_id']) ? $_SESSION['show_time_id'] : 'Not selected'; ?></p>
    <hr>
    <p>Show Date: <?php echo isset($_SESSION['booking_date']) ? $_SESSION['booking_date'] : 'Not selected'; ?></p>
    <hr>
    <p>Price: £ <?php echo isset($_SESSION['price']) ? $_SESSION['price'] : 'Not set'; ?></p>
    <hr>
</div>
</form>
<form>
    <h1 style="text-align: center;">Thank you for booking with LCAcinemas!</h1>
</body>
</html>