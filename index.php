<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']); // Clear the error message after displaying it
    }
    ?>

    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
</body>
</html>