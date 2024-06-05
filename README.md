# Online Movie Ticket Booking System

Welcome to LCAcinemas! This system allows users to book movie tickets conveniently from their computers or mobile devices. The following documentation will guide you through the features, setup, and usage of the system.

## Table of Contents

1. [Features](#features)
2. [System Requirements](#system-requirements)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Configuration](#configuration)
6. [Contact](#contact)

## Features

- **User Registration and Authentication**: Secure registration and login for users.
- **Movie Listings**: Browse currently showing movies with details like showtimes, ratings, and descriptions.
- **Seat Selection**: Interactive seating chart for selecting preferred seats.
- **Payment Gateway Integration**: Secure payment processing for ticket purchases.
- **Booking History**: View past and upcoming bookings.
- **Admin Panel**: Manage movies, showtimes, bookings, and users.

## System Requirements

- **Operating System**: Windows, macOS, or Linux
- **Web Browser**: Latest versions of Chrome, Firefox, Safari, or Edge
- **Backend**: Node.js, Python, or Java (depending on your implementation)
- **Database**: MySQL, PostgreSQL, or MongoDB
- **Payment Gateway**: Integration with services like Stripe, PayPal, etc.

## Installation

### Prerequisites

Ensure you have the following installed:

- Node.js and npm (for a Node.js backend)
- JDK (for a Java backend)
- Database setup (MySQL/PostgreSQL/MongoDB)

### Steps

1. **Clone the Repository**
    ```bash
    git clone https://github.com/RyanNorthern02/LCAcinemas.git
    cd LCAcinemas
    ```

2. **Install Dependencies**
    ```bash
    npm install        # For Node.js
    ./gradlew build    # For Java
    ```

3. **Configure the Database**
    - Set up your database and update the configuration file (`config.json` for Node.js, `application.properties` for Java).

4. **Run the Application**
    ```bash
    npm start          # For Node.js
    ./gradlew bootRun  # For Java
    ```

## Usage

1. **Register or Login**: Create a new account or log in with your existing credentials.
2. **Browse Movies**: View the list of currently showing movies.
3. **Select Showtimes and Seats**: Choose a showtime and select your preferred seats.
4. **Make Payment**: Complete the booking by making a payment.
5. **View Booking**: Check your booking is correct and upcoming shows.

## Configuration

### Environment Variables

Ensure you have the following environment variables set:

- `DB_HOST`: Database host
- `DB_USER`: Database username
- `DB_PASS`: Database password
- `DB_NAME`: Database name
- `PAYMENT_API_KEY`: Payment gateway API key

### Configuration Files

- `config.json` (Node.js)
- `application.properties` (Java)

Update these files with your specific settings.

## Contact

If you have any questions or need further assistance, feel free to reach out:

- **Email**: northern-r@ulster.ac.uk
- **GitHub Issues**: [GitHub Issues](https://github.com/RyanNorthern02/LCAcinemas/issues)

Thank you for using the LCAcinemas! I hope you enjoy the seamless and convenient experience of booking your movie tickets online.
