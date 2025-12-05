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
<?php 
    include 'header.php'
    ?>
     <?php 
    include('../include/connection.php');
    ?>
    <div class="wrapper">
        <div class="s1">
            <img src="image/steak.png" alt="" width="250px" height="280px">
        </div>
        <div class="s2">
            <h1>Welcome Back!</h1>
            <h2>Login</h2>
            <div class="in">
                <label>Email</label>
            <input type="text" placeholder="Enter you email">
            <label>Password</label>
            <input type="text" placeholder="Enter your password">
            </div>
            <p><a href="#">Forgot password</a></p>
            <button>Login</button>
        </div>
    </div>
    
    
    <script>
        // JavaScript to dynamically load header and footer
        fetch("header.html").then(response => response.text()).then(data => {
          document.getElementById("header").innerHTML = data;
        });
    
        fetch("footer.html").then(response => response.text()).then(data => {
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