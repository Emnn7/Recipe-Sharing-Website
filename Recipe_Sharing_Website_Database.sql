-- Step 1: Create the Database
CREATE DATABASE Recipe_Sharing_Website;
USE Recipe_Sharing_Website;
-- Step 2: Create the Users Table
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    location VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255),
    bio TEXT,
    user_type ENUM('User', 'Admin') DEFAULT 'User', -- Differentiates regular users from admins
    join_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    action ENUM('Edit', 'Disable')
    is_admin TINYINT(1) NOT NULL DEFAULT 0;
);
select * from users
describe users

-- Step 3: Create the Recipes Table
CREATE TABLE Recipes (
    recipe_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL,
    cooking_time VARCHAR (100) NOT NULL, -- In minutes
    difficulty ENUM('Easy', 'Medium', 'Hard') NOT NULL,
    servings INT NOT NULL,
    cuisine_type VARCHAR(100),
    image_url VARCHAR(255),
    user_id INT NOT NULL,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending', -- For admin approval
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
describe recipes
select * from recipes

-- Step 5: Create the Comments Table
CREATE TABLE Comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    recipe_id INT NOT NULL,
    comment TEXT NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),  -- rating between 1 and 5
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id) ON DELETE CASCADE,
    action ENUM('approve', 'delete') DEFAULT 'pending'  -- action column (approve or delete)
);

-- Step 6: Create the Favorites Table
CREATE TABLE Favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    recipe_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id) ON DELETE CASCADE
);
select * from Favorites

-- Step 7: Create the Categories Table
CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL
);

select * from Categories;

-- Step 8: Create the Recipe_Categories Table
CREATE TABLE Recipe_Categories (
    recipe_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (recipe_id, category_id),
    FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id) ON DELETE CASCADE
);

CREATE TABLE Countries (
    country_id INT AUTO_INCREMENT PRIMARY KEY,
    country_name VARCHAR(100) NOT NULL
);
select * from Countries

-- Step 8: Create the Recipe_Countries Table
CREATE TABLE Recipe_Countries (
    recipe_id INT NOT NULL,
    country_id INT NOT NULL,
    PRIMARY KEY (recipe_id, country_id),
    FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id) ON DELETE CASCADE,
    FOREIGN KEY (country_id) REFERENCES Countries(country_id) ON DELETE CASCADE
);


CREATE TABLE Tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(100) NOT NULL
);

-- Step 8: Create the Recipe_Tags Table
CREATE TABLE Recipe_Tags (
    recipe_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (recipe_id, tag_id),
    FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tags(tag_id) ON DELETE CASCADE
);

-- Step 9: Create the Blog Table
CREATE TABLE Blog (
    blog_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
    author_id INT, -- Linked to Users
    FOREIGN KEY (author_id) REFERENCES Users(user_id) ON DELETE SET NULL
);
select * from Blog


-- Step 11: Create the Reports Table

-- Step 12: Create the Site_Settings Table
CREATE TABLE site_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,        -- Unique ID for the settings record
    site_name VARCHAR(255) NOT NULL,           -- The name of the site
    site_email VARCHAR(255) NOT NULL,          -- Email address of the site (for admin contact, etc.)
    timezone VARCHAR(50) NOT NULL,             -- Default timezone for the site
    theme ENUM('light', 'dark') DEFAULT 'light'  -- Theme selection (light or dark mode)
);
INSERT INTO site_settings (id, site_name, site_email, timezone, theme) 
VALUES (1, 'My Website', 'admin@example.com', 'UTC', 'light')
ON DUPLICATE KEY UPDATE id=id;
select * from site_settings






CREATE TABLE Messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('read', 'unread') DEFAULT 'unread',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
select * from Messages
CREATE TABLE recipe_actions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    action_type ENUM('Approved', 'Rejected', 'Deleted') NOT NULL,
    performed_by INT, -- Admin/User ID who performed the action (optional)
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comments VARCHAR(255), -- Optional comments for rejection or notes
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id) ON DELETE CASCADE,
    FOREIGN KEY (performed_by) REFERENCES users(user_id) ON DELETE SET NULL
);
CREATE TABLE email_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    recipe_id INT,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id) ON DELETE SET NULL
);
select * from email_logs

CREATE TABLE user_actions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- The user being acted upon
    action_type ENUM('Created', 'Updated', 'Deleted') NOT NULL,
    performed_by INT, -- Admin/User ID who performed the action
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comments VARCHAR(255), -- Optional comments for additional context
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (performed_by) REFERENCES users(user_id) ON DELETE SET NULL
);

CREATE TABLE password_resets (
    user_id INT PRIMARY KEY,
    token VARCHAR(100) UNIQUE NOT NULL,
    expiry DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);
select * from password_resets

CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
select * from admins

insert into admins( admin_id, username, password)
values (1, 'eman', '12345678');
select * from user_actions

CREATE TABLE Subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
select * from Subscribers






-- creating user with user_id 1

INSERT INTO Users(username, email, password_hash, profile_picture, bio, user_type)
VALUES ('janedoe', 
        'janedoe@gmail.com', 
        '*2yx!10$eImiTXuWVxfM37uY4m6j.e1lvZqZ1T1Z7FZ7g0U0/N2fH8U8C0g76',  -- Example of a hashed password
        'images/janedoe.jpg', 
        'Food lover and Pro chef.', 
        'User');
        describe recipes
       
       
       -- Insert Categories
INSERT INTO Categories (category_name) VALUES 
('Breakfast'), 
('Lunch'), 
('Dinner'),
('Dessert');


select * from Categories;


-- Insert Countries
INSERT INTO Countries (country_name) VALUES 
('Japanese'),
('Indian'), 
('Italian'),
('Arabian'),
('Habeshan'),
('Mexican'),
('Turkish'),
('Chinese');

select * from Countries;


-- Insert Tags
INSERT INTO Tags (tag_name) VALUES 
('Quick & Easy'), 
('Popular'), 
('Healthy'), 
('Vegan');

select * from Tags;


-- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id, status) 
VALUES 
('Hummus', 
 'Hummus is a delicious and nutritious Middle Eastern dip made from chickpeas, tahini, lemon juice, garlic, and olive oil.',
 '1 can (15 oz) chickpeas, drained and rinsed; 1/4 cup tahini; 2 tablespoons olive oil; 2 tablespoons lemon juice; 1 clove garlic, minced; Salt to taste; Water (as needed for consistency); Paprika and olive oil for garnish (optional)', 
 'In a food processor, combine the chickpeas, tahini, olive oil, lemon juice, garlic, and salt. Blend until smooth, adding water as needed to achieve desired consistency. Taste and adjust seasoning if necessary. Transfer to a serving bowl and drizzle with olive oil and sprinkle with paprika before serving.',
 '10 minutes', 
 'Easy', 
 4, 
 'Arabian', 
 'image/humus.jpg',
 1, 
 'Approved');

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id, status)
VALUES 
('Tabbouleh', 
 'Tabbouleh is a refreshing and healthy Middle Eastern salad made with bulgur wheat, fresh herbs, tomatoes, and a zesty lemon dressing.',
 '1/2 cup bulgur wheat; 1 cup boiling water; 1 cup parsley, finely chopped; 1/2 cup mint, finely chopped; 2 tomatoes, diced; 1/4 cup olive oil; 2 tablespoons lemon juice; Salt to taste',
 'Place bulgur wheat in a bowl and pour boiling water over it. Cover and let it sit for 30 minutes. Fluff the bulgur with a fork and add parsley, mint, tomatoes, olive oil, lemon juice, and salt. Toss well to combine and refrigerate for at least 30 minutes before serving.',
 '50 minutes', 
 'Easy', 
 4, 
 'Arabian', 
 'image/Tabbouleh.jpg',
 1,
 'Approved');
 
 select * from recipes

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Baba Ganoush', 
 'Baba Ganoush is a smoky and creamy Middle Eastern dip made from roasted eggplants, tahini, olive oil, lemon juice, and garlic.',
 '1 large eggplant; 1/4 cup tahini; 2 tablespoons olive oil; 2 tablespoons lemon juice; 1 clove garlic, minced; Salt to taste; Pomegranate seeds and olive oil for garnish (optional)',
 'Pierce the eggplant with a fork and roast it in the oven at 400°F (200°C) for about 30-40 minutes until soft. Let it cool, then scoop out the flesh into a bowl. Add tahini, olive oil, lemon juice, garlic, and salt. Blend until smooth. Transfer to a serving dish and garnish with pomegranate seeds and olive oil before serving.',
 '50 minutes', 
 'Easy', 
 4, 
 ' Arabian ', 
 'image/best-baba-ganoush-recipe.png',
 1,
 'Approved');

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Baklava', 
 'Baklava is a rich, sweet pastry made of layers of filo dough filled with chopped nuts and sweetened with honey or syrup.',
 '1 package of filo dough; 2 cups chopped nuts (walnuts, pistachios, or almonds); 1 cup melted butter; 1 cup honey; 1 cup water; 1 teaspoon vanilla extract; 1 teaspoon ground cinnamon',
 'Preheat the oven to 350°F (175°C). Layer half of the filo dough in a greased baking dish, brushing each layer with melted butter. Mix the chopped nuts with cinnamon and sprinkle over the filo layers. Add the remaining filo layers on top, again brushing each layer with butter. Cut the baklava into diamond shapes before baking. Bake for about 45 minutes until golden brown. In a saucepan, combine honey, water, and vanilla. Bring to a boil and simmer for 10 minutes. Pour the syrup over the hot baklava as soon as it comes out of the oven. Let it cool before serving.',
 '75 minutes', 
 'Medium', 
 12, 
 'Arabian', 
 'image/Baklava.jpg',
 1,
 'Approved');
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Basbousa', 
 'Basbousa is a semolina-based sweet cake soaked in syrup. This popular Middle Eastern dessert is moist, rich, and typically topped with nuts or coconut.',
 '1 cup semolina; 1 cup sugar; 1 cup yogurt; ½ cup melted butter; 1 teaspoon baking powder; Sliced almonds or shredded coconut for garnish; 1 cup sugar (for syrup); 1 cup water; 1 teaspoon lemon juice',
 'Preheat the oven to 350°F (175°C). Mix semolina, sugar, yogurt, melted butter, and baking powder. Pour the mixture into a greased baking dish. Bake for about 35 minutes until golden brown. In a saucepan, combine sugar, water, and lemon juice. Boil and simmer for 10 minutes to make the syrup. Pour the syrup over the hot basbousa. Garnish with almonds or coconut.',
 '55 minutes', 
 'Easy', 
 10, 
 'Arabian', 
 'image/Basbousa.jpg',
 1,
 'Approved');



INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Shawarma', 
 'Shawarma is a popular Middle Eastern street food made with marinated and roasted meat, often served in pita bread with fresh vegetables and sauces.',
 '1 lb chicken, beef, or lamb (sliced thinly); 3 cloves garlic, minced; 1 tablespoon ground cumin; 1 tablespoon ground paprika; 1 tablespoon ground turmeric; 1 tablespoon ground cinnamon; 1/4 cup plain yogurt; 2 tablespoons olive oil; Salt and pepper to taste; Pita bread; Fresh vegetables (tomatoes, cucumbers, lettuce); Tahini sauce or garlic sauce for serving',
 'In a bowl, mix garlic, cumin, paprika, turmeric, cinnamon, yogurt, olive oil, salt, and pepper. Add the sliced meat to the marinade and let it marinate for at least 1 hour (or overnight in the fridge). Cook the marinated meat on a vertical rotisserie or grill until fully cooked and slightly charred. Slice the meat thinly and serve in pita bread with fresh vegetables, sauces, and french fries.',
 '90 minutes', 
 'Medium', 
 6, 
 'Arabian', 
 'image/shawarma.jpg',
 1,
 'Approved');

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Kebabs', 
 'Kebabs are skewered and grilled pieces of seasoned meat, often paired with vegetables. They are smoky, juicy, and perfect for outdoor grilling or home-cooked meals.',
 '1 lb meat (chicken, beef, or lamb), cubed; 1 onion, finely chopped; 2 cloves garlic, minced; 2 tablespoons olive oil; 1 tablespoon ground cumin; 1 tablespoon ground coriander; Salt and pepper to taste; Skewers (soaked in water if wooden); Vegetables for skewering (bell peppers, onions, zucchini)',
 'In a bowl, combine cubed meat, onion, garlic, olive oil, cumin, coriander, salt, and pepper. Mix well and let marinate for at least 30 minutes. Thread the marinated meat and vegetables onto skewers. Grill the kebabs over medium-high heat until cooked through and slightly charred, about 10-15 minutes. Serve with rice or bread.',
 '45 minutes', 
 'Medium', 
 6, 
 'Arabian', 
 'image/kebab.jpg',
 1,
 'Approved');

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Mandi', 
 'Mandi is a traditional Arabian rice and meat dish cooked with fragrant spices.',
 '1 lb chicken or lamb, cut into pieces; 2 cups basmati rice; 4 cups water or chicken broth; 1 onion, chopped; 3 cloves garlic, minced; 1 tablespoon ground cumin; 1 tablespoon ground coriander; 1/2 teaspoon saffron strands (optional); Salt to taste; 2 tablespoons ghee or butter',
 'In a large pot, heat ghee or butter over medium heat. Add onion and garlic and sauté until soft. Add the meat pieces and brown on all sides. Add cumin, coriander, saffron (if using), salt, and water/broth. Bring to a boil. Add the basmati rice, stir gently, cover, and reduce heat to low. Cook for about 20-25 minutes until rice is tender and liquid is absorbed. Fluff the rice with a fork before serving.',
 '150 minutes', 
 'Medium', 
 8, 
 'Arabian', 
 'image/mandi.jpg',
 1,
  'Approved');

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Shorbat Adas', 
 'Shorbat Adas, a hearty lentil soup, is a staple in Middle Eastern cuisine, offering a warm, nutritious, and satisfying meal.',
 '1 cup red lentils, rinsed; 1 onion, chopped; 2 carrots, diced; 3 cloves garlic, minced; 1 teaspoon ground cumin; 4 cups vegetable or chicken broth; Juice of 1 lemon; Salt and pepper to taste; Olive oil for drizzling',
 'In a pot, heat olive oil over medium heat. Add onion, carrots, and garlic; sauté until softened. Add lentils, cumin, broth, salt, and pepper. Bring to a boil, then reduce heat and simmer for about 20-25 minutes until lentils are tender. Blend the soup with an immersion blender until smooth (optional). Stir in lemon juice before serving. Drizzle with olive oil if desired.',
 '40 minutes', 
 'Easy', 
 6, 
 'Arabian', 
 'image/Shorbat-adas.jpg',
 1,
 'Approved');
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id,status)
VALUES 
('Harira', 
 'Harira is a Moroccan soup known for its rich flavors and nourishing ingredients, traditionally served during Ramadan.',
 '1 cup lentils; 1 cup chickpeas (cooked or canned); 1 onion, chopped; 2 tomatoes, chopped; 2 stalks celery, chopped; 1 teaspoon ground ginger; 1 teaspoon ground cinnamon; 1 tablespoon olive oil; 4 cups vegetable or chicken broth; Cilantro and parsley for garnish',
 'In a large pot, heat olive oil over medium heat. Add onion, celery, and sauté until softened. Add tomatoes, lentils, chickpeas, ginger, cinnamon, broth, salt, and pepper. Bring to a boil. Reduce heat and simmer for about 30-40 minutes until lentils are tender. Garnish with chopped cilantro and parsley before serving.',
 '60 minutes', 
 'Medium', 
 8, 
 'Arabian', 
 'image/Harrira.jpg',
 1,
 'Approved');

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id, status)
VALUES 
('Tagine', 
 'Tagine is a slow-cooked stew originating from North Africa, combining meat, vegetables, and aromatic spices for a deeply satisfying dish.',
 '1 lb meat (chicken, beef, or lamb) or vegetables (carrots, potatoes, zucchini); 1 onion, sliced; 2 cloves garlic, minced; 1 teaspoon ground cumin; 1 teaspoon ground ginger; 1 teaspoon paprika; 2 cups vegetable or chicken broth; Olive oil for cooking; Dried fruits (apricots or raisins) for sweetness (optional)',
 'In a tagine pot or Dutch oven, heat olive oil over medium heat. Add onion and garlic; sauté until softened. Add meat or vegetables along with spices. Stir to coat. Add broth and dried fruits if using. Cover and simmer on low heat for about 1.5 to 2 hours until tender. Serve with couscous or bread.',
 '150 minutes', 
 'Medium', 
 8, 
 'Arabian', 
 'image/Tagine.jpg',
 1,
 'Pending');
select * from recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Doro Wat (Spicy Chicken Stew)', 
 'Doro Wat is a rich and flavorful spicy chicken stew, one of the most iconic dishes of Ethiopian cuisine.',
 '2 lbs chicken (cut into pieces); 2 large onions (finely chopped); 4 cloves garlic (minced); 1 tablespoon ginger (grated); 1/4 cup berbere spice mix; 1/4 cup vegetable oil; 2 cups chicken broth; Salt to taste; 4 hard-boiled eggs (optional)',
 'Heat oil in a large pot over medium heat. Add onions and sauté until golden brown. Add garlic and ginger, cooking for another minute. Add berbere spice and stir for a few minutes. Add chicken pieces and cook until browned. Pour in chicken broth, season with salt, and simmer for about 30-40 minutes. If using, add hard-boiled eggs and cook for another 10 minutes.',
 '80 minutes', 
 'Hard', 
 6, 
 'Habeshan', 
 'image/Doro-wot.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id, status)
VALUES 
('Shiro (Chickpea Stew)', 
 'Shiro is a staple Ethiopian dish made from ground chickpeas, creating a thick, hearty stew with a rich flavor from the blend of spices.',
 '1 cup shiro powder (ground chickpeas); 1 large onion (finely chopped); 4 cloves garlic (minced); 1 tablespoon ginger (grated); 1/4 cup vegetable oil; 2-3 cups water or vegetable broth; Salt to taste',
 'Heat oil in a pot over medium heat. Add onions and sauté until golden brown. Add garlic and ginger, cooking for another minute. Add shiro powder and stir for a few minutes. Add water or broth gradually, stirring to avoid lumps. Simmer for about 15-20 minutes, stirring occasionally. Season with salt.',
 '40 minutes', 
 'Easy', 
 4, 
 'Habeshan', 
 'image/shiro.jpg',
 29,
 'Approved');
