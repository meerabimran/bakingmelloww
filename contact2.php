<?php
// Include your existing database connection file
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input to prevent basic SQL injection
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Check if fields are not empty
    if (!empty($name) && !empty($email) && !empty($message)) {
        
        // SQL query to insert data into the contact_messages table
        $sql = "INSERT INTO contact_messages (name, email, message) 
                VALUES ('$name', '$email', '$message')";

        if (mysqli_query($conn, $sql)) {
            // Success: Show an alert and redirect back to the contact page
            echo "<script>
                    alert('Thank you, $name! Your message has been sent.');
                    window.location.href='contact.html';
                  </script>";
        } else {
            // Error: Display the database error
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Please fill in all fields.'); history.back();</script>";
    }
} else {
    // Redirect to the contact page if the script is accessed directly
    header("Location: contact.html");
    exit();
}
?>