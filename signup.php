<?php
// 1. Connection Config
$host = "localhost";
$user = "root";
$pass = "";
$db   = "demo_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 2. Collect Data
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pword = $_POST['password'];
    $cpword = $_POST['confirm_password'];

    // 3. Simple Checks
    if ($pword !== $cpword) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // 4. Secure Password
    $hashed_pass = password_hash($pword, PASSWORD_DEFAULT);

    // 5. Insert into Database
    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fname, $lname, $email, $hashed_pass);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful!'); window.location.href='login.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>