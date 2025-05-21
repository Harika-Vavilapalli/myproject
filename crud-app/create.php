<?php
require 'config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    if ($stmt->execute([$title, $content])) {
        $message = "Post created successfully.";
        header("Location: index.php");
        exit();
    } else {
        $message = "Failed to create post.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title text-center">Create New Post</h4>
            
            <?php if ($message): ?>
                <div class="alert alert-info"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Content:</label>
                    <textarea name="content" rows="5" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-block">Publish</button>
                <a href="index.php" class="btn btn-secondary btn-block">Cancel</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
