<?php
    // Include necessary files
    include 'header.php';
    include '../include/connection.php';  // Assuming you have a separate file for DB connection

    // Fetch search query and filters from GET request
    $search_query = isset($_GET['query']) ? $_GET['query'] : '';
    $cuisine_filter = isset($_GET['countries']) ? $_GET['countries'] : '';
    $meal_type_filter = isset($_GET['categories']) ? $_GET['categories'] : '';

    // SQL Query to fetch filtered recipes
    $sql = "SELECT * FROM Recipes WHERE title LIKE ?";

    if ($cuisine_filter) {
        $sql .= " AND cuisine_type = ?";
    }

    if ($meal_type_filter) {
        $sql .= " AND meal_type = ?";
    }

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $search_query);  // Bind the search query parameter
    if ($cuisine_filter) {
        $stmt->bind_param('s', $cuisine_filter);  // Bind cuisine filter parameter if set
    }
    if ($meal_type_filter) {
        $stmt->bind_param('s', $meal_type_filter);  // Bind meal type filter parameter if set
    }
    $stmt->execute();
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="search.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <div class="search-results-container">
            <header class="search-header">
                <h1>Search Results for: “<?php echo htmlspecialchars($search_query); ?>”</h1>
                <div class="filters">
                    <form action="" method="GET">
                        <select name="cuisine" id="cuisine-filter">
                            <option value="">Cuisine Type</option>
                            <option value="italian">Italian</option>
                            <option value="indian">Indian</option>
                            <option value="mexican">Mexican</option>
                            <option value="habeshan">Habeshan</option>
                            <option value="arabian">Arabian</option>
                            <option value="chinese">Chinese</option>
                            <option value="japanese">Japanese</option>
                            <option value="turkish">Turkish</option>
                        </select>
                        <select name="meal_type" id="meal-type-filter">
                            <option value="">Meal Type</option>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                            <option value="dessert">Dessert</option>
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                </div>
            </header>
            
            <section class="search-results">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="result-card">
                                <img src="image/recipe-thumbnail.jpg" alt="Recipe Thumbnail">
                                <div class="result-content">
                                    <h3><a href="#">' . htmlspecialchars($row['title']) . '</a></h3>
                                    <p>⭐ 4.5 | A quick, easy vegan pasta dish with creamy garlic sauce.</p>
                                    <p>⏱ 25 mins | 🍴 Serves: ' . $row['servings'] . '</p>
                                    <div class="tags">
                                        <span>30-min meal</span>
                                        <span>Family-Friendly</span>
                                    </div>
                                    <button class="save-btn" onclick="saveRecipe(' . $row['recipe_id'] . ')">Save</button>
                                </div>
                            </div>';
                    }
                } else {
                    echo '<p>No recipes found.</p>';
                }
                ?>
            </section>

            <!-- Related Search Suggestions -->
            <section class="related-search">
                <h2>You might also like:</h2>
                <div class="suggestions">
                    <button>Quick & Easy</button>
                    <button>Popular</button>
                    <button>Healthy</button>
                    <button>Vegan</button>
                </div>
            </section>
        </div>
    </div>

    <script>
        function saveRecipe(recipe_id) {
            <?php
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];  // Assuming user is logged in and user_id is stored in session
                // Insert a new favorite recipe for logged-in user
                $stmt = $conn->prepare("INSERT INTO saved_recipes (user_id, recipe_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $user_id, recipe_id);
                $stmt->execute();
            } else {
                alert('Please log in to save recipes.');
            }
            ?>
        }
    </script>
</body>
</html>

<?php
    // Close database connection
    $conn->close();
    include 'footer.php';
?>
