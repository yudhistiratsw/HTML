<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $stmt = mysqli_prepare($conn, "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
  mysqli_stmt_execute($stmt);

  echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.php';</script>";
}
?>
