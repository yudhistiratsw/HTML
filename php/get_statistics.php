<?php
$host = "localhost";
$user = "user20232040";
$pass = "YnijgJ";
$db = "user20232040";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT label, value FROM statistics");

$data = [];
while ($row = $result->fetch_assoc()) {
  $data[] = [  // jadi array objek
    'label' => $row['label'],
    'value' => (int)$row['value']  // pastikan value int
  ];
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
