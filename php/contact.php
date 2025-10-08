<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "jabrikk_portfolio_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';


if ($name && $email && $message) {
  $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);
  $stmt->execute();
  echo "success";
} else {
  echo "error: missing data";
}

$conn->close();
?>
