<?php
$host = 'db';
$user = 'root';
$pass = getenv('MYSQL_ROOT_PASSWORD') ?: 'password123';
$db   = getenv('MYSQL_DATABASE') ?: 'testdb';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Ensure table exists
$conn->query(
  "CREATE TABLE IF NOT EXISTS student (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    enrollment_date DATE NOT NULL,
    status VARCHAR(20) DEFAULT 'active'
)");

// Insert sample data if table is empty
$result = $conn->query("SELECT COUNT(*) AS total FROM student");
$row = $result->fetch_assoc();
if ((int)$row['total'] === 0) {
  $conn->query("INSERT INTO student (name, email, enrollment_date) VALUES 
    ('Alice', 'alice@example.com', '2023-01-01'),
    ('Bob', 'bob@example.com', '2023-01-02'),
    ('Carol', 'carol@example.com', '2023-01-03')
  ");
}

// Fetch and display
$result = $conn->query("SELECT id, name FROM student ORDER BY id");

echo "<h1>Students</h1>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
  echo "<li>{$row['id']} - {$row['name']}</li>";
}
echo "</ul>";

$conn->close();