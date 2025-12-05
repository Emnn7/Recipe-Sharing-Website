<?php
// Include database connection file
include '../include/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert message into the database
    $sql = "INSERT INTO Messages (first_name, last_name, email, message, status) 
            VALUES ('$firstName', '$lastName', '$email', '$message', 'unread')";
    
    if (mysqli_query($conn, $sql)) {
        $successMessage = "Your message has been sent successfully!";
    } else {
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contact.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
    <!-- Include Header -->
    <?php 
    include 'header.php';
    ?>

    <div class="wrapper">
        <h1>Contact</h1>
        <div class="box">
            <form method="POST" action="contact.php">
                <div class="name">
                    <div class="fn">
                        <label>FIRST NAME <sup>*</sup></label>
                        <input type="text" name="first_name" required>
                    </div>
                    <div class="ln">
                        <label>LAST NAME <sup>*</sup></label>
                        <input type="text" name="last_name" required>
                    </div>
                </div>
                <label>EMAIL<sup>*</sup></label>
                <input type="email" name="email" required>
                <label style="margin-top: 5px;">MESSAGE</label>
                <textarea name="message" required></textarea>

                <div class="b1">
                    <button type="submit">SEND MESSAGE</button>
                </div>
            </form>

            <!-- Success/Error Messages -->
            <?php if (isset($successMessage)): ?>
                <p class="success"><?php echo $successMessage; ?></p>
            <?php elseif (isset($errorMessage)): ?>
                <p class="error"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // JavaScript to dynamically load header and footer
        fetch("header.php").then(response => response.text()).then(data => {
            document.getElementById("header").innerHTML = data;
        });

        fetch("footer.php").then(response => response.text()).then(data => {
            document.getElementById("footer").innerHTML = data;
        });
    </script>

    <!-- Include Footer -->
    <?php 
    include 'footer.php';
    ?>
</body>
</html>
