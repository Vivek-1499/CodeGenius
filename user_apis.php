<?php
header("Content-Type: application/json");
$dbh = new PDO('mysql:host=localhost;dbname=codegenius', "root", "");
$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'POST':
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            createUser();
        } else if (isset($_GET['action']) && $_GET['action'] == 'update') {
            updateUser();
        }
        break;
    case 'GET':
        if (isset($_GET['username'])) {
            getUser($_GET['username']);
        } else {
            getUsers();
        }
        break;
    case 'DELETE':
        deleteUser();
        break;
    default:
        echo json_encode(["message" => "Invalid Request Method"]);
        break;
}

function getUsers() {
    global $dbh;
    $query = $dbh->query("SELECT * FROM users");
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
}

function getUser($username) {
    global $dbh;
    $query = $dbh->prepare("SELECT * FROM users WHERE name=?");
    $query->bindParam(1, $username);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        echo json_encode($user);
    } else {
        echo json_encode(["message" => "User not found"]);
    }
}

function createUser() {
    global $dbh;
    $data = json_decode(file_get_contents('php://input'), true);

    $stmt = $dbh->prepare("INSERT INTO users (name, age, email, phone, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $data['name']);
    $stmt->bindParam(2, $data['age']);
    $stmt->bindParam(3, $data['email']);
    $stmt->bindParam(4, $data['phone']);
    $stmt->bindParam(5, $data['password']);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "User created successfully"]);
    } else {
        echo json_encode(["message" => "Error creating user"]);
    }
}

function updateUser() {
    global $dbh;
    $data = json_decode(file_get_contents('php://input'), true);

    $stmt = $dbh->prepare("UPDATE users SET password=? WHERE name=?");
    $stmt->bindParam(1, $data['password']);
    $stmt->bindParam(2, $data['name']);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "User updated successfully"]);
    } else {
        echo json_encode(["message" => "Error updating user"]);
    }
}

function deleteUser() {
    global $dbh;
    $data = json_decode(file_get_contents('php://input'), true);

    $stmt = $dbh->prepare("DELETE FROM users WHERE name=?");
    $stmt->bindParam(1, $data['name']);

    if ($stmt->execute()) {
        echo json_encode(["message" => "User deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error deleting user"]);
    }
}
?>
