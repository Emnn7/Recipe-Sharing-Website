<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="icon" href="image/logo.png" type="image/x-icon">
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
        <button onclick="window.location.href='../USER PAGE/home.php'">Logout</button>
    </div>
    <div class="hamburger" onclick="toggleNav()">&#9776;</div> <!-- Hamburger Icon -->
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
        <li><a href="profile.php">Profile</a></li>
        <li><a href="submit.php">Sumbit Recipe</a></li>
        <li><a href="saved.php">Saved Recipe</a></li>
        <li><a href="review.php">Review</a></li>
        <button onclick="window.location.href='../USER PAGE/home.php'">Logout</button>
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
    display: block;
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
    .nav-links {
        display: none;
    }

    .b1 {
        display: none;
    }

    .hamburger {
        display: block;
    }
    .about {
        display: flex;
        flex-direction: column; /* Stack items vertically on small screens */
        padding: 40px;
        text-align: center;
    }
    
    .about .t1 {
        width: 80%;
        margin: 0 auto;
        margin-top: 20px;
    }
    
    .t1 p {
        font-size: 16px; /* Adjust font size */
    }
    
    .t1 button {
        border: none;
        padding: 10px 15px;
        background-color: orange;
        border-radius: 5px;
        color: white;
        margin-top: 10px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        margin-bottom: 10px;
    }
    
    .t1 button:hover {
        background-color: darkorange;
    }
    
    .about .t2 {
        margin-left: 0;
    }
    
    .about .t2 img {
        width: 100%;
        max-width: 250px;
        height: auto;
    }
}
.search {
    padding: 20px;
    background-color: grey;
    text-align: center;
}

.search h2 {
    color: white;
    font-size: 24px;
    margin-bottom: 15px;
}

.search .in input {
    border: none;
    padding: 10px 30px 10px 10px;
    font-size: 16px;
}

.search button {
    border: none;
    outline: none;
    padding: 10px 20px;
    background-color: orange;
    color: white;
    border-radius: 5px;
    margin-top: 10px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.search button:hover {
    background-color: darkorange;
}
.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-section {
    flex: 1 1 250px;
    margin: 10px;
}

.footer-section form {
    display: flex;
    gap: 10px;
}

.footer-section input[type="email"] {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 4px;
    outline: none;
}

.footer-section button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1c40f;
    color: #333;
    cursor: pointer;
    transition: background-color 0.3s;
}

.footer-section button:hover {
    background-color: #d4ac0d;
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


@media (min-width: 769px) {
    
    .mobile-nav {
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
           function toggleNav() {
            mobileNav.style.right = '0';
    }
</script>
