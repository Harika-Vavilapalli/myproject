<?php
$host = 'localhost';
$dbname = 'blog';
$username = 'root';
$password = ''; // default is blank in XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Optional test message
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
