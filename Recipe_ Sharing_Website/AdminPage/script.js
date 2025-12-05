// JavaScript to handle navigation between sections
document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('.sidebar ul li a');
    const sections = document.querySelectorAll('section');
    
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href').substring(1);

            // Hide all sections and show the target section
            sections.forEach(section => {
                section.style.display = section.id === targetId ? 'block' : 'none';
            });

            // Highlight the active link
            links.forEach(link => link.classList.remove('active'));
            link.classList.add('active');
        });
    });

    // Display the first section by default
    sections.forEach((section, index) => {
        section.style.display = index === 0 ? 'block' : 'none';
    });
});

document.addEventListener("DOMContentLoaded", () => {
    // Load data on page load
    loadDashboardData();
    loadRecipeData();
    loadUserData();
    loadCategoryData();
    loadCommentsData();

    // Function to load dashboard overview
    function loadDashboardData() {
        fetch('/api/dashboard')
            .then(response => response.json())
            .then(data => {
                document.querySelector(".cards .card:nth-child(1)").textContent = `Total Recipes: ${data.totalRecipes}`;
                document.querySelector(".cards .card:nth-child(2)").textContent = `Active Users: ${data.activeUsers}`;
                document.querySelector(".cards .card:nth-child(3)").textContent = `Pending Approvals: ${data.pendingApprovals}`;
            })
            .catch(error => console.error("Error loading dashboard data:", error));
    }

    // Function to load recipe data
    function loadRecipeData() {
        fetch('/api/recipes')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector("#recipe-management table tbody");
                tbody.innerHTML = ''; // Clear table
                data.forEach(recipe => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${recipe.title}</td>
                        <td>${recipe.author}</td>
                        <td>${recipe.category}</td>
                        <td>${recipe.status}</td>
                        <td>
                            <button onclick="approveRecipe('${recipe.id}')">Approve</button>
                            <button onclick="editRecipe('${recipe.id}')">Edit</button>
                            <button onclick="deleteRecipe('${recipe.id}')">Delete</button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error("Error loading recipes:", error));
    }

    // Function to load user data
    function loadUserData() {
        fetch('/api/users')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector("#user-management table tbody");
                tbody.innerHTML = ''; // Clear table
                data.forEach(user => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>${user.role}</td>
                        <td>${user.status}</td>
                        <td>
                            <button onclick="editUser('${user.id}')">Edit</button>
                            <button onclick="disableUser('${user.id}')">Disable</button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error("Error loading users:", error));
    }

    // Function to load category data
    function loadCategoryData() {
        fetch('/api/categories')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector("#category-management table tbody");
                tbody.innerHTML = ''; // Clear table
                data.forEach(category => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${category.name}</td>
                        <td>${category.description}</td>
                        <td>
                            <button onclick="editCategory('${category.id}')">Edit</button>
                            <button onclick="deleteCategory('${category.id}')">Delete</button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error("Error loading categories:", error));
    }

    // Function to load comments and reviews
    function loadCommentsData() {
        fetch('/api/comments')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector("#comments-reviews table tbody");
                tbody.innerHTML = ''; // Clear table
                data.forEach(comment => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${comment.recipe}</td>
                        <td>${comment.reviewer}</td>
                        <td>${comment.text}</td>
                        <td>${"⭐".repeat(comment.rating)}</td>
                        <td>
                            <button onclick="approveComment('${comment.id}')">Approve</button>
                            <button onclick="deleteComment('${comment.id}')">Delete</button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error("Error loading comments:", error));
    }
});

// Action handlers
function approveRecipe(id) {
    fetch(`/api/recipes/${id}/approve`, { method: 'POST' })
        .then(() => alert('Recipe approved!'))
        .catch(error => console.error("Error approving recipe:", error));
}

function deleteRecipe(id) {
    fetch(`/api/recipes/${id}`, { method: 'DELETE' })
        .then(() => {
            alert('Recipe deleted!');
            loadRecipeData(); // Reload recipes
        })
        .catch(error => console.error("Error deleting recipe:", error));
}

function editRecipe(id) {
    alert(`Edit recipe with ID: ${id}`);
    // Add redirection or modal logic for editing
}

// Similar functions for users, categories, and comments...

