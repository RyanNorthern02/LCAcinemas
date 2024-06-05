<?php

// Connect to the finalproject database
$host = 'localhost';
$db   = 'finalproject';
$user = 'root';
$pass = 'Lisnaskea2024!';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if book now button has been clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the ticket details from the form
    $movies_id = $_POST["movies_id"];
    $show_time_id = $_POST["show_time_id"];
    $ticket_no = $_POST["ticket_no"];
    $seat_details = $_POST["seat_details"];
    $booking_date = $_POST["booking_date"];
    $price = (15.00*$ticket_no);
  
    // Insert the ticket details into the database
    $sql = "INSERT INTO ticket (movies_id, show_time_id, price, ticket_no, booking_date, seat_details) VALUES (?, ?, ?, ?, ?, ?)";
  
    if($stmt = $conn->prepare($sql)){
        // Bind details to the database
        $stmt->bind_param("iidiss", $movies_id, $show_time_id, $price, $ticket_no, $booking_date, $seat_details);
        
        // The end statement executed
        if($stmt->execute()){
            echo "Your ticket has been booked successfully!";
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
  }

// Query to get all movies
$query = "SELECT * FROM movies";
$result = mysqli_query($conn, $query);

// Array to store all movies in website page
$movies = [];
while($row = mysqli_fetch_assoc($result)) {
    $movies[] = $row;
}

// Query to get all show times
$sql = "SELECT * FROM show_time";
$result = $conn->query($sql);

// Array to store all show times in website page
$show_times = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $show_times[] = $row;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

session_start();
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["price"] = $_POST["price"];
    // redirect to payment page
    header("Location: paymentpage.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Order Page</title>
  <style>
        .seat {
            width: 50px;
            height: 50px;
            border: 1px solid #000;
            margin: 5px;
            display: inline-block;
        }
        .selected {
            background-color: #f00;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="ticket&seatpage.CSS">
  <meta charset="utf-8">

  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  <script src="/js/validation.js" defer></script>

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
                <a class="nav-link" href="comingsoon.php">Coming Soon</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ContactUs.php">Contact Us</a>
            </li>
        </ul>
    </div>
  </nav>
<body>
  <script>
       // Function to validate the form fields
       $(document).ready(function(){
            $('#Ticket').submit(function(e){
                var showId = $('#show_time_id').val();
                var movieId = $('#movies_id').val();
                var noTicket = $('#ticket_no').val();
                var seatDetails = $('#seat_details').val();
                var bookingDate = $('#booking_date').val();
                var price = $('#price').val();
                var selectedSeats = $('input[name="seat_chart[]"]:checked').length;

                // Check if any of the input fields are empty or no seats are selected
                if(showId == "" || movieId == "" || noTicket == "" || seatDetails == "" || bookingDate == "" || price == "" || selectedSeats == 0){
                    alert('Please fill in all fields and select at least one seat.');
                    e.preventDefault();
                } else if(selectedSeats != noTicket){
                    alert('The number of selected seats must match the number of tickets.');
                    e.preventDefault();
                }
            });
        });

        // Function to create the seating arrangement
        $(document).ready(function(){
            for(i=1; i<=6; i++){
                for(j=1; j<=7; j++){
                    $('#seat_chart').append('<div class="col-md-2 mt-3 mb-3 ml-2 mr-2 text-center" style="background-color:grey; color:white"><input type="checkbox" value="R'+i+'S'+j+'" name="seat_chart[]" class="mr-2 col-md-2 mb-2" onclick="checkboxtotal();" >R'+ i+'S'+j+'</div>')
                }

            }
        });

          // Function to calculate the total number of selected seats
          function checkboxtotal(){
              var seat=[];
              $('input[name="seat_chart[]"]:checked').each(function(){
                  seat.push($(this).val());
              });

              var st=seat.length;
              document.getElementById('ticket_no').value=st;

              // Calculate the price based on the number of selected seats
              var price = st * 15; // Price per ticket is £15
              document.getElementById('price').value=price;

              $('#seat_details').val(seat.join(','));
          }
    </script>
  <main>
    <section class="mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                      <div id="seat-map" id="seatCharts">
                        <h3 class="text-center mt-4" style="color: black;">Select your Seat or Seats</h3>
                        <hr>
                        <!-- Screen label inside a box -->
                        <div style="border: 2px solid grey; padding: 10px; width: 200px; margin: auto; text-align: -webkit-center;">
                            <label class="text-center">Screen</label>
                        </div>
                        <hr>
                        <div class="row" id="seat_chart">
                        </div>
                      </div>
                    </div>
            <form method="POST" action="ticket&seatpage.php" id="Ticket" novalidate style="background-color: lightgrey; border-radius: 10px; width: fit-content;" required>
              <header style="text-align: -webkit-center;">
                <h2>Book your tickets now!</h2>
              </header>
            <hr>
              <div>
                  <label for="movies_id">Movie Choice</label>
                  <select name="movies_id" id="movies_id" style="border-radius: 30px;" required>
                      <option>Select Movie</option>
                      <?php foreach ($movies as $movie): ?>
                          <option value="<?php echo $movie['id']; ?>"><?php echo $movie['Title']; ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div>
                  <label for="show_time_id">Times</label>
                  <select name="show_time_id" id="show_time_id" style="border-radius: 30px;" required>
                      <option>Select A Time</option>
                      <?php foreach ($show_times as $show_time): ?>
                          <option value="<?php echo $show_time['id']; ?>"><?php echo $show_time['time']; ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>
              <div>
                  <label for="ticket_no">Number of Tickets</label>
                  <input type="number" id="ticket_no" name="ticket_no" style="border-radius: 30px;" required>
              </div>
              <div>
                  <label for="seat_details">Seat Details</label>
                  <input type="text" id="seat_details" name="seat_details" style="border-radius: 30px;" required>
              </div>
              <div>
                  <label for="booking_date">Booking Date</label>
                  <input type="date" id="booking_date" name="booking_date" style="border-radius: 30px;" required>
              </div>
              <div>
                  <label for="price">£ Price</label>
                  <input type="number" id="price" name="price" style="border-radius: 30px;" required>
              </div>
              <hr>
              <div>
                  <button type="submit" name="btn_booking" id="btn_booking">Book Now</button>
              </div>
            </form>
          </main>
      <footer style="background-color: #343a40; text-align: center; color:rgb(221, 213, 213); display: flex; justify-content: space-between;">
          <div class="container">
              <div class="row">
              <div class="col-md-12">
                    <h2 style="text-align: center; color: white;">Our Location!</h2>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2287.720451714888!2d-7.323685324075718!3d55.0130651487251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485fe1efe6d7f353%3A0xd0d9fe360e040ba4!2sBrunswick%20Moviebowl!5e0!3m2!1sen!2suk!4v1707091770516!5m2!1sen!2suk" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                  <div class="col-md-6">
                      <form>
                          <header>
                            <h1 style="color: white;">Cinema Opening Times</h1>
                          </header>
                          <div>
                            <p>Monday: 9am-9pm<br>
                              Tuesday: 9am-9pm<br>
                              Wednesday: 9am-9pm<br>
                              Thursday: 9am-9pm<br>
                              Friday: 8am-11pm<br>
                              Saturday: 8am-11pm<br>
                              Sunday: 10am-8pm
                            </p>
                          </div>
                        </form> 
                  </div>
                  <div class="col-md-6"> 
                      <header>
                            <h1 style="color: white;">Our Contacts!</h1>
                      </header>
                      <div class="media border p-3">
                          <div class="media-body">
                            <h4>Ryan Northern </small></h4>
                          <div class="information">
                            <p>ryannorthern@gmail.com</p>
                      </div>
                    </div>
                  </div>
                  <div class="media border p-3">
                          <div class="media-body">
                          <h4>Paul Northern </small></h4>
                        <div class="information">
                          <p>pn@yahoo.com</p>
                      </div>
                    </div>
                  </div>
              </div>
          </footer>
          <div class="textwidget" style="background-color: gray; color: white;">
              <span>&copy; LCAcinemas. All rights reserved.
          </div>
    </body>
  <script>
    // Pulling in the ticket input and price input
     var ticketInput = document.getElementById('no_ticket');
     var priceInput = document.getElementById('price');

     //This calculates the price based on the number of tickets
      ticketInput.addEventListener('change', function() {
        var numberOfTickets = ticketInput.value;
        var price = numberOfTickets *15; // Price per ticket is £15
        priceInput.value = price;
       });
  </script>
</html>