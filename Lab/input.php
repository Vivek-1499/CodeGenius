<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $db = "employee_data";
    
    // Create connection
    $con = mysqli_connect($localhost, $username, $password, $db);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connection Established";
    }

    // Fetch form data safely
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Prepare SQL statement
    $order = "INSERT INTO emp (Name, Address) VALUES ('$name', '$address')";

    // Execute the SQL query
    $result = mysqli_query($con, $order);

    if ($result) {
        echo "<br>Input data is succeed";
    } else {
        echo "<br>Input data failed: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>
