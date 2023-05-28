<?php
session_start();

include 'conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$q = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";

$res = mysqli_query($conn, $q);
$num = mysqli_num_rows($res);

if ($num == 1) {
    $_SESSION['user'] = $username;
    header('location:index1.php');
} else {
  echo "<script>alert('Invalid username or password');</script>";
  echo "<script>window.location.href = 'login.html';</script>";
}

$conn->close();
?>
