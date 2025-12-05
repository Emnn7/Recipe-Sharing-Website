<?php
session_start();
include '../include/connection.php'; // Include your DB connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect if not logged in
    exit();
}

// Fetch the user ID
$user_id = $_SESSION['user_id'];

// Handle saving a recipe (Create)
if (isset($_GET['save_recipe'])) {
    $recipe_id = $_GET['save_recipe'];
    
    // Check if the recipe is already saved by the user
    $query = "SELECT * FROM Favorites WHERE user_id = ? AND recipe_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Save recipe to favorites
        $query = "INSERT INTO Favorites (user_id, recipe_id) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $recipe_id);
        $stmt->execute();
    }
}

// Handle removing a saved recipe (Delete)
if (isset($_GET['remove_saved_recipe'])) {
    $recipe_id = $_GET['remove_saved_recipe'];
    
    // Remove recipe from favorites
    $query = "DELETE FROM Favorites WHERE user_id = ? AND recipe_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $recipe_id);
    $stmt->execute();
}

// Fetch search query and filters
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$cuisine_filter = isset($_GET['cuisine']) ? $_GET['cuisine'] : '';
$meal_type_filter = isset($_GET['meal_type']) ? $_GET['meal_type'] : '';

// Fetch recipes based on search and filters
$query = "SELECT * FROM Recipes WHERE title LIKE ?";

if ($cuisine_filter) {
    $query .= " AND cuisine_type = ?";
}
if ($meal_type_filter) {
    $query .= " AND meal_type = ?";
}

$stmt = $conn->prepare($query);

$search_query_param = "%$search_query%";
if ($cuisine_filter && $meal_type_filter) {
    $stmt->bind_param("sss", $search_query_param, $cuisine_filter, $meal_type_filter);
} elseif ($cuisine_filter) {
    $stmt->bind_param("ss", $search_query_param, $cuisine_filter);
} elseif ($meal_type_filter) {
    $stmt->bind_param("ss", $search_query_param, $meal_type_filter);
} else {
    $stmt->bind_param("s", $search_query_param);
}

$stmt->execute();
$recipes = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="search.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <div class="t1">
            <?php include 'header.php'; ?>
        </div>
        <div class="t2">
            <div class="search-results-container">
                <!-- Search Bar and Filters -->
                <header class="search-header">
                    <h1>Search Results for: “<span id="search-query"><?php echo htmlspecialchars($search_query); ?></span>”</h1>
                    <div class="filters">
                        <select id="cuisine-filter">
                            <option value="">Cuisine Type</option>
                            <option value="italian" <?php echo ($cuisine_filter == 'italian' ? 'selected' : ''); ?>>Italian</option>
                            <option value="indian" <?php echo ($cuisine_filter == 'indian' ? 'selected' : ''); ?>>Indian</option>
                            <option value="mexican" <?php echo ($cuisine_filter == 'mexican' ? 'selected' : ''); ?>>Mexican</option>
                            <option value="habeshan" <?php echo ($cuisine_filter == 'habeshan' ? 'selected' : ''); ?>>Habeshan</option>
                            <option value="arabian" <?php echo ($cuisine_filter == 'arabian' ? 'selected' : ''); ?>>Arabian</option>
                            <option value="chinese" <?php echo ($cuisine_filter == 'chinese' ? 'selected' : ''); ?>>Chinese</option>
                            <option value="japanese" <?php echo ($cuisine_filter == 'japanese' ? 'selected' : ''); ?>>Japanese</option>
                            <option value="turkish" <?php echo ($cuisine_filter == 'turkish' ? 'selected' : ''); ?>>Turkish</option>
                        </select>
                        <select id="meal-type-filter">
                            <option value="">Meal Type</option>
                            <option value="breakfast" <?php echo ($meal_type_filter == 'breakfast' ? 'selected' : ''); ?>>Breakfast</option>
                            <option value="lunch" <?php echo ($meal_type_filter == 'lunch' ? 'selected' : ''); ?>>Lunch</option>
                            <option value="dinner" <?php echo ($meal_type_filter == 'dinner' ? 'selected' : ''); ?>>Dinner</option>
                            <option value="dessert" <?php echo ($meal_type_filter == 'dessert' ? 'selected' : ''); ?>>Dessert</option>
                        </select>
                    </div>
                </header>
        
                <!-- Search Results List -->
                <section class="search-results">
                    <?php while ($recipe = $recipes->fetch_assoc()) { ?>
                        <div class="result-card">
                            <img src="<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="Recipe Thumbnail">
                            <div class="result-content">
                                <h3><a href="recipe_detail.php?recipe_id=<?php echo $recipe['recipe_id']; ?>"><?php echo htmlspecialchars($recipe['title']); ?></a></h3>
                                <p>⭐ <?php echo htmlspecialchars($recipe['rating']); ?> | <?php echo htmlspecialchars($recipe['description']); ?></p>
                                <p>⏱ <?php echo htmlspecialchars($recipe['cooking_time']); ?> | 🍴 Serves: <?php echo htmlspecialchars($recipe['servings']); ?></p>
                                <div class="tags">
                                    <span><?php echo htmlspecialchars($recipe['meal_type']); ?></span>
                                    <span><?php echo htmlspecialchars($recipe['cuisine_type']); ?></span>
                                </div>
                                <button class="save-btn" onclick="window.location.href='search.php?save_recipe=<?php echo $recipe['recipe_id']; ?>'">Save</button>
                            </div>
                        </div>
                    <?php } ?>
                </section>
        
                <!-- Related Search Suggestions -->
                <section class="related-search">
                    <h2>You might also like:</h2>
                    <div class="suggestions">
                        <button>Quick Recipes</button>
                        <button>Habeshan Dishes</button>
                        <button>Italian Favorites</button>
                        <button>Appetizing Desserts</button>
                    </div>
                </section>
            </div>
        </div>

        <!-- Include Footer -->
        <div class="t3">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</body>
</html>
