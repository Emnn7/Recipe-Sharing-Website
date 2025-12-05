<?php
session_start();
include '../include/.php'; // Database connection file

// Fetch user details
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT username, email, profile_picture, bio, join_date FROM Users WHERE user_id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$user = $query->get_result()->fetch_assoc();

// Fetch user recipes
$recipeQuery = $conn->prepare("SELECT * FROM Recipes WHERE user_id = ?");
$recipeQuery->bind_param("i", $user_id);
$recipeQuery->execute();
$recipes = $recipeQuery->get_result();

// Fetch saved recipes
$savedQuery = $conn->prepare("SELECT r.* FROM Recipes r INNER JOIN saved_recipes s ON r.recipe_id = s.recipe_id WHERE s.user_id = ?");
$savedQuery->bind_param("i", $user_id);
$savedQuery->execute();
$saved_recipes = $savedQuery->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'; ?>
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-picture">
                    <img src="<?php echo $user['profile_picture'] ?: 'default-avatar.png'; ?>" alt="Profile Picture">
                    <form method="POST" enctype="multipart/form-data" action="upload_picture.php">
                        <input type="file" name="profile_picture" accept="image/*">
                        <button type="submit" name="upload_picture">Change Picture</button>
                    </form>
                </div>
                <div class="profile-details">
                    <h1><?php echo htmlspecialchars($user['username']); ?></h1>
                    <p class="bio"> <?php echo htmlspecialchars($user['bio']); ?> </p>
                    <p class="location">Location: New York, USA</p>
                    <p class="join-date">Joined: <?php echo date("F Y", strtotime($user['join_date'])); ?></p>
                </div>
            </div>
            <div class="profile-stats">
                <div class="stat"><h3>Recipes Submitted</h3><p><?php echo $recipes->num_rows; ?></p></div>
            </div>
            <div class="my-recipes">
                <h2>My Recipes</h2>
                <div class="recipes-grid">
                    <?php while ($recipe = $recipes->fetch_assoc()) { ?>
                        <div class="recipe-card">
                            <img src="<?php echo $recipe['image_url']; ?>" alt="Recipe Thumbnail">
                            <h3><?php echo htmlspecialchars($recipe['title']); ?></h3>
                            <p>Cooking Time: <?php echo htmlspecialchars($recipe['cooking_time']); ?></p>
                            <p>Servings: <?php echo htmlspecialchars($recipe['servings']); ?></p>
                            <form method="POST">
                                <input type="hidden" name="recipe_id" value="<?php echo $recipe['recipe_id']; ?>">
                                <button type="submit" name="delete_recipe">Delete</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="account-settings">
                <h2>Settings</h2>
                <form method="POST">
                    <button type="submit" name="delete_account">Delete Account</button>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
<?php
// Handle recipe deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_recipe'])) {
    $recipe_id = $_POST['recipe_id'];
    $deleteRecipe = $conn->prepare("DELETE FROM Recipes WHERE recipe_id = ? AND user_id = ?");
    $deleteRecipe->bind_param("ii", $recipe_id, $user_id);
    $deleteRecipe->execute();
    header("Location: profile.php");
    exit();
}

// Handle account deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_account'])) {
    $deleteUser = $conn->prepare("DELETE FROM Users WHERE user_id = ?");
    $deleteUser->bind_param("i", $user_id);
    $deleteUser->execute();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>