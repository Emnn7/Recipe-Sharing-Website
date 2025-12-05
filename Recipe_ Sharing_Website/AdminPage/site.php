<?php
include('../include/connection.php');

// Read Site Settings
$settings = $conn->query("SELECT * FROM settings")->fetch_assoc();

// Update Settings
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_settings'])) {
    $site_name = $_POST['site_name'];
    $logo = $_FILES['logo']['name'];

    if ($logo) {
        move_uploaded_file($_FILES['logo']['tmp_name'], "../uploads/$logo");
        $conn->query("UPDATE settings SET logo='$logo'");
    }
    $conn->query("UPDATE settings SET site_name='$site_name'");

    header("Location: ../admin_dashboard.php#settings");
    exit();
}
?>

<form method="POST" enctype="multipart/form-data">
    <label>Site Name:</label>
    <input type="text" name="site_name" value="<?= $settings['site_name'] ?>" required>

    <label>Change Logo:</label>
    <input type="file" name="logo">

    <button type="submit" name="update_settings">Update Settings</button>
</form>
