<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Website</title>
    <link rel="stylesheet" href="home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
    <div class="container">
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

        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-content">
                <h1>Welcome to HEA's</h1>
                <p class="hero-text">Dive into a world of flavors, from comforting family favorites to exotic global cuisines. Share your own culinary masterpieces, connect with food enthusiasts, and inspire others with your creations.</p>
                <button class="hero-btn" onclick="window.location.href = 'recipe.php'">Explore Recipes</button>
            </div>
        </div>
       
        
</div>
  <!-- Call-to-Action Section -->
  <section class="call-to-action">
    <h2>Join Our Recipe Community</h2>
    <p>Sign up today to share your recipes, save your favorites, and connect with food enthusiasts!</p>
    <button onclick="window.location.href = 'signup.php'">Get Started</button>
</section>
<div class="recipe-listing">
    <div class="feature">
        <img onclick="openCategoryPage('Japanese')" src="image/japanese.png" alt="" width="130px" height="130px">
        <h3>JAPANESE</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Indian')" src="image/indian.png" alt="" width="130px" height="130px">
        <h3>INDIAN</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Italian')" src="image/italian.png" alt="" width="130px" height="130px">
        <h3>ITALIAN</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Arabian')" src="image/arabian.png" alt="Arabian" width="130px" height="130px">
        <h3>ARABIAN</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Habeshan')" src="image/habesha.png" alt="" width="130px" height="130px">
        <h3>HABESHAN</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Mexican')" src="image/mexican.png" alt="" width="130px" height="130px">
        <h3>MEXICAN</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Turkish')" src="image/turkish.png" alt="" width="130px" height="130px">
        <h3>TURKISH</h3>
    </div>
    <div class="feature">
        <img onclick="openCategoryPage('Chinese')" src="image/chinese.png" alt="" width="130px" height="130px">
        <h3>CHINESE</h3>
    </div>
    
    </div>
    <p class="text1">"Good food brings people together—share your recipes, savor the connection."</p>
    <!-- About Us Section -->
    <div class="about">
        <div class="t1">
            <p>"Welcome to HEA's, a vibrant community for food lovers to share, 
                discover, and connect through recipes. From comforting family 
                favorites to global cuisines, we celebrate the joy of cooking 
                and bringing people together. Share your creations, explore new 
                dishes, and save your favorites—all in one place. Let’s make the 
                world tastier, one recipe at a time!"</p>
                <button onclick="window.location.href = 'about us.php', target='_blank'">Learn More</button>
        </div>
        <div class="t2">
            <img src="image/dumpling.jpg" alt="" width="250px" height= "250px">
        </div>

    </div>
    <div class="categories">
        <div class="category">
            <img onclick="openCategoriesPage('Quick and Easy')" src="image/Quick and easy.png" alt="" width="200px" height="250px">
            <h2>Quick And Easy</h2>
        </div>
        <div class="category">
            <img onclick="openCategoriesPage('Popular')" src="image/popular.png" alt="" width="200px" height="250px">
            <h2>Popular</h2>
        </div>
        <div class="category">
            <img onclick="openCategoriesPage('Healthy')" src="image/vegeterian.png" alt="" width="200px" height="250px">
            <h2>Healthy</h2>
        </div>
        <div class="category">
            <img onclick="openCategoriesPage('Vegan')" src="image/meal prep.png" alt="" width="200px" height="250px">
            <h2>Vegan</h2>
        </div>
    </div>
    <div class="search">
        <h2>Search Our Recipes</h2>
        <div class="in">
            <input onclick="window.location.href = 'search.php', target='_blank'" type="text" placeholder="Type chicken, pasta, rice">
        </div>
        <button onclick="window.location.href = 'recipe.php', target='_blank'">View All Recipes</button>
    </div>
   <!-- Footer -->
   <div class="footer">
    <div class="footer-container">
        <!-- Footer Section 1: Logo and Description -->
        <div class="footer-section">
            <h2 class="footer-logo"><img src="image/logo.png" alt="" width="120px" height="100px"></h2>
            <p>HEA's is your ultimate recipe-sharing platform, connecting food lovers and home chefs around the world. Share your recipes, explore new cuisines, and savor the joy of cooking together!</p>
        </div>

        <!-- Footer Section 2: Quick Links -->
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="recipe.php">Recipes</a></li>
                <li><a href="about us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="review.php">Reviews</a></li>
            </ul>
        </div>

        <!-- Footer Section 3: Contact Information -->
        <div class="footer-section">
            <h3>Contact Us</h3>
            <p><i class='bx bxs-location-plus'></i> Bole, Platinum Plaza</p>
            <p><i class='bx bx-envelope'></i> hea's@gmail.com</p>
            <p><i class='bx bxs-phone'></i> +251 944 321 399</p>
        </div>

        <!-- Footer Section 4: Newsletter Signup -->
        <div class="footer-section">
            <h3>Newsletter</h3>
            <p>Subscribe to get the latest recipes and tips!</p>
            <form>
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <!-- Social Media Links -->
    <div class="footer-social">
        <h3>Follow Us</h3>
        <div class="social-icons">
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-tiktok'></i></a>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>© 2024 HEA's. All Rights Reserved.</p>
        <a href="#top" class="back-to-top">Back to Top ↑</a>
    </div>
</div>

<script>

    //to open category page
     function openCategoryPage(categoryId) {
    // Open the category page with the selected category as a query parameter
    window.open(`categorys.php?recipe=${encodeURIComponent(categoryId)}`, '_blank');
}

function openCategoriesPage(categoriesId) {
        // Open the category page with the selected category as a query parameter
        window.open(`categories.php?recipe=${encodeURIComponent(categoriesId)}`, '_blank');
    }

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