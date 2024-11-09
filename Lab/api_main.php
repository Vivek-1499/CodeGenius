    <?php
    header("Content-Type: application/json");

    $con = new mysqli("localhost", "root", "", "codegenius");

    if ($con->connect_error) {
        response(NULL, NULL, NULL, "Database connection failed: " . $con->connect_error);
        exit;
    }

    if (isset($_GET['username']) && $_GET['username'] != "") {
        $un = htmlspecialchars($_GET['username']);
        $stmt = $con->prepare("SELECT * FROM `student` WHERE username = ?");
        
        if ($stmt) {
            $stmt->bind_param("s", $un);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                response($row['user_id'], $row['user_type'], $row['username']);
            } else {
                response(NULL, NULL, NULL, "User not found");
            }

            $stmt->close();
        } else {
            response(NULL, NULL, NULL, "SQL statement preparation failed");
        }
    } else {
        response(NULL, NULL, NULL, "Invalid username");
    }

    $con->close();

    function response($user_id, $user_type, $username, $error = NULL) {
        $response = [
            'user_id' => $user_id,
            'user_type' => $user_type,
            'username' => $username,
            'error' => $error
        ];
        echo json_encode($response);
    }
    ?>
