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
<style>
    /* Footer General Styling */
.footer {
    background-color: #333;
    color: #f9f9f9;
    padding: 40px 20px;
    font-family: Arial, sans-serif;
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

.footer-section h2, 
.footer-section h3 {
    color: #f1c40f;
    margin-bottom: 10px;
}

.footer-section p,
.footer-section ul,
.footer-section form {
    color: #dcdcdc;
    margin-bottom: 10px;
    line-height: 1.6;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 8px;
}

.footer-section ul li a {
    text-decoration: none;
    color: #f9f9f9;
    transition: color 0.3s;
}

.footer-section ul li a:hover {
    color: #f1c40f;
}

/* Contact Information */
.footer-section i {
    margin-right: 10px;
    color: #f1c40f;
}

/* Newsletter Signup */
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

/* Social Media Links */
.footer-social {
    text-align: center;
    margin: 20px 0;
}

.footer-social h3 {
    color: #f1c40f;
    margin-bottom: 15px;
}

.social-icons {
    display: flex;
    justify-content: center;
    gap: 15px;
}

.social-icons a {
    color: #f9f9f9;
    font-size: 20px;
    transition: color 0.3s;
}

.social-icons a:hover {
    color: #f1c40f;
}

/* Footer Bottom */
.footer-bottom {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #dcdcdc;
    border-top: 1px solid #444;
    padding-top: 10px;
}

.footer-bottom a {
    color: #f1c40f;
    text-decoration: none;
    margin-left: 10px;
}

.footer-bottom a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-section {
        text-align: center;
    }

    .footer-section form {
        flex-direction: column;
    }
}
</style>