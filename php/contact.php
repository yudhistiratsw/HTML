<?php
$host = "localhost";
$user = "user20232040";
$pass = "YnijgJ";
$db = "user20232040";


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
  echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='../index.php#home';</script>";;

} else {
  echo "error: missing data";
}

$conn->close();
?>