select * from users
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Kitfo (Minced Raw Beef)', 
 'Kitfo is a traditional Ethiopian dish of finely minced raw beef, flavored with spiced clarified butter (niter kibbeh), and enjoyed with fresh greens or injera.',
 '1 lb raw ground beef (preferably lean); 1/4 cup clarified butter (niter kibbeh); 1 tablespoon mitmita spice mix (or to taste); Salt to taste; Fresh greens (for serving)',
 'In a bowl, mix ground beef with clarified butter, mitmita, and salt. Taste and adjust seasoning as desired. Serve immediately with fresh greens or injera.',
 '10 minutes', 
 'Easy', 
 4, 
 'Habeshan', 
 'image/Kitfo.jpg',
 1);
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Salata', 
 'Salata is a refreshing Ethiopian side dish made from a mix of fresh vegetables. It pairs perfectly with many spicy main dishes like Doro Wat and Tibs.', 
 '1 large tomato, diced; 1 cucumber, diced; 1 bell pepper, diced (optional); 1 small red onion, finely chopped; 2 tablespoons fresh lemon juice; 2 tablespoons olive oil; Salt and pepper to taste; Fresh parsley or cilantro for garnish (optional)', 
 'In a large bowl, combine the diced tomato, cucumber, bell pepper, and red onion. In a separate small bowl, whisk together the lemon juice, olive oil, salt, and pepper. Pour the dressing over the salad and toss gently to combine. Garnish with fresh parsley or cilantro if desired. Serve immediately or refrigerate for 30 minutes to allow flavors to meld.', 
 '15 minutes', 
 'Easy', 
 4, 
 'Habeshan', 
 'image/salata.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Berbere Spice Mix (Awaze)', 
 'Berbere is a spicy and flavorful Ethiopian spice mix used in a variety of dishes, from stews to meats. It adds heat and depth to any dish.', 
 '2 tablespoons paprika; 1 tablespoon ground cumin; 1 tablespoon ground coriander; 1 tablespoon ground ginger; 1 tablespoon garlic powder; 1 teaspoon ground cinnamon; 1 teaspoon ground black pepper; 1 teaspoon cayenne pepper (adjust for heat preference); 1 teaspoon ground turmeric; Salt to taste', 
 'In a bowl, combine all the spices: paprika, cumin, coriander, ginger, garlic powder, cinnamon, black pepper, cayenne pepper, turmeric, and salt. Mix well until all spices are evenly distributed. Store the spice mix in an airtight container in a cool, dry place. This spice mix can be used to season various dishes or mixed with water or oil to create a paste for marinating.', 
 '10 minutes', 
 'Easy', 
 1, 
 'Habeshan', 
 'image/awaze.jpg',
 1);
show tables
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Sambussa', 
 'Sambussa is a popular Ethiopian snack filled with lentils or minced meat, wrapped in a crispy dough, and deep-fried. It''s commonly served during holidays and festive occasions.', 
 '1 cup all-purpose flour; 1/4 teaspoon salt; 1/4 cup water (or as needed); 1 cup lentils (cooked and mashed) or minced meat; 1 onion, finely chopped; 2 cloves garlic, minced; 1 teaspoon ground cumin; 1 teaspoon paprika; Oil for frying', 
 'In a bowl, mix flour and salt. Gradually add water to form a dough. Knead until smooth and let it rest for 30 minutes. In a pan, sauté onion and garlic until translucent. Add lentils or meat, cumin, and paprika. Cook until flavors meld. Roll out the dough and cut into circles. Place filling in the center, fold, and seal edges. Heat oil in a frying pan and fry sambussas until golden brown on both sides. Drain on paper towels and serve hot.', 
 '45 minutes', 
 'Medium', 
 12, 
 'Habeshan', 
 'image/Samosa.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Kolo', 
 'Kolo is a traditional Ethiopian snack made from roasted barley or other grains. It’s often seasoned with spices and enjoyed as a light snack or appetizer.', 
 '1 cup roasted barley (or other grains like chickpeas or peanuts); 1 tablespoon olive oil or butter (optional); Salt to taste; Spices (optional, such as chili powder or berbere)', 
 'If using raw barley, roast it in a skillet until golden brown. Let it cool, then season with salt and spices. If desired, toss with olive oil or melted butter for extra flavor. Serve as a snack or appetizer.', 
 '15 minutes', 
 'Easy', 
 3, 
 'Habeshan', 
 'image/kolo.jpg',
 1);
