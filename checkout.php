<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - CodeGenius</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <center>
    <header>
        <div class="fas fa-bars" id="menu"></div>

        <a href="index.html" class="logo"><i class="fa-solid fa-user-secret" style="color: white;"></i>CodeGenius</a>

        <nav class="navbar">
            <ul>
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="#courses">Course</a></li>
                <li><a id="requestButton">Request</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <a href="profile.php"><div id="login" class="fas fa-user"></div></a>

    </header>
    </center>

    <main class="checkout-container">
        <section class="product">
            <div class="product-content">
                <div class="product-img"><img src="img/HTML.webp" alt="HTML Course Image"></div>
                <div class="info">
                    <h2>Checkout</h2>
                    <form id="checkoutForm" action="purchase.php" method="POST">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['user_info']) ? htmlspecialchars($_SESSION['user_info']['name']) : ''; ?>" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <h3>Course Details</h3>
                        <p><strong>Course Name:</strong> HTML HERO</p>
                        <p><strong>Duration:</strong> 4 weeks</p>
                        <p><strong>Price:</strong> ₹499</p>
                        <a href="course1.html"><button type="button" style="background-color:rgb(41, 41, 41)">Back</button></a>
                        <button type="submit">Confirm Purchase</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer">
            <h3>Explore</h3>
            <a href="index.html">Home</a>
            <a href="#about">About</a>
            <a href="#courses">Course</a>
            <a id="requestButton">Request</a>
            <a href="contact.html">Contact</a>
        </div>
        <div class="footer">
            <h3>Useful Links</h3>
            <a href="">Help</a>
            <a href="">Send Request</a>
            <a href="">Feedback</a>
            <a href="">Terms and Conditions</a>
            <a href="">Privacy</a>
        </div>
        <div class="footer">
            <h3>Follow Us</h3>
            <div class="social-media">
                <a href="https://www.instagram.com/vivek_1499/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://m.facebook.com/profile.php/?id=100018464478762"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.linkedin.com/me?trk=p_mwlite_feed_updates-secondary_nav"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://twitter.com/vivekKPandit1"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.threads.net/@vivek_1499"><i class="fa-brands fa-threads"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
