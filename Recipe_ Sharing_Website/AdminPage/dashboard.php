<?php
include('../include/connection.php');

// Fetch total number of recipes
$recipes = $conn->query("SELECT COUNT(*) AS total FROM recipes")->fetch_assoc();

// Fetch total users
$users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc();

// Fetch pending approvals
$pending_recipes = $conn->query("SELECT COUNT(*) AS total FROM recipes WHERE status='Pending'")->fetch_assoc();
?>

<div class="cards">
    <div class="card">Total Recipes: <?= $recipes['total'] ?></div>
    <div class="card">Active Users: <?= $users['total'] ?></div>
    <div class="card">Pending Approvals: <?= $pending_recipes['total'] ?></div>
</div>


