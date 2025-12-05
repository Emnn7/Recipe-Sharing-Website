<?php
session_start();
include '../include/connection.php';

// Ensure a recipe is selected
if (!isset($_GET['recipe_id'])) {
    die("Recipe not found.");
}

$recipe_id = $_GET['recipe_id'];
$user_id = $_SESSION['user_id'] ?? null;

// Fetch recipe details
$query = "SELECT * FROM Recipes WHERE recipe_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$recipe = $stmt->get_result()->fetch_assoc();

// Fetch reviews
$reviews_query = "SELECT r.*, u.username FROM Reviews r JOIN Users u ON r.user_id = u.user_id WHERE r.recipe_id = ? ORDER BY r.created_at DESC";
$stmt = $conn->prepare($reviews_query);
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$reviews = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <link rel="stylesheet" href="review.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'; ?>
        <div class="t2">
            <header class="head">
                <h1>Recipe Reviews</h1>
                <p>Check what users are saying about this recipe!</p>
            </header>

            <div class="main-container">
                <section class="recipe-details">
                    <h2><?php echo htmlspecialchars($recipe['title']); ?></h2>
                    <p>By <a href="#"><?php echo htmlspecialchars($recipe['author']); ?></a></p>
                </section>

                <section class="user-reviews">
                    <h3>User Reviews</h3>
                    <?php if ($reviews->num_rows > 0): ?>
                        <?php while ($review = $reviews->fetch_assoc()): ?>
                            <div class="review">
                                <div class="review-header">
                                    <span class="review-author"><?php echo htmlspecialchars($review['username']); ?></span>
                                    <span class="review-rating"><?php echo str_repeat("⭐", $review['rating']); ?></span>
                                </div>
                                <p class="review-text"><?php echo htmlspecialchars($review['review_text']); ?></p>
                                <?php if ($user_id == $review['user_id']): ?>
                                    <form method="post" action="delete_review.php">
                                        <input type="hidden" name="review_id" value="<?php echo $review['review_id']; ?>">
                                        <button type="submit">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No reviews yet. Be the first to write one!</p>
                    <?php endif; ?>
                </section>

                <section class="submit-review">
                    <h3>Write a Review</h3>
                    <?php if ($user_id): ?>
                        <form method="post" action="submit_review.php">
                            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                            <label for="rating">Rating:</label>
                            <select name="rating" required>
                                <option value="5">5 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="2">2 Stars</option>
                                <option value="1">1 Star</option>
                            </select>
                            <label for="review_text">Review:</label>
                            <textarea name="review_text" rows="4" required></textarea>
                            <button type="submit">Submit Review</button>
                        </form>
                    <?php else: ?>
                        <p>You must <a href="login.php">log in</a> to submit a review.</p>
                    <?php endif; ?>
                </section>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
    <?php
//create review
session_start();
include '../include/connection.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to submit a review.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $review_text = trim($_POST['review_text']);

    $query = "INSERT INTO Reviews (recipe_id, user_id, rating, review_text) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiis", $recipe_id, $user_id, $rating, $review_text);

    if ($stmt->execute()) {
        header("Location: review.php?recipe_id=$recipe_id");
    } else {
        echo "Error submitting review.";
    }
}
?>

<?php
//delete review
session_start();
include '../include/connection.php';

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $review_id = $_POST['review_id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM Reviews WHERE review_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $review_id, $user_id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        echo "Error deleting review.";
    }
}
?>


</body>
</html>
