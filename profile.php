<?php
session_start();
if (isset($_POST['logout'])) {
    // Clear the session and cookies
    session_unset();
    session_destroy();
    setcookie('username', '', time() - 3600, '/'); // Expire the cookie
    header('Location: index.html');
    exit();
}
if(isset($_POST['back'])){
    header('Location: dashboard.html');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <div class="register">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_info']['name']); ?>!</h1>
            <p><strong>Education:</strong> <?php echo htmlspecialchars($_SESSION['user_info']['education']); ?></p>
            <p><strong>Profession: </strong><?php echo htmlspecialchars($_SESSION['user_info']['profession']); ?></p>
            <form action="login.php" method="POST" class="submit">
                <button type="submit" name="back" class="button">Back</button>
                <button type="submit" name="logout" class="button">Logout</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
