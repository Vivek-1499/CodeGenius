<?php
if (isset($_POST['username']) && $_POST['username'] != "") {
    $username = htmlspecialchars($_POST['username']);
    $url = "http://localhost/codegenius/lab/api_main.php?username=" . urlencode($username);

    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    
    if ($response === false) {
        echo "<div>Error: " . htmlspecialchars(curl_error($client)) . "</div>";
        curl_close($client);
        exit;
    }
    
    curl_close($client);
    
    echo "<pre>Raw Response: " . htmlspecialchars($response) . "</pre>";

    $result = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "<div>Error: Invalid JSON response</div>";
    } elseif (isset($result['error'])) {
        echo "<div>Error: " . htmlspecialchars($result['error']) . "</div>";
    } else {
        $user_id_fetch = htmlspecialchars($result['user_id']);
        $user_type_fetch = htmlspecialchars($result['user_type']);
        $username_fetch = htmlspecialchars($result['username']);
        
        echo "<table>";
        echo "<tr><td>User ID:</td><td>$user_id_fetch</td></tr>";
        echo "<tr><td>User Type:</td><td>$user_type_fetch</td></tr>";
        echo "<tr><td>Username:</td><td>$username_fetch</td></tr>";
        echo "</table>";
    }
}
?>