select *from messages;
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Dabo Kolo', 
 'Dabo Kolo is a crunchy Ethiopian snack, similar to small, savory biscuits, often enjoyed with a cup of tea or coffee. It’s made from flour, sugar, and spices.', 
 '2 cups all-purpose flour; 1/4 cup sugar; 1 teaspoon baking powder; 1/4 teaspoon salt; 1/4 cup butter, melted; 1/2 cup water (or as needed); Optional: spices like ground ginger or cardamom', 
 'In a bowl, mix flour, sugar, baking powder, salt, and any optional spices. Add melted butter and mix well. Gradually add water to form a dough. Knead until smooth. Roll the dough into small balls or shapes and place on a baking sheet. Bake at 350°F (175°C) for about 20-25 minutes or until golden brown. Let cool and serve as a crunchy snack.', 
 '40 minutes', 
 'Medium', 
 15, 
 'Habeshan', 
 'image/dabo-kolo.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Gomen', 
 'Gomen is a traditional Ethiopian dish made from collard greens or kale. It’s a nutritious, savory dish flavored with ginger, garlic, and sautéed onions.', 
 '1 bunch collard greens or kale, chopped; 1 onion, finely chopped; 2 cloves garlic, minced; 1 tablespoon ginger, minced; 2 tablespoons vegetable oil; Salt to taste', 
 'Heat the vegetable oil in a pot over medium heat. Add the chopped onion and sauté until translucent. Add garlic and ginger, cooking for another minute. Add the chopped collard greens and stir well. Add a little water if necessary, cover, and cook until greens are tender, about 10-15 minutes. Add salt to taste and serve warm.', 
 '25 minutes', 
 'Medium', 
 4, 
 'Habeshan',
 'image/gomen.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Tikil Gomen', 
 'Tikil Gomen is a flavorful Ethiopian dish made with cabbage, carrots, and a mix of spices. The cabbage becomes tender and infused with the flavors of the ginger, garlic, and turmeric.', 
 '1 small head of cabbage, chopped; 2 carrots, sliced; 1 onion, finely chopped; 2 cloves garlic, minced; 1 tablespoon ginger, minced; 2 tablespoons vegetable oil; Salt to taste', 
 'Heat the vegetable oil in a pot over medium heat. Add the chopped onion and sauté until translucent. Add garlic and ginger, cooking for another minute. Add the chopped cabbage and sliced carrots. Stir well to combine. Add a little water if necessary, cover, and cook until vegetables are tender, about 15-20 minutes. Add salt to taste and serve warm.', 
 '30 minutes', 
 'Medium', 
 4, 
 'Habeshan', 
 'image/tikil-gomen.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Kik Alicha', 
 'Kik Alicha is a comforting Ethiopian dish made with split yellow peas, garlic, ginger, and turmeric. It has a mild yet flavorful taste, making it a great option for those who prefer lighter dishes.', 
 '1 cup split yellow peas (or yellow lentils); 1 onion, finely chopped; 2 cloves garlic, minced; 1 tablespoon ginger, minced; 2 tablespoons turmeric powder; 2 tablespoons vegetable oil; 4 cups vegetable broth or water; Salt to taste', 
 'Rinse the split peas and set aside. Heat the vegetable oil in a pot over medium heat. Add the chopped onion and sauté until translucent. Add garlic and ginger, cooking for another minute. Add the turmeric powder and stir for a minute. Add the split peas and vegetable broth. Bring to a boil. Reduce heat and simmer until peas are tender, about 25-30 minutes. Add salt to taste and serve warm.', 
 '40 minutes', 
 'Medium', 
 4, 
 'Habeshan'
 'image/kik-alicha.jpg', 
 1);
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Injera', 
 'Injera is a traditional Ethiopian flatbread, fermented and spongy in texture. It is commonly used as a base for various Ethiopian stews and dishes.', 
 'Teff Flour: 2 cups (you can also use a combination of teff flour and all-purpose flour); Water: 2 ½ cups (adjust as needed); Salt: 1 teaspoon; Baking Powder: 1 teaspoon (optional, for a lighter texture); Oil: For greasing the pan (optional)', 
 'Step 1: Mix the Batter: In a large bowl, combine the teff flour and water. Stir until you have a smooth batter. The consistency should be similar to pancake batter. Step 2: Ferment the Batter: Cover the bowl with a clean cloth or plastic wrap and let it sit at room temperature for 24 to 48 hours. The batter should develop bubbles and a slightly sour smell, indicating fermentation. Step 3: Add Salt and Baking Powder: After fermentation, stir in the salt and baking powder (if using). Mix well to combine. Step 4: Preheat the Pan: Heat a non-stick skillet or a large flat pan over medium-high heat. You can lightly grease it with oil if desired. Step 5: Cook the Injera: Pour about ½ cup of the batter onto the hot pan, swirling it to create a thin, even layer. Cover the pan with a lid. Cook for about 2-3 minutes or until bubbles form on the surface and the edges lift slightly. The top should be set but not browned. Step 6: Remove and Cool: Carefully remove the injera from the pan and place it on a plate or cooling rack. Repeat the process with the remaining batter, stacking the cooked injera on top of each other. Step 7: Serve: Injera is best served warm. It can be used as a base for various Ethiopian dishes, where you can place stews and salads on top.', 
 '10 minutes (excluding fermentation time)', 
 'Medium', 
 8, 
 'Habeshan', 
 'image/Injera.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Difo Dabo', 
 'Difo Dabo is a traditional Ethiopian bread with a slightly sweet flavor and a soft, fluffy texture, perfect for serving with stews and other dishes.', 
 '4 cups all-purpose flour (or a mix of all-purpose and whole wheat flour); 1 cup warm water; 1/2 cup milk (optional); 1/4 cup sugar; 1/4 cup vegetable oil or melted butter; 1 packet (2 1/4 teaspoons) active dry yeast; 1 teaspoon salt; 1 teaspoon ground cardamom (optional); Sesame seeds for topping (optional)', 
 'Step 1: In a small bowl, dissolve the yeast in warm water and let it sit for about 5-10 minutes until frothy. Step 2: In a large mixing bowl, combine the flour, sugar, salt, and ground cardamom (if using). Step 3: Add the yeast mixture, milk (if using), and vegetable oil or melted butter to the dry ingredients. Step 4: Knead the dough for about 10 minutes until smooth and elastic. You can add more flour if the dough is too sticky. Step 5: Place the dough in a greased bowl, cover it with a clean cloth, and let it rise in a warm place for about 1-2 hours or until doubled in size. Step 6: Preheat your oven to 350°F (175°C). Step 7: Punch down the risen dough and shape it into a round loaf or place it in a greased loaf pan. Step 8: If desired, sprinkle sesame seeds on top of the loaf. Step 9: Cover the loaf again and let it rise for another 30-45 minutes. Step 10: Bake in the preheated oven for 25-30 minutes or until golden brown and sounds hollow when tapped on the bottom. Step 11: Remove from the oven and let cool on a wire rack before slicing.', 
 '20 minutes', 
 'Medium', 
 10, 
 'Habeshan', 
 'image/Difo-Dabo.jpg',
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Habesha Kita', 
 'Habesha Kita is a soft, slightly thick flatbread that is commonly served with Ethiopian stews and dishes, ideal for scooping up lentils and vegetables.', 
 '3 cups all-purpose flour (or a mix of all-purpose and whole wheat flour); 1 teaspoon salt; 1 teaspoon baking powder (optional); 1 cup warm water (adjust as needed); 2 tablespoons vegetable oil or melted butter (optional)', 
 'Step 1: In a large mixing bowl, combine the flour, salt, and baking powder (if using). Step 2: Add the warm water gradually while mixing until a soft dough forms. You may need to adjust the amount of water. Step 3: Knead the dough for about 5-7 minutes until smooth and elastic. Step 4: Cover the dough with a clean cloth and let it rest for about 30 minutes. Step 5: Divide the dough into small balls (about the size of a golf ball). Step 6: On a floured surface, roll each ball into a flat circle about 1/4 inch thick. Step 7: Heat a non-stick skillet or griddle over medium-high heat. Step 8: Cook each flatbread for about 2-3 minutes on each side or until golden brown spots appear. You can brush with oil or butter while cooking if desired. Step 9: Remove from the skillet and keep warm in a towel. Repeat with the remaining dough.', 
 '15 minutes', 
 'Medium', 
 8, 
 'Habeshan', 
 'image/Kita.jpg',
 1);
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Gyoza (Dumplings)', 
 'Gyoza are Japanese dumplings filled with ground meat and vegetables, pan-fried to crispy perfection.', 
 '1 cup ground pork; 1 cup finely chopped cabbage; 2 green onions, finely chopped; 1 clove garlic, minced; 1 tsp ginger, minced; 1 tbsp soy sauce; 1 tbsp sesame oil; 1 package gyoza wrappers; Oil for frying; Water for steaming', 
 '1. In a bowl, mix pork, cabbage, green onions, garlic, ginger, soy sauce, and sesame oil. 2. Place a small spoonful of filling in the center of each gyoza wrapper. 3. Dab the edges with water and fold to seal. 4. Heat oil in a pan over medium heat and place gyoza in the pan. 5. Add a splash of water and cover to steam for 5-7 minutes. 6. Remove the lid and cook until the bottoms are crispy. Serve with dipping sauce.', 
 '35 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Gyoza (Dumplings).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Yakitori (Grilled Chicken Skewers)', 
 'Yakitori are grilled chicken skewers seasoned with a savory marinade and grilled to perfection.', 
 '1 lb chicken thighs, cut into bite-sized pieces; Green onions, cut into 1-inch pieces; Soy sauce (for marinade); Sake (for marinade); Mirin (for marinade); Sugar (to taste); Bamboo skewers (soaked in water)', 
 '1. In a bowl, mix soy sauce, sake, mirin, and sugar to create a marinade. 2. Add chicken pieces to the marinade and let sit for at least 30 minutes. 3. Thread chicken and green onion pieces onto soaked bamboo skewers. 4. Grill over medium heat until cooked through and slightly charred, about 10-15 minutes. 5. Baste with leftover marinade while grilling for extra flavor. Serve hot.', 
 '30 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Yakitori (Grilled Chicken Skewers).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Agedashi Tofu (Fried Tofu)', 
 'Agedashi Tofu features deep-fried tofu served in a savory dashi broth, garnished with green onions and daikon.', 
 '1 block firm tofu; 1/2 cup potato starch or cornstarch; Oil for frying; 1 cup dashi stock; 2 tbsp soy sauce; 1 tbsp mirin; Green onions, chopped (for garnish); Grated daikon (optional, for garnish)', 
 '1. Press tofu to remove excess moisture and cut into cubes. 2. Dust tofu cubes with potato starch or cornstarch. 3. Heat oil in a deep pan and fry tofu until golden brown. Drain on paper towels. 4. In a separate pot, combine dashi stock, soy sauce, and mirin. Heat gently. 5. Serve fried tofu in a bowl with hot dashi sauce poured over it. Garnish with green onions and grated daikon if desired.', 
 '25 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Agedashi Tofu (Fried Tofu).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Mochi', 
 'Mochi is a traditional Japanese rice cake made from glutinous rice, known for its chewy texture.', 
 '1 cup glutinous rice flour; 1/4 cup sugar; 1/2 cup water; Cornstarch for dusting', 
 '1. In a bowl, mix glutinous rice flour, sugar, and water. 2. Pour the mixture into a steaming bowl and steam for 15 minutes. 3. Once steamed, let it cool slightly and dust your hands with cornstarch to handle the mochi. 4. Shape the mochi into small balls or discs and serve.', 
 '25 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Mochi.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Matcha Ice Cream', 
 'Matcha ice cream is a creamy and smooth dessert made with green tea powder, offering a balance of sweetness and earthy flavor.', 
 '1 cup heavy cream; 1/2 cup whole milk; 1/2 cup sugar; 2 tsp matcha powder; 1/2 tsp vanilla extract', 
 '1. In a bowl, mix matcha powder with a small amount of milk to form a smooth paste. 2. In a saucepan, heat the remaining milk and sugar until the sugar dissolves. 3. Whisk in the matcha paste and bring the mixture to a simmer. 4. Remove from heat, add heavy cream and vanilla extract, and mix well. 5. Chill the mixture in the fridge for at least 2 hours, then churn in an ice cream maker until frozen.', 
 '2 hours 20 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Matcha Ice Cream.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Dorayaki (Red Bean Pancakes)', 
 'Dorayaki consists of two fluffy pancakes filled with sweet red bean paste. It\'s a beloved snack in Japan.', 
 '1 cup all-purpose flour; 1/2 cup sugar; 2 eggs; 1/4 cup honey; 1/4 tsp baking powder; 1/4 tsp vanilla extract; 1/2 cup sweet red bean paste', 
 '1. Mix the flour, sugar, baking powder, and eggs in a bowl. 2. Whisk in honey and vanilla extract until smooth. 3. Heat a non-stick pan and pour small circles of batter. 4. Cook until bubbles appear on the surface, then flip and cook for 1-2 minutes more. 5. Cool the pancakes and spread red bean paste between two pancakes to make sandwiches.', 
 '30 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Dorayaki (Red Bean Pancakes).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Udon', 
 'Thick, chewy Japanese noodles served in a flavorful broth.', 
 '4 servings udon noodles; 6 cups dashi broth; 2 tbsp soy sauce; 2 tbsp mirin; Assorted toppings (tempura, green onions, fish cake)', 
 '1. Cook udon noodles according to package instructions. 2. Heat dashi broth and mix in soy sauce and mirin. 3. Serve noodles in bowls and pour hot broth over them. 4. Add toppings of choice and serve immediately.', 
 '30 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Udon.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Soba', 
 'Traditional Japanese buckwheat noodles served in a light broth.', 
 '4 servings soba noodles; 6 cups dashi broth; 2 tbsp soy sauce; 2 tbsp mirin', 
 '1. Cook soba noodles according to package instructions. 2. Heat dashi broth and mix in soy sauce and mirin. 3. Serve noodles in bowls with broth poured over them.', 
 '20 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Soba.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Yakisoba (Fried Noodles)', 
 'Stir-fried noodles with vegetables and a savory sauce.', 
 '4 servings yakisoba noodles; 2 cups mixed vegetables (carrots, cabbage, bell peppers); 200g sliced pork or chicken; 1/4 cup yakisoba sauce', 
 '1. Cook yakisoba noodles according to package instructions. Set aside. 2. Stir-fry pork or chicken in a large pan until cooked through. 3. Add vegetables and stir-fry until tender-crisp. 4. Add noodles and yakisoba sauce. Mix well. 5. Serve hot and garnish as desired.', 
 '30 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Yakisoba (Fried Noodles).jpg', 
 1);
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Sushi (Nigiri, Maki, etc.)', 
 'A traditional Japanese dish featuring vinegared rice and various toppings or fillings.', 
 '2 cups sushi rice; 1/4 cup rice vinegar; 2 tbsp sugar; 1 tsp salt; Assorted toppings (fish, seaweed, vegetables)', 
 '1. Rinse rice until water runs clear. Cook rice as directed. 2. Mix rice vinegar, sugar, and salt. Stir into hot rice. 3. Shape rice and add toppings or roll into sushi.', 
 '50 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Sushi (Nigiri, Maki, etc.).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Donburi (Rice Bowls)', 
 'Hearty Japanese rice bowls with various toppings like Gyudon (beef) or Katsudon (pork cutlet).', 
 '4 cups cooked rice; 500g beef or pork cutlets; 1 onion, sliced; 1/2 cup dashi broth; 1/4 cup soy sauce; 2 tbsp mirin', 
 '1. Cook meat and onions in broth with soy sauce and mirin. 2. Place cooked rice in bowls and top with meat mixture.', 
 '35 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Donburi (Rice Bowls).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Onigiri (Rice Balls)', 
 'Japanese rice balls with various fillings wrapped in seaweed.', 
 '4 cups cooked rice; Assorted fillings (salmon, tuna, pickled plums); Seaweed sheets', 
 '1. Wet hands and shape rice into balls. 2. Add fillings in the center. 3. Wrap with seaweed and serve.', 
 '30 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Onigiri (Rice Balls).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Tsukemono (Pickled Vegetables)', 
 'Tsukemono are traditional Japanese pickled vegetables that add flavor and texture to any meal.', 
 '1 cup daikon radish, sliced; 1 cup cucumber, sliced; 1/2 cup carrot, sliced; 1/4 cup rice vinegar; 2 tbsp sugar; 1 tsp salt; Optional: chili flakes or sesame seeds for garnish', 
 '1. In a bowl, mix rice vinegar, sugar, and salt until dissolved. 2. Add the sliced vegetables to the mixture and stir well. 3. Let sit for at least 30 minutes to pickle. Serve chilled or at room temperature.', 
 '10 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Tsukemono (Pickled Vegetables).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Sunomono (Vinegared Salads)', 
 'Sunomono is a refreshing vinegared salad often made with cucumbers and seafood.', 
 '2 cups cucumber, thinly sliced; 1/2 cup carrot, julienned; 1/2 cup cooked shrimp or crab meat (optional); 1/4 cup rice vinegar; 2 tbsp sugar; 1 tsp soy sauce; 1 tsp sesame seeds (for garnish)', 
 '1. In a bowl, combine rice vinegar, sugar, and soy sauce. Stir until sugar dissolves. 2. Add cucumber, carrot, and seafood (if using) to the dressing. Mix well. 3. Chill if desired and serve garnished with sesame seeds.', 
 '10 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Sunomono (Vinegared Salads).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Hijiki Salad', 
 'Hijiki salad is a nutritious dish made with hijiki seaweed and various vegetables.', 
 '1/2 cup dried hijiki seaweed; 1/2 cup carrot, julienned; 1/2 cup edamame (shelled); 2 tbsp soy sauce; 1 tbsp mirin; 1 tsp sesame oil; Sesame seeds (for garnish)', 
 '1. Soak hijiki in water for about 30 minutes until rehydrated. Drain and set aside. 2. In a pan, sauté carrot in sesame oil until slightly softened. 3. Add hijiki and edamame to the pan. Stir in soy sauce and mirin. Cook for an additional 5 minutes. Serve warm or at room temperature.', 
 '30 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Hijiki Salad.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Miso Soup', 
 'A traditional Japanese soup with a savory miso-based broth.', 
 '4 cups dashi broth; 3 tbsp miso paste; 1/2 cup tofu (cubed); 2 tbsp wakame seaweed; 2 green onions (sliced)', 
 '1. Heat dashi broth in a pot over medium heat. 2. Whisk in miso paste until dissolved. 3. Add tofu, seaweed, and green onions. 4. Simmer for 5 minutes. Serve hot.', 
 '15 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Miso Soup.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Tonjiru (Pork and Vegetable Miso Soup)', 
 'A hearty miso soup with pork and a variety of vegetables.', 
 '4 cups dashi broth; 150g pork belly (thinly sliced); 1 carrot (sliced); 1 potato (cubed); 1/2 daikon radish (sliced); 3 tbsp miso paste', 
 '1. Heat dashi broth in a pot over medium heat. 2. Add pork and cook until browned. 3. Add vegetables and simmer for 20 minutes. 4. Whisk in miso paste and simmer for 5 more minutes.', 
 '40 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Tonjiru (Pork and Vegetable Miso Soup).jpg', 
 1);
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Sukiyaki (Beef Hot Pot)', 
 'A sweet and savory hot pot featuring thinly sliced beef and vegetables.', 
 '400g thinly sliced beef; 1 onion (sliced); 1 carrot (sliced); 1/2 block tofu (cubed); 1 cup mushrooms; 1/4 cup soy sauce; 1/4 cup mirin; 1/4 cup sake', 
 '1. Mix soy sauce, mirin, and sake in a bowl. 2. Heat a pot over medium heat and cook the beef until browned. 3. Add vegetables, tofu, and sauce mixture. 4. Simmer for 30 minutes and serve hot.', 
 '50 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Sukiyaki (Beef Hot Pot).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Teriyaki Chicken or Beef', 
 'Teriyaki is a popular Japanese dish where chicken or beef is grilled and glazed with a sweet soy sauce-based marinade.', 
 '1 lb chicken thighs or beef (sirloin or ribeye), cut into bite-sized pieces; 1/4 cup soy sauce; 1/4 cup mirin; 2 tbsp sugar; 1 tbsp sake (optional); 1 tbsp vegetable oil; Sesame seeds (for garnish); Sliced green onions (for garnish', 
 '1. In a bowl, mix soy sauce, mirin, sugar, and sake to create the teriyaki sauce. 2. Add the chicken or beef pieces to the marinade and let sit for at least 15 minutes. 3. Heat vegetable oil in a pan over medium heat. Add the marinated meat and cook until browned. 4. Add the remaining marinade to the pan and cook until the sauce thickens and coats the meat. 5. Serve hot, garnished with sesame seeds and sliced green onions.', 
 '25 minutes', 
 'Easy', 
 4, 
 'Japanese', 
 'image/Teriyaki Chicken or Beef.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Tonkatsu (Breaded Pork Cutlet)', 
 'Tonkatsu is a breaded and deep-fried pork cutlet served with a tangy tonkatsu sauce.', 
 '4 pork loin chops or tenderloin (about 1 inch thick); Salt and pepper, to taste; 1 cup all-purpose flour; 2 eggs, beaten; 1 cup panko breadcrumbs; Oil for frying; Tonkatsu sauce (for serving); Cabbage, finely shredded (for serving)', 
 '1. Pound the pork chops to an even thickness and season with salt and pepper. 2. Dredge each chop in flour, dip in beaten eggs, then coat with panko breadcrumbs. 3. Heat oil in a deep pan over medium heat. Fry the breaded pork until golden brown on both sides and cooked through. 4. Drain on paper towels and slice into strips before serving with tonkatsu sauce and shredded cabbage.', 
 '25 minutes', 
 'Medium', 
 4, 
 'Japanese', 
 'image/Tonkatsu (Breaded Pork Cutlet).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Unagi (Grilled Eel)', 
 'Unagi is grilled eel glazed with a sweet soy-based sauce, often served over rice.', 
 '2 unagi (grilled eel) fillets (can be found pre-cooked); 1/4 cup soy sauce; 1/4 cup mirin; 2 tbsp sugar; Cooked rice (for serving); Sliced green onions (for garnish)', 
 '1. In a small saucepan, combine soy sauce, mirin, and sugar. Heat until sugar dissolves to create the glaze. 2. Grill the unagi fillets for about 5-7 minutes on each side, basting with the glaze. 3. Serve over a bed of rice with additional glaze drizzled on top and garnish with sliced green onions.', 
 '25 minutes', 
 'Easy', 
 2, 
 'Japanese', 
 'image/Unagi (Grilled Eel).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Samosa', 
 'A classic Indian snack, samosas are crispy pastries filled with spiced potatoes and peas, perfect for any occasion.', 
 '2 cups all-purpose flour; 4 medium potatoes, boiled and mashed; 1/2 cup green peas, boiled; 1 tsp cumin seeds; 1 tsp garam masala; 1 tsp coriander powder; 1/2 tsp turmeric powder; 2 green chilies, finely chopped; Salt to taste; Oil for deep frying', 
 '1. In a bowl, mix flour with a pinch of salt and enough water to make a smooth dough. Cover and let it rest for 30 minutes. 2. In another bowl, combine mashed potatoes, peas, cumin seeds, garam masala, coriander powder, turmeric powder, green chilies, and salt. Mix well. 3. Divide the dough into small balls and roll each ball into a thin oval shape. 4. Cut the oval in half to form two semi-circles. Take one semi-circle, fold it into a cone shape, sealing the edge with water. 5. Fill the cone with the potato mixture and seal the open edge with water. 6. Heat oil in a deep frying pan and fry the samosas until golden brown. Drain on paper towels before serving.', 
 '65 minutes', 
 'Medium', 
 8, 
 'Indian', 
 'image/Indian-Samsosa.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Pakora', 
 'Pakoras are crispy, deep-fried fritters made with chickpea flour and a mix of flavorful spices.', 
 '1 cup chickpea flour (besan); 1/2 tsp turmeric powder; 1/2 tsp red chili powder; Salt to taste; Water as needed; Vegetables (potatoes, onions, spinach, etc.) cut into bite-sized pieces; Oil for deep frying', 
 '1. In a bowl, mix chickpea flour, turmeric powder, red chili powder, and salt. 2. Add enough water to make a thick batter. 3. Add the cut vegetables to the batter and coat them well. 4. Heat oil in a deep frying pan. Once hot, drop spoonfuls of the batter-coated vegetables into the oil. 5. Fry until golden brown and crispy. Drain on paper towels before serving.', 
 '35 minutes', 
 'Easy', 
 6, 
 'Indian', 
 'image/Pakora.jpg', 
 1);
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Dahi Puri', 
 'Dahi Puri is a popular Indian street food featuring crispy puris filled with yogurt, chutneys, and spices.', 
 '20 puris; 1 cup yogurt, whisked; 1/2 cup tamarind chutney; 1/2 cup mint chutney; 1/4 cup chopped onions; 1/4 cup chopped tomatoes; Chaat masala to taste; Cilantro for garnish', 
 '1. Poke a hole in each puri to create an opening. 2. Fill each puri with a spoonful of whisked yogurt. 3. Add chopped onions and tomatoes on top of the yogurt. 4. Drizzle tamarind chutney and mint chutney over each puri. 5. Sprinkle chaat masala on top and garnish with cilantro before serving.', 
 '15 minutes', 
 'Easy', 
 4, 
 'Indian', 
 'image/Dahi Puri.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Naan', 
 'Naan is a soft, leavened flatbread commonly enjoyed with curries and savory dishes.', 
 '2 cups all-purpose flour; 1/2 cup yogurt; 1/2 cup warm water; 1 tsp sugar; 1 tsp active dry yeast; 1/2 tsp salt; 2 tbsp oil or melted butter', 
 '1. Mix warm water, sugar, and yeast in a bowl; let it sit for 10 minutes. 2. In a large bowl, combine flour and salt. 3. Add yogurt, oil, and the yeast mixture to the flour; knead until smooth. 4. Cover and let it rise for 1-2 hours. 5. Divide the dough into balls, roll them out, and cook in a tandoor or on a hot skillet.', 
 '105 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Naan.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Roti (Chapati)', 
 'Roti or chapati is a traditional unleavened flatbread often served with curries and vegetables.', 
 '2 cups whole wheat flour; 1/2 tsp salt (optional); Water (as needed); Ghee or butter (for brushing, optional)', 
 '1. Mix flour and salt in a bowl. 2. Add water gradually and knead into a soft dough. 3. Cover and let it rest for 20-30 minutes. 4. Divide the dough into small balls, roll out into thin circles. 5. Cook on a hot griddle until puffed and golden brown on both sides. 6. Brush with ghee or butter if desired.', 
 '25 minutes', 
 'Easy', 
 4, 
 'Indian', 
 'image/Roti (Chapati).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Puri', 
 'Puri is a deep-fried, puffed bread often enjoyed with curries and sweet dishes.', 
 '2 cups all-purpose flour; 1/2 tsp salt; Water (as needed); Oil (for deep frying)', 
 '1. Mix flour and salt in a bowl. 2. Add water gradually to form a stiff dough. 3. Cover and let it rest for 20-30 minutes. 4. Divide the dough into small balls and roll them out into small circles. 5. Heat oil in a deep pan; fry puris until they puff up and turn golden brown.', 
 '25 minutes', 
 'Easy', 
 4, 
 'Indian', 
 'image/Puri.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Gulab Jamun', 
 'Gulab Jamun is a classic Indian dessert made from milk solids, deep-fried and soaked in aromatic sugar syrup.', 
 '1 cup khoya; 1/4 cup all-purpose flour; 1/2 tsp baking powder; Oil (for deep frying); 2 cups sugar; 1.5 cups water; 1/2 tsp cardamom powder; Rose water (optional)', 
 '1. In a bowl, mix khoya, flour, and baking powder to form a dough. 2. Divide the dough into small balls and roll them smooth. 3. Heat oil in a deep pan; fry the balls on low heat until golden brown. 4. In another pot, boil sugar and water to make a syrup; add cardamom and rose water. 5. Soak the fried balls in the warm syrup for at least 30 minutes before serving.', 
 '50 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Gulab Jamun.jpg', 
 1);
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Kheer', 
 'Kheer is a rich and creamy rice pudding cooked with milk, sugar, and flavored with cardamom and nuts.', 
 '1/2 cup rice (preferably basmati); 4 cups whole milk; 1/2 cup sugar (adjust to taste); 1/4 tsp cardamom powder; 2 tbsp chopped nuts (almonds, cashews, pistachios); Raisins (optional)', 
 '1. Wash and soak rice for 30 minutes; drain. 2. In a pot, bring milk to a boil; add soaked rice and cook on low heat until rice is soft. 3. Add sugar, cardamom, and nuts; cook for an additional 5-10 minutes. 4. Serve warm or chilled as desired.', 
 '55 minutes', 
 'Easy', 
 4, 
 'Indian', 
 'image/Kheer.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Jalebi', 
 'Jalebi is a crispy, syrup-soaked dessert made from fermented flour batter, enjoyed for its sweet and tangy taste.', 
 '1 cup all-purpose flour; 1/4 cup yogurt; 1/4 tsp baking powder; Water (as needed); Oil (for deep frying); 1 cup sugar; 1/2 cup water (for syrup); Saffron or food color (optional)', 
 '1. Mix flour, yogurt, and baking powder; add water to make a smooth batter; let it ferment for 8-10 hours. 2. In a pan, boil sugar and water to make a syrup; add saffron or food color if desired. 3. Heat oil in a deep pan; pour batter into a piping bag or squeeze bottle. 4. Squeeze batter into hot oil in spiral shapes; fry until golden brown. 5. Dip fried jalebis into warm sugar syrup for a few seconds before serving.', 
 '10 hours 50 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Jalebi.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Biryani', 
 'Aromatic and flavorful Biryani is a rich, spiced rice dish with layers of meat or vegetables, seasoned with whole spices and garnished with fresh herbs.', 
 '2 cups basmati rice; 500g marinated meat (chicken, mutton, or vegetables); 1 large onion, thinly sliced; 2 tomatoes, chopped; 1/2 cup yogurt; 4-5 green chilies, slit; 4-5 cloves of garlic, minced; 1-inch piece of ginger, minced; Whole spices (bay leaf, cardamom, cloves, cinnamon stick); Salt to taste; Cilantro and mint leaves for garnish; 4 cups water', 
 '1. Wash and soak the basmati rice for 30 minutes. 2. In a large pot, heat oil and fry the sliced onions until golden brown. 3. Add garlic and ginger, sauté for a minute. 4. Add the marinated meat and cook until browned. 5. Add tomatoes, green chilies, and whole spices; cook until tomatoes soften. 6. Add yogurt and salt; mix well. 7. Add soaked rice and water; bring to a boil. 8. Cover and simmer on low heat until rice is cooked and water is absorbed. 9. Garnish with cilantro and mint leaves before serving.', 
 '100 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Indian-Biryani.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Butter Chicken (Murgh Makhani)', 
 'Butter Chicken is a creamy, tomato-based curry featuring tender chicken pieces cooked in a rich, spiced gravy with a hint of sweetness.', 
 '500g chicken, cut into pieces; 1 cup tomato puree; 1/2 cup cream; 1/4 cup butter; 1 onion, finely chopped; 2-3 garlic cloves, minced; 1-inch piece of ginger, minced; 1 tsp garam masala; 1 tsp chili powder; Salt to taste; Cilantro for garnish', 
 '1. In a pan, melt butter and sauté onions until translucent. 2. Add garlic and ginger; cook for a minute. 3. Add chicken pieces and cook until no longer pink. 4. Add tomato puree, chili powder, garam masala, and salt; simmer for 15 minutes. 5. Stir in cream and cook for another 5 minutes. 6. Garnish with cilantro before serving with naan or rice.', 
 '75 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Butter Chicken (Murgh Makhani).jpg', 
 1);
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Paneer Tikka Masala', 
 'Paneer Tikka Masala is a spicy, creamy curry with grilled paneer cubes simmered in a flavorful tomato-based sauce.', 
 '250g paneer, cut into cubes; 1 cup yogurt; 2 tbsp tikka masala spice mix; 1 onion, finely chopped; 2 tomatoes, pureed; 2-3 green chilies, slit; 1/2 cup cream; Salt to taste; Cilantro for garnish', 
 '1. Marinate paneer cubes in yogurt and tikka masala for at least 30 minutes. 2. Grill or pan-fry the marinated paneer until golden. 3. In a separate pan, sauté onions until golden brown. 4. Add tomato puree, green chilies, and salt; cook for 10 minutes. 5. Add grilled paneer and cream; simmer for 5-7 minutes. 6. Garnish with cilantro before serving.', 
 '70 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Paneer Tikka Masala.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Aloo Gobi', 
 'Aloo Gobi is a flavorful Indian vegetarian dish made with potatoes (aloo) and cauliflower (gobi), cooked with aromatic spices.', 
 '2 medium potatoes, peeled and cubed; 1 medium cauliflower, cut into florets; 1 onion, finely chopped; 1 tsp cumin seeds; 1 tsp turmeric powder; 1 tsp coriander powder; 2 green chilies, chopped; 2 tbsp oil; Salt to taste; Cilantro for garnish', 
 '1. Heat oil in a pan and add cumin seeds. Let them splutter. 2. Add chopped onions and sauté until golden brown. 3. Add potatoes and cauliflower florets. Stir well. 4. Add turmeric powder, coriander powder, green chilies, and salt. Mix well. 5. Add a little water, cover, and cook until vegetables are tender. 6. Garnish with cilantro before serving.', 
 '50 minutes', 
 'Easy', 
 4, 
 'Indian', 
 'image/Aloo Gobi.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Baingan Bharta', 
 'Baingan Bharta is a smoky-flavored dish made with roasted eggplant, cooked with onions, tomatoes, and Indian spices.', 
 '1 large eggplant (baingan); 1 onion, finely chopped; 2 tomatoes, chopped; 2-3 cloves garlic, minced; 1 tsp cumin seeds; 1 tsp garam masala; 2 tbsp oil; Salt to taste; Cilantro for garnish', 
 '1. Roast the eggplant over an open flame or in the oven until the skin is charred and the inside is soft. Let it cool, then peel and mash the flesh. 2. In a pan, heat oil and add cumin seeds. Let them splutter. 3. Add chopped onions and sauté until golden brown. 4. Add minced garlic and tomatoes. Cook until tomatoes are soft. 5. Add the mashed eggplant and garam masala. Mix well and cook for a few minutes. 6. Garnish with cilantro before serving.', 
 '50 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Baingan Bharta.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Palak Paneer', 
 'Palak Paneer is a classic North Indian dish made with soft paneer cubes simmered in a creamy spinach gravy, seasoned with aromatic spices.', 
 '250g paneer, cut into cubes; 4 cups spinach leaves, blanched and pureed; 1 onion, finely chopped; 2 tomatoes, pureed; 2-3 cloves garlic, minced; 1 tsp ginger paste; 1/2 tsp garam masala; 2 tbsp oil or ghee; Salt to taste', 
 '1. In a pan, heat oil or ghee. Add chopped onions and sauté until golden brown. 2. Add minced garlic and ginger paste. Sauté for a minute. 3. Add pureed tomatoes and cook until the oil separates from the mixture. 4. Add spinach puree and salt. Cook for a few minutes. 5. Add paneer cubes and garam masala. Mix gently and cook for another 5 minutes.', 
 '60 minutes', 
 'Medium', 
 4, 
 'Indian', 
 'image/Palak Paneer.jpg', 
 1);
 
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Antipasto Platter', 
 'A classic Italian starter featuring a selection of cured meats, cheeses, olives, and marinated vegetables, offering a perfect blend of savory and tangy flavors.', 
 'Assorted cured meats (e.g., salami, prosciutto, capicola); Assorted cheeses (e.g., mozzarella, provolone, pecorino); Olives (green and black); Marinated vegetables (e.g., artichokes, roasted peppers); Fresh basil leaves (for garnish); Crackers or breadsticks (optional)', 
 '1. Arrange cured meats and cheeses on a large platter. 2. Add olives and marinated vegetables in small bowls or scattered around the platter. 3. Garnish with fresh basil leaves and serve with crackers or breadsticks if desired.', 
 '20 minutes', 
 'Easy', 
 6, 
 'Italian', 
 'image/Antipasto Platter.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Arancini', 
 'Crispy, golden-fried rice balls filled with gooey mozzarella and savory meat or peas, making a delightful Italian appetizer.', 
 '2 cups cooked risotto (preferably cooled); 1 cup mozzarella cheese, cut into small cubes; 1/2 cup cooked ground meat or peas (optional); 1 cup breadcrumbs; 2 eggs, beaten; Flour for dusting; Oil for frying; Salt and pepper to taste', 
 '1. Take a small amount of risotto and flatten it in your hand. 2. Place a cube of mozzarella and a teaspoon of meat or peas in the center, then mold the rice around it to form a ball. 3. Roll the ball in flour, dip it in beaten eggs, and coat with breadcrumbs. 4. Heat oil in a deep pan and fry the arancini until golden brown; drain on paper towels before serving.', 
 '50 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Arancini.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Stuffed Mushrooms', 
 'Delicious mushroom caps filled with a savory mix of breadcrumbs, garlic, herbs, and Parmesan cheese, baked to perfection.', 
 '16 large mushrooms, stems removed; 1 cup breadcrumbs; 2 garlic cloves, minced; 1/4 cup fresh parsley, chopped; 1/4 cup grated Parmesan cheese; 3 tablespoons olive oil; Salt and pepper to taste', 
 '1. Preheat the oven to 375°F (190°C). 2. In a bowl, mix breadcrumbs, garlic, parsley, Parmesan cheese, olive oil, salt, and pepper. 3. Stuff each mushroom cap with the breadcrumb mixture. 4. Place stuffed mushrooms on a baking sheet and bake for 20-25 minutes until golden brown.', 
 '40 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Stuffed Mushrooms.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Tiramisu', 
 'A classic Italian dessert made with layers of coffee-soaked ladyfingers, creamy mascarpone, and a dusting of cocoa powder.', 
 '6 egg yolks; 3/4 cup granulated sugar; 2/3 cup milk; 1 1/4 cups heavy cream; 8 oz mascarpone cheese; 1 cup strong brewed coffee, cooled; 24 ladyfingers; Cocoa powder for dusting', 
 '1. In a saucepan, whisk together egg yolks and sugar until smooth. 2. Add milk and cook over low heat until thickened; let cool. 3. In a bowl, whip heavy cream until stiff peaks form, then fold in mascarpone. 4. Combine cooled egg mixture with mascarpone mixture. 5. Dip ladyfingers in coffee and layer them in a dish; spread half the mascarpone mixture on top. 6. Repeat layers and finish with cocoa powder on top; refrigerate for at least 4 hours before serving.', 
 '270 minutes', 
 'Medium', 
 8, 
 'Italian', 
 'image/Tiramisu.jpg', 
 1);
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Panna Cotta', 
 'A silky, creamy dessert made from sweetened cream thickened with gelatin, served with a fruit sauce or fresh berries.', 
 '2 cups heavy cream; 1/2 cup sugar; 1 teaspoon vanilla extract; 2 1/4 teaspoons gelatin powder; 3 tablespoons cold water; Fresh berries or fruit sauce for serving (optional)', 
 '1. In a saucepan, heat cream, sugar, and vanilla over medium heat until sugar dissolves. 2. In a small bowl, sprinkle gelatin over cold water and let sit for 5 minutes. 3. Add gelatin mixture to the warm cream and stir until dissolved. 4. Pour into molds and refrigerate for at least 4 hours until set. 5. To serve, unmold and top with fresh berries or fruit sauce if desired.', 
 '260 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Panna Cotta.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Zabaglione', 
 'A light and airy Italian custard dessert made with egg yolks, sugar, and sweet wine, often served with fresh fruit or cookies.', 
 '4 egg yolks; 1/2 cup granulated sugar; 1/2 cup sweet wine (e.g., Marsala or Vin Santo); Berries or cookies for serving (optional)', 
 '1. In a heatproof bowl, whisk together egg yolks and sugar until pale and thick. 2. Add sweet wine and place the bowl over a pot of simmering water (double boiler). 3. Whisk continuously until the mixture thickens and becomes frothy (about 10 minutes). 4. Serve warm or chilled with berries or cookies on the side.', 
 '20 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Zabaglione.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Pollo alla Cacciatora', 
 'A hearty Italian chicken dish cooked in a rich tomato and olive sauce, perfect for family dinners.', 
 '4 chicken thighs and drumsticks; 1 onion, sliced; 2 garlic cloves, minced; 1 can (14 oz) diced tomatoes; 1/2 cup black olives, pitted and sliced; 1/4 cup red wine; 2 tablespoons olive oil; 1 teaspoon dried oregano; Salt and pepper to taste; Fresh basil for garnish (optional)', 
 '1. Heat olive oil in a large skillet over medium heat. 2. Add chicken pieces and brown on all sides; remove and set aside. 3. In the same skillet, add onion and garlic; sauté until softened. 4. Stir in diced tomatoes, olives, red wine, oregano, salt, and pepper. 5. Return the chicken to the skillet; cover and simmer for 30-40 minutes until cooked through. 6. Garnish with fresh basil before serving.', 
 '55 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Pollo alla Cacciatora.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Risotto', 
 'A creamy and flavorful Italian rice dish cooked with broth, wine, and Parmesan cheese.', 
 '1 cup Arborio rice; 4 cups chicken or vegetable broth; 1 onion, finely chopped; 2 garlic cloves, minced; 1/2 cup white wine; 1/2 cup grated Parmesan cheese; 3 tablespoons butter; Salt and pepper to taste; Fresh parsley for garnish (optional)', 
 '1. In a saucepan, heat broth over low heat; keep warm. 2. In a separate pan, melt butter over medium heat; add onion and garlic, sautéing until translucent. 3. Add Arborio rice and stir for 1-2 minutes until lightly toasted. 4. Pour in white wine and cook until absorbed. 5. Gradually add warm broth, one ladle at a time, stirring constantly until absorbed before adding more. 6. After about 18-20 minutes, when rice is creamy and al dente, stir in Parmesan cheese; season with salt and pepper. 7. Garnish with fresh parsley before serving.', 
 '40 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Risotto.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Melanzane alla Parmigiana', 
 'A classic Italian baked eggplant dish layered with marinara sauce, mozzarella, and Parmesan cheese.', 
 '2 large eggplants, sliced into rounds; 3 cups marinara sauce; 2 cups mozzarella cheese, shredded; 1 cup grated Parmesan cheese; Basil leaves for garnish (optional); Olive oil for frying', 
 '1. Preheat the oven to 375°F (190°C). 2. Sprinkle eggplant slices with salt and let sit for 30 minutes to draw out moisture; rinse and pat dry. 3. Heat olive oil in a skillet; fry eggplant slices until golden brown on both sides; drain on paper towels. 4. In a baking dish, layer marinara sauce, fried eggplant, mozzarella, and Parmesan cheese; repeat layers until ingredients are used. 5. Top with remaining mozzarella and Parmesan cheese. 6. Bake for 30-40 minutes until bubbly and golden; let cool slightly before serving.', 
 '70 minutes', 
 'Medium', 
 6, 
 'Italian', 
 'image/Melanzane alla Parmigiana.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Margherita Pizza', 
 'A classic Italian pizza featuring a thin crust topped with tomato sauce, fresh mozzarella, and basil leaves, representing the colors of the Italian flag.', 
 '1 pizza dough (store-bought or homemade); 1 cup tomato sauce; 8 oz fresh mozzarella cheese, sliced; Fresh basil leaves; 2 tablespoons olive oil; Salt to taste', 
 '1. Preheat your oven to 475°F (245°C). 2. Roll out the pizza dough on a floured surface to your desired thickness. 3. Transfer the dough to a pizza stone or baking sheet. 4. Spread the tomato sauce evenly over the dough. 5. Arrange the mozzarella slices on top and sprinkle with salt. 6. Bake for about 10-12 minutes, until the crust is golden and cheese is bubbly. 7. Remove from oven, drizzle with olive oil, and top with fresh basil before serving.', 
 '27 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Margherita Pizza.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Pepperoni Pizza', 
 'A popular pizza loaded with tomato sauce, mozzarella cheese, and spicy pepperoni slices, perfect for a satisfying meal.', 
 '1 pizza dough (store-bought or homemade); 1 cup tomato sauce; 8 oz mozzarella cheese, shredded; 1 cup pepperoni slices', 
 '1. Preheat your oven to 475°F (245°C). 2. Roll out the pizza dough on a floured surface. 3. Transfer the dough to a pizza stone or baking sheet. 4. Spread the tomato sauce evenly over the dough. 5. Sprinkle shredded mozzarella cheese on top, then layer with pepperoni slices. 6. Bake for about 10-12 minutes until the crust is golden and cheese is melted.', 
 '27 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Pepperoni Pizza.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Quattro Stagioni', 
 'A unique pizza divided into four sections, each representing a season, with toppings like artichokes, mushrooms, ham, and olives.', 
 '1 pizza dough (store-bought or homemade); 1 cup tomato sauce; 8 oz mozzarella cheese, shredded; 1/4 cup artichoke hearts, quartered; 1/4 cup mushrooms, sliced; 1/4 cup cooked ham, sliced; 1/4 cup black olives, pitted and sliced', 
 '1. Preheat your oven to 475°F (245°C). 2. Roll out the pizza dough on a floured surface. 3. Transfer the dough to a pizza stone or baking sheet. 4. Spread the tomato sauce evenly over the dough. 5. Sprinkle shredded mozzarella cheese on top. 6. Divide the pizza into four sections and top each section with a different topping: artichokes, mushrooms, ham, and olives. 7. Bake for about 10-12 minutes until the crust is golden and cheese is melted.', 
 '35 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Quattro Stagioni.jpg', 
 1);
 
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Caprese Salad', 
 'A refreshing salad featuring ripe tomatoes, fresh mozzarella, and basil leaves, drizzled with balsamic glaze and olive oil.', 
 'Fresh mozzarella cheese; Ripe tomatoes; Fresh basil leaves; Balsamic reduction; Olive oil; Salt and pepper to taste', 
 '1. Slice the fresh mozzarella and tomatoes into even slices. 2. Arrange the mozzarella and tomato slices alternately on a serving plate. 3. Tuck fresh basil leaves between the layers. 4. Drizzle with balsamic reduction and olive oil. 5. Season with salt and pepper to taste.', 
 '10 minutes', 
 'Easy', 
 4, 
 'Italian', 
 'image/Caprese Salad.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Frittata', 
 'A versatile Italian egg dish filled with a delicious combination of vegetables, cheese, and seasonings, perfect for any meal.', 
 '6 large eggs; 1/4 cup milk; Salt and pepper to taste; 1 cup vegetables (e.g., bell peppers, onions, spinach); 1 cup cheese (e.g., feta, mozzarella, or Parmesan); Olive oil for cooking', 
 '1. Preheat the oven to 375°F (190°C). 2. In a bowl, whisk together eggs, milk, salt, and pepper. 3. Heat olive oil in an oven-safe skillet over medium heat. 4. Add vegetables and sauté until tender. 5. Pour the egg mixture over the vegetables and cook until the edges set. 6. Sprinkle cheese on top and transfer the skillet to the oven. 7. Bake for 10-15 minutes or until fully set and golden.', 
 '35 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Frittata.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Caponata', 
 'A savory Sicilian vegetable dish made with eggplant, tomatoes, and olives, offering a perfect balance of sweet and tangy flavors.', 
 '1 large eggplant, diced; 1 onion, chopped; 2 celery stalks, diced; 1 cup canned tomatoes, chopped; 1/4 cup green olives, pitted and chopped; 2 tablespoons capers, rinsed; 3 tablespoons olive oil; Salt and pepper to taste; Basil for garnish (optional)', 
 '1. Heat olive oil in a large pan over medium heat. 2. Add onion and celery, cooking until softened. 3. Stir in diced eggplant and cook until it begins to soften. 4. Add tomatoes, olives, capers, salt, and pepper; simmer for 15-20 minutes. 5. Remove from heat and let cool; serve at room temperature garnished with basil.', 
 '45 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Caponata.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Spaghetti Bolognese', 
 'A hearty and classic Italian pasta dish featuring a rich, meaty tomato sauce served over perfectly cooked spaghetti.', 
 '400g spaghetti; 300g ground beef; 1 onion, chopped; 2 cloves garlic, minced; 400g canned tomatoes; 2 tbsp tomato paste; 100ml red wine (optional); Olive oil; Salt and pepper to taste; Basil or oregano (for garnish)', 
 '1. Cook spaghetti in salted boiling water until al dente. Drain and set aside. 2. In a large pan, heat olive oil over medium heat and sauté onion until translucent. 3. Add garlic and ground beef; cook until browned. 4. Stir in canned tomatoes, tomato paste, and red wine; simmer for 20-30 minutes. 5. Season with salt and pepper, then serve over spaghetti with basil or oregano on top.', 
 '75 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Spaghetti Bolognese.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Lasagna alla Bolognese', 
 'A traditional Italian layered pasta dish made with rich Bolognese meat sauce, creamy béchamel, and tender lasagna sheets.', 
 '9 lasagna noodles; 2 cups Bolognese sauce; 2 cups béchamel sauce; 1 1/2 cups grated Parmesan cheese; 1 cup shredded mozzarella cheese; Salt and pepper to taste', 
 '1. Preheat your oven to 375°F (190°C). 2. Cook the lasagna noodles according to package instructions; drain and set aside. 3. In a baking dish, spread a layer of Bolognese sauce on the bottom. 4. Layer 3 noodles over the sauce, followed by a layer of béchamel sauce, then sprinkle with Parmesan and mozzarella. 5. Repeat the layers two more times, finishing with béchamel and cheeses on top. 6. Bake for 30-40 minutes until bubbly and golden.', 
 '120 minutes', 
 'Hard', 
 6, 
 'Italian', 
 'image/Lasagna alla Bolognese.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Spaghetti alle Vongole', 
 'Spaghetti alle Vongole is a classic Italian seafood pasta dish made with fresh clams, garlic, olive oil, white wine, and parsley.', 
 '400g spaghetti; 1 kg fresh clams, cleaned; 4 cloves garlic, minced; 100ml white wine; 50ml extra virgin olive oil; Fresh parsley, chopped (for garnish); Salt and pepper to taste', 
 '1. Cook spaghetti in salted boiling water until al dente. Reserve some pasta water and drain the rest. 2. In a large pan, heat olive oil over medium heat; add garlic and sauté until fragrant. 3. Add clams and white wine; cover and cook until clams open (about 5-7 minutes). 4. Toss the drained spaghetti into the pan with clams; add reserved pasta water if needed to loosen the sauce. 5. Season with salt and pepper, garnish with chopped parsley, and serve immediately.', 
 '25 minutes', 
 'Medium', 
 4, 
 'Italian', 
 'image/Spaghetti alle Vongole.jpg', 
 1);
 
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Hummus', 
 'A creamy and delicious dip made from blended chickpeas, tahini, lemon juice, and garlic. Hummus is a versatile dish that pairs perfectly with pita bread, vegetables, or as a spread in sandwiches. It\'s a staple in Middle Eastern cuisine and loved worldwide.', 
 '1 can (15 oz) chickpeas, drained and rinsed; 1/4 cup tahini; 2 tablespoons lemon juice; 1 clove garlic, minced; 2 tablespoons olive oil; Salt to taste; Water (as needed for consistency); Paprika (for garnish)', 
 '1. In a food processor, combine the chickpeas, tahini, lemon juice, garlic, and salt. 2. Blend until smooth, adding water as needed to achieve desired consistency. 3. Drizzle in olive oil while blending until fully incorporated. 4. Transfer to a serving dish and garnish with paprika and a drizzle of olive oil.', 
 '15 minutes', 
 'Easy', 
 6, 
 'Turkish', 
 'image/Tur-humus.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Dolma', 
 'Dolma is a traditional Mediterranean and Middle Eastern dish made with grape leaves stuffed with a mixture of rice, herbs, and spices. Often served as an appetizer or main dish, this flavorful recipe can be made vegetarian or include ground meat for added richness.', 
 '1 jar grape leaves (about 20 leaves); 1 cup rice; 1 onion, finely chopped; 1/4 cup pine nuts; 1/4 cup fresh parsley, chopped; 1/4 cup olive oil; 1 teaspoon salt; 1/2 teaspoon black pepper; 1 teaspoon allspice (optional); 2 cups vegetable broth or water', 
 '1. Rinse the grape leaves in cold water and set aside. 2. In a skillet, heat olive oil over medium heat. Sauté the onion until translucent. 3. Add rice and pine nuts, stirring for a few minutes until rice is slightly toasted. 4. Add parsley, salt, pepper, and allspice. Pour in vegetable broth and simmer until rice is partially cooked. 5. Take a grape leaf, place a spoonful of filling at the base, fold the sides over, and roll tightly. 6. Place dolmas in a pot, seam side down. Add water to cover and simmer for about 30-40 minutes.', 
 '90 minutes', 
 'Medium', 
 8, 
 'Turkish', 
 'image/Dolma.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Sigara Böreği', 
 'Sigara Böreği, also known as "Cigar Pastries," is a popular Turkish snack made by rolling thin pastry dough (yufka) around a savory filling of feta cheese, parsley, and spices, then frying until golden and crispy. Perfect for breakfast, tea time, or as an appetizer.', 
 '10 sheets of phyllo pastry; 200g feta cheese, crumbled; 1/4 cup fresh parsley, chopped; 1 egg (optional, for sealing); Oil for frying', 
 '1. In a bowl, mix the crumbled feta cheese and chopped parsley. 2. Take one sheet of phyllo pastry and cut it in half lengthwise. 3. Place a tablespoon of the cheese mixture at one end of the phyllo strip. 4. Fold the sides over and roll tightly to form a cigar shape. Seal with a bit of egg wash if desired. 5. Heat oil in a pan over medium heat. Fry the rolls until golden brown on all sides. 6. Drain on paper towels before serving.', 
 '30 minutes', 
 'Medium', 
 10, 
 'Turkish', 
 'image/Sigara Böreği.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Baklava', 
 'Baklava is a rich and decadent Turkish dessert made with layers of buttery phyllo dough, chopped nuts (commonly pistachios or walnuts), and sweetened with a fragrant syrup of honey or sugar. This classic treat is a must-try for any sweet tooth and is perfect for special occasions or celebrations.', 
 '1 package of filo pastry; 2 cups walnuts or pistachios, finely chopped; 1 cup unsalted butter, melted; 1 cup sugar; 1 cup water; 1/2 cup honey; 1 teaspoon vanilla extract (optional)', 
 '1. Preheat the oven to 350°F (175°C). 2. Grease a baking dish with some melted butter. 3. Layer 10 sheets of filo pastry in the dish, brushing each layer with melted butter. 4. Spread a layer of chopped nuts over the pastry. 5. Add 5 more layers of filo, brushing each with butter, then another layer of nuts. 6. Repeat until all nuts are used, finishing with a top layer of 10 filo sheets. 7. Cut the baklava into diamond or square shapes. 8. Bake for about 40-45 minutes or until golden brown. 9. While baking, combine sugar, water, and honey in a saucepan to make syrup. Bring to a boil and simmer for about 10 minutes. 10. Pour the hot syrup over the baklava as soon as it comes out of the oven. 11. Let it cool before serving.', 
 '85 minutes', 
 'Hard', 
 12, 
 'Turkish', 
 'image/Turkish-Baklava.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Künefe', 
 'Künefe is a warm and indulgent Turkish dessert made with shredded phyllo dough (kataifi), filled with melted cheese, and soaked in a sweet syrup. Topped with crushed pistachios, this unique treat offers a delightful contrast between crispy and gooey textures. It is traditionally served fresh and hot.', 
 '200g shredded pastry (kataifi); 100g unsalted cheese (such as mozzarella or a special künefe cheese); 100g unsalted butter, melted; 1 cup sugar; 1 cup water; 1 tablespoon lemon juice; Pistachios for garnish (optional)', 
 '1. Preheat the oven to 375°F (190°C). 2. Prepare the syrup by boiling sugar, water, and lemon juice together for about 10 minutes. Set aside to cool. 3. In a baking dish, layer half of the shredded pastry, drizzling half of the melted butter over it. 4. Add a layer of cheese on top of the pastry. 5. Cover with the remaining shredded pastry and drizzle with the remaining melted butter. 6. Bake for about 30-35 minutes or until golden brown. 7. Once out of the oven, pour the cooled syrup over the hot künefe. 8. Let it sit for a few minutes before serving. Garnish with pistachios if desired.', 
 '35 minutes', 
 'Medium', 
 4, 
 'Turkish', 
 'image/Künefe.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Sütlaç (Rice Pudding)', 
 'Sütlaç is a creamy and comforting Turkish rice pudding made with slow-cooked rice, milk, and sugar. Often topped with cinnamon or baked for a caramelized crust, this dessert is simple yet delicious and a favorite among all age groups. It’s perfect for a light and satisfying end to any meal.', 
 '1 cup rice; 4 cups milk; 3/4 cup sugar; 1 teaspoon vanilla extract; 1 tablespoon cornstarch (optional, for thickening); Cinnamon for sprinkling', 
 '1. Rinse the rice under cold water and drain. 2. In a pot, combine rice and 1 cup of water. Cook until the rice is soft. 3. Add milk, sugar, and vanilla extract to the pot and stir well. 4. If using cornstarch, dissolve it in a little cold milk and add it to the mixture to thicken. 5. Cook on low heat, stirring frequently until it thickens (about 20-30 minutes). 6. Pour into serving bowls and let cool slightly. 7. Sprinkle cinnamon on top before serving. Serve warm or chilled.', 
 '50 minutes', 
 'Easy', 
 6, 
 'Turkish', 
 'image/Sütlaç (Rice Pudding).jpg', 
 1);
 
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Kebabs', 
 'Turkish kebabs are a flavorful and juicy dish made by marinating meat (often lamb or chicken) in a blend of spices, herbs, and olive oil, then grilling it to perfection. Traditionally served with rice, grilled vegetables, and flatbread, kebabs are a staple of Turkish cuisine loved worldwide.', 
 '500g minced meat (lamb or beef); 1 onion, finely chopped; 2 cloves garlic, minced; 1 tsp red pepper flakes; 1 tsp cumin; Salt and pepper to taste; Pita or flatbreads for serving; Fresh parsley for garnish', 
 '1. In a bowl, combine minced meat, onion, garlic, red pepper flakes, cumin, salt, and pepper. 2. Mix well and shape into kebabs on skewers. 3. Grill over medium heat until cooked through, about 10-15 minutes. 4. Serve with pita bread and garnish with fresh parsley.', 
 '35 minutes', 
 'Medium', 
 4, 
 'Turkish', 
 'image/Turkish-Kebabs.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Lahmacun', 
 'Lahmacun, often called "Turkish pizza," is a thin flatbread topped with a mixture of minced meat, tomatoes, peppers, onions, and spices. Baked to perfection and served with fresh parsley, lemon wedges, and sometimes yogurt, Lahmacun is a light yet satisfying meal that’s easy to enjoy.', 
 '250g ground beef or lamb; 1 onion, finely chopped; 1 tomato, diced; 1 green bell pepper, finely chopped; 2 cloves garlic, minced; 1 tsp paprika; Salt and pepper to taste; 4 pieces of thin flatbread (lavash); Fresh parsley and lemon wedges for serving', 
 '1. Preheat oven to 220°C (428°F). 2. In a bowl, mix ground meat, onion, tomato, bell pepper, garlic, paprika, salt, and pepper. 3. Spread the mixture evenly over each piece of flatbread. 4. Bake in the preheated oven for about 10-12 minutes until the edges are crispy. 5. Serve with fresh parsley and lemon wedges.', 
 '35 minutes', 
 'Medium', 
 4, 
 'Turkish', 
 'image/Lahmacun.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Manti', 
 'Manti are small Turkish dumplings filled with spiced ground meat and served with a creamy yogurt sauce and a drizzle of melted butter infused with red pepper flakes. This beloved dish is often referred to as "Turkish ravioli" and is known for its intricate preparation and rich, satisfying flavors.', 
 '250g ground beef or lamb; 1 onion, finely chopped; Salt and pepper to taste; 2 cups all-purpose flour; 1 egg; Water as needed; Yogurt and garlic for serving', 
 '1. In a bowl, mix ground meat, onion, salt, and pepper. 2. In another bowl, combine flour, egg, and enough water to form a dough. 3. Roll out the dough thinly and cut into squares. 4. Place a small amount of filling in the center of each square and fold into a dumpling shape. 5. Boil in salted water until they float to the surface. 6. Serve with yogurt mixed with minced garlic.', 
 '60 minutes', 
 'Hard', 
 4, 
 'Turkish', 
 'image/Manti.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Çoban Salatası (Shepherd\'s Salad)', 
 'Çoban Salatası is a refreshing and healthy Turkish salad made with diced tomatoes, cucumbers, green peppers, onions, and parsley, all tossed in a simple olive oil and lemon juice dressing. It\'s a versatile side dish that pairs well with grilled meats or as part of a meze spread.', 
 '3 ripe tomatoes, diced; 2 cucumbers, diced; 1 onion, finely chopped; 1 green bell pepper, diced; 1 red bell pepper, diced; Fresh parsley, chopped; Olive oil; Lemon juice; Salt and pepper to taste', 
 '1. In a large bowl, combine the diced tomatoes, cucumbers, onions, and bell peppers. 2. Add chopped parsley, olive oil, lemon juice, salt, and pepper. 3. Toss gently to combine all ingredients. 4. Serve fresh as a side dish.', 
 '15 minutes', 
 'Easy', 
 4, 
 'Turkish', 
 'image/salatasi.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Piyaz (White Bean Salad)', 
 'Piyaz is a traditional Turkish salad made with tender white beans, tomatoes, onions, parsley, and a tangy dressing of olive oil and lemon juice. Often served as a side dish or appetizer, this salad is simple, healthy, and packed with flavor.', 
 '2 cups cooked white beans (cannellini or navy beans); 1 onion, finely chopped; 1/2 cup fresh parsley, chopped; 1/4 cup tahini; 2 tablespoons lemon juice; 1 clove garlic, minced; Salt and pepper to taste; Olive oil for drizzling', 
 '1. In a bowl, combine cooked white beans, chopped onion, and parsley. 2. In another bowl, whisk together tahini, lemon juice, minced garlic, salt, and pepper. 3. Pour the tahini dressing over the bean mixture and toss gently to combine. 4. Drizzle with olive oil before serving.', 
 '15 minutes', 
 'Easy', 
 4, 
 'Turkish', 
 'image/Piyaz (White Bean Salad).jpg', 
 1);
 
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Gavurdağı Salatası (Spicy Walnut Salad)', 
 'Gavurdağı Salatası is a unique Turkish salad made with finely chopped tomatoes, onions, parsley, and walnuts, seasoned with pomegranate molasses and a drizzle of olive oil. Its sweet and tangy flavor, combined with a satisfying crunch, makes it a favorite accompaniment to grilled meats.', 
 '3 ripe tomatoes, diced; 1 cup walnuts, chopped; 1 onion, finely chopped; 1/4 cup pomegranate molasses; 1/4 cup olive oil; Fresh parsley, chopped; Salt and pepper to taste', 
 '1. In a bowl, combine diced tomatoes, chopped walnuts, and onion. 2. Add pomegranate molasses, olive oil, salt, and pepper. 3. Toss gently to mix all ingredients thoroughly. 4. Garnish with fresh parsley before serving.', 
 '20 minutes', 
 'Easy', 
 4, 
 'Turkish', 
 'image/Gavurdağı Salatası (Spicy Walnut Salad).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Mercimek Çorbası (Lentil Soup)', 
 'Mercimek Çorbası is a comforting Turkish lentil soup made with red lentils, onions, carrots, and potatoes, seasoned with paprika and mint. Blended to a creamy texture, this hearty soup is both nutritious and delicious, perfect for a warm and satisfying meal.', 
 '1 cup red lentils, rinsed; 1 onion, chopped; 1 carrot, chopped; 2 tablespoons olive oil or butter; 1 teaspoon cumin; 1 teaspoon paprika; 4 cups vegetable or chicken broth; Salt and pepper to taste; Lemon wedges for serving (optional)', 
 '1. In a pot, heat olive oil or butter over medium heat. Add onion and carrot, and sauté until softened. 2. Add the rinsed lentils, cumin, paprika, and broth. Bring to a boil. 3. Reduce heat and simmer for about 20-25 minutes until lentils are tender. 4. Blend the soup until smooth using an immersion blender or regular blender. 5. Season with salt and pepper to taste. Serve with lemon wedges if desired.', 
 '40 minutes', 
 'Medium', 
 4, 
 'Turkish', 
 'image/Mercimek Çorbası (Lentil Soup).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Tarator (Yogurt-Based Soup)', 
 'Tarator is a refreshing Turkish cold soup made with yogurt, water, garlic, cucumber, and dill. This creamy and tangy dish is perfect for hot summer days and pairs wonderfully with crusty bread or as part of a meze platter.', 
 '2 cups plain yogurt; 1 cucumber, grated; 2 cloves garlic, minced; 1/2 cup walnuts, finely chopped; 2 tablespoons olive oil; Salt to taste; Water (to adjust consistency); Dried mint for garnish (optional)', 
 '1. In a bowl, combine yogurt, grated cucumber, minced garlic, and chopped walnuts. 2. Add olive oil and salt to taste. Mix well. 3. If the soup is too thick, gradually add water until you reach your desired consistency. 4. Chill in the refrigerator before serving. Garnish with dried mint if desired.', 
 '10 minutes', 
 'Easy', 
 4, 
 'Turkish', 
 'image/Tarator (Yogurt-Based Soup).jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Kısır (Bulgur Salad)', 
 'Kısır is a vibrant Turkish bulgur salad made with fine bulgur, tomato paste, fresh parsley, green onions, and pomegranate molasses. This light and zesty dish is perfect as a side salad, a light lunch, or part of a larger meze spread. Serve with lemon wedges for added tanginess.', 
 '1 cup fine bulgur wheat; 1 1/2 cups boiling water; 1/4 cup olive oil; 1/4 cup lemon juice; 1 onion, finely chopped; 1 cucumber, diced; 1 tomato, diced; 1/4 cup parsley, chopped; Salt and pepper to taste', 
 '1. Place bulgur in a bowl and pour boiling water over it. Cover and let it sit for about 15-20 minutes until the bulgur absorbs the water. 2. Add olive oil, lemon juice, onion, cucumber, tomato, parsley, salt, and pepper to the bulgur. Mix well. 3. If you want to serve it as a soup, add some vegetable or chicken broth to achieve your desired consistency. 4. Taste and adjust seasoning as needed. Serve chilled or at room temperature.', 
 '30 minutes', 
 'Easy', 
 4, 
 'Turkish', 
 'image/Kısır.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Minute Breakfast Burrito', 
 'A quick and satisfying breakfast burrito packed with protein and flavor, perfect for busy mornings.', 
 '2 eggs; 2 tablespoons salsa; 1 slice reduced-fat American cheese; 1 tortilla', 
 '1. Spray a cereal bowl with nonstick cooking spray. Crack the eggs into the bowl, add the salsa, and stir. Microwave on high for 1 minute, stir, and cook for another minute or until the mixture firms up. 2. Place the cheese in the center of the tortilla and top it with the egg mixture. Wrap it all up like a burrito and head for the car.', 
 '7 minutes', 
 'Easy', 
 1, 
 'Other', 
 'image/Minute-Breakfast-Burrito.png', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Fabulous Wet Burritos', 
 'Delicious and hearty burritos smothered in savory sauce, topped with cheese, and loaded with flavorful fillings.', 
 '1 pound ground beef; ½ cup chopped onion; 1 clove garlic, minced; ½ teaspoon cumin; ¼ teaspoon salt; ⅛ teaspoon pepper; 1 (16 ounce) can refried beans; 1 (4.5 ounce) can diced green chile peppers; 1 (15 ounce) can chili without beans; 1 (10.5 ounce) can condensed tomato soup; 1 (10 ounce) can enchilada sauce; 6 (12 inch) flour tortillas, warmed; 2 cups shredded lettuce, divided; 1 cup chopped tomatoes, divided; 2 cups shredded Mexican cheese blend, divided; ½ cup chopped green onions, divided', 
 '1. Crumble ground beef into a skillet over medium-high heat. Cook and stir until evenly browned. Add onion and cook until translucent. Drain grease, and season with garlic, cumin, salt, and pepper. Stir in refried beans and green chilies until well blended. Turn off heat but keep warm. 2. Combine canned chili, condensed soup, and enchilada sauce in a saucepan. Mix well and cook over medium heat until heated through. Turn off the heat and keep warm. 3. Place warmed tortilla on a plate and spoon a generous 1/2 cup of the ground beef mixture onto the center. Top with a portion of lettuce and tomato to your liking. Roll up tortilla around the filling, while tucking in the sides. Spoon a generous amount of the sauce over the top and sprinkle with a portion of cheese and green onions. Heat in the microwave until cheese is melted, about 30 seconds. Repeat with remaining tortillas and fillings.', 
 '55 minutes', 
 'Medium', 
 6, 
 'Other', 
 'image/Fabulous Wet Burritos.jpg', 
 1);

INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id)
VALUES 
('Southwestern Breakfast Burritos', 
 'A flavorful Southwestern-inspired breakfast burrito with cheesy scrambled eggs, wrapped in a warm tortilla.', 
 '2 low carb whole wheat tortillas; 4 eggs; 2 tablespoons cream; 1 pinch salt and white pepper; ¼ teaspoon cumin powder; ½ tablespoon butter; 1 ½ tablespoons salsa, chunky style; 2 ounces Cheddar cheese, shredded', 
 '1. In a mixing bowl, beat the eggs with the cream, salsa, cumin and a pinch of salt and pepper. 2. In a non stick skillet over medium-high heat, melt the butter and then scramble the eggs. Just before they are set, add the cheese and fold-in until it begins to melt. 3. Lay the tortillas on a flat surface. Divide the eggs equally between the two and place on the bottom third of each tortilla. Fold the bottom third over tucking in. Fold in the two sides and then roll up. Serve.', 
 '20 minutes', 
 'Easy', 
 2, 
 'Other', 
 'image/Southwestern-Breakfast-Burrito.png', 
 1);
 
 
 
 INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id) VALUES
('Churro Cheesecake Bars',
 'A decadent dessert combining the crispy sweetness of churros with the creamy richness of cheesecake.',
 'Sugar: Start with ½ cup of white sugar. Cinnamon: A tablespoon ground cinnamon lends warmth. Cream cheese: You’ll need two packages of brown sugar and cinnamon spreadable cream cheese. Egg: An egg gives the filling moisture and helps find it together. Vanilla: Two teaspoons of vanilla extract add a depth of flavor. Orange zest: Orange zest is optional, but it gives the filling welcome brightness. Crescent sheets: Refrigerated crescent sheets are the convenient crust. Butter: Melted butter adds richness and gives the sugar something to adhere to. Cajeta: Cajeta (Mexican caramel) is optional, but it’s the perfect finishing touch.',
 'Step 1: Gather all ingredients. Preheat the oven to 350 degrees F (175 degrees C). Lightly coat a 13x9-inch baking pan with cooking spray. Step 2: Combine sugar and cinnamon in a small bowl. Sprinkle ½ of the sugar mixture evenly in the bottom of the pan. Step 3: Place one crescent sheet in the pan, trimming to fit as needed. Step 4: To make the filling: Beat cream cheese, egg, vanilla, and orange zest together in a medium bowl with an electric mixer on medium speed until smooth. Step 5: Spread cream cheese filling evenly over crescent crust in pan. Step 6: Gently lay the remaining crescent sheet over the filling. Step 7: Pour melted butter over the top. Step 8: Sprinkle remaining sugar mixture evenly over top. Step 9: Bake until golden brown, about 30 minutes. Cool slightly. Cut into bars. Serve warm or chill and serve within 24 hours. If desired, drizzle with Cajeta just before serving.',
 '50', 'Medium', 12, 'Mexican', 'image/churro-cheesecake-bars.png', 1),
 
