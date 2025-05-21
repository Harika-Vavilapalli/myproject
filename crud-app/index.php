<?php
require 'config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch posts
$stmt = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Welcome, <?php echo $_SESSION['username']; ?> 👋</h2>
        <div>
            <a href="create.php" class="btn btn-success">+ New Post</a>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>

    <?php if (count($posts) > 0): ?>
        <?php foreach ($posts as $post): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h4>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <p class="text-muted small">Posted on: <?php echo $post['created_at']; ?></p>
                    <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this post?')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info">No posts available yet. Go ahead and create one!</div>
    <?php endif; ?>
</div>

</body>
</html>
