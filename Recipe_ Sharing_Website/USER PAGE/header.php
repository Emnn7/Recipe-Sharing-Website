<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="header.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
 <!-- Header Section -->
 <div class="header">
    <div class="logo">
        <img src="image/logo.png" alt="Logo" width="120px" height="80px">
    </div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="recipe.php">Recipes</a></li>
        <li><a href="about us.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    <div class="b1">
        <button onclick="window.location.href='login.php'">Login</button>
    </div>
    <div class="hamburger">
        <i class='bx bx-menu'></i>
    </div>
</div>

<!-- Mobile Navigation -->
<div class="mobile-nav">
    <div class="close-btn">
        <i class='bx bx-x'></i>
    </div>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="recipe.php">Recipes</a></li>
        <li><a href="about us.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><button onclick="window.location.href='login.php'">Login</button></li>
    </ul>
</div>


<style>
    /* Header Styling */
.header {
display: flex;
justify-content: space-between;
align-items: center;
background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
position: fixed;
width: 100%;
z-index: 10;
}
.header .logo{
font-size: 35px;
font-weight: 600;
padding-left: 80px;
color: white;
}
.nav-links {
margin-left: -30px;
display: flex;
}

.nav-links li {
list-style: none;
}

.nav-links a {
font-size: 18px;
margin-right: 50px;
text-decoration: none;
color: white;
}

.nav-links a:hover  {
text-decoration: underline;
}

.b1 button {
border: none;
padding: 8px 15px;
border-radius: 5px;
margin-top: -2px;
margin-right: 70px;
}
.b1 button:hover {
text-decoration: underline;
}

/* Hamburger Icon Styling */
.hamburger {
display: none;
font-size: 30px;
color: white;
cursor: pointer;
margin-right: 20px;
}

/* Mobile Navigation Panel */
.mobile-nav {
position: fixed;
top: 0;
right: -100%;
width: 250px;
height: 100%;
background-color: rgba(0, 0, 0, 0.95); /* Darker background for better visibility */
color: white;
padding: 20px;
transition: right 0.3s ease;
z-index: 999; /* Ensure it appears on top */
}

/* Close Button Styling */
.close-btn {
color: white;
font-size: 30px;
text-align: right;
cursor: pointer;
margin-bottom: 20px;
position: absolute;
top: 20px;
right: 20px;
z-index: 1000; /* Make sure it's above other elements */
}

/* Mobile Nav Links */
.mobile-nav ul {
list-style: none;
padding: 0;
}

.mobile-nav ul li {
margin-bottom: 20px;
}

.mobile-nav ul li a {
color: white;
text-decoration: none;
font-size: 18px;
display: block;
}

.mobile-nav button {
border: none;
padding: 8px 15px;
border-radius: 5px;
margin-top: -2px;
margin-right: 70px;
}

.mobile-nav button:hover {
text-decoration: underline;
}

   /* Responsive Design */
@media (max-width: 768px) {
.header .logo {
    font-size: 28px; /* Adjust logo size */
}

.nav-links {
    display: none;
}

.b1 {
    display: none;
}

.hamburger {
    display: block;
}
}




</style>


    <script>
         // Toggle Mobile Navigation
    const hamburger = document.querySelector('.hamburger');
        const mobileNav = document.querySelector('.mobile-nav');
        const closeBtn = document.querySelector('.close-btn');

        hamburger.addEventListener('click', () => {
            mobileNav.style.right = '0';
        });

        closeBtn.addEventListener('click', () => {
            mobileNav.style.right = '-100%';
        });
    </script>
</body>
</html>