('Churros',
 'Classic Mexican fried dough pastry coated in cinnamon sugar, perfect for dipping in chocolate or caramel sauce.',
 'Water: This recipe for churros starts with a cup of water. Sugar: White sugar goes into the churro dough and into the cinnamon-sugar topping. Salt: A pinch of salt enhances the flavors of the other ingredients. Oil: You\'ll need vegetable oil for the dough and to fry the churros. Flour: All-purpose flour gives the churro dough structure. Cinnamon: The fried churros are rolled in a cinnamon-sugar mixture before serving.',
 'Step 1: Gather all ingredients. Step 2: Combine water, 2 ½ tablespoons sugar, salt, and 2 tablespoons vegetable oil in a small saucepan and place over medium heat. Bring to a boil and remove from heat. Step 3: Stir in flour, stirring until mixture forms a ball. Step 4: Heat oil for frying in a deep fryer or deep pot to 375 degrees F (190 degrees C). Transfer dough to a sturdy pastry bag fitted with a medium star tip. Step 5: Carefully pipe a few 5- to 6-inch strips of dough into the hot oil; work in batches so you don\'t crowd the fryer. Step 6: Cook until golden; use a spider or slotted spoon to transfer churros to paper towels to drain. Step 7: Combine 1/2 cup sugar and cinnamon. Roll drained churros in cinnamon and sugar mixture.',
 '40', 'Easy', 4, 'Mexican', 'image/churros.png', 1),

