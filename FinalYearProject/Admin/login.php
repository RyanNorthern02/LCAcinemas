<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="login&reg.CSS">

    <meta charset="utf-8">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="display: flex; flex-direction: column; justify-content: space-between; min-height: 100vh; background-color: #f8f9fa;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Links -->
        <img src="LCAcinemas.png" style="width:175px; height:175px;" class="logo">
    </nav>
    <form action="admin_login_process.php" method="post" id="adminlogin" novalidate style="background-color: lightgrey; border-radius: 10px; padding: 40px; margin: auto;">
        <header style="text-align: -webkit-center;">
            <h2>Admin Login</h2>
        </header>
        <hr>
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" style="border-radius: 15px;" placeholder="Enter Username">
        </div>
        <div>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password" style="border-radius: 15px;" placeholder="Enter password">
        </div>
        <hr>
        <input type="submit" style="border-radius: 15px;" value="Login">
    </form>
    <div class="textwidget" style="background-color: gray; color: white;">
        <span>&copy; LCAcinemas. All rights reserved.
    </div>
</body>
</html>