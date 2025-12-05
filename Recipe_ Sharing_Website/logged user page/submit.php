<?php
session_start();
include '../include/connection.php'; // Ensure database connection is established

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if user is not logged in
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Get logged-in user ID
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $cooking_time = $_POST['cooking_time'];
    $difficulty = $_POST['difficulty'];
    $servings = $_POST['servings'];
    $cuisine_type = $_POST['cuisine_type'];
    $tags = explode(",", $_POST['tags']); // Tags split by comma
    $image_url = ""; // Placeholder for uploaded image path

    // Handle image upload
    if (!empty($_FILES["dish_photos"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["dish_photos"]["name"]);
        if (move_uploaded_file($_FILES["dish_photos"]["tmp_name"], $target_file)) {
            $image_url = $target_file;
        }
    }

    // Insert Recipe into Database
    $sql = "INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssisss", $title, $description, $ingredients, $instructions, $cooking_time, $difficulty, $servings, $cuisine_type, $image_url, $user_id);
    
    if ($stmt->execute()) {
        $recipe_id = $stmt->insert_id; // Get inserted recipe ID

        // Insert Tags into Recipe_Tags table
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if (!empty($tag)) {
                // Check if tag exists
                $tag_sql = "SELECT tag_id FROM Tags WHERE tag_name = ?";
                $tag_stmt = $conn->prepare($tag_sql);
                $tag_stmt->bind_param("s", $tag);
                $tag_stmt->execute();
                $tag_result = $tag_stmt->get_result();

                if ($tag_result->num_rows == 0) {
                    // Insert new tag
                    $insert_tag_sql = "INSERT INTO Tags (tag_name) VALUES (?)";
                    $insert_tag_stmt = $conn->prepare($insert_tag_sql);
                    $insert_tag_stmt->bind_param("s", $tag);
                    $insert_tag_stmt->execute();
                    $tag_id = $insert_tag_stmt->insert_id;
                } else {
                    $tag_row = $tag_result->fetch_assoc();
                    $tag_id = $tag_row['tag_id'];
                }

                // Associate tag with recipe
                $recipe_tag_sql = "INSERT INTO Recipe_Tags (recipe_id, tag_id) VALUES (?, ?)";
                $recipe_tag_stmt = $conn->prepare($recipe_tag_sql);
                $recipe_tag_stmt->bind_param("ii", $recipe_id, $tag_id);
                $recipe_tag_stmt->execute();
            }
        }

        header("Location: recipe.php?success=Recipe submitted successfully!");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Recipe</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
    <div class="wrapper">
        <div class="t1">
            <?php include 'header.php'; ?>
        </div>
        <div class="t2">
            <h2>Submit Recipe</h2>
            <form action="submit_recipe.php" method="POST" enctype="multipart/form-data">
                <label>Recipe Title</label>
                <input type="text" name="title" placeholder="Classic Margherita Pizza" required>

                <label>Recipe Description</label>
                <input type="text" name="description" placeholder="Short description of your recipe" required>

                <label>Ingredients</label>
                <textarea name="ingredients" placeholder="List ingredients here..." required></textarea>

                <label>Instructions</label>
                <textarea name="instructions" placeholder="Step-by-step instructions..." required></textarea>

                <label>Cooking Time</label>
                <input type="text" name="cooking_time" placeholder="e.g., 45 minutes" required>

                <label>Difficulty</label>
                <select name="difficulty" required>
                    <option value="">Select difficulty</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>

                <label>Servings</label>
                <input type="number" name="servings" placeholder="Number of servings" required>

                <label>Cuisine Type</label>
                <select name="cuisine_type" required>
                    <option value="">Select Cuisine</option>
                    <option value="JAPANESE">JAPANESE</option>
                    <option value="INDIAN">INDIAN</option>
                    <option value="ITALIAN">ITALIAN</option>
                    <option value="MEXICAN">MEXICAN</option>
                    <option value="MEXICAN">TURKISH</option>
                    <option value="MEXICAN">CHINESE</option>
                    <option value="MEXICAN">HABESHAN</option>
                    <option value="MEXICAN">ARABIAN</option>
                </select>

                <label>Upload Image</label>
                <input type="file" name="dish_photos" accept="image/*" required>

                <label>Tags</label>
                <input type="text" name="tags" placeholder="e.g., Spicy, Vegan, Healthy (comma-separated)">

                <input type="submit" value="Submit Recipe">
            </form>
        </div>
        <div class="t3">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</body>
</html>