('Mexican Chocolate Chile Cake',
 'A rich and spicy chocolate cake with a hint of chile, offering a unique and bold dessert experience.',
 '2 dried red chile peppers, seeded, or to taste; 1 ½ cups chopped dark chocolate; 1 cup butter; 2 tablespoons butter, divided; 1 cup blanched almonds; 1 tablespoon unsweetened cocoa powder; 1 tablespoon all-purpose flour; 1 teaspoon ground cinnamon; 2 tablespoons Greek yogurt; 6 eggs, separated; ¾ cup white sugar; 6 tablespoons white sugar.',
 'Step 1: Place chiles in a bowl with water to cover; let soak until slightly softened, about 15 minutes. Step 2: Place 1 1/2 cups dark chocolate and 1 cup plus 2 tablespoons butter in top of a double boiler over simmering water. Stir frequently, scraping down the sides with a rubber spatula to avoid scorching, until chocolate is melted, about 5 minutes. Remove from heat. Step 3: Preheat oven to 325 degrees F (165 degrees C). Line a 10-inch springform pan with parchment paper. Step 4: Place chiles in a food processor; process until finely chopped. Add almonds, cocoa powder, flour, and cinnamon; process until almonds are chopped. Add Greek yogurt. Mix chile mixture thoroughly into the bowl of melted chocolate to make the batter. Step 5: Place egg yolks and egg whites into 2 different bowls. Place 3/4 cup sugar into the bowl of egg yolks; mix until fluffy and creamy. Stir carefully into the batter. Step 6: Beat egg whites until foamy using an electric mixer. Add 6 tablespoons sugar gradually, continuing to beat until medium peaks form. Blend meringue carefully into the batter; pour batter into the prepared pan. Step 7: Bake until a toothpick inserted into the center comes out mostly clean, 25 to 30 minutes. Let cake cool, at least 20 minutes. Step 8: Combine 1 1/2 cups dark chocolate, milk chocolate, and 2 tablespoons butter in a bowl. Step 9: Combine 1 cup plus 1 tablespoon heavy cream and 2 tablespoons sugar in a saucepan over medium heat; bring to a boil. Pour over the bowl of chocolate; mix thoroughly. Let ganache cool, at least 15 minutes. Spread over the cake.',
 '75', 'Hard', 8, 'Mexican', 'image/Mexican-Chocolate-Chile-Cake.png', 1),

('Taquito Casserole',
 'Taquito Casserole is a delicious Mexican dish that\'s perfect for family meals. It combines taquitos with a cheesy, creamy filling, topped with a spicy jalapeño crema and fresh cilantro.',
 'cooking spray; 1 (15 ounce) can black beans drained and rinsed; 2 1/2 cups frozen corn; 1 (8.8 ounce) package pre-cooked microwaveable white rice; 1 cup finely chopped red bell pepper; 1/2 cup finely chopped red onion; 1/2 cup heavy whipping cream; 1 (1 ounce) package mild taco seasoning; 1 1/2 teaspoons kosher salt; 1 teaspoon smoked paprika; 1 teaspoon ground cumin; 16 ounces shredded Mexican cheese blend, divided; 20 frozen beef and cheese flour tortilla taquitos; 1/2 cup sour cream; 2 tablespoons freshly-squeezed lime juice; 2 tablespoons pickling liquid from jarred pickled jalapenos; 2 tablespoons drained pickled jalapenos; 1/4 cup loosely packed fresh cilantro leaves.',
 'Step 1: Gather all ingredients. Preheat the oven to 375 degrees F (190 degrees C). Lightly coat a 9x13-inch baking dish with cooking spray; set aside. Step 2: Stir together enchilada sauce, beans, corn, rice, bell pepper, red onion, cream, taco seasoning, salt, paprika, cumin, and 3 cups shredded cheese in a large bowl until well combined. Step 3: Spread into the prepared baking dish in an even layer. Arrange taquitos evenly over rice mixture. Step 4: Bake in the preheated oven until taquitos are crispy and rice mixture is bubbling, about 40 minutes. Step 5: Meanwhile, whisk together sour cream, lime juice, and pickling liquid in a small bowl until smooth. Set aside, uncovered, at room temperature until ready to serve. Step 6: Remove baking dish from oven, and sprinkle evenly with remaining cheese. Top evenly with jalapeño slices. Bake at 375 degrees F (190 degrees C) until cheese is melted, about 8 minutes more. Step 7: Let stand for 10 minutes. Top evenly with cilantro leaves. Drizzle each serving with jalapeño crema.',
 '60', 'Medium', 6, 'Mexican', 'image/taquito-casserole.png', 1),

('Chicken Adabo Tacos',
 'These Chicken Adobo Tacos are bursting with flavor, thanks to the marinated chicken and tangy mango salsa that complements the savory adobo sauce perfectly.',
 'Adobo Chicken: 1/3 cup soy sauce; 1/3 cup white vinegar; 3 bay leaves; 1 teaspoon granulated garlic; 1 1/2 pounds skinless, boneless chicken thighs. Mango Salsa: 2 tablespoons white vinegar; 1 tablespoon fish sauce; 1/2 teaspoon avocado oil; 2 teaspoons white sugar; 1 pinch ground white pepper, or to taste; 1 mango - peeled, pitted, and diced; 1 Roma tomato, seeded and diced; 1/4 cup minced red onion; 1/4 cup minced jalapeno pepper, seeds and membranes removed; 1/2 cup chopped fresh cilantro; 2 tablespoons oil, divided; 1/2 cup diced onion; 3 garlic cloves, minced; 1 1/2 cups water; 2 tablespoons brown sugar; 1 teaspoon freshly ground black pepper, or to taste; 8 (8 inch) flour tortillas; chopped cilantro and sliced green onions, for garnish (optional).',
 'Step 1: Combine soy sauce, vinegar, bay leaves, and garlic in a large plastic bag with a zipper. Gently squeeze to mix well. Add chicken and coat with marinade. Squeeze out as much air from the bag as possible, coat all the chicken pieces with marinade, seal, and refrigerate for at least 20 minutes. Step 2: Meanwhile, combine vinegar, fish sauce, avocado oil, sugar, and black pepper in a bowl for the salsa. Stir with a whisk or fork until sugar is dissolved. Add mango, tomato, red onion, jalapeño, and chopped cilantro to the bowl. Toss to combine, and refrigerate salsa until ready to serve. Step 3: For tacos, remove chicken pieces from the marinade and reserve the marinade. Step 4: Heat oil in a large nonstick skillet over medium-high heat. Carefully add the chicken thighs, and brown on each side, 1 to 2 minutes, then remove chicken to a plate. Step 5: To the same skillet, add onion, and cook for about 1 minute. Stir in minced garlic and cook until fragrant, about 30 seconds. Add reserved marinade, water, brown sugar, and black pepper, and bring to a boil. Step 6: Return chicken to the skillet, smooth side down. Reduce heat to low, and simmer chicken uncovered, about 15 minutes. The liquid should bubble gently. Turn chicken and simmer 10 minutes more. Remove chicken from skillet to rest. Step 7: Cook sauce over medium heat until syrupy, thick, and reduced, about 10 minutes. Remove skillet from heat. Remove bay leaves and discard. Step 8: Slice chicken into 1/2-inch slices and return to the skillet to coat in the sauce. Garnish with fresh cilantro and chopped green onions, if desired. Step 9: Fill each tortilla with chicken strips and top with mango salsa. Serve immediately.',
 '55', 'Medium', 4, 'Mexican', 'image/8736734_Chicken-Adobo-Tacos.png', 1),

('Roscoe\'s Chilaquiles',
 'A delicious and hearty Mexican breakfast dish, Roscoe’s Chilaquiles features crispy tortilla chips drenched in a rich and smoky salsa roja. Topped with fried eggs, crumbled cotija cheese, avocado, and a squeeze of lime, it’s the perfect combination of savory, tangy, and spicy flavors.',
 'Salsa Roja: 3 guajillo chile peppers, seeds removed; 1 ancho chile pepper, seeds removed; 4 cups boiling water; 4 Roma tomatoes, quartered; 1 white onion, quartered; 3 garlic cloves, peeled; 2 tablespoons olive oil; 1 beef bouillon cube; 2 culantro leaves; 1 lime, juiced; salt and freshly ground black pepper to taste. Chilaquiles: 2 1/4 cups oil, divided; 12 soft corn tortillas, cut into 8 wedges each; 4 large eggs; 1/4 cup Mexican crema, or as needed; 1/2 cup crumbled cotija cheese; 1 avocado, sliced, or to taste; 1/4 cup cilantro leaves, or to taste; 1 lime, quartered; 1/4 teaspoon Mexican oregano, or to taste.',
 'Step 1: For salsa roja, pour boiling water over peppers and let sit until softened, 15 to 30 minutes. Step 2: Meanwhile, add 2 tablespoons olive oil to a skillet over high heat, and sear tomatoes, onions, and garlic until charred for about 2 minutes. Step 3: Place softened peppers, charred vegetables, and 1 cup of the chile soaking water in a blender. Reserve remaining 3 cups chile water. Blend until smooth. Strain the sauce; pour back into the pan. Step 4: Cook sauce over medium heat, scraping any charred bits from the bottom of the pan; add 2 cups of remaining chile water. Simmer until sauce is reduced by 1/3. Stir in bouillon cube and last 1 cup chile water, culantro leaves, lime juice; stir until bouillon cube dissolves. Season with salt and pepper. Step 5: For chilaquiles, heat oil to 350 degrees F (175 degrees C) in a large saucepan over medium heat. Add tortillas and fry until crisp and golden. 2 minutes per batch. Step 6: For each serving, heat 1 tablespoon oil in a small nonstick pan over medium heat. Crack an egg into the skillet, and cook until outer edges become opaque, about 1 minute. Turn egg over and cook until whites are completely opaque, 1 to 2 minutes more. Step 7: Add a handful of chips to the salsa roja, and turn to coat completely. Remove to a serving plate with a slotted spoon. Step 8: Drizzle with crema, top with an egg, cotija cheese, avocado, cilantro, squeeze of lime juice, and drizzle with more salsa roja. Sprinkle with oregano. Repeat with remaining ingredients.',
 '65', 'Medium', 4, 'Mexican', 'image/Roscoes-Chilaquiles.png', 1);
 
 
 
 -- Insert Recipes
INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id) VALUES
('Crab Ceviche',
 'This refreshing Crab Ceviche features imitation crabmeat, tomatoes, serrano peppers, red onion, cilantro, and lime juice, offering a zesty, tangy twist to a traditional seafood dish.',
 '1 (8 ounce) package imitation crabmeat, flaked; 1 tablespoon olive oil; 2 large tomatoes, chopped; 3 serrano peppers, finely chopped; 1 red onion, finely chopped; ½ bunch cilantro, chopped; 2 limes, juiced; salt and pepper to taste.',
 'Step 1: Place imitation crab into a large glass or porcelain bowl; stir in olive oil until well coated. Stir in tomatoes, serrano peppers, onion, and cilantro. Squeeze lime juice on top and mix well. Season generously with salt and pepper. Cover and refrigerate for about 1 hour before serving.',
 '15', 'Easy', 4, 'Mexican', 'image/crab ceviche.png', 1),

('Elotes (Mexican Corn in a Cup)',
 'A popular street food, Elotes are sweet corn kernels mixed with creamy mayonnaise, tangy lime, savory Parmesan, and spicy chile-lime seasoning, served in a cup for easy enjoyment.',
 '2 (15.5 ounce) cans whole kernel corn, drained; 4 tablespoons mayonnaise, or to taste; 4 tablespoons grated Parmesan cheese, or to taste; 4 teaspoons chile-lime seasoning (such as Tajin®), or more to taste; 1 lime, or more to taste.',
 'Step 1: Heat corn in a skillet over medium heat until steaming, about 5 minutes. Remove from heat and drain water. Step 2: Fill several cups or mugs halfway with the corn. Add 1 tablespoon mayonnaise, 1 tablespoon Parmesan cheese, and 1 to 2 teaspoons chile-lime seasoning to each cup. Squeeze lime juice on top.',
 '10', 'Easy', 4, 'Mexican', 'image/Elotes(Mexican Corn in a Cup) - Copy.png', 1),

('Avocado Salad',
 'A creamy and flavorful avocado salad that combines fresh vegetables like tomato, green bell pepper, and sweet onion, with cilantro and a tangy lime dressing for a healthy and delicious side dish.',
 '2 ripe avocados - peeled, pitted and diced; 1 sweet onion, chopped; 1 green bell pepper, chopped; 1 large ripe tomato, chopped; ¼ cup chopped fresh cilantro; ½ lime, juiced; salt and pepper to taste.',
 'Step 1: Gather the ingredients. Step 2: Combine avocados, onion, bell pepper, tomato, cilantro, and lime juice in a large bowl. Step 3: Gently toss until evenly coated. Season with salt and pepper.',
 '10', 'Easy', 4, 'Mexican', 'image/avocado-salad.png', 1),

('Loaded Beef Nachos',
 'A hearty and flavorful appetizer featuring crispy tortilla chips loaded with seasoned beef, melted cheese, and classic Mexican toppings.',
 'Taco Seasoning: 5 teaspoons paprika; 1 1/4 teaspoons garlic powder; 1 1/4 teaspoons ground cumin; 1 1/4 teaspoons onion powder; 1 teaspoon chili powder; 1 teaspoon oregano leaves; 1 1/2 teaspoons salt. Nachos: 2 tablespoons vegetable oil; 1 pound ground beef; 1 cup diced onion; 1 cup diced green bell pepper; 1 (10 ounce) can diced tomatoes with green chiles (such as RO-TEL®); 1 (15 ounce) can Mexican-style corn (optional); 1 (16 ounce) can refried beans; 1 cup shredded Cheddar cheese, or as needed; 4 ounces tortilla chips, or as needed.',
 'Step 1: For taco seasoning, stir paprika, garlic powder, cumin, onion powder, chili powder, oregano, and salt together in a small bowl; set aside. Step 2: Heat oil in a large skillet over medium-high heat; cook and stir ground beef until browned. Step 3: Stir in onion and green pepper; cook until softened. Step 4: Layer chips, beans, meat, and cheese. Step 5: Microwave until cheese is melted, then top with optional ingredients.',
 '30', 'Medium', 6, 'Mexican', 'image/Nachos.png', 1),

('Super Nachos',
 'A stacked and satisfying platter of tortilla chips piled high with seasoned ground beef, melted cheese, and an array of fresh toppings.',
 '1 pound ground beef; ¾ cup water; 1 (1.25 ounce) package taco seasoning mix; 1 (18 ounce) package restaurant-style tortilla chips; 1 cup shredded sharp Cheddar cheese; 1 (15.5 ounce) can refried beans; 1 (10 ounce) can pitted black olives; 1 cup salsa; 1 cup sour cream; 4 green onions, diced; 1 (4 ounce) can sliced jalapeno peppers.',
 'Step 1: Preheat the oven broiler. Step 2: Cook and stir ground beef until browned. Step 3: Spread chips on a baking sheet, top with cheese and beef. Step 4: Broil until cheese is melted. Step 5: Top with olives, salsa, sour cream, green onions, and jalapeños.',
 '30', 'Medium', 8, 'Mexican', 'image/super-nachos.png', 1);
 
 
 INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id) VALUES
('Seven Layer Party Dip',
 'A layered appetizer featuring refried beans, guacamole, salsa, sour cream, cheese, and fresh toppings, perfect for any party or gathering.',
 '1 ½ pounds ground beef; 1 (16 ounce) can refried beans; 4 cups shredded Cheddar-Monterey Jack cheese blend; 1 (8 ounce) container sour cream; 1 cup guacamole; 1 cup salsa; 1 (2.25 ounce) can black olives, chopped; ½ cup chopped tomatoes; ½ cup chopped green onions.',
 'Step 1: Heat a large skillet over medium-high heat. Cook and stir ground beef in the hot skillet until browned and crumbly, 5 to 7 minutes. Drain and set aside to cool to room temperature. Step 2: Spread beans on the bottom of a 9x13-inch glass dish or a serving platter. Sprinkle 2 cups of shredded cheese on top of beans. Spoon beef on top of cheese. Spread sour cream carefully on top of beef. Spread guacamole on top of sour cream. Pour salsa over guacamole and spread evenly. Sprinkle with remaining 2 cups shredded cheese. Sprinkle black olives, tomatoes, and green onions on top. Step 3: Serve immediately, or refrigerate overnight and serve cold.',
 '25', 'Easy', 12, 'Mexican', 'image/Seven-layer-dip.png', 1),
 
