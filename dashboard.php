<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeGenius</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <!-- header -->
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

    <!-- Request -->
    <div class="popupForm">
        <div class="popupContent">
            <span class="closeButton">&times;</span>
            <h2>Request Your Code.</h2>
            <form id="requestForm" action="process_request.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="languages">Select a language:</label>
                <select id="languages" name="languages">
                    <optgroup label="Programming Languages">
                        <option value="css">CSS</option>
                        <option value="HTML">HTML</option>
                        <option value="python">Python</option>
                        <option value="javascript">JavaScript</option>
                        <option value="csharp">C#</option>
                        <option value="javascript">JavaScript</option>
                        <option value="php">PHP</option>
                        <option value="java">JAVA</option>
                    </optgroup>
                </select>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Home -->
    <section class="home">
        <div class="image">
            <img src="img/study2.jpg" alt="student studying in laptop">
        </div>
        <div class="content">
            <h3>E-learning is the better way of learning</h3>
            <a href="JOIN_US.html" class="button">Get Started</a>
        </div>
    </section>

    <!-- About -->
    <section id="about">
        <h2>ABOUT US</h2>
        <p>Welcome to CodeGenius, the ultimate destination for aspiring coders and coding enthusiasts!</p>
        <p>At CodeGenius, we blend the art of learning with the magic of expert guidance to elevate your coding skills to new heights.</p>
        <p>Join us on this thrilling coding adventure and unlock the secrets of programming excellence!</p>
        <section class="container">
            <div class="box-container">
                <div class="box">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <div class="box-content">
                        <h3>150+</h3>
                        <p>Courses</p>
                    </div>
                </div>
    
                <div class="box">
                    <i class="fa-solid fa-user-graduate"></i>
                    <div class="box-content">
                        <h3>1500+</h3>
                        <p>Students</p>
                    </div>
                </div>
    
                <div class="box">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <div class="box-content">
                        <h3>60+</h3>
                        <p>Teachers</p>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- Courses -->
    <section id="courses">
        <h3>Our Courses</h3>
        <div class="courses-box">
            <div class="course">
                <div class="img">
                    <img src="img/HTML.webp" alt="HTML Image">
                </div>
                <div class="content">
                    <h3>HTML HERO</h3>
                    <p>₹499</p>
                    <p>Craft stunning websites with HTML.</p>
                </div>
                <a href="course1.html" class="button">Enroll Now</a>
            </div>
    
            <div class="course">
                <div class="img">
                    <img src="img/CSS.webp" alt="CSS Image">
                </div>
                <div class="content">
                    <h3>CSS Sorcerer</h3>
                    <p>₹699</p>
                    <p>Make the websites look much cooler and prettier using CSS.</p>
                </div>
                <a href="course2.html" class="button">Enroll Now</a>
            </div>
    
            <div class="course">
                <div class="img">
                    <img src="img/JAVASCRIPT.webp" alt="JavaScript Image">
                </div>
                <div class="content">
                    <h3>JavaScript Jadoo</h3>
                    <p>₹799</p>
                    <p>Become a JavaScript master with real-world applications.</p>
                </div>
                <a href="course3.html" class="button">Enroll Now</a>
            </div>
    
            <div class="course">
                <div class="img">
                    <img src="img/PYTHON.webp" alt="Python Image">
                </div>
                <div class="content">
                    <h3>Python Prodigy</h3>
                    <p>₹999</p>
                    <p>Master Python with hands-on projects and expert guidance.</p>
                </div>
                <a href="course4.html" class="button">Enroll Now</a>
            </div>
    
            <div class="course">
                <div class="img">
                    <img src="img/JAVA.webp" alt="Java Image">
                </div>
                <div class="content">
                    <h3>Java Genius</h3>
                    <p>₹899</p>
                    <p>Explore the power of Java programming with expert tips.</p>
                </div>
                <a href="course5.html" class="button">Enroll Now</a>
            </div>
    
            <div class="course">
                <div class="img">
                    <img src="img/C++.webp" alt="C++ Image">
                </div>
                <div class="content">
                    <h3>C++ Champion</h3>
                    <p>₹999</p>
                    <p>Become Master of C++ and Rule it like a king.</p>
                </div>
                <a href="course6.html" class="button">Enroll Now</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
        <div class="footer" >
            <h3>Follow US</h3>
            <div class="social-media">
            <a href="https://www.instagram.com/vivek_1499/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://m.facebook.com/profile.php/?id=100018464478762"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.linkedin.com/me?trk=p_mwlite_feed_updates-secondary_nav"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://twitter.com/vivekKPandit1"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.threads.net/@vivek_1499"><i class="fa-brands fa-threads"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <!-- Add this inside the <body> tag in index.html -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const username = getCookie("username");
        if (username) {
            alert("Welcome, " + username + "!");
        }
    });

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
</script>


</body>
</html>