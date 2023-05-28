<?php
session_start();

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    // Check if the current password matches the user's password in the database
    $stmt = $conn->prepare("SELECT * FROM student WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Check if the new password and confirm password match
        if ($newPassword === $confirmPassword) {
            // Update the user's password in the database
            $stmt = $conn->prepare("UPDATE student SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $newPassword, $email);

            if ($stmt->execute()) {
                echo "<script>alert('Password changed successfully.');</script>";
                echo "<script>window.location.href = 'login.html';</script>";
            } else {
                echo "<script>alert('Error changing password. Please try again later.');</script>";
                echo "<script>window.location.href = 'reset.html';</script>";
            }
        } else {
            echo "<script>alert('New password and confirm password do not match.');</script>";
            echo "<script>window.location.href = 'reset.html';</script>";
        }
    // } else {
    //     echo "<script>alert('Invalid current password.');</script>";
    // }
}
}

$conn->close();
?>