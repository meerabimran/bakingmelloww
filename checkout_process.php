<?php
session_start();

// 1. Database Connection
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "demo_db";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Check if user is logged in
// We need the user_id from the session to link the order
if (!isset($_SESSION['user_id'])) {
    echo "Error: Please login to your account first.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_id = $_SESSION['user_id'];
    $total   = $_POST['total'];

    // 3. Insert into your table: orders (id, user_id, total, order_date)
    // Note: id is Auto-Increment and order_date is usually Current Timestamp
    $sql = "INSERT INTO orders (user_id, total) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("id", $user_id, $total);

    if ($stmt->execute()) {
        echo "SUCCESS";
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>