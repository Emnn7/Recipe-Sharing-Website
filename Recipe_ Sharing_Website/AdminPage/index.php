
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png" type="image/x-icon">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#recipe-management">Recipe Management</a></li>
            <li><a href="#user-management">User Management</a></li>
            <li><a href="#comments-reviews">Comments & Reviews</a></li>
            <li><a href="#reports">Reports & Analytics</a></li>
            <li><a href="#settings">Site Settings</a></li>
        </ul>
    </div>
    
    <div class="main-content">
        <!-- Dashboard Section -->
        <section id="dashboard"> 
            <h1>Dashboard</h1>
            <p>Welcome to the admin dashboard. Here’s a quick overview:</p>
            <?php include('dashboard.php'); ?>
        </section>

        <!-- Recipe Management Section -->
        <section id="recipe-management">
            <h1>Recipe Management</h1>         
            <?php include('recipe.php'); ?>
        </section>

        <!-- User Management Section -->
        <section id="user-management">
            <h1>User Management</h1>
            <?php include('user.php'); ?>
        </section>

        <!-- Comments & Reviews Section -->
        <section id="comments-reviews">
            <h1>Comments & Reviews</h1>
            <table>
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Reviewer</th>
                        <th>Comment</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Spaghetti Bolognese</td>
                        <td>JaneSmith</td>
                        <td>Delicious and easy to make!</td>
                        <td>⭐⭐⭐⭐⭐</td>
                        <td>
                            <button>Approve</button>
                            <button>Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Reports & Analytics Section -->
        <section id="reports">
            <h1>Reports & Analytics</h1>
            <p>Generate detailed reports for platform activity:</p>
            <button>View Recipe Statistics</button>
            <button>Generate User Activity Report</button>
            
        </section>

        <!-- Site Settings Section -->
        <section id="settings">
            <h1>Site Settings</h1>
            <p>Manage platform settings and configurations:</p>
            <button>Change Logo</button>
            <button>Backup Database</button>
        </section>
    </div>
    <script src="script.js"></script>
</body>
</html>
