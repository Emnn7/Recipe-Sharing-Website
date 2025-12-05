<?php
session_start(); // Start the session to track user login status

// Include necessary files for DB connection
include '../include/connection.php';
// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT user_id, email, password_hash, user_type FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password_hash'])) {
            // Store user data in session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_type'] = $user['user_type'];

            // Redirect to a dashboard or home page after successful login
            header("Location: ../logged user page/home.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "User not found.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="wrapper">
        <div class="s1">
            <img src="image/steak.png" alt="" width="250px" height="280px">
        </div>
        <div class="s2">
            <h1>Welcome Back!</h1>
            <h2>Login</h2>

            <!-- Display error message if there is any -->
            <?php if (isset($error_message)) : ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="in">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <p><a href="#">Forgot password</a></p>
                <button type="submit">Login</button>
            </form>
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

        // Select elements
const emailInput = document.querySelector("input[placeholder='Enter you email']");
const passwordInput = document.querySelector("input[placeholder='Enter your password']");
const loginButton = document.querySelector("button");

// Helper functions for validation
function validateEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email); // Check if email matches pattern
}

function validatePassword(password) {
  return password.trim() !== ""; // Password must not be empty
}

// Show error messages
function showError(input, message) {
  let error = input.nextElementSibling; // Check for existing error message
  if (!error || !error.classList.contains("error-message")) {
    error = document.createElement("p");
    error.className = "error-message";
    error.style.color = "red";
    error.style.fontSize = "12px";
    input.parentNode.insertBefore(error, input.nextSibling);
  }
  error.textContent = message;
}

function clearError(input) {
  const error = input.nextElementSibling;
  if (error && error.classList.contains("error-message")) {
    error.remove();
  }
}

// Validation logic
function validateForm() {
  let isValid = true;

  // Validate email
  if (!validateEmail(emailInput.value)) {
    showError(emailInput, "Enter a valid email address.");
    isValid = false;
  } else {
    clearError(emailInput);
  }

  // Validate password
  if (!validatePassword(passwordInput.value)) {
    showError(passwordInput, "Password cannot be empty.");
    isValid = false;
  } else {
    clearError(passwordInput);
  }

  // Enable or disable login button
  loginButton.disabled = !isValid;
}

// Event listeners
emailInput.addEventListener("input", validateForm);
passwordInput.addEventListener("input", validateForm);

// Prevent form submission if invalid
loginButton.addEventListener("click", (e) => {
  validateForm();
  if (loginButton.disabled) {
    e.preventDefault();
    alert("Please fix the errors before logging in.");
  } else {
    alert("Login successful!");
  }
});


      </script>
      <?php 
    include 'footer.php'
    ?>
</body>
</html>