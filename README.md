🍽️ Recipe Sharing Website

A dynamic recipe-sharing platform built using PHP, MySQL, HTML, CSS, and XAMPP.  
This website allows users to discover, submit, and save recipes while interacting with a community of food enthusiasts.

---

Features

👤 User Features
- User Registration & Login
- Submit Recipes with:
  - Title, description, ingredients, instructions  
  - Cooking time, servings, difficulty level  
  - Image upload  
- Browse Recipes
- Search Recipes by keywords or categories
- View Recipe Details
- Save/Bookmark Favorite Recipes
- View Saved Recipes
- Responsive Design (mobile-friendly)

🛠 Admin Features
- Manage users
- Approve/edit/delete recipes
- Basic admin dashboard for monitoring activity

---

🗂️ Pages Included
- Homepage (hero section + featured recipes)
- Recipes Page
- Recipe Details Page
- Submit Recipe
- User Profile
- Saved Recipes
- About Us / Contact
- Admin Dashboard & Management Pages

---

## 🛠 Technologies Used
- PHP (server-side logic)
- MySQL (database)
- HTML5 / CSS3
- JavaScript (basic interactivity & form validation)
- XAMPP (Apache + MySQL local environment)

---

## 🛢 Database Structure (MySQL)

 `users` table
| Column       | Type        | Description                 |
|--------------|-------------|-----------------------------|
| id           | INT (PK)    | User ID                     |
| username     | VARCHAR     | Login username              |
| email        | VARCHAR     | User email                  |
| password     | VARCHAR     | Hashed password             |

 `recipes` table
| Column       | Type        | Description                 |
|--------------|-------------|-----------------------------|
| id           | INT (PK)    | Recipe ID                   |
| user_id      | INT (FK)    | Submitted by user           |
| title        | VARCHAR     | Recipe title                |
| description  | TEXT        | Short description           |
| ingredients  | TEXT        | Full ingredient list        |
| instructions | TEXT        | Steps to prepare            |
| category     | VARCHAR     | Recipe category             |
| difficulty   | VARCHAR     | Easy / Medium / Hard        |
| servings     | INT         | Number of servings          |
| cook_time    | VARCHAR     | Total or prep/cook time     |
| image        | VARCHAR     | Image file path             |

 `favorites` table (optional)
| Column       | Type        | Description         |
|--------------|-------------|---------------------|
| id           | INT (PK)    | Favorite ID         |
| user_id      | INT (FK)    | User who saved      |
| recipe_id    | INT (FK)    | Saved recipe ID     |

---

 ⚙️ How to Run the Project (XAMPP)

1. Install XAMPP
2. Put the project folder inside:
3. 3. Start Apache and MySQL from XAMPP Control Panel
4. Import the database:
- Open phpMyAdmin
- Create a database (e.g., `recipes_db`)
- Import the `.sql` file included in the project
5. Open the website in your browser: http://localhost/yourfoldername/

  📌 Notes
This project was developed as part of an academic project, this system includes foundational implementations that may require further refinement for real-world deployment. 
However, it demonstrates skills in:
- Front-end development  
- Back-end PHP & SQL  
- User authentication  
- CRUD operations  
- Responsive design  

---

📜 License
This project is for educational use. You may modify it freely.
