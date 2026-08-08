<?php
session_start();

// 1. Check if the user is actually logged in
if (!isset($_SESSION['user_id'])) {
    die("Error: Please login to place an order.");
}

// 2. Database Connection
$conn = new mysqli("localhost", "root", "", "demo_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_id = $_SESSION['user_id'];
    $total = $_POST['total_price'];

    // 3. Insert into your existing orders table
    // Note: order_date usually has 'DEFAULT CURRENT_TIMESTAMP' in SQL, so we don't need to insert it manually.
    $sql = "INSERT INTO orders (user_id, total) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("id", $user_id, $total);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>