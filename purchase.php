<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuration
$config = [
    'host' => 'localhost',
    'db_name' => 'codegenius',
    'username' => 'root',  // Replace with your actual DB username
    'password' => '',
    'smtp_username' => 'vivek.pandit@somaiya.edu',
    'smtp_password' => 'krtj gplw cpjm yutx',
];

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Adjust the path if necessary

// Allow cross-origin access for frontend
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

// Create a database connection
$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['db_name']);

// Check connection
if ($conn->connect_error) {
    echo "<script>alert('Connection failed: " . $conn->connect_error . "'); window.location.href='checkout.php';</script>";
    exit();
}

// Get and validate input data
$name = $conn->real_escape_string(trim($_POST['name']));
$email = $conn->real_escape_string(trim($_POST['email']));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format.'); window.location.href='checkout.php';</script>";
    exit();
}

$course_name = "HTML HERO"; // Hardcoded course name
$duration = "4 weeks"; // Hardcoded duration

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO purchases (name, email, course_name, duration) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $course_name, $duration);

if ($stmt->execute()) {
    // Send confirmation email
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $config['smtp_username'];
        $mail->Password = $config['smtp_password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;
    
        // Recipients
        $mail->setFrom('no-reply@codegenius.com', 'CodeGenius');
        $mail->addAddress($email, $name); 
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Course Purchase Confirmation';
        $mail->Body = "Dear $name,<br><br>Thank you for purchasing the course '$course_name' of duration '$duration'.<br><br>Best Regards,<br>CodeGenius Team";
    
        $mail->send();
        echo "<script>alert('Purchase confirmed and email sent.'); window.location.href='checkout.php';</script>";
        
    } catch (Exception $e) {
        echo "<script>alert('Purchase confirmed, but failed to send email: {$mail->ErrorInfo}'); window.location.href='checkout.php';</script>";
    }
} else {
    echo "<script>alert('Database error: " . $stmt->error . "'); window.location.href='checkout.php';</script>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