('Beef Birria Ramen',
 'A delicious fusion of Mexican birria and Japanese ramen, combining tender beef with flavorful broth and chewy noodles.',
 '10 dried guajillo chilies; 4 dried de árbol chilies; boiling water, as needed; 1 tablespoon avocado oil; 1/2 white onion, roughly chopped; 4 garlic cloves, crushed; 6 Roma tomatoes, roughly chopped; 1 teaspoon whole black peppercorns; 6 whole cloves; 1 (1/2 inch) piece dried ginger root; 1/4 teaspoon cumin seeds; 1 teaspoon fresh thyme; 1/2 tablespoon dried marjoram; 1/2 tablespoon dried Mexican oregano; 1 tablespoon granulated chicken bouillon; 2 tablespoons apple cider vinegar; salt to taste; 2 pounds beef chuck roast; 2 beef shanks; 2 beef short ribs; 1 1/2 quarts beef stock; 1 (2 1/2 inch) stick Ceylon cinnamon; 1/2 white onion, cut into chunks; 4 garlic cloves, crushed; 2 bay leaves; 8 servings fresh or dried Japanese ramen noodles; 1 large white onion, finely chopped; 1 bunch cilantro leaves; lime wedges.',
 'Step 1: For sauce base, first toast chilies: heat a dry griddle or skillet over medium heat. Toast guajillo chilies and chiles de arbol until fragrant and lightly browned. Place chilies in a bowl, cover them with boiling water, and soak until reconstituted, about 30 minutes. Step 2: Meanwhile, heat oil over medium heat in a large pan. Add onion and garlic; cook and stir until soft, about 5 minutes. Add tomatoes and cook until they break down, about 5 minutes. Step 3: Place peppercorns, cloves, dried ginger, cumin seeds, thyme, marjoram, and oregano in a mortar and grind into a fine mix. Step 4: In a blender, combine soaked chilies, 1/4 cup of the chile soaking liquid, onion-tomato mix, ground spices, chicken bouillon, and apple cider vinegar. Blend until smooth. Taste sauce; season with salt. Step 5: To cook meat, place chuck roast, beef shanks, and beef short ribs in a large pot and pour the sauce over it. Add enough beef broth to cover meat by about 1 inch, then stir to combine. Bring to a boil, then add cinnamon stick, onion, garlic, and bay leaves. Cover, reduce heat to low, and simmer until meat is tender, about 2 1/2 hours. Step 6: Bring a large pot of salted water to a boil, add ramen, and cook until tender, according to package instructions. Step 7: To assemble, ladle birria and broth over ramen. Top with chopped onion and cilantro. Serve with lime wedges.',
 '225', 'Medium', 8, 'Fusion', 'image/Beef-Birria-Ramen.png', 1),

('Potato soup with chorizo',
 'A hearty and comforting soup featuring tender potatoes and spicy chorizo in a rich, flavorful broth.',
 '1 (9 ounce) roll Mexican chorizo; 1/3 cup chopped onions; 2 cloves garlic; 3 cups chicken broth; 1 cup diced potatoes; 1/2 tablespoon chicken bouillon granules; 1/2 teaspoon ground cumin; 1/2 teaspoon Mexican oregano; 1/3 cup heavy cream; salt and pepper to taste.',
 'Step 1: Combine chorizo and onions in a soup pot over medium heat and cook until onions are soft and translucent, 7 to 8 minutes. Add garlic and cook until fragrant, about 1 minute. Step 2: Add chicken broth, potatoes, chicken granules, cumin, and oregano. Bring to a boil and simmer until potatoes are fork tender, 6 to 10 minutes. Reduce heat and stir in heavy cream. Season with salt and pepper.',
 '45', 'Easy', 6, 'Mexican', 'image/Potato-Soup-with-Chorizo.png', 1),

('Green Chicken Enchilada Soup',
 'A zesty and creamy soup made with shredded chicken, green enchilada sauce, and fresh vegetables.',
 '1/2 pounds skinless, boneless chicken breast halves; 1 (14 1/2 -ounce) can low-sodium chicken stock; 2 (15-ounce) cans green enchilada sauce; 6 to 8 tomatillos; 1 (4 ounce) can chopped green chilies; 1 large onion; 2 bay leaves; 3 cloves garlic; 2 teaspoons ground cumin; 1 teaspoon chili powder; 1/2 teaspoon salt; 1/2 teaspoon black pepper; 1/4 cup chopped cilantro; 1 small zucchini; 1 small yellow squash; 1 cup sour cream; 1 cup shredded Monterrey Jack cheese; sliced jalapeños (optional); corn tortilla chips (optional); lime slices (optional).',
 'Step 1: Place chicken breasts in slow cooker and add corn, chicken stock, enchilada sauce, tomatillos, green chilies, onion, bay leaves, garlic, cumin, chili powder, salt, and pepper. Step 2: Cover and cook on Low for 3 hours. Step 3: Add cilantro, zucchini, and yellow squash; cover and cook for an additional 3 hours. Step 4: Transfer chicken to a cutting board and shred. Return chicken to the cooker and stir. Remove bay leaves and stir in sour cream before serving.',
 '380', 'Medium', 8, 'Mexican', 'image/Green-Chicken-Enchilada-Soup.png', 1),

('Spring Rolls',
 'Crispy rolls filled with vegetables or meat.',
 '1 cup shredded cabbage; 1/2 cup grated carrots; 1/2 cup cooked chicken or pork (optional); Spring roll wrappers; 2 tablespoons soy sauce; Oil for frying.',
 'Step 1: Mix cabbage, carrots, meat (if using), and soy sauce in a bowl. Step 2: Place filling on a spring roll wrapper and roll tightly, sealing edges with water. Step 3: Heat oil in a pan and fry until golden brown. Serve hot.',
 '45', 'Easy', 4, 'Fusion', 'image/Spring Rolls.jpg', 1),

('Shrimp Toast',
 'Fried bread topped with seasoned shrimp paste.',
 '8 slices white bread; 1/2 lb shrimp; 1 egg white; 1 tablespoon soy sauce; 1 teaspoon ginger; Oil for frying.',
 'Step 1: Blend shrimp, egg white, soy sauce, and ginger into a paste. Step 2: Spread the shrimp paste on the bread slices. Step 3: Fry bread in hot oil, shrimp-side down, until golden. Serve warm.',
 '30', 'Easy', 4, 'Fusion', 'image/Shrimp Toast.jpg', 1),

('Cold Sesame Noodles',
 'Chilled noodles tossed in a sesame-based sauce.',
 '8 oz cooked noodles; 2 tablespoons soy sauce; 2 tablespoons sesame oil; 1 tablespoon rice vinegar; 1 teaspoon sugar; 2 green onions; Sesame seeds for garnish.',
 'Step 1: Mix soy sauce, sesame oil, rice vinegar, and sugar in a bowl. Step 2: Toss cooked noodles with the sauce. Step 3: Top with green onions and sesame seeds before serving.',
 '25', 'Easy', 4, 'Fusion', 'image/Cold Sesame Noodles.jpg', 1),

('Kung Pao Chicken',
 'Spicy stir-fry with chicken, peanuts, and vegetables.',
 '1 lb chicken breast; 1/2 cup peanuts; 2 bell peppers; 2 green onions; 3 tablespoons soy sauce; 2 tablespoons rice vinegar; 1 tablespoon sesame oil; 1 tablespoon cornstarch; 1 tablespoon chili paste.',
 'Step 1: Mix soy sauce, rice vinegar, sesame oil, and cornstarch in a bowl. Step 2: Marinate chicken for 15 minutes. Step 3: Heat oil in a wok and stir-fry chicken until browned. Step 4: Add vegetables and stir-fry for 5 minutes. Step 5: Add peanuts and sauce; cook until thickened. Serve hot over rice.',
 '35', 'Medium', 4, 'Chinese', 'image/Kung Pao Chicken.jpg', 1),

('Mapo Tofu',
 'Spicy tofu with minced pork in a bold, flavorful sauce.',
 '1 lb tofu; 1/2 lb ground pork; 2 tablespoons doubanjiang; 2 green onions; 2 tablespoons soy sauce; 1 tablespoon Sichuan peppercorns; 2 tablespoons cooking oil.',
 'Step 1: Heat oil in a wok and stir-fry Sichuan peppercorns until fragrant. Step 2: Add ground pork and cook until browned. Step 3: Add doubanjiang and stir well. Step 4: Add tofu and soy sauce, simmer for 10 minutes. Garnish with green onions.',
 '35', 'Medium', 4, 'Chinese', 'image/Mapo Tofu.jpg', 1),

('Sweet and Sour Pork',
 'Crispy pork in a tangy sweet and sour sauce.',
 '1 lb pork tenderloin; 1 bell pepper; 1 onion; 1 cup pineapple chunks; 1/2 cup ketchup; 1/4 cup vinegar; 2 tablespoons soy sauce; 2 tablespoons cornstarch; 2 tablespoons sugar.',
 'Step 1: Coat pork with cornstarch and fry until golden. Step 2: Mix ketchup, vinegar, soy sauce, and sugar. Step 3: Stir-fry bell pepper, onion, and pineapple for 5 minutes. Step 4: Add sauce and pork, toss until coated.',
 '35', 'Medium', 4, 'Chinese', 'image/Sweet and Sour Pork.jpg', 1);
 
 
 -- errror here
 INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id) VALUES
('Fried Rice',
 'Stir-fried rice with vegetables, meat, or seafood for a flavorful and hearty meal.',
 '3 cups cooked rice (preferably day-old); 2 eggs, beaten; 1 cup mixed vegetables (peas, carrots, corn); 2 green onions, chopped; 3 tbsp soy sauce; 2 tbsp vegetable oil.',
 'Step 1: Heat oil in a wok or large pan over medium-high heat. Step 2: Scramble the eggs and set aside. Step 3: Add mixed vegetables and stir-fry for 2-3 minutes. Step 4: Stir in the cooked rice and soy sauce, mixing well. Step 5: Add scrambled eggs and green onions; stir for 1-2 minutes. Serve hot.',
 '25', 'Easy', 4, 'Chinese', 'image/Fried Rice.jpg', 1),

('Chow Mein',
 'Stir-fried noodles with vegetables and meat, tossed in a savory sauce.',
 '200g chow mein noodles; 200g chicken breast, sliced; 1 cup bean sprouts; 1 carrot, julienned; 2 tbsp soy sauce; 1 tbsp oyster sauce; 2 tbsp vegetable oil.',
 'Step 1: Cook the noodles according to the package instructions; drain and set aside. Step 2: Heat oil in a wok over high heat and stir-fry chicken until cooked through. Step 3: Add carrots and bean sprouts; stir-fry for 2-3 minutes. Step 4: Stir in cooked noodles, soy sauce, and oyster sauce; toss well and serve hot.',
 '27', 'Easy', 4, 'Chinese', 'image/Chow Mein.jpg', 1),

('Dan Dan Noodles',
 'Spicy Sichuan noodles topped with ground pork and a bold, flavorful sauce.',
 '300g wheat noodles; 200g ground pork; 2 tbsp Sichuan peppercorns, crushed; 2 tbsp soy sauce; 2 tbsp chili oil; 1 tbsp sesame paste; 2 garlic cloves, minced.',
 'Step 1: Cook the noodles according to package instructions; drain and set aside. Step 2: In a pan, cook ground pork until browned. Step 3: Mix soy sauce, chili oil, sesame paste, and garlic in a bowl. Step 4: Toss noodles with the sauce mixture and top with ground pork. Step 5: Sprinkle crushed Sichuan peppercorns before serving.',
 '35', 'Medium', 4, 'Chinese', 'image/Dan Dan Noodles.jpg', 1),

('Hot and Sour Soup',
 'Spicy, tangy soup with tofu, mushrooms, and bamboo shoots.',
 '4 cups chicken or vegetable broth; 1 cup tofu, cubed; 1 cup mushrooms, sliced; 1/2 cup bamboo shoots, julienned; 2 tbsp soy sauce; 2 tbsp rice vinegar; 1 tbsp chili paste.',
 'Step 1: Bring broth to a boil over medium heat. Step 2: Add tofu, mushrooms, and bamboo shoots. Step 3: Stir in soy sauce, vinegar, and chili paste; simmer for 10 minutes. Step 4: Serve hot with chopped green onions on top.',
 '35', 'Easy', 4, 'Chinese', 'image/Hot and Sour Soup.jpg', 1),

('Wonton Soup',
 'Light broth with pork- or shrimp-filled wontons.',
 '20 wonton wrappers; 200g ground pork or shrimp; 1 tbsp soy sauce; 1 tsp ginger, minced; 4 cups chicken broth; 2 green onions, chopped.',
 'Step 1: Mix ground pork, soy sauce, and ginger to make the filling. Step 2: Place filling in wonton wrappers and seal. Step 3: Boil chicken broth; add wontons and cook until they float. Step 4: Serve hot with green onions on top.',
 '40', 'Medium', 4, 'Chinese', 'image/Wonton Soup.jpg', 1),

('Egg Drop Soup',
 'Light soup with silky beaten eggs in a savory broth.',
 '4 cups chicken broth; 2 eggs, beaten; 1 tbsp cornstarch (optional, for thickness); 1 tbsp soy sauce; 2 green onions, chopped.',
 '1. Bring chicken broth to a boil over medium heat. 2. Add beaten eggs slowly while stirring to create silky strands. 3. Stir in cornstarch mixed with a little water for thickness, if desired. 4. Add soy sauce and green onions before serving hot.',
 '15 minutes',
 'Easy',
 4,
 'Chinese',
 'image/Egg Drop Soup.jpg',
 1),


('Baozi',
 'Baozi are traditional Chinese steamed buns filled with savory meat or vegetable fillings, making them a popular snack or meal on the go.',
 '2 cups all-purpose flour; 1 packet yeast; 3/4 cup warm water; 1 tbsp sugar; 1/2 tsp salt; Filling: pork, cabbage, soy sauce, ginger.',
 'Step 1: Mix flour, yeast, water, sugar, and salt into a dough and let it rise for 1 hour. Step 2: Prepare the filling by mixing ingredients. Step 3: Divide dough, fill with mixture, and seal. Step 4: Steam for 20 minutes and serve hot.',
 '140', 'Medium', 12, 'Chinese', 'image/Baozi.jpg', 1);
 
 -- up to here error
 
 INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id) VALUES
('Jianbing',
 'Jianbing is a popular Chinese street food consisting of savory crepes filled with eggs, crispy wontons, and flavorful sauces.',
 '1 cup all-purpose flour; 2 eggs; Scallions, cilantro, and crispy wonton pieces; Hoison and chili sauces.',
 'Step 1: Mix flour with water to make a batter. Step 2: Heat a pan, pour batter, and spread evenly. Step 3: Add eggs, sauces, and toppings; fold and serve.',
 '25', 'Easy', 4, 'Chinese', 'image/Jianbing.jpg', 1),

('Tanghulu',
 'Tanghulu is a traditional Chinese snack made of skewered candied fruits, typically hawthorn berries, coated in a hard sugar glaze.',
 '2 cups sugar; 1 cup water; Fresh hawthorn berries or strawberries; Skewers.',
 'Step 1: Skewer the berries and set aside. Step 2: In a pan, boil sugar and water until it reaches a hard-crack stage. Step 3: Dip skewers into the syrup, coating evenly. Step 4: Place on parchment paper to cool and harden.',
 '25', 'Easy', 8, 'Chinese', 'image/Tanghulu.jpg', 1);
 INSERT INTO Recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id) VALUES
 ('the',
 'ytfvhbjnwcsvdfklmbgftypically hawthorn berries, coated in a hard sugar glaze.',
 '2 cups sugar; 1 cup water; Fresh hawthorn berries or strawberries; Skewers.',
 'Step 1: Skewer the berries and set aside. Step 2: In a pan, boil sugar and water until it reaches a hard-crack stage. Step 3: Dip skewers into the syrup, coating evenly. Step 4: Place on parchment paper to cool and harden.',
 '25', 'Easy', 8, 'Arabian', 'image/Tanghulu.jpg', 1);
 
 INSERT INTO recipes (title, description, ingredients, instructions, cooking_time, difficulty, servings, cuisine_type, image_url, user_id, status) 
VALUES 
('Spaghetti Carbonara', 
 'Classic Italian pasta dish with creamy sauce.', 
 'Spaghetti, eggs, parmesan cheese, pancetta, black pepper', 
 '1. Cook spaghetti. 2. Fry pancetta. 3. Mix eggs & cheese. 4. Combine everything.', 
 '30', 
 'Medium', 
 2, 
 'Italian', 
 'uploads/spaghetti.jpg', 
 1, 
 'Pending');
 select * from recipes


 


 select recipe_id, title from recipes;
 
 
 SELECT recipe_id FROM recipes;
 
 select * from recipes
 -- Link Recipes to Categories
