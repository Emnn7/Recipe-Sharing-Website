<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review page</title>
    <link rel="stylesheet" href="review.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
<?php 
    include 'header.php'
    ?>
   <div class="wrapper">
    <div class="t1">
        <div id="header"></div>
       </div>
        <div class="t2">
            <header class="head">
                <h1>Recipe Reviews</h1>
                <p>Check what users are saying about this recipe!</p>
            </header>
        
            <div class="main-container">
                <!-- Recipe Details -->
                <section class="recipe-details">
                    <h2>Spaghetti Bolognese</h2>
                    <p>By <a href="#">John Doe</a></p>
                    <div class="rating-summary">
                        <p>Average Rating: <span class="average-rating">4.5</span> ⭐</p>
                        <p>Total Reviews: 120</p>
                    </div>
                </section>
        
                <!-- Review Statistics -->
                <section class="review-statistics">
                    <h3>Review Statistics</h3>
                    <ul>
                        <li>5 Stars: 70%</li>
                        <li>4 Stars: 20%</li>
                        <li>3 Stars: 5%</li>
                        <li>2 Stars: 3%</li>
                        <li>1 Star: 2%</li>
                    </ul>
                </section>
        
                <!-- User Reviews -->
                <section class="user-reviews">
                    <h3>User Reviews</h3>
                    <div class="review">
                        <div class="review-header">
                            <span class="review-author">Jane Smith</span>
                            <span class="review-rating">⭐⭐⭐⭐⭐</span>
                        </div>
                        <p class="review-text">"This recipe is absolutely amazing! I followed it step by step, and the results were perfect."</p>
                        <div class="review-footer">
                            <p>Helpful? <button>👍</button> <button>👎</button></p>
                        </div>
                    </div>
        
                    <div class="review">
                        <div class="review-header">
                            <span class="review-author">Mark Johnson</span>
                            <span class="review-rating">⭐⭐⭐⭐</span>
                        </div>
                        <p class="review-text">"Tasty dish, but I added more spices to enhance the flavor. Great for family dinners."</p>
                        <div class="review-footer">
                            <p>Helpful? <button>👍</button> <button>👎</button></p>
                        </div>
                    </div>
                </section>
        
                <!-- Submit a Review -->
                <section class="submit-review">
                    <h3>Write a Review</h3>
                    <form>
                        <label for="rating">Rating:</label>
                        <select id="rating">
                            <option value="5">5 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="2">2 Stars</option>
                            <option value="1">1 Star</option>
                        </select>
                        <label for="review-text">Review:</label>
                        <textarea id="review-text" rows="4" placeholder="Share your experience..."></textarea>
                        <button type="submit">Submit Review</button>
                    </form>
                </section>
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
        </div>
          <!-- Include Footer -->
       <div class="t3">
       <?php 
    include 'footer.php'
    ?>
       </div>
   </div>
</body>
</html>