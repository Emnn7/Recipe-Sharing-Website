<?php
include('../include/connection.php');

// Create (Add Recipe)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_recipe'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $cooking_time = $_POST['cooking_time'];
    $difficulty = $_POST['difficulty'];
    $servings = $_POST['servings'];
    $cuisine_type = $_POST['cuisine_type'];
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, user_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisiss", $title, $description, $ingredients, $instructions, $cooking_time, $difficulty, $servings, $cuisine_type, $user_id, $status);
    $stmt->execute();
    $stmt->close();
}

// Read (Fetch Recipes)
$result = $conn->query("SELECT * FROM recipes");

//Delete recipe 

include('../include/connection.php');
if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];
    $conn->query("DELETE FROM recipes WHERE id='$recipe_id'");
    header("Location: ../admin_dashboard.php#recipe-management");
    exit();
}

?>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Ingredients</th>
            <th>Instructions</th>
            <th>Cooking Time</th>
            <th>Difficulty</th>
            <th>Servings</th>
            <th>Cuisine Type</th>
            <th>User Id</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
                <td><?= htmlspecialchars($row['ingredients']) ?></td>
                <td><?= htmlspecialchars($row['instructions']) ?></td>
                <td><?= htmlspecialchars($row['cooking_time']) ?></td>
                <td><?= htmlspecialchars($row['difficulty']) ?></td>
                <td><?= htmlspecialchars($row['servings']) ?></td>
                <td><?= htmlspecialchars($row['cuisine_type']) ?></td>
                <td><?= htmlspecialchars($row['user_id']) ?></td>
                <td>
                <?php if ($row['status'] === 'Pending') { ?>
                        <a href="approve_recipe.php?id=<?= $row['id'] ?>" class="btn btn-success">Approve</a>
                    <?php } ?>
                    <a href="edit_recipe.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="delete_recipe.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Add Recipe Form -->
<form method="POST">
    <input type="text" name="title" placeholder="Recipe Title" required>
    <input type="text" name="descriptions" placeholder="descriptions" required>
    <input type="text" name="ingredients" placeholder="ingredients" required>
    <input type="text" name="instructions" placeholder="instructions" required>
    <input type="text" name="cooking_time" placeholder="cooking_time" required>
    <input type="text" name="difficulty" placeholder="dificulty" required>
    <input type="text" name="servings" placeholder="servings" required>
    <input type="text" name="cuisine_type" placeholder="cuisine_type" required>
    <input type="text" name="user_id" placeholder="user_id" required>
    <select name="status">
        <option value="Pending">Pending</option>
         <option value="Approved">Approved</option>
    </select>
    <button type="submit" name="add_recipe">Add Recipe</button>
</form>
 <?php
 //Approve 
 if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE recipes SET status = 'Approved' WHERE id = ?");
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_dashboard.php#recipe-management");
    exit();
}
?>
 
 <?php 
 //Edit
 if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM recipes WHERE id = $recipe_id");
    $recipe = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_recipe'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $cooking_time = $_POST['cooking_time'];
    $difficulty = $_POST['difficulty'];
    $servings = $_POST['servings'];
    $cuisine_type = $_POST['cuisine_type'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE recipes SET title=?, description=?, ingredients=?, instructions=?, cooking_time=?, difficulty=?, servings=?, cuisine_type=?, status=? WHERE id=?");
    $stmt->bind_param("sssssisisi", $title, $description, $ingredients, $instructions, $cooking_time, $difficulty, $servings, $cuisine_type, $status, $recipe_id);
    $stmt->execute();
    $stmt->close();
    header("Location: ../admin_dashboard.php#recipe-management");
    exit();
}
?>

<form method="POST">
    <input type="text" name="title" value="<?= $recipe['title'] ?>" required>
    <textarea name="description"><?= $recipe['description'] ?></textarea>
    <textarea name="ingredients"><?= $recipe['ingredients'] ?></textarea>
    <textarea name="instructions"><?= $recipe['instructions'] ?></textarea>
    <input type="number" name="cooking_time" value="<?= $recipe['cooking_time'] ?>" required>
    <select name="difficulty">
        <option value="Easy" <?= ($recipe['difficulty'] == 'Easy') ? 'selected' : '' ?>>Easy</option>
        <option value="Medium" <?= ($recipe['difficulty'] == 'Medium') ? 'selected' : '' ?>>Medium</option>
        <option value="Hard" <?= ($recipe['difficulty'] == 'Hard') ? 'selected' : '' ?>>Hard</option>
    </select>
    <input type="number" name="servings" value="<?= $recipe['servings'] ?>" required>
    <input type="text" name="cuisine_type" value="<?= $recipe['cuisine_type'] ?>" required>
    <select name="status">
        <option value="Pending" <?= ($recipe['status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
        <option value="Approved" <?= ($recipe['status'] == 'Approved') ? 'selected' : '' ?>>Approved</option>
    </select>
    <button type="submit" name="edit_recipe">Update Recipe</button>
</form>

<?php
//Delete

if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM recipes WHERE id = ?");
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_dashboard.php#recipe-management");
    exit();
}
?>
    