<?php
session_start();

include 'conn.php';

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user already exists
$stmt = $conn->prepare("SELECT * FROM student WHERE name = ? AND email = ? AND password = ? AND username = ?");
$stmt->bind_param("ssss", $name, $email, $password, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    echo "<script>alert('User already exists');</script>";
} else {
    // Insert the new user if they don't exist
    $stmt = $conn->prepare("INSERT INTO student (name, username, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $username, $email, $password);
    
    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>

<script>
    window.location.href = 'register.php';
</script>
