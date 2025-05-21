<?php
require 'config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ensure ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Delete the post
$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: index.php");
    exit();
} else {
    echo "Failed to delete post.";
}
?>
