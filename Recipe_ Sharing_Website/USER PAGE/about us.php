<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="about us.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
<?php 
    include 'header.php'
    ?>
    <section class="about-us">
        <div class="about-us-container">
            <h1>About Us</h1>
           <div class="about">
           
            <div class="intro">
                <h2> Welcome to HEA's Recipe Sharing Platform!</h2>
                <p>At HEA's, we believe that cooking is more than just making meals—it's a way to express creativity, connect with loved ones, and celebrate diverse cultures. Our platform brings together food enthusiasts from around the globe to share recipes, explore new cuisines, and inspire one another in the kitchen. Whether you're a seasoned chef or a beginner eager to experiment, HEA's provides a space to learn, grow, and share your culinary journey. We celebrate the art of cooking as a universal language that brings people together, fostering community through flavors, traditions, and stories. From cherished family recipes to innovative fusion dishes, HEA's is your go-to hub for discovering the joy and passion of cooking while building connections that transcend borders. Together, let's create, savor, and celebrate the magic of food.</p>
            </div>
            <img src="image/about.png" alt="" width="400px" height="400px">
           </div>

            <div class="section">
                <h2>Our Mission</h2>
                <p>Our mission is to make the world tastier, one recipe at a time. We aim to:</p>
                <ul>
                    <li>Create a welcoming community for food lovers.</li>
                    <li>Help users discover recipes from different cultures and traditions.</li>
                    <li>Inspire creativity and innovation in the kitchen.</li>
                    <li>Encourage sharing and celebrating the love of food.</li>
                </ul>
            </div>

            <div class="section">
                <h2>What Makes Us Special</h2>
                <ul>
                    <li><strong>Diverse Recipes:</strong> Whether you're craving comforting classics or bold, international flavors, HEA's has something for everyone.</li>
                    <li><strong>User-Created Content:</strong> Share your own recipes and inspire others.</li>
                    <li><strong>Organized Categories:</strong> Find quick recipes, meal prep ideas, or explore trending cuisines with ease.</li>
                    <li><strong>Global Community:</strong> Connect with food lovers from every corner of the world.</li>
                </ul>
            </div>

            <div class="section">
                <h2>A Taste of What We Offer</h2>
                <ul>
                    <li><strong>Explore Global Cuisines:</strong> From Italian and Indian to Mexican and Habesha, dive into recipes that celebrate the beauty of different cultures.</li>
                    <li><strong>Cooking Made Easy:</strong> With step-by-step instructions, we make sure anyone can feel confident in the kitchen.</li>
                    <li><strong>Personal Recipe Library:</strong> Save your favorite recipes and share your culinary masterpieces with the community.</li>
                </ul>
            </div>

            <div class="section">
                <h2>Why We Started</h2>
                <p>HEA's was founded out of a love for food and the belief that great recipes deserve to be shared. We wanted to create a platform that encourages connection, learning, and creativity in the kitchen. Food has a way of bringing people together, and HEA's Recipe is our way of spreading that joy.</p>
            </div>

            <div class="cta">
                <h2>Join the HEA's Community</h2>
                <p>When you join HEA's, you're not just exploring recipes—you’re joining a community of passionate foodies. Sign up to share your favorite recipes, connect with others, and make your culinary journey unforgettable.</p>
                <button class="cta-btn" onclick="window.location.href = 'signup.html'">Join Our Community</button>
            </div>
        </div>
    </section>
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
    include 'footer.php'
    ?>
</body>
</html>