INSERT INTO Recipe_Categories (recipe_id, category_id) VALUES 
(18,1);
(19, 2);  -- Tabbouleh -> Lunch
(3, 2),  -- Baba Ganoush -> Lunch
(4, 4),  -- Baklava -> Dessert
(5, 4),  -- Basbousa -> Dessert
(6, 2),  -- Shawarma -> Lunch
(7, 2),  -- Kebabs -> Lunch
(8, 3),  -- Mandi -> Dinner
(9, 2),  -- Shorbat Adas -> Lunch
(10, 2), -- Harira -> Lunch
(11, 2), -- Tagine -> Lunch
(12, 2), -- Doro Wat -> Lunch
(13, 3), -- Shiro -> Dinner
(14, 2), -- Kitfo -> Lunch
(15, 2), -- Salata -> Lunch
(16, 2), -- Berbere Spice Mix -> Lunch
(17, 1), -- Sambussa -> Breakfast
(18, 1), -- Kolo -> Breakfast
(19, 1), -- Dabo Kolo -> Breakfast
(20, 2), -- Gomen -> Lunch
(21, 2), -- Tikil Gomen -> Lunch
(22, 2), -- Kik Alicha -> Lunch
(23, 2), -- Injera -> Lunch
(24, 1), -- Difo Dabo -> Braekfast
(25, 1), -- Habesha Kita -> Breakfast
(26, 3), -- Gyoza -> Dinner
(27, 3), -- Yakitori -> Dinner
(28, 2), -- Agedashi Tofu -> Lunch
(29, 4), -- Mochi -> Desserts
(30, 4), -- Matcha Ice Cream -> Desserts
(31, 4), -- Dorayaki -> Desserts
(32, 2), -- Udon -> Lunch
(33, 2), -- Soba -> Lunch
(34, 2), -- Yakisoba -> Lunch
(35, 2), -- Sushi -> Lunch (Nigiri, Maki, etc.)
(36, 3), -- Donburi -> Dinner
(37, 3), -- Onigiri -> Dinner
(38, 3), -- Tsukemono -> Dinner
(39, 2), -- Sunomono -> Lunch
(40, 2), -- Hijiki Salad -> Lunch
(41, 3), -- Miso Soup -> Dinner
(42, 3), -- Tonjiru -> Dinner
(43, 2), -- Sukiyaki -> Lunch
(44, 2), -- Teriyaki Chicken or Beef -> Lunch
(45, 2), -- Tonkatsu -> Lunch
(46, 2), -- Unagi -> Lunch
(47, 1), -- Samosa -> Breakfast
(48, 1), -- Pakora -> Breakfast 
(49, 1), -- Dahi Puri -> Breakfast
(50, 1), -- Naan -> Breakfast
(51, 1), -- Roti (Chapati) -> Breakfast
(52, 1), -- Puri -> Breakfast
(53, 4),  -- Gulab Jamun -> Dessert
(54, 4),  -- Kheer -> Dessert
(55, 4),  -- Jalebi -> Dessert
(56, 2),  -- Biryani -> Lunch
(57, 2),  -- Butter Chicken -> Lunch
(58, 2),  -- Paneer Tikka Masala -> Lunch
(59, 2),  -- Aloo Gobi -> Lunch
(60, 2),  -- Baingan Bharta -> Lunch
(61, 2),  -- Palak Paneer -> Lunch
(62, 2), -- Antipasto Platter -> Lunch
(63, 2), -- Arancini -> Lunch
(64, 2), -- Stuffed Mushrooms -> Lunch
(65, 4),  -- Tiramisu -> Dessert
(66, 4),  -- Panna Cotta -> Dessert
(67, 4),  -- Zabaglione -> Dessert
(68, 2),  -- Pollo alla Cacciatora -> Lunch
(69, 2),  -- Risotto -> Lunch
(70, 2),  -- Melanzane alla Parmigiana -> Lunch
(71, 2), -- Margherita Pizza -> Lunch
(72, 2), -- Pepperoni Pizza -> Lunch
(73, 2), -- Quattro Stagioni -> Lunch
(74, 2),  -- Caprese Salad -> Lunch
(75, 1), -- Frittata -> Breakfast
(76, 2), -- Caponata -> Lunch
(77, 2), -- Spaghetti Bolognese -> Lunch
(78, 2),  -- Lasagna alla Bolognese -> Lunch
(79, 2), -- Spaghetti alle Vongole -> Lunch
(80, 1),  -- Hummus -> Breakfast
(81, 2), -- Dolma -> Lunch
(82, 1), -- Sigara Böreği -> Breakfast
(83, 4),  -- Baklava -> Dessert
(84, 4),  -- Künefe -> Dessert
(85, 4),  -- Sütlaç -> Dessert
(86, 1),  -- Kebabs -> Lunch
(87, 2), -- Lahmacun -> Lunch
(88, 2), -- Manti -> Lunch
(89, 1),  -- Çoban Salatası -> Breakfast
(90, 1),  -- Piyaz -> Breakfast
(91, 2),  -- Gavurdağı Salatası -> Lunch
(92, 2),  -- Mercimek Çorbası -> Lunch
(93, 3),  -- Tarator -> Dinner
(94, 2), -- Kısır -> Lunch
(95, 1), -- Minute Breakfast Burrito -> Breakfast
(96, 1), -- Fabulous Wet Burritos -> Breakfast
(97, 1), -- Southwestern Breakfast Burritos -> Breakfast
(98, 4),  -- Churro Cheesecake Bars -> Dessert
(99, 4),  -- Churros -> Dessert
(100, 4),  -- Mexican Chocolate Chile Cake -> Dessert
(101, 4),  -- Taquito Casserole -> Lunch
(102, 4),  -- Chicken Adabo Tacos -> Lunch
(103, 1), -- Roscoe's Chilaquiles -> Breakfast
(104, 2), -- Crab Ceviche -> Lunch
(105, 2), -- Elotes -> Lunch
(106, 2), -- Avocado Salad -> Lunch
(107, 2),  -- Loaded Beef Nachos -> Lunch
(108, 2),  -- Super Nachos -> Lunch
(109, 41), -- Seven Layer Party Dip -> Lunch
(110, 2), -- Beef Birria Ramen -> Lunch
(111, 3),  -- Potato soup with chorizo -> Dinner
(112, 2),  -- Green Chicken Enchilada Soup -> Lunch
(113, 1), -- Spring Rolls -> Breakfast
(114, 2), -- Shrimp Toast -> Lunch
(115, 2), -- Cold Sesame Noodles -> Lunch
(116, 2), -- Kung Pao Chicken -> Lunch
(117, 2), -- Mapo Tofu -> Lunch
(118, 2), -- Sweet and Sour Pork -> Lunch
(119, 2),  -- Fried Rice -> Lunch
(120, 2),  -- Chow Mein -> Lunch
(121, 2),  -- Dan Dan Noodles -> Lunch
(122, 2),  -- Hot and Sour Soup -> Dinner
(123, 2),  -- Wonton Soup -> Dinner
(124, 3),  -- Egg Drop Soup -> Dinner 
(125, 1),  -- Baozi -> Breakfast
(126, 1),  -- Jianbing -> Breakfast
(127, 4);  -- Tanghulu -> Dessert
UPDATE Recipes SET status = 'Approved' WHERE recipe_id = 128;

select * from Countries;
SHOW COLUMNS FROM Recipes;




-- Link Recipes to Countries
INSERT INTO Recipe_Countries (recipe_id, country_id) VALUES 
(18, 4),   -- Hummus -> Arabian
(2, 4),   -- Tabbouleh -> Asian
(3, 4),   -- Baba Ganoush -> Asian
(4, 4),   -- Baklava -> Asian
(5, 4),   -- Basbousa -> Asian
(6, 4),   -- Shawarma -> Asian
(7, 4),   -- Kebabs -> Asian
(8, 4),   -- Mandi -> Asian
(9, 4),   -- Shorbat Adas -> Asian
(10, 4),  -- Harira -> Asian
(11, 4),  -- Tagine -> Asian
(12, 5),  -- Doro Wat -> Habeshan
(13, 5),  -- Shiro -> Habeshan
(14, 5),  -- Kitfo -> Habeshan
(15, 5),  -- Salata -> Habeshan
(16, 5),  -- Berbere Spice Mix -> Habeshan
(17, 5),  -- Sambussa -> Habeshan
(18, 5),  -- Kolo -> Habeshan
(19, 5),  -- Dabo Kolo -> Habeshan
(20, 5),  -- Gomen -> Habeshan
(21, 5),  -- Tikil Gomen -> Habeshan
(22, 5),  -- Kik Alicha -> Habeshan
(23, 5),  -- Injera -> Habeshan
(24, 5),  -- Difo Dabo -> Habeshan
(25, 5),  -- Habesha Kita -> Habeshan
(26, 1),  -- Gyoza -> Japanese
(27, 1),  -- Yakitori -> Japanese
(28, 1),  -- Agedashi Tofu -> Japanese
(29, 1),  -- Mochi -> Japanese
(30, 1),  -- Matcha Ice Cream -> Japanese
(31, 1),  -- Dorayaki -> Japanese
(32, 1),  -- Udon -> Japanese
(33, 1),  -- Soba -> Japanese
(34, 1),  -- Yakisoba -> Japanese
(35, 1),  -- Sushi -> Japanese
(36, 1),  -- Donburi -> Japanese
(37, 1),  -- Onigiri -> Japanese
(38, 1),  -- Tsukemono -> Japanese
(39, 1),  -- Sunomono -> Japanese
(40, 1),  -- Hijiki Salad -> Japanese
(41, 1),  -- Miso Soup -> Japanese
(42, 1),  -- Tonjiru -> Japanese
(43, 1),  -- Sukiyaki -> Japanese
(44, 1),  -- Teriyaki Chicken or Beef -> Japanese
(45, 1),  -- Tonkatsu -> Japanese
(46, 1),  -- Unagi -> Japanese
(47, 2),  -- Samosa -> Indian
(48, 5),  -- Pakora -> Indian
(49, 2),  -- Dahi Puri -> Indian
(50, 2),  -- Naan -> Indian
(51, 2),  -- Roti -> Indian
(52, 2),  -- Puri -> Indian
(53, 2),  -- Gulab Jamun -> Indian
(54, 2),  -- Kheer -> Indian
(55, 2),  -- Jalebi -> Indian
(56, 2),  -- Biryani -> Indian
(57, 2),  -- Butter Chicken -> Indian
(58, 2),  -- Paneer Tikka Masala -> Indian
(59, 2),  -- Aloo Gobi -> Indian
(60, 2),  -- Baingan Bharta -> Indian
(61, 2),  -- Palak Paneer -> Indian
(62, 2),  -- Antipasto Platter -> Italian
(63, 3),  -- Arancini -> Italian
(64, 3),  -- Stuffed Mushrooms -> Italian
(65, 3),  -- Tiramisu -> Italian
(66, 3),  -- Panna Cotta -> Italian
(67, 3),  -- Zabaglione -> Italian
(68, 3),  -- Pollo alla Cacciatora -> Italian
(69, 3),  -- Risotto -> Italian
(70, 3),  -- Melanzane alla Parmigiana -> Italian
(71, 3),  -- Margherita Pizza -> Italian
(72, 3),  -- Pepperoni Pizza -> Italian
(73, 3),  -- Quattro Stagioni -> Italian
(74, 3),  -- Caprese Salad -> Italian
(75, 3),  -- Frittata -> Italian
(76, 3),  -- Caponata -> Italian
(77, 3),  -- Spaghetti Bolognese -> Italian
(78, 3),  -- Lasagna alla Bolognese -> Italian
(79, 3),  -- Spaghetti alle Vongole -> Italian
(80, 7),  -- Hummus -> Turkish
(81, 7),  -- Dolma -> Turkish
(82, 7),  -- Sigara Böreği -> Turkish
(83, 7),  -- Baklava -> Turkish
(84, 7),  -- Künefe -> Turkish
(85, 7),  -- Sütlaç -> Turkish
(86, 7),  -- Kebabs -> Turkish
(87, 7),  -- Lahmacun -> Turkish
(88, 7),  -- Manti -> Turkish
(89, 7),  -- Çoban Salatası -> Turkish
(90, 7),  -- Piyaz -> Turkish
(91, 7),  -- Gavurdağı Salatası -> Turkish
(92, 7),  -- Mercimek Çorbası -> Turkish
(93, 7),  -- Tarator -> Turkish
(94, 7),  -- Kısır -> Turkish
(95, 6),  -- Minute Breakfast Burrito -> Mexican
(96, 6),  -- Fabulous Wet Burritos -> Mexican
(97, 6),  -- Southwestern Breakfast Burritos -> Mexican
(98, 6),  -- Churro Cheesecake Bars -> Mexican
(99, 6),  -- Churros -> Mexican
(100, 6), -- Mexican Chocolate Chile Cake -> Mexican
(101, 6), -- Taquito Casserole -> Mexican
(102, 6), -- Chicken Adabo Tacos -> Mexican
(103, 6), -- Roscoe's Chilaquiles -> Mexican
(104, 6), -- Crab Ceviche -> Mexican
(105, 6), -- Elotes -> Mexican
(106, 6), -- Avocado Salad -> Mexican
(107, 6), -- Loaded Beef Nachos -> Mexican
(108, 6), -- Super Nachos -> Mexican
(109, 6), -- Seven Layer Party Dip -> Mexican
(110, 6), -- Beef Birria Ramen -> Mexican
(111, 6), -- Potato soup with chorizo -> Mexican
(112, 6), -- Green Chicken Enchilada Soup -> Mexican
(113, 8), -- Spring Rolls -> Chinese
(114, 8), -- Shrimp Toast -> Chinese
(115, 8), -- Cold Sesame Noodles -> Chinese
(116, 8), -- Kung Pao Chicken -> Chinese
(117, 8), -- Mapo Tofu -> Chinese
(118, 8), -- Sweet and Sour Pork -> Chinese
(119, 8), -- Fried Rice -> Chinese
(120, 8), -- Chow Mein -> Chinese
(121, 8), -- Dan Dan Noodles -> Chinese
(122, 8), -- Hot and Sour Soup -> Chinese
(123, 8), -- Wonton Soup -> Chinese
(124, 8), -- Egg Drop Soup -> Chinese
(125, 8), -- Baozi -> Chinese
(126, 8), -- Jianbing -> Chinese
(127, 8); -- Tanghulu -> Chinese

select * from Recipes;
SELECT image_url FROM Recipes WHERE recipe_id = 18;



-- Duplicate entries error resolves by the below

INSERT INTO Recipe_Tags (recipe_id, tag_id) VALUES 

(19, 1);   -- Tabbouleh -> Quick & Easy
(2, 1),   -- Tabbouleh -> Healthy
(2, 4),   -- Tabbouleh -> Vegan
(3, 1),   -- Baba Ganoush -> Quick & Easy
(3, 2),   -- Baba Ganoush -> Healthy
(4, 2),   -- Baklava -> Popular
(5, 2),   -- Basbousa -> Popular
(6, 2),   -- Shawarma -> Popular
(7, 2),   -- Kebabs -> Popular
(8, 2),   -- Mandi -> Popular
(9, 1),   -- Shorbat Adas -> Quick & Easy
(10, 4),   -- Harira -> Vegan
(11, 2),  -- Tagine -> Popular
(12, 2), -- Doro Wat -> Popular
(13, 1), -- Shiro -> Quick & Easy
(13, 2), -- Shiro -> Popular
(14, 2),  -- Kitfo -> Popular
(15, 1),  -- Salata -> Quick & Easy
(16, 1),  -- Berbere Spice Mix -> Quick & Easy
(17, 2),  -- Sambussa -> Popular
(17, 4),  -- Sambussa -> Vegan
(18, 2),  -- Kolo -> Popular
(19, 2),  -- Dabo Kolo -> Popular
(20, 3),  -- Gomen -> Healthy
(21, 3),  -- Tikil Gomen -> Healthy
(22, 3),  -- Kik Alicha -> Healthy
(23, 2),  -- Injera -> Popular
(24, 2),  -- Difo Dabo -> Popular
(25, 1),  -- Habesha Kita -> Quick & Easy
(26, 1), -- Gyoza -> Quick & Easy
(27, 2), -- Yakitori -> Popular
(28, 1),  -- Agedashi Tofu -> Quick & Easy
(29, 2),  -- Mochi -> Popular
(30, 4),  -- Matcha Ice Cream -> Vegan
(31, 3),  -- Dorayaki -> Healthy
(32, 1),  -- Udon -> Quick & Easy
(33, 1),  -- Soba -> Quick & Easy
(34, 1),  -- Yakisoba -> Quick & Easy
(35, 2),  -- Sushi -> Popular
(35, 1),  -- Sushi -> Quick & Easy
(36, 1),  -- Donburi -> Quick & Easy
(37, 1),  -- Onigiri -> Quick & Easy
(38, 3),  -- Tsukemono -> Healthy
(39, 3),  -- Sunomono -> Healthy
(40, 3),  -- Hijiki Salad -> Healthy
(41, 4),  -- Miso Soup -> Vegan
(42, 4),  -- Tonjiru -> Vegan
(43, 4),  -- Sukiyaki -> Vegan
(44, 2),  -- Teriyaki Chicken or Beef -> Popular
(45, 2),  -- Tonkatsu -> Popular
(46, 2),  -- Unagi -> Popular
(47, 2),  -- Samosa -> Popular
(48, 2), -- Pakora -> Quick & Easy
(48, 3), -- Pakora -> Vegan
(49, 3),  -- Dahi Puri -> Healthy
(50, 1), -- Naan -> Quick & Easy
(50, 4), -- Naan -> Vegan
(51, 1), -- Roti (Chapati) -> Quick & Easy
(52, 2), -- Puri -> Popular
(53, 2), -- Gulab Jamun -> Popular
(54, 2), -- Kheer -> Popular
(55, 2), -- Jalebi -> Popular
(56, 2), -- Biryani -> Popular
(57, 2), -- Butter Chicken -> Popular
(58, 2), -- Paneer Tikka Masala -> Popular
(59, 3),  -- Aloo Gobi -> Healthy
(60, 3), -- Baingan Bharta -> Healthy
(61, 3),  -- Palak Paneer -> Healthy
(62, 2), -- Antipasto Platter -> Popular
(63, 4), -- Arancini -> Vegan
(64, 3), -- Stuffed Mushrooms -> Healthy
(65, 2), -- Tiramisu -> Popular
(66, 1), -- Panna Cotta -> Quick & Easy
(67, 1), -- Zabaglione -> Quick & Easy
(68, 2), -- Pollo alla Cacciatora -> Popular
(69, 2),  -- Risotto -> Healthy
(70, 2), -- Melanzane alla Parmigiana -> Popular
(71, 2), -- Margherita Pizza -> Popular
(72, 2), -- Pepperoni Pizza -> Popular
(73, 2), -- Quattro Stagioni -> Popular
(74, 3), -- Caprese Salad -> Healthy
(75, 1),  -- Frittata -> Quick & Easy
(76, 3),  -- Caponata -> Healthy
(77, 2), -- Spaghetti Bolognese -> Popular
(78, 2), -- Lasagna alla Bolognese -> Popular
(79, 2), -- Spaghetti alle Vongole -> Popular
(80, 1),  -- Hummus -> Quick & Easy
(80, 4),  -- Hummus -> Vegan
(81, 4), -- Dolma -> Vegan
(82, 1), -- Sigara Böreği -> Quick & Easy
(83, 2), -- Baklava -> Popular
(84, 2), -- Künefe -> Popular
(85, 2), -- Sütlaç -> Popular
(86, 2),  -- Kebabs -> Popular
(87, 2), -- Lahmacun -> Popular
(88, 2), -- Manti -> Popular
(89, 3),  -- Çoban Salatası -> Healthy
(90, 3),  -- Piyaz -> Healthy
(91, 3),  -- Gavurdağı Salatası -> Healthy
(92, 1),  -- Mercimek Çorbası -> Quick & Easy
(93, 3,  -- Tarator -> Healthy
(94, 4),  -- Kısır -> Vegan
(95, 3),  -- Minute Breakfast Burrito -> Healthy
(96, 2), -- Fabulous Wet Burritos -> Popular
(97, 2), -- Southwestern Breakfast Burritos -> Popular
(98, 2), -- Churro Cheesecake Bars -> Popular
(99, 2), -- Churros -> Popular
(100, 2), -- Mexican Chocolate Chile Cake -> Popular
(101, 2), -- Taquito Casserole -> Popular
(102, 2), -- Chicken Adabo Tacos -> Populat
(103, 2), -- Roscoe's Chilaquiles -> Popular
(104, 3), -- Crab Ceviche -> Healthy
(105, 3), -- Elotes -> Healthy
(106, 3), -- Avocado Salad -> Healthy
(107, 2), -- Loaded Beef Nachos -> Popular
(108, 2), -- Super Nachos -> Popular
(109, 1), -- Seven Layer Party Dip -> Quick & Easy
(110, 2), -- Beef Birria Ramen -> Popular
(111, 2), -- Potato soup with chorizo -> Healthy
(112, 2), -- Green Chicken Enchilada Soup -> Popular
(113, 1), -- Spring Rolls -> Quick & Easy
(114, 1), -- Shrimp Toast -> Quick & Easy
(115, 3), -- Cold Sesame Noodles -> Healthy
(116, 2), -- Kung Pao Chicken -> Popular
(117, 2), -- Mapo Tofu -> Popular
(118, 2), -- Sweet and Sour Pork -> Popular
(119, 2), -- Fried Rice -> Popular
(120, 2), -- Chow Mein -> Vegan
(121, 2), -- Dan Dan Noodles -> Popular
(122, 3), -- Hot and Sour Soup -> Healthy
(123, 2), -- Wonton Soup -> Popular
(124, 3), -- Egg Drop Soup -> Healthy
(125, 1), -- Baozi -> Quick & Easy
(126, 3), -- Jianbing -> Healthy
(127, 2); -- Tanghulu -> Popular
        
      select * from categories;
      
      show columns from Recipes;
      select * from Users;