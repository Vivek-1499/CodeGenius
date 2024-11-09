<?php
session_start(); // Start the session

if (isset($_SESSION['username'])) {
    header("Location: form1.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script type="text/javascript" src="scripts.js" defer></script>
</head>
<body>
<div class="wrapper">
    <h1>LOGIN</h1><br>
    <center><h3>New User? <a href="signin1.php" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">CLICK TO SIGN IN</a></h3></center><br>
    <div id="error_message"></div>
    <form action="api_fetch.php" method="POST">
        <div class="input_field">
            <label for="username">Username<span class="error">*</span></label><br>
            <input type="text" name="username" id="username" placeholder="USERNAME" required>
        </div>
        <br>
        <div class="input_field">
            <label for="password">Password<span class="error">*</span></label><br>
            <input type="password" name="password" id="password" placeholder="PASSWORD" required>
        </div>
        <br>
        <div class="btn">
            <button type="submit" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">LOGIN</button>
        </div>
        <br>
        <div class="btn">
            <button type="button" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">
                <a href="forgotpass.php">Forgot Password</a>
            </button>
        </div>
    </form>
</div>
</body>
</html>
