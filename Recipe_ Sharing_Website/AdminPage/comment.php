<?php
include('../include/connection.php');

// Approve comment
if (isset($_GET['approve_id'])) {
    $comment_id = $_GET['approve_id'];
    $sql = "UPDATE Comments SET action='approve' WHERE comment_id='$comment_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Comment approved!";
    }
}

// Delete comment (soft delete)
if (isset($_GET['delete_id'])) {
    $comment_id = $_GET['delete_id'];
    $sql = "UPDATE Comments SET action='delete' WHERE comment_id='$comment_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Comment deleted!";
    }
}

// Read all comments (excluding deleted ones)
$sql = "
    SELECT c.comment_id, r.recipe_name, u.username, c.comment, c.rating, c.action 
    FROM Comments c
    JOIN Recipes r ON c.recipe_id = r.recipe_id
    JOIN Users u ON c.user_id = u.user_id
    WHERE c.action != 'delete'";  // Exclude deleted comments

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Comments & Reviews</title>
</head>
<body>

<h2>Manage Comments & Reviews</h2>

<table border="1">
    <thead>
        <tr>
            <th>Recipe</th>
            <th>Reviewer</th>
            <th>Comment</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['recipe_name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['comment']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td>
                    <!-- Approve button -->
                    <?php if ($row['action'] != 'approve') { ?>
                        <a href="comment.php?approve_id=<?php echo $row['comment_id']; ?>">Approve</a> |
                    <?php } ?>

                    <!-- Delete button -->
                    <a href="comment.php?delete_id=<?php echo $row['comment_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
