<?php
// Include database connection
include '../connection.php';

// Get post ID from form data
$post_id = $_POST['post_id'];

// Delete post from database
$sql = "DELETE FROM staff_blog_posts WHERE id = '$post_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Post deleted successfully, redirect back to blog page
    header("Location: admin.php");
} else {
    // Error deleting post
    echo '<div class="alert alert-danger" role="alert">Error deleting post.</div>';
}

// Close database connection
mysqli_close($conn);
?>
