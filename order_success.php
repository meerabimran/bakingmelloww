<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db   = "demo_db";

$conn = new mysqli($host, $user, $pass, $db);

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the LATEST order for this user
$sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Placed - Baking Mellow</title>
<style>
  body { background: #fff8f4; font-family: Georgia, serif; text-align: center; color: #5c4636; }
  .box {
    background: white; width: 50%; margin: 80px auto;
    padding: 40px; border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  }
  h1 { color: #b69b72; }
  .order-id { color: #888; font-size: 0.9em; }
  .btn {
    display: inline-block; margin-top: 20px; padding: 12px 25px;
    background: #5c4636; border: none; color: white;
    text-decoration: none; border-radius: 5px; transition: 0.3s;
  }
  .btn:hover { background: #b69b72; }
</style>
</head>
<body>

<div class="box">
  <h1>🎉 Order Placed Successfully!</h1>
  <p>Thank you for choosing <strong>Baking Mellow</strong>.</p>

  <div style="background: #fdfdfd; padding: 20px; border: 1px dashed #b69b72; border-radius: 10px;">
    <h3>Order Summary</h3>
    <p class="order-id">Order ID: #<?php echo $order['id']; ?></p>
    <p>Status: <span style="color: green;">Processing</span></p>
    <p>Total Paid: <b>Rs <?php echo number_format($order['total'], 2); ?></b></p>
    <p>Date: <?php echo $order['order_date']; ?></p>
  </div>

  <br>
  <a href="home.html" class="btn">Return to Home</a>
  <a href="my_orders.php" class="btn" style="background: #b69b72;">View All Orders</a>
</div>

</body>
</html>