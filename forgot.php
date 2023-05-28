<?php
session_start();

include 'conn.php';

$email = $_POST['email'];

$q = "SELECT * FROM student WHERE email = '$email'";

$res = mysqli_query($conn, $q);
$num = mysqli_num_rows($res);

if ($num == 1) {
    $_SESSION['user'] = $username;
    header('location:reset.html');
} else {
  echo "<script>alert('Invalid email');</script>";
  echo "<script>window.location.href = 'login.html';</script>";
}

$conn->close();
?>