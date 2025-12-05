<?php
include('../include/connection.php');

// Fetch total recipes per category
$categories = $conn->query("SELECT category, COUNT(*) AS count FROM recipes GROUP BY category");

// Fetch top-rated recipes
$top_recipes = $conn->query("SELECT title, AVG(rating) AS avg_rating FROM comments JOIN recipes ON comments.recipe_id = recipes.id GROUP BY title ORDER BY avg_rating DESC LIMIT 5");

// Fetch user activity (number of comments per user)
$active_users = $conn->query("SELECT users.username, COUNT(comments.id) AS total_comments FROM comments JOIN users ON comments.user_id = users.id GROUP BY users.username ORDER BY total_comments DESC LIMIT 5");
?>

<h2>Reports & Analytics</h2>

<h3>Recipes Per Category</h3>
<ul>
    <?php while ($row = $categories->fetch_assoc()) { ?>
        <li><?= $row['category'] ?>: <?= $row['count'] ?> recipes</li>
    <?php } ?>
</ul>

<h3>Top Rated Recipes</h3>
<ul>
    <?php while ($row = $top_recipes->fetch_assoc()) { ?>
        <li><?= $row['title'] ?> - ⭐ <?= number_format($row['avg_rating'], 1) ?></li>
    <?php } ?>
</ul>

<h3>Most Active Users</h3>
<ul>
    <?php while ($row = $active_users->fetch_assoc()) { ?>
        <li><?= $row['username'] ?> - <?= $row['total_comments'] ?> comments</li>
    <?php } ?>
</ul>
