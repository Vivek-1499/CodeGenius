<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './vendor/autoload.php';
$config = require 'config.php';

session_start();  // Start the session to store the OTP

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $name = $_POST['username'];

    switch ($action) {
        
        case 'delete':
            $password = $_POST['password'];

            // Send DELETE request to API to delete user
            $data = json_encode(['name' => $name, 'password' => $password]);
            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\n",
                    'method' => 'DELETE',
                    'content' => $data,
                ],
            ];
            $context = stream_context_create($options);
            $result = file_get_contents('http://localhost/codegenius/user_apis.php', false, $context);

            echo $result;
            break;

        case 'show':
            $password = $_POST['password'];

            // Send GET request to API to fetch user data
            $url = "http://localhost/codegenius/user_apis.php?username=" . urlencode($name);
            $result = file_get_contents($url);
            $user = json_decode($result, true);

            if ($user) {
                echo "<h3>User Information:</h3>";
                echo "<table border='1' cellpadding='10'>";
                echo "<tr><th>Name</th><td>" . htmlspecialchars($user['name']) . "</td></tr>";
                echo "<tr><th>Age</th><td>" . htmlspecialchars($user['age']) . "</td></tr>";
                echo "<tr><th>Email</th><td>" . htmlspecialchars($user['email']) . "</td></tr>";
                echo "<tr><th>Phone</th><td>" . htmlspecialchars($user['phone']) . "</td></tr>";
                echo "</table>";
            } else {
                echo "No user found.";
            }
            break;

        case 'update':
            // Second step: validate OTP and update the password
            $newpassword = $_POST['newpassword'];
            $oldpassword = $_POST['password'];

            // Send POST request to API to update password
            $data = json_encode([
                'name' => $name,
                'password' => $newpassword,
                'oldpassword' => $oldpassword,
            ]);
            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\n",
                    'method' => 'POST',
                    'content' => $data,
                ],
            ];
            $context = stream_context_create($options);
            $result = file_get_contents('http://localhost/codegenius/user_apis.php?action=update', false, $context);

            echo $result;
            break;

        case 'sendPassword':
            $email = $_POST['email'];
            $name = $_POST['username'];

            // Retrieve the user's password from the database
            $retrieve = $dbh->prepare("SELECT password FROM users WHERE name=? AND email=?");
            $retrieve->bindParam(1, $name);
            $retrieve->bindParam(2, $email);
            $retrieve->execute();
            $user = $retrieve->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $password = $user['password'];

                // Use PHPMailer to send the password via email
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = $config['smtp_username'];  // Your email
                    $mail->Password = $config['smtp_password'];           // Your email password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('vivek.pandit@somaiya.edu', 'User Management'); // Sender's email
                    $mail->addAddress($email);  // User's email

                    $mail->isHTML(true);
                    $mail->Subject = 'Your Password';
                    $mail->Body = 'Hello ' . htmlspecialchars($name) . ',<br>Your password is: ' . htmlspecialchars($password);

                    $mail->send();
                    echo "Password sent to " . htmlspecialchars($email);
                } catch (Exception $e) {
                    echo "Error sending email: " . $mail->ErrorInfo;
                }
            } else {
                echo "User not found with the provided username and email.";
            }
            break;

        default:
            echo "Invalid action.";
            break;
    }
}
