<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<!-- Include the header -->
<?php include('header.php'); ?>
<br>
<!-- Rest of your login page content goes here -->
<div class="login-form">
    <h2>Login</h2>
    <form action="" method="POST">
        <!-- Add input fields for username and password -->
        <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<!-- Rest of your login page content -->

</body>
</html>
