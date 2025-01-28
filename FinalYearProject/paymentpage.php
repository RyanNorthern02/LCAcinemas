<?php

//Loading price from ticket&seatpage.php
session_start();
$price = isset($_SESSION["price"]) ? $_SESSION["price"] : "0.00";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
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
        </ul>
    </div>
  </nav>
  <form method="post" id="payment-form" action="reviewpage.php">
    <p>Movie Booking Payment</p>
        <p><strong>£<?php echo $price; ?></strong></p>
    <div id="card-element">
    </div>
        <div id="card-errors" role="alert"></div>
        <button id="submit">Pay</button>
   </form>
    <script>
    // Creating a Stripe client.
    var stripe = Stripe('Your API Key');
    var elements = stripe.elements();

    // Custom styling from stripe
    var card = elements.create('card');
    card.mount('#card-element');

    //Validation errors if card details are incorrect
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
    event.preventDefault();

    //Stripe creates a link between the card and the client secret
    stripe.createToken(card).then(function(result) {
        //If there is an error, display the error
        if (result.error) {
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
        //Details are taken from the form and sent to the stripe server
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', result.token.id);
        form.appendChild(hiddenInput);

        //Payment successful and redirect to reviewpage.php
        window.location.href = 'reviewpage.php';
        }
        });
    });
    </script>
    <footer style="background-color: #343a40; text-align: center; color:rgb(221, 213, 213); display: flex; justify-content: space-between;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <header>
                        <h1 style="color: white; text-align: center;">Our Contacts!</h1>
                    </header>
                    <hr>
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
                <hr>
                <div class="textwidget">
                    <span>&copy; LCAcinemas. All rights reserved.
                </div>
            </div>
            <div class="col-md-6">
            <h1 style="color:white; text-align: center;">Our social media accounts</hr>
                <hr>
                <a href="https://www.youtube.com/">
                    <img src="img/youtube.png" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
                </a>
                <a href="https://www.instagram.com/">
                    <img src="img/instagram.jpg" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
                </a>
                <a href="https://www.facebook.com/">
                    <img src="img/facebook.jpg" style="width:100px; height:100px; flex-wrap: wrap;" class="logo">
                </a>
            </li>
            </div>
        </footer>
    </body>
</html>
