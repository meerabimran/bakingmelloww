<?php
session_start();
$conn = new mysqli("localhost", "root", "", "demo_db");

if (!isset($_SESSION['user_id'])) {
    die("Please login to view your orders.");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders - Baking Mellow</title>
    <style>
        body { font-family: Georgia, serif; background: #fff8f2; padding: 50px; text-align: center; }
        table { width: 80%; margin: auto; border-collapse: collapse; background: white; }
        th, td { padding: 15px; border: 1px solid #ddd; text-align: center; }
        th { background: #b69b72; color: white; }
        h2 { color: #5c4636; }
    </style>
</head>
<body>

<h2>Your Order History 🛒</h2>

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Total Amount</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td>#<?php echo $row['id']; ?></td>
            <td>Rs <?php echo number_format($row['total'], 2); ?></td>
            <td><?php echo $row['order_date']; ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<br>
<a href="home.html">Back to Home</a>

</body>
</html>