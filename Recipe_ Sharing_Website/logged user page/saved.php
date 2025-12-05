<?php
session_start();
include('../include/connection.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Saved Recipes</title>
    <link rel="stylesheet" href="saved.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
</head>
<body>

<div class="wrapper">
    <div class="t1">
        <?php include 'header.php'; ?>
    </div>

    <div class="t2">
        <div class="favorites-container">
            <header class="favorites-header">
                <h1>My Saved Recipes</h1>
                <p>Easily access your favorite recipes all in one place.</p>
            </header>

            <!-- Search and Filter -->
            <div class="search-filter-section">
                <input type="text" id="search-bar" placeholder="Search saved recipes..." onkeyup="filterRecipes()">
                <select id="filter-category" onchange="filterRecipes()">
                    <option value="">Filter by Category</option>
                    <option value="quick">Quick Recipes</option>
                    <option value="desserts">Desserts</option>
                    <option value="vegan">Vegan</option>
                    <option value="italian">Italian</option>
                    <option value="mexican">Mexican</option>
                </select>
            </div>

            <!-- Recipes Grid -->
            <div class="recipes-grid" id="recipes-grid">
                <?php
                $query = "SELECT r.recipe_id, r.title, r.image_url, r.cooking_time, r.difficulty, r.cuisine_type
                          FROM Favorites f
                          JOIN Recipes r ON f.recipe_id = r.recipe_id
                          WHERE f.user_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='recipe-card' data-category='{$row['cuisine_type']}'>
                                <img src='{$row['image_url']}' alt='Recipe Image' width='150px' height='150px'>
                                <h3><a href='recipe_details.php?id={$row['recipe_id']}'>{$row['title']}</a></h3>
                                <p>Cooking Time: {$row['cooking_time']} minutes</p>
                                <p>Difficulty: {$row['difficulty']}</p>
                                <p>Cuisine: {$row['cuisine_type']}</p>
                                <button class='remove-btn' onclick='removeFavorite({$row['recipe_id']})'>Remove</button>
                              </div>";
                    }
                } else {
                    echo "<div class='empty-state'>
                            <p>You haven’t saved any recipes yet. Start exploring and save your favorites!</p>
                            <a href='recipe.php'><button class='explore-btn'>Explore Recipes</button></a>
                          </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="t3">
        <?php include 'footer.php'; ?>
    </div>
</div>

<script>
function removeFavorite(recipeId) {
    if (confirm("Are you sure you want to remove this recipe?")) {
        fetch('remove_favorite.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'recipe_id=' + recipeId
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        });
    }
}

function filterRecipes() {
    let search = document.getElementById("search-bar").value.toLowerCase();
    let filter = document.getElementById("filter-category").value.toLowerCase();
    let cards = document.querySelectorAll(".recipe-card");

    cards.forEach(card => {
        let title = card.querySelector("h3 a").innerText.toLowerCase();
        let category = card.getAttribute("data-category").toLowerCase();

        if ((title.includes(search) || search === "") && (category.includes(filter) || filter === "")) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

<?php
//add favorites
session_start();
include('../include/connection.php');

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to save recipes.";
    exit();
}

if (isset($_POST['recipe_id'])) {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_SESSION['user_id'];

    // Check if recipe is already saved
    $check_query = "SELECT * FROM Favorites WHERE user_id = ? AND recipe_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Recipe already saved!";
    } else {
        $query = "INSERT INTO Favorites (user_id, recipe_id) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $user_id, $recipe_id);
        
        if ($stmt->execute()) {
            echo "Recipe saved!";
        } else {
            echo "Error saving recipe.";
        }
    }
}
?>

<?php
//remove favorite
session_start();
include('../include/connection.php');

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to remove recipes.";
    exit();
}

if (isset($_POST['recipe_id'])) {
    $recipe_id = $_POST['recipe_id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM Favorites WHERE user_id = ? AND recipe_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $user_id, $recipe_id);

    if ($stmt->execute()) {
        echo "Recipe removed!";
    } else {
        echo "Error removing recipe.";
    }
}
?>


</body>
</html>
