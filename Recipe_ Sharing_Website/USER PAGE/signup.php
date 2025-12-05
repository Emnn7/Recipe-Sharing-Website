<?php
// Include necessary files for DB connection
include '../include/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Validate form inputs
    if (empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Check if the username or email already exists
        $sql = "SELECT * FROM Users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $error = "Username or email already exists.";
        } else {
            // Hash the password before storing
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the Users table
            $sql = "INSERT INTO Users (username, email, password_hash) VALUES ('$username', '$email', '$password_hash')";
            if (mysqli_query($conn, $sql)) {
                $success = "Sign up successful. You can now log in.";
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <div class="s1">
            <h1>Welcome To HEA's</h1>
            <h2>SIGN UP</h2>

            <!-- Display error or success messages -->
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php elseif (isset($success)): ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>

            <div class="in">
                <form method="POST" action="">
                    <label>Full Name <sup>*</sup></label>
                    <input type="text" name="username" required>
                    
                    <label>Email <sup>*</sup></label>
                    <input type="text" name="email" required>

                    <label>Password <sup>*</sup></label>
                    <input type="password" name="password" required>

                    <button type="submit">Sign up</button>
                </form>
            </div>
            
            <br>
            <div class="check">
                <label>
                    <input type="checkbox"> 
                    <a href="#">Remember me</a>
                </label>
            </div>
            <p>Already have an account? <a href="login.php">Login</a></p>
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
const nameInput = document.querySelector("input[type='text']:nth-of-type(1)");
const emailInput = document.querySelector("input[type='text']:nth-of-type(2)");
const passwordInput = document.querySelector("input[type='password']");
const signupButton = document.querySelector("button");

// Helper functions for validation
function validateName(name) {
  return name.trim() !== ""; // Name must not be empty
}

function validateEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email); // Check if email matches the pattern
}


function validatePassword(password) {
  return password.length >= 6; // Password must be at least 6 characters long
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

  // Validate name
  if (!validateName(nameInput.value)) {
    showError(nameInput, "Name is required.");
    isValid = false;
  } else {
    clearError(nameInput);
  }

 // Helper functions for validation
function validateEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email); // Check if email matches pattern
}

  // Validate password
  if (!validatePassword(passwordInput.value)) {
    showError(passwordInput, "Password must be at least 6 characters long.");
    isValid = false;
  } else {
    clearError(passwordInput);
  }

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

  // Enable or disable signup button
  signupButton.disabled = !isValid;
}

// Event listeners
nameInput.addEventListener("input", validateForm);
emailInput.addEventListener("input", validateForm);
passwordInput.addEventListener("input", validateForm);

// Prevent form submission if invalid
signupButton.addEventListener("click", (e) => {
  validateForm();
  if (signupButton.disabled) {
    e.preventDefault();
    alert("Please fix the errors before submitting.");
  } else {
    alert("Sign up successful!");
  }
});


      </script>
      <!-- Include Footer -->
      <?php 
    include 'footer.php'
    ?>
</body>
</html>