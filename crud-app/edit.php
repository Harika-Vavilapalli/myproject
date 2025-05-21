<?php
require 'config.php';
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ensure post ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$message = '';

// Fetch post data
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    echo "Post not found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $update = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    if ($update->execute([$title, $content, $id])) {
        header("Location: index.php");
        exit();
    } else {
        $message = "Failed to update post.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title text-center">Edit Post</h4>

            <?php if ($message): ?>
                <div class="alert alert-warning"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Title:</label>
                    <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Content:</label>
                    <textarea name="content" rows="5" class="form-control" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update</button>
                <a href="index.php" class="btn btn-secondary btn-block">Cancel</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
