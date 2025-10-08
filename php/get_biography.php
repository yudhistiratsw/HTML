<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "jabrikk_portfolio_db";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT content FROM biography WHERE id = 1");
$row = $result->fetch_assoc();

echo $row['content'];

$conn->close();
?>
