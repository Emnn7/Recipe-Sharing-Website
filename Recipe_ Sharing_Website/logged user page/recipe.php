<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="recipe.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>


    <div id="recipe-page" class="recipePage">
        <div class="t1">
        <?php 
    include 'header.php'
    ?>
    
        </div>
        <div class="t2">
            <div class="navv">
                <ul>
                    <li><a href="#" onclick="openBlddPage('Breakfast')">BREAKFAST</a></li>
                    <li><a href="#" onclick="openBlddPage('Lunch')">LUNCH</a></li>
                    <li><a href="#" onclick="openBlddPage('Dinner')">DINNER</a></li>
                    <li><a href="#" onclick="openBlddPage('Dessert')">DESSERT</a></li>
                </ul>
            </div>
            <!-- ARABIAN -->
             <!-- ARABIAN APPETIZERS -->
             <div class="arab">
                <h1>Arabian Appetizers</h1>
                <div class="AA">
                  <div class="category">
                <img src="image/humus.jpg" alt="humus" style="width:150px; height:200px">
                <div class="s2">
                <h2>Hummus</h2>
                <p>Hummus is a delicious and nutritious Middle Eastern dip made from chickpeas, tahini, lemon juice, garlic, and olive oil.</p>
                <button onclick="openRecipePage('Hummus')">MAKE THIS RECIPE</button>
                </div>
                  </div>
                  
                <div class="category">
                    <img src="image/Tabbouleh.jpg" alt="Tabbouleh" style="width:150px; height:200px">
                   <div class="s2">
                    <h2>Tabbouleh</h2>
                    <p>Tabbouleh is a refreshing and healthy Middle Eastern salad made with bulgur wheat, fresh herbs, tomatoes, and a zesty lemon dressing.</p>
                    <button onclick="openRecipePage('Tabbouleh')">MAKE THIS RECIPE</button>
                   </div>
                </div>
                <div class="category">
                    <img src="image/best-baba-ganoush-recipe.png" alt="Baba-ganoush" style="width:150px; height:200px">
                <div class="s2">
                        <h2>Baba Ganoush</h2>
                <p>Baba Ganoush is a smoky and creamy Middle Eastern dip made from roasted eggplants, tahini, olive oil, lemon juice, and garlic.</p>
                <button onclick="openRecipePage('Best-baba')">MAKE THIS RECIPE</button>
                    </div>
                </div>
                 </div>
                 
                <!-- ARABIAN DESSERTS -->
                <h1>Arabian Desserts</h1>
                <div class="AA">
                <div class="category">
                    <img src="image/Baklava.jpg" alt="Baklava" style="width:150px; height:200">
                <div class="s2">
                    <h2>Baklava</h2>
                <p>Baklava is a rich, sweet pastry made of layers of filo dough filled with chopped nuts and sweetened with honey or syrup.</p>
                <button onclick="openRecipePage('Baklava')">MAKE THIS RECIPE</button>
            
                </div>
                </div>
                <div class="category">
                    <img src="image/Kunafa.jpg" alt="kunafa" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Kunafa</h2>
                <p>Kunafa is a traditional Middle Eastern dessert made with shredded phyllo dough, filled with cheese, and soaked in sweet syrup.</p>
                <button onclick="openRecipePage('Kunafa')">MAKE THIS RECIPE</button>
                </div>
                </div>
                <div class="category">
                    <img src="image/Basbousa.jpg" alt="Basbousa" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Basbousa</h2>
                <p>Basbousa is a semolina-based sweet cake soaked in syrup.</p>
                <button onclick="openRecipePage('Basbousa')">MAKE THIS RECIPE</button>
                </div>
                </div>
                </div>
                
                <!-- ARABIAN MAIN DISH -->
                <h1>Arabian Main Dish</h1>
               <div class="AA">
                <div class="category">
                    <img src="image/shawarma.jpg" alt="shawarma" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Shawarma</h2>
                <p>Shawarma is a popular Middle Eastern street food made with marinated and roasted meat.</p>
                <button onclick="openRecipePage('Shawarma')">MAKE THIS RECIPE</button>
                </div>
                </div>
                <div class="category">
                    <img src="image/kebab.jpg" alt="kebab" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Kebabs</h2>
                <p>Kebabs are skewered and grilled pieces of seasoned meat, often paired with vegetables.</p>
                <button onclick="openRecipePage('Kebab')">MAKE THIS RECIPE</button>
            
                </div>
                </div>
                <div class="category">
                    <img src="image/mandi.jpg" alt="mandi" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Mandi</h2>
                <p>Mandi is a traditional Arabian rice and meat dish cooked with fragrant spices.</p>
                <button onclick="openRecipePage('Mandi')">MAKE THIS RECIPE</button>
                </div>
                </div>
               </div>
            
                <!-- ARABIAN SOUPS AND STEWS -->
                <h1>Arabian Soups and Stews</h1>
                <div class="AA">
            
                <div class="category">
                    <img src="image/Shorbat-adas.jpg" alt="Shorbat-adas" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Shorbat Adas</h2>
                <p>Shorbat Adas, a hearty lentil soup, is a staple in Middle Eastern cuisine, offering a warm, and nutritious meal.</p>
                <button onclick="openRecipePage('Shorbat Adas')">MAKE THIS RECIPE</button>
                </div>
                </div>
               <div class="category">
                <img src="image/Harrira.jpg" alt="Harira" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Harira</h2>
                <p>Harira is a Moroccan soup known for its rich flavors and nourishing ingredients, traditionally served during Ramadan.</p>
                <button onclick="openRecipePage('Harira')">MAKE THIS RECIPE</button>
                </div>
               </div>
               <div class="category">
                <img src="image/Tagine.jpg" alt="Tagine" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Tagine</h2>
                <p>Tagine is a slow-cooked stew originating from North Africa, combining meat, vegetables, and aromatic spices.</p>
                <button onclick="openRecipePage('Tagine')">MAKE THIS RECIPE</button>
                </div>
               </div>
    </div>
    
                </div>
            
            <!-- HABESHA -->
             <!-- HABESHA MAIN DISH -->
             <div class="arab">
                <h1>Habeshan-Main-Dishes</h1>
                <div class="AA">
                 <div class="category">
                    <img src="image/Doro-wot.jpg" alt="Doro wot" style="width:150px; height:200px">
                 <div class="s2">
                    <h2>Doro Wat (Spicy Chicken Stew)</h2>
                 <p>Doro Wat is a rich and flavorful spicy chicken stew, one of the most iconic dishes of Ethiopian cuisine.</p>
                 <button onclick="openRecipePage('Doro Wat (Spicy Chicken Stew)')">MAKE THIS RECIPE</button>
                 </div>
                 </div>
                 <div class="category">
                    <img src="image/shiro.jpg" alt="shiro" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Shiro (Chickpea Stew)</h2>
                    <p>Shiro is made from ground chickpeas, creating a thick, hearty stew with a rich flavor from the blend of spices.</p>
                   <button onclick="openRecipePage('Shiro (Chickpea Stew)')">MAKE THIS RECIPE</button>
                </div>
                 </div>
                 
                 <div class="category">
                    <img src="image/Kitfo.jpg" alt="kitfo" style="width:150px; height:200px">
                 <div class="s2">
                    <h2>Kitfo (Minced Raw Beef)</h2>
                 <p>Kitfo is a traditional Ethiopian dish of finely minced raw beef, flavored with spiced clarified butter (niter kibbeh).</p>
                 <button onclick="openRecipePage('Kitfo (Minced Raw Beef)')">MAKE THIS RECIPE</button>
                 </div>
                 </div>
                 </div>
                 <!-- HABESHAN SIDE DISHES -->
                 <h1>Habeshan Side Dishes</h1>
                 <div class="AA">
                 <div class="category">
                    <img src="image/salata.jpg" alt="salata" style="width:150px; height:200px">
                 <div class="s2">
                    <h2>Salata</h2>
                 <p>Salata is a refreshing Ethiopian side dish made from a mix of fresh vegetables.</p>
                 <button onclick="openRecipePage('Salata')">MAKE THIS RECIPE</button>
                 </div>
                 </div>
                 <div class="category">
                    <img src="image/awaze.jpg" alt="awaze" style="width:150px; height:200px">
                 <div class="s2">
                    <h2>Berbere Spice Mix (Awaze)</h2>
                <p>Berbere is a spicy and flavorful Ethiopian spice mix used in a variety of dishes, from stews to meats.</p>
                <button onclick="openRecipePage('Berbere Spice Mix (Awaze)')">MAKE THIS RECIPE</button>
                 </div>
                 </div>
                 </div>
                <!-- HABESHAN SNACKS & STREET FOODS -->
                <h1>Habeshan Snacks & Street Foods</h1>
                <div class="AA">
                <div class="category">
                    <img src="image/sambussajpg.jpg" alt="sambussa" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Sambussa</h2>
                <p>Sambussa is a popular Ethiopian snack filled with lentils or minced meat, wrapped in a crispy dough, and deep-fried.</p>
                <button onclick="openRecipePage('Sambussa')">MAKE THIS RECIPE</button>
                </div>
            
                </div>
                <div class="category">
                    <img src="image/kolo.jpg" alt="kolo" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Kolo</h2>
                <p>Kolo is a traditional Ethiopian snack made from roasted barley or other grains.</p>
                <button onclick="openRecipePage('Kolo')">MAKE THIS RECIPE</button>
                </div>
            
                </div>
                <div class="category">
                    <img src="image/dabo-kolo.jpg" alt="dabo-kolo" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Dabo Kolo</h2>
                <p>Dabo Kolo is a crunchy Ethiopian snack, similar to small, savory biscuits, often enjoyed with a cup of tea or coffee.</p>
                <button onclick="openRecipePage('Dabo Kolo')">MAKE THIS RECIPE</button>
                </div>
                </div>
                </div>
            
                <!-- HABESHAN VEGAN DISHES -->
                <h1>Ethiopian Vegan Dishes</h1>
                <div class="AA">
                <div class="category">
                    <img src="image/gomen.jpg" alt="gomen"style="width:150px; height:200px">
               <div class="s2">
                <h2>Gomen</h2>
                <p>Gomen is a traditional Ethiopian dish made from collard greens or kale. It's vegetarian or vegan meal.</p>
                <button onclick="openRecipePage('Gomen')">MAKE THIS RECIPE</button>
               </div>
                </div>
                <div class="category">
                    <img src="image/tikil-gomen.jpg" alt="tikil gomen"style="width:150px; height:200px">
                <div class="s2">
                    <h2>Tikil Gomen</h2>
                <p>Tikil Gomen is a flavorful Ethiopian dish made with cabbage, carrots, and a mix of spices.</p>
                <button onclick="openRecipePage('Tikil Gomen')">MAKE THIS RECIPE</button>
                </div>
                </div>
            
                <div class="category">
                    <img src="image/kik-alicha.jpg" alt="kik"style="width:150px; height:200px">
                <div class="s2">
                    <h2>Kik Alicha</h2>
                <p>Kik Alicha is a comforting Ethiopian dish made with split yellow peas, garlic, ginger, and turmeric.</p>
                <button onclick="openRecipePage('Kik Alicha')">MAKE THIS RECIPE</button>
                </div>
                </div>
                </div>
                
                <!-- INJERA AND BREADS -->
                <h1>Injera and Breads</h1>
                <div class="AA">
                <div class="category">
                    <img src="image/Injera.jpg" alt="Injera" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Injera</h2>
                <p>Injera is a traditional Ethiopian flatbread, fermented and spongy in texture. It is commonly used as a base for various Ethiopian stews and dishes.</p>
                <button onclick="openRecipePage('Injera')">MAKE THIS RECIPE</button>
                </div>
                </div>
                <div class="category">
                    <img src="image/Difo-Dabo.jpg" alt="Difo-Dabo" style="width:150px; height:200px">
               <div class="s2">
                <h2>Difo Dabo (Ethiopian Bread)</h2>
                <p>Difo Dabo is a traditional Ethiopian bread with a slightly sweet flavor and a soft, fluffy texture.</p>
                <button onclick="openRecipePage('Difo Dabo')">MAKE THIS RECIPE</button>
               </div>
                </div>
                <div class="category">
                    <img src="image/Kita.jpg" alt="Kita" style="width:150px; height:200px">
                <div class="s2">
                    <h2>Habesha Kita (Ethiopian Flatbread)</h2>
                <p>Habesha Kita is a soft, slightly thick flatbread that is commonly served with Ethiopian stews and dishes.</p>
                <button onclick="openRecipePage('Habesha Kita (Ethiopian Flatbread)')">MAKE THIS RECIPE</button>
                </div>
            
                </div>
                </div>
             </div>
             <!-- JAPANESE -->
              <!-- JAPANESE APPETIZERS -->
               <div class="arab">
                <h1>Japanese Appetizers (前菜 - Zensai)</h1>
                <div class="AA">
                   <div class="category">
                     <img src="image/Gyoza (Dumplings).jpg" alt="Gyoza" style="width:150px; height:200px">
                   <div class="s2">
                     <h2>Gyoza (Dumplings)</h2>
                   <p> Gyoza are Japanese dumplings filled with ground meat and vegetables, pan-fried to crispy perfection.</p>
                   <button onclick="openRecipePage('Gyoza (Dumplings)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                   <div class="category">
                     <img src="image/Yakitori (Grilled Chicken Skewers).jpg" alt="Yakitori" style="width:150px; height:200px">
                   <div class="s2">
                     <h2>Yakitori (Grilled Chicken Skewers)</h2>
                 <p>Yakitori are grilled chicken skewers seasoned with a savory marinade and grilled to perfection.</p>
                 <button onclick="openRecipePage('Yakitori (Grilled Chicken Skewers)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                   <div class="category">
                     <img src="image/Agedashi Tofu (Fried Tofu).jpg" alt="Agedashi Tofu" style="width:150px; height:200px">
                 <div class="s2">
                     <h2>Agedashi Tofu (Fried Tofu)</h2>
                 <p> Agedashi Tofu features deep-fried tofu served in a savory dashi broth, garnished with green onions and daikon.</p>
                 <button onclick="openRecipePage('Agedashi Tofu (Fried Tofu)')">MAKE THIS RECIPE</button>
                 </div>
                   </div>
                </div>
               <!-- JAPANESE DESSERT -->
               <h1>Japanese Desserts (デザート - Dezaato)</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/Mochi.jpg" alt="Mochi" style="width:150px;height:200px">
                       <div class="s2">
                           <h2>Mochi</h2> 
                       <p> Mochi is a traditional Japanese rice cake made from glutinous rice, known for its chewy texture.</p>
                       <button onclick="openRecipePage('Mochi')">MAKE THIS RECIPE</button>
                       </div>
                   </div>
                   <div class="category">
                       <img src="image/Matcha Ice Cream.jpg" alt="Matcha Ice-Cream" style="width:150px;height:200px"> 
                      <div class="s2">
                       <h2>Matcha Ice Cream</h2>
                       <p> Matcha ice cream is a creamy and smooth dessert made with green tea powder, offering a balance of sweetness and earthy flavor.</p>
                       <button onclick="openRecipePage('Matcha Ice Cream')">MAKE THIS RECIPE</button>
                      </div>
                   </div>
                   <div class="category">
                       <img src="image/Dorayaki (Red Bean Pancakes.jpg" alt="Dorayki" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Dorayaki (Red Bean Pancakes)</h2> 
                           <p> Dorayaki consists of two fluffy pancakes filled with sweet red bean paste. It's a beloved snack in Japan.</p>
                       <button onclick="openRecipePage('Dorayaki (Red Bean Pancakes)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                       
                     </div>
                   <!-- NOODLE DISHES -->
                   <h1>Japanese Noodle Dishes (麺類 - Menrui)</h1>
                   <div class="AA">
                   <div class="category">
                       <img src="image/Udon.jpg" alt="Udon" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Udon</h2>
                       <p>Thick, chewy Japanese noodles served in a flavorful broth.</p>
                       <button onclick="openRecipePage('Udon')">MAKE THIS RECIPE</button>
                       </div>
                   </div>
                   <div class="category">
                       <img src="image/Soba.jpg" alt="Soba" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Soba</h2>
                       <p>Traditional Japanese buckwheat noodles served in a light broth.</p>
                       <button onclick="openRecipePage('Soba')">MAKE THIS RECIPE</button>
                   </div>
                       </div>
                       <div class="category">
                           <img src="image/Yakisoba (Fried Noodles).jpg" alt="Yakisoba" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Yakisoba (Fried Noodles)</h2>
                       <p>Stir-fried noodles with vegetables and a savory sauce.</p>
                       <button onclick="openRecipePage('Yakisoba (Fried Noodles)')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                   </div>
                       <!-- RICE DISHES -->
                       <h1>Japanese Rice Dishes (ご飯 - Gohan)</h1>
                       <div class="AA">
                           <div class="category">
                           <img src="image/Sushi (Nigiri, Maki, etc.).jpg" alt="Sushi" style="width:150px;height:200px">
                           <div class="s2">
                               <h2>Sushi (Nigiri, Maki, etc.)</h2>
                           <p>A traditional Japanese dish featuring vinegared rice and various toppings or fillings.</p>
                           <button onclick="openRecipePage('Sushi (Nigiri, Maki, etc.)')">MAKE THIS RECIPE</button>
                           </div>
                       </div>
                       <div class="category">
                           <img src="image/Donburi (Rice Bowls).jpg" alt="Donburi" style="width:150px;height:200px">
                          <div class="s2">
                           <h2>Donburi (Rice Bowls)</h2>
                           <p>Hearty Japanese rice bowls with various toppings like Gyudon (beef) or Katsudon (pork cutlet).</p>
                           <button onclick="openRecipePage('Donburi (Rice Bowls)')">MAKE THIS RECIPE</button>
                          </div>
                       </div>
                       <div class="category">
                           <img src="image/Onigiri (Rice Balls).jpg" alt="Onigri" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Onigiri (Rice Balls)</h2>
                   <p>Japanese rice balls with various fillings wrapped in seaweed.</p>
                   <button onclick="openRecipePage('Onigiri (Rice Balls)')">MAKE THIS RECIPE</button>
                   </div>
                       </div>
           </div>
                   <!-- JAPANESE SIDE DISHES -->
                   <h1>Japanese Side Dishes (副菜 - Fukusai)</h1>
                   <div class="AA">
                       <div class="category">
                           <img src="image/Tsukemono (Pickled Vegetables).jpg" alt="Tsukemono"style="width:150px;height:200px">
                      <div class="s2">
                       <h2>Tsukemono (Pickled Vegetables)</h2>
                       <p> Tsukemono are traditional Japanese pickled vegetables that add flavor and texture to any meal.</p>
                       <button onclick="openRecipePage('Tsukemono (Pickled Vegetables)')">MAKE THIS RECIPE</button>
                      </div>
                       </div>
                       <div class="category">
                           <img src="image/Sunomono (Vinegared Salads).jpg" alt="Sunomono"style="width:150px;height:200px">
                      <div class="s2">
                       <h2>Sunomono (Vinegared Salads)</h2>
                       <p> Sunomono is a refreshing vinegared salad often made with cucumbers and seafood.</p>
                       <button onclick="openRecipePage('Sunomono (Vinegared Salads)')">MAKE THIS RECIPE</button>
                      </div>
                       </div>
                      <div class="category">
                       <img src="image/Hijiki Salad.jpg" alt="Hijiki"style="width:150px;height:200px">
                       <div class="s2">
                           <h2>Hijiki Salad</h2>
                       <p> Hijiki salad is a nutritious dish made with hijiki seaweed and various vegetables.</p>
                       <button onclick="openRecipePage('Hijiki Salad')">MAKE THIS RECIPE</button>
                       </div>
                      </div>
                   </div>
           
               <!-- JAPANESE SOUPS & STEWS -->
               <h1> Japanese Soups and Stews (スープと煮物 - Suupu to Nimono)</h1>
               <div class="AA">
               <div class="category">
                   <img src="image/Miso Soup.jpg" alt="Miso soup"style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Miso Soup</h2>
                   <p>A traditional Japanese soup with a savory miso-based broth.</p>
                   <button onclick="openRecipePage('Miso Soup')">MAKE THIS RECIPE</button>
                   </div>
               </div>
               <div class="category">
                   <img src="image/Tonjiru (Pork and Vegetable Miso Soup).jpg" alt="Tonjiru"style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Tonjiru (Pork and Vegetable Miso Soup)</h2>
                   <p>A hearty miso soup with pork and a variety of vegetables.</p>
                   <button onclick="openRecipePage('Tonjiru (Pork and Vegetable Miso Soup)')">MAKE THIS RECIPE</button>
                   </div>
               </div>
               <div class="category">
                   <img src="image/Sukiyaki (Beef Hot Pot).jpg" alt="sukiyaki"style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Sukiyaki (Beef Hot Pot)</h2>
                   <p>A sweet and savory hot pot featuring thinly sliced beef and vegetables.</p>
                   <button onclick="openRecipePage('Sukiyaki (Beef Hot Pot)')">MAKE THIS RECIPE</button>
                   </div>
               </div>
               </div>
           
                   <!-- MAIN DISHES -->
                   <h1>Japanese Main Dishes</h1>
                   <div class="AA">
                       <div class="category">
                           <img src="image/Teriyaki Chicken or Beef.jpg" alt="Teriyaki" style="width:150px;height:200px">
                       <div class="s2">
                           <h2>Teriyaki Chicken or Beef</h2>
                       <p> Teriyaki is a popular Japanese dish where chicken or beef is grilled and glazed with a sweet soy sauce-based marinade.</p>
                       <button onclick="openRecipePage('Teriyaki Chicken or Beef')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                       <div class="category">
                           <img src="image/Tonkatsu (Breaded Pork Cutlet).jpg" alt="Tonkatsu" style="width:150px;height:200px">
                       <div class="s2">
                           <h2>Tonkatsu (Breaded Pork Cutlet)</h2>
                       <p> Tonkatsu is a breaded and deep-fried pork cutlet served with a tangy tonkatsu sauce.</p>
                       <button onclick="openRecipePage('Tonkatsu (Breaded Pork Cutlet)')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                       <div class="category">
                           <img src="image/Unagi (Grilled Eel).jpg" alt="Unagi" style="width:150px;height:200px">
                       <div class="s2">
                           <h2>Unagi (Grilled Eel)</h2>
                   <p> Unagi is grilled eel glazed with a sweet soy-based sauce, often served over rice.</p>
                   <button onclick="openRecipePage('Unagi (Grilled Eel)')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                   </div>
               </div>
            <!-- INDIAN -->
             <!-- APPETIZERS -->
             <div class="arab">
                <h1>Indian Appetizers</h1>
                <div class="AA">
                   <div class="category">
                       <img src="image/Indian-Samsosa.jpg" alt="Indian Samosa" style="width:150px;height:200px">
                    <div class="s2">
                       <h2>Samosa</h2>
                    <p>A classic Indian snack, samosas are crispy pastries filled with spiced potatoes and peas.</p>
                    <button onclick="openRecipePage('Samosa')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
               
                    <div class="category">
                       <img src="image/Pakora.jpg" alt="Pakora" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Pakora</h2>
                       <p>Pakoras are crispy, deep-fried fritters made with chickpea flour and a mix of flavorful spices.</p>
                       <button onclick="openRecipePage('Pakora')">MAKE THIS RECIPE</button>
                   </div>
                    </div>
                   
                    <div class="category">
                       <img src="image/Dahi Puri.jpg" alt="Dahi Puri" style="width:150px;height:200px">
                    <div class="s2">
                       <h2>Dahi Puri</h2>
                    <p>Dahi Puri is a popular Indian street food featuring crispy puris filled with yogurt, chutneys, and spices.</p>
                    <button onclick="openRecipePage('Dahi Puri')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                </div>
                <!-- Breads -->
                <h1>Indian Breads</h1>
                <div class="AA">
                   <div class="category">
                       <img src="image/Naan.jpg" alt="Naan" style="width:150px;height:200px">
                    <div class="s2">
                       <h2>Naan</h2>
                    <p>Naan is a soft, leavened flatbread commonly enjoyed with curries and savory dishes.</p>
                    <button onclick="openRecipePage('Naan')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
               
                    <div class="category">
                       <img src="image/Roti (Chapati).jpg" alt="Roti" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Roti (Chapati)</h2>
                       <p>Roti or chapati is a traditional unleavened flatbread often served with curries and vegetables.</p>
                       <button onclick="openRecipePage('Roti (Chapati)')">MAKE THIS RECIPE</button>
                   </div>
                    </div>
                    <div class="category">
                       <img src="image/Puri.jpg" alt="Puri" style="width:150px;height:200px">
                    <div class="s2">
                       <h2>Puri</h2>
                    <p>Puri is a deep-fried, puffed bread often enjoyed with curries and sweet dishes.</p>
                    <button onclick="openRecipePage('Puri')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                </div>
                <!-- DESSERTS -->
                <h1>Indian Desserts</h1>
                <div class="AA">
                   <div class="category">
                       <img src="image/Gulab Jamun.jpg" alt="Gulab Jamun" style="width:150px;height:200PX">
                    <div class="S2">
                       <h2>Gulab Jamun</h2>
                    <p>Gulab Jamun is a classic Indian dessert made from milk solids, deep-fried and soaked in aromatic sugar syrup.</p>
                    <button onclick="openRecipePage('Gulab Jamun')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                    <div class="category">
                       <img src="image/Kheer.jpg" alt="Kheer" style="width:150px;height:200px">
                    <div class="s2">
                       <h2>Kheer</h2>
                   <p>Kheer is a rich and creamy rice pudding cooked with milk, sugar, and flavored with cardamom and nuts.</p>
                   <button onclick="openRecipePage('Kheer')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                    <div class="category">
                       <img src="image/Jalebi.jpg" alt="Jalebi" style="width:150px;height:200px">
                       <div class="s2">
                           <h2>Jalebi</h2>
                       <p>Jalebi is a crispy, syrup-soaked dessert made from fermented flour batter, enjoyed for its sweet and tangy taste.</p>
                       <button onclick="openRecipePage('Jalebi')">MAKE THIS RECIPE</button>
                        </div>
                </div>
               </div>
                <!-- MAIN DISHES -->
                <h1>Indian Main Dishes</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/Indian-Biryani.jpg" alt="Indian-Biryani" style="width:150px;height:200px">
                       <div class="s2"> 
                           <h2>Biryani</h2>
                           <p>Aromatic and flavorful Biryani is a rich, spiced rice dish with layers of meat or vegetables, seasoned with whole spices and garnished with fresh herbs.</p>
                           <button onclick="openRecipePage('Biryani')">MAKE THIS RECIPE</button>
                       </div>
                   </div>
               
                   <div class="category">
                       <img src="image/Butter Chicken (Murgh Makhani).jpg" alt="Butter chicken" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Butter Chicken (Murgh Makhani)</h2>
                   <p>Butter Chicken is a creamy, tomato-based curry featuring tender chicken pieces cooked in a rich, spiced gravy with a hint of sweetness.</p>
                   <button onclick="openRecipePage('Butter Chicken (Murgh Makhani)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                   <div class="category">
                       <img src="image/Paneer Tikka Masala.jpg" alt="Paneer tikka masala" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Paneer Tikka Masala</h2>
                   <p>Paneer Tikka Masala is a spicy, creamy curry with grilled paneer cubes simmered in a flavorful tomato-based sauce.</p>
                   <button onclick="openRecipePage('Paneer Tikka Masala')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               </div>
               <!--  SIDE DISHES-->
               <h1>Indian Side Dishes</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/Aloo Gobi.jpg" alt="Aloo Gobi" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Aloo Gobi</h2>
                   <p>Aloo Gobi is a flavorful Indian vegetarian dish made with potatoes (aloo) and cauliflower (gobi), cooked with aromatic spices.</p>
                   <button onclick="openRecipePage('Aloo Gobi')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                   <div class="category">
                       <img src="image/Baingan Bharta.jpg" alt="Baingan Bharta" style="width:150px;height:200px">
                  <div class="s2">
                   <h2>Baingan Bharta</h2>
                   <p>Baingan Bharta is a smoky-flavored dish made with roasted eggplant, cooked with onions, tomatoes, and Indian spices.</p>
                   <button onclick="openRecipePage('Baingan Bharta')">MAKE THIS RECIPE</button>
                  </div>
                   </div>
               
                   <div class="category">
                       <img src="image/Palak Paneer.jpg" alt="Palak Paneer" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Palak Paneer</h2>
                   <p>Palak Paneer is a classic North Indian dish made with soft paneer cubes simmered in a creamy spinach gravy.</p>
                   <button onclick="openRecipePage('Palak Paneer')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               </div>
             </div>
        
            <!-- ITALIAN -->
             <!-- APPETIZERS -->
             <div class="arab">
                <h1>Italian Appetizers</h1>
                <div class="AA">
                <div class="category">
                   <img src="image/Antipasto Platter.jpg" alt="Antipasto" style="width:150px; height:200px">
                   <div class="s2">
                      <h2>Antipasto Platter</h2>
                   <p>A classic Italian starter featuring a selection of cured meats, cheeses, olives, and marinated vegetables.</p>
                   <button onclick="openRecipePage('Antipasto Platter')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                   <div class="category">
                      <img src="image/Arancini.jpg" alt="Arancini" style="width:150px; height:200px">
                   <div class="s2">
                      <h2>Arancini</h2>
                  <p>Crispy, golden-fried rice balls filled with gooey mozzarella and savory meat or peas.</p>
                  <button onclick="openRecipePage('Arancini')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                  <div class="category">
                      <img src="image/Stuffed Mushrooms.jpg" alt="Stuffed Mushrooms" style="width:150px; height:200px">
                      <div class="s2">
                         <h2>Stuffed Mushrooms</h2>
                             <p>Delicious mushroom caps filled with a savory mix of breadcrumbs, garlic, herbs, and Parmesan cheese, baked to perfection.</p>
                             <button onclick="openRecipePage('Stuffed Mushrooms')">MAKE THIS RECIPE</button>
                      </div>
                  </div>
                </div>
                <!-- MAIN DISHES -->
                <h1>Italian Main Dishes</h1>
               
                <div class="AA">
                   <div class="category">
                       <img src="image/Pollo alla Cacciatora.jpg" alt="Pollo alla cacciatora" style="width:150px; height:200px">
                    <div class="s2">
                       <h2>Pollo alla Cacciatora</h2>
                    <p>A hearty Italian chicken dish cooked in a rich tomato and olive sauce, perfect for family dinners.</p>
                    <button onclick="openRecipePage('Pollo alla Cacciatora')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                    <div class="category">
                       <img src="image/Risotto.jpg" alt="Risotta" style="width:150px; height:200px">
                    <div class="s2">
                       <h2>Risotto</h2>
                           <p>A creamy and flavorful Italian rice dish cooked with broth, wine, and Parmesan cheese.</p>
                           <button onclick="openRecipePage('Risotto')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                    <div class="category">
                       <img src="image/Melanzane alla Parmigiana.jpg" alt="Melanzane" style="width:150px; height:200px">
                    <div class="s2">
                       <h2>Melanzane alla Parmigiana</h2>
                    <p>A classic Italian baked eggplant dish layered with marinara sauce, mozzarella, and Parmesan cheese.</p>
                    <button onclick="openRecipePage('Melanzane alla Parmigiana')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                </div>
                <!-- PASTA -->
                 <h1>Italian Pasta</h1>
                 <div class="AA">
                   <div class="category">
                       <img src="image/Spaghetti Bolognese.jpg" alt="Spaghetti" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Spaghetti Bolognese</h2>
                       <p>A hearty and classic Italian pasta dish featuring a rich, meaty tomato sauce served over perfectly cooked spaghetti.</p>
                       <button onclick="openRecipePage('Spaghetti Bolognese')">MAKE THIS RECIPE</button>
                   </div>
                     </div>
               
                     <div class="category">
                       <img src="image/Lasagna alla Bolognese.jpg" alt="A slice of Lasagna alla Bolognese" style="width:150px; height:200px">
                          <div class="s2">
                           <h2>Lasagna alla Bolognese</h2>
                           <p>A traditional Italian layered pasta dish made with rich Bolognese meat sauce, creamy béchamel, and tender lasagna sheets.</p>
                           <button onclick="openRecipePage('Lasagna alla Bolognese')">MAKE THIS RECIPE</button>
                          </div>
                     </div>
                       
                     <div class="category">
                       <img src="image/Spaghetti alle Vongole.jpg" alt="Spaghetti alle Vongole served with fresh parsley and clams" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Spaghetti alle Vongole</h2>
                           <p>Spaghetti alle Vongole is a classic Italian seafood pasta dish made with fresh clams, garlic, olive oil, white wine, and parsley.</p>
                           <button onclick="openRecipePage('Spaghetti alle Vongole')">MAKE THIS RECIPE</button>
                       </div>
                     </div>    
                 </div>
            
                 <!-- PIZZA -->
                  <h1>Pizza's</h1>
            
                 <div class="AA">
                   <div class="category">
                       <img src="image/Margherita Pizza.jpg" alt="Margherita" style="width:150px; height:200px">
                     <div class="s2">
                       <h2>Margherita Pizza</h2>
                     <p>A classic Italian pizza featuring a thin crust topped with tomato sauce, fresh mozzarella, and basil leaves, representing the colors of the Italian flag.</p>
                     <button onclick="openRecipePage('Margherita Pizza')">MAKE THIS RECIPE</button>
                     </div>
                     </div>
                     <div class="category">
                       <img src="image/Pepperoni Pizza.jpg" alt="Pepperoni" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Pepperoni Pizza</h2>
                       <p>A popular pizza loaded with tomato sauce, mozzarella cheese, and spicy pepperoni slices, perfect for a satisfying meal.</p>
                       <button onclick="openRecipePage('Pepperoni Pizza')">MAKE THIS RECIPE</button>
                       </div>
                     </div>
               
                       <div class="category">
                           <img src="image/Quattro Stagioni.jpg" alt="Quattro" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Quattro Stagioni</h2>
                       <p>A unique pizza divided into four sections, each representing a season, with toppings like artichokes, mushrooms, ham, and olives.</p>
                       <button onclick="openRecipePage('Quattro Stagioni')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                 </div>
            
               <!-- SIDE DISHES -->
               <h1>Italian Side Dishes</h1>
               
               <div class="AA">
                   <div class="category">
                       <img src="image/Caprese Salad.jpg" alt="Caprese salad" style="width:150px; height:200px">       
                   <div class="s2">
                       <h2>Caprese Salad</h2>
                   <p>A refreshing salad featuring ripe tomatoes, fresh mozzarella, and basil leaves, drizzled with balsamic glaze and olive oil.</p>
                   <button onclick="openRecipePage('Caprese Salad')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                       <div class="category">
                           <img src="image/Frittata.jpg" alt="Frittata" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Frittata</h2>
                       <p>A versatile Italian egg dish filled with a delicious combination of vegetables, cheese, and seasonings, perfect for any meal.</p>
                       <button onclick="openRecipePage('Frittata')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                           <div class="category">
                               <img src="image/Caponata.jpg" alt="Caponata" style="width:150px; height:200px">
                           <div class="s2">
                               <h2>Caponata</h2>
                           <p>A savory Sicilian vegetable dish made with eggplant, tomatoes, and olives, offering a perfect balance of sweet and tangy flavors.</p>
                           <button onclick="openRecipePage('Caponata')">MAKE THIS RECIPE</button>
                           </div>
                           </div>
               </div>
            
               <!-- DESSERTS -->
            
               <h1>Italian Desserts</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/Tiramisu.jpg" alt="Tiramisu" style="width:150px; height:200px">
                          <div class="S2">
                           <h2>Tiramisu</h2>
                   <p>A classic Italian dessert made with layers of coffee-soaked ladyfingers, creamy mascarpone, and a dusting of cocoa powder.</p>
                   <button onclick="openRecipePage('Tiramisu')">MAKE THIS RECIPE</button>
                          </div>
                   </div>
                  <div class="category">
                   <img src="image/Panna Cotta.jpg" alt="Panna Cotta" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Panna Cotta</h2>
                   <p>A silky, creamy dessert made from sweetened cream thickened with gelatin, served with a fruit sauce or fresh berries.</p>
                   <button onclick="openRecipePage('Panna Cotta')">MAKE THIS RECIPE</button>
                   </div>
                  </div>
                  <div class="category">
                   <img src="image/Zabaglione.jpg" alt="Zabaglione" style="width:150px; height:200px">
                  <div class="s2">
                   <h2>Zabaglione</h2>
                  <p>A light and airy Italian custard dessert made with egg yolks, sugar, and sweet wine, often served with fresh fruit or cookies.</p>
                  <button onclick="openRecipePage('Zabaglione')">MAKE THIS RECIPE</button>
                  </div>
                  </div>
               </div>
            
             </div>
        <!-- TURKISH -->
         <!-- APPETIZERS -->
    
        <div class="arab">
            <h1>Turkish Appetizers</h1>
            
                <div class="AA">
                   <div class="category">
                       <img src="image/Turkish-Humus.jpg" alt="Traditional Turkish Hummus served in a bowl" style="width:150px; height:200px">
                    <div class="s2">
                       <h2>Hummus</h2>
                <p>
                    A creamy and delicious dip made from blended chickpeas, tahini, lemon juice, and garlic.
                </p>
                <button onclick="openRecipePage('Turkish-Hummus')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
               
                    <div class="category">
                       <img src="image/Dolma.jpg" alt="Stuffed grape leaves Dolma served on a plate" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Dolma</h2>
               <p>
                   Dolma is a traditional Mediterranean and Middle Eastern dish made with grape leaves stuffed with a mixture of rice, herbs, and spices.
               </p>
               <button onclick="openRecipePage('Dolma')">MAKE THIS RECIPE</button>
                   </div>
                    </div>
               
                    <div class="category">
                       <img src="image/Sigara Böreği.jpg" alt="Crispy Sigara Böreği rolls on a plate" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Sigara Böreği</h2>
                   <p>
                       Sigara Böreği is a popular Turkish snack made by rolling thin pastry dough (yufka) around a savory filling of feta cheese, parsley, and spices.
                   </p>
                   <button onclick="openRecipePage('Sigara Böreği')">MAKE THIS RECIPE</button>
               
                   </div>
                    </div>
                </div>
            
                   <!-- MAIN DISHES -->
                   <h1>Turkish Main Dishes</h1>
                   <div class="AA">
                       <div class="category">
                           <img src="image/Turkish-Kebabs.jpg" alt="A plate of Turkish kebabs served with rice and vegetables" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Kebabs</h2>
                       <p>
                           Turkish kebabs are a flavorful and juicy dish made by marinating meat (often lamb or chicken) in a blend of spices, herbs, and olive oil, then grilling it to perfection.
                       </p>
                       <button onclick="openRecipePage('Turkish-Kebabs')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
               
                       <div class="category">
                           <img src="image/Lahmacun.jpg" alt="Lahmacun topped with minced meat and parsley" style="width:150px; height:200px">
               <div class="s2">
                   <h2>Lahmacun</h2>
                   <p>
                       Lahmacun, often called "Turkish pizza," is a thin flatbread topped with a mixture of minced meat, tomatoes, peppers, onions, and spices.
                   </p>
                   <button onclick="openRecipePage('Lahmacun')">MAKE THIS RECIPE</button>
               </div>
                       </div>
               
                       <div class="category">
                           <img src="image/Manti.jpg" alt="Turkish Manti dumplings topped with yogurt and red pepper sauce" style="width:150px; height:200px">
               <div class="s2">
                   <h2>Manti</h2>
               <p>
                   Small Turkish dumplings filled with spiced ground meat and served with a creamy yogurt sauce and a drizzle of melted butter and red pepper flakes.
               </p>
               <button onclick="openRecipePage('Manti')">MAKE THIS RECIPE</button>
               </div>
                       </div>
                   </div>
            
            <!-- SALADS -->
            <h1>Salads</h1>
            
            <div class="AA">
               <div class="category">
                   <img src="image/salatasi.jpg" alt="Çoban Salatası, a fresh Turkish shepherd's salad" style="width:150px; height:200px">
               <div class="s2">
                   <h2>Çoban Salatası (Shepherd's Salad)</h2>
               <p>
                   Çoban Salatası is a refreshing and healthy Turkish salad.
               </p>
               <button onclick="openRecipePage('Çoban Salatası')">MAKE THIS RECIPE</button>
               </div>
               </div>
               
               <div class="category">
                   <img src="image/Piyaz (White Bean Salad).jpg" alt="Piyaz, a Turkish white bean salad garnished with parsley and onions" style="width:150px; height:aut200px">
                   <div class="s2">
                       <h2>Piyaz (White Bean Salad)</h2>
               <p>
                   A traditional Turkish salad made with tender white beans, tomatoes, parsley, and a tangy dressing of olive oil and lemon juice.
               </p>
               <button onclick="openRecipePage('Piyaz (White Bean Salad)')">MAKE THIS RECIPE</button>
                   </div>
               </div>
               
               <div class="category">
                   <img src="image/Gavurdağı Salatası (Spicy Walnut Salad).jpg" alt="Gavurdağı Salatası, a Turkish spicy walnut salad" style="width:150px; height:200px">
               <div class="s2">
                   <h2>(Spicy Walnut Salad)</h2>
                   <p>
                       Gavurdağı Salatası is a unique Turkish salad made with finely chopped tomatoes, onions, parsley, and walnuts, seasoned.
                   </p>
                   <button onclick="openRecipePage('Gavurdağı Salatası (Spicy Walnut Salad)')">MAKE THIS RECIPE</button>
               </div>
               </div>
            </div>
            
            
               <!-- Soups -->
               <h1>Turkish-Soups</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/Mercimek Çorbası (Lentil Soup).jpg" alt="Mercimek Çorbası, a creamy Turkish lentil soup" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Lentil Soup</h2>
                       <p> A comforting Turkish lentil soup made with red lentils, onions, carrots, and potatoes, seasoned with paprika and mint.
                   </p>
                   <button onclick="openRecipePage('Mercimek Çorbası (Lentil Soup)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               
                   <div class="category">
                       <img src="image/Tarator (Yogurt-Based Soup).jpg" alt="Tarator, a chilled yogurt-based Turkish soup" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Tarator (Yogurt-Based Soup)</h2>
               <p>
                   Tarator is a refreshing Turkish cold soup made with yogurt, water, garlic, cucumber, and dill.
               </p>
               <button onclick="openRecipePage('Tarator (Yogurt-Based Soup)')">MAKE THIS RECIPE</button>
                       </div>
                   </div>
                   <div class="category">
                       <img src="image/Kısır.jpg" alt="Kısır, a Turkish bulgur salad with parsley and lemon wedges" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Kısır (Bulgur Salad)</h2>
            <p>
               Kısır is a vibrant Turkish bulgur salad made with fine bulgur, tomato paste, fresh parsley, green onions, and pomegranate molasses.
            </p>
            <button onclick="openRecipePage('Kısır (Bulgur Salad)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               
               </div>
               <!-- Desserts -->
               <h1>Turkish Desserts</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/Turkish-Baklava.jpg" alt="A tray of Turkish Baklava with golden layers of phyllo dough and pistachios" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Baklava</h2>
                   <p>
                       Turkish dessert made with layers of buttery phyllo dough, chopped nuts, and sweetened with a fragrant syrup of honey or sugar.
                   </p>
                   <button onclick="openRecipePage('Turkish-Baklava')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
                   
                   <div class="category">
                       <img src="image/Künefe.jpg" alt="Künefe, a Turkish dessert made with shredded phyllo and melted cheese" style="width:150px; height:200px">
                       <div class="s2">
                           <h2>Künefe</h2>
               <p>
                   Künefe is a warm and indulgent Turkish dessert made with shredded phyllo dough (kataifi), filled with melted cheese, and soaked in a sweet syrup.
               </p>
               <button onclick="openRecipePage('Turkish-Kunefe')">MAKE THIS RECIPE</button>
                       </div>
                   </div>
               
                   <div class="category">
                       <img src="image/Sütlaç (Rice Pudding).jpg" alt="Turkish Sütlaç rice pudding topped with cinnamon" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Sütlaç (Rice Pudding)</h2>
               <p>
                   Sütlaç is a creamy and comforting Turkish rice pudding made with slow-cooked rice, milk, and sugar.
               </p>
               <button onclick="openRecipePage('Sütlaç (Rice Pudding)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               
               </div>
        </div>
    
        <!-- MEXICAN -->
         <!-- Burritos -->
         <div class="arab">
            <h1>Mexican Burritos</h1>
                <div class="AA">
                   <div class="category">
                       <img src="image/Minute-Breakfast-Burrito.png" alt="burritos" style="width:150px;height:200px">
                       <div class="s2">
                          <h2>Minute Breakfast Burrito</h2>
                       <p>A quick and satisfying breakfast burrito packed with protein and flavor, perfect for busy mornings.</p>
                       <button onclick="openRecipePage('Minute Breakfast Burrito')">MAKE THIS RECIPE</button>
                       </div>
                    </div>
               
                   <div class="category">
                       <img src="image/Fabulous Wet Burritos.jpg" alt="wet burritos" style="width:150px;height:200px">
                       <div class="s2">
                        <h2>Fabulous Wet Burritos</h2>
                        <p>Delicious and hearty burritos smothered in savory sauce, topped with cheese, and loaded with flavorful fillings.</p>
                        <button onclick="openRecipePage('Fabulous Wet Burritos')">MAKE THIS RECIPE</button>
                       </div>
                   </div>
                  <div class="category">
                   <img src="image/Southwestern-Breakfast-Burrito.png" alt="Southwestern breakfast burritos"style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Southwestern Breakfast Burritos</h2>
               <p>A flavorful Southwestern-inspired breakfast burrito with cheesy scrambled eggs, wrapped in a warm tortilla.</p>
               <button onclick="openRecipePage('Southwestern Breakfast Burritos')">MAKE THIS RECIPE</button>
                   </div>
                  </div>
                </div>
               <!-- appetizers -->
               <h1>Mexican appetizers</h1>
              <div class="AA">
               <div class="category">
                   <img src="image/Nachos.png" alt="Nachos"style="width:150px;height:200px;">
               <div class="s2">
                   <h2><u>Loaded Beef Nachos</u></h2>
                   <p>A hearty and flavorful appetizer featuring crispy tortilla chips loaded with seasoned beef, melted cheese, and classic Mexican toppings.</p>
                   <button onclick="openRecipePage('Loaded Beef Nachos')">MAKE THIS RECIPE</button>
               </div>
               </div>
               <div class="category">
                   <img src="image/super-nachos.png" alt="Nachos"style="width:150px;height:200px;">
                   <div class="s2">
                       <h2><u>Super Nachos</u></h2>
                   <p>A stacked and satisfying platter of tortilla chips piled high with seasoned ground beef, melted cheese, and an array of fresh toppings.</p>
                <button onclick="openRecipePage('Super Nachos')">MAKE THIS RECIPE</button>
                   </div>
               </div>
               <div class="category">
                   <img src="image/Seven-layer-dip.png" alt="Nachos"style="width:150px;height:200px;">
                   <div class="s2">
                       <h2><u>Seven Layer Party Dip </u></h2>
                   <p>A layered appetizer featuring refried beans, guacamole, salsa, sour cream, cheese, and fresh toppings.</p>
                    <button onclick="openRecipePage('Seven Layer Party Dip')">MAKE THIS RECIPE</button>
                   </div>
               </div>
              </div>
            
               <!-- Main Dishes -->
               <h1>Mexican Main Dish</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/taquito-casserole.png" alt="taquito-casserole" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Taquito Casserole</h2>
                   <p>Mexican dish that's combined taquitos with a cheesy, creamy filling, topped with a spicy jalapeño crema and fresh cilantro.</p>
                    <button onclick="openRecipePage('Taquito Casserole')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               
                   <div class="category">
                       <img src="image/8736734_Chicken-Adobo-Tacos.png" alt="8736734_Chicken-Adobo-Tacos" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Chicken Adabo Tacos</h2>
                   <p>These Chicken Adobo Tacos are bursting with flavor, thanks to the marinated chicken and tangy mango salsa.</p>
                    <button onclick="openRecipePage('Chicken Adabo Tacos')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               
                  <div class="category">
                   <img src="image/Roscoes-Chilaquiles.png" alt="Roscoes-Chilaquiles" style="width:150px; height:200px">
                   <div class="s2">
                       <h2>Roscoe's Chilaquiles</h2>
                   <p>Mexican breakfast dish, features crispy tortilla chips drenched in a rich and smoky salsa roja. Topped with fried eggs, crumbled cotija cheese, avocado, and a squeeze of lime.</p>
                   <button onclick="openRecipePage('Roscoe')">MAKE THIS RECIPE</button>
                   </div>
                  </div>
               
               </div>
               <!-- Salads -->
               <h1>Mexican Salads</h1>
               <div class="AA">
                   <div class="category">
                       <img src="image/crab ceviche.png" alt="crab ceviche" style="width:150px;height:200px">
                  <div class="s2">
                   <h2>Crab Ceviche</h2>
                   <p>This refreshing Crab Ceviche features imitation crabmeat, tomatoes, serrano peppers, red onion, cilantro, and lime juice.</p>
                    <button onclick="openRecipePage('Crab Ceviche')">MAKE THIS RECIPE</button>
                  </div>
                   </div>
               
                   <div class="category">
                       <img src="image/Elotes(Mexican Corn in a Cup) - Copy.png" alt="Elotes" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Elotes(Mexican Corn in a Cup) </h2>
                   <p>Sweet corn kernels mixed with mayonnaise, tangy lime, savory Parmesan, and spicy chile-lime seasoning.</p>
                    <button onclick="openRecipePage('Elotes(Mexican Corn in a Cup)')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
               
                  <div class="category">
                   <img src="image/avocado-salad.png" alt="avocado salad" style="width:150px;height:200px">
                   <div class="s2">
                       <h2>Avocado Salad</h2>
                       <p> A creamy and flavorful salad that combines fresh vegetables like tomato, green bell pepper, and sweet onion, with cilantro and a tangy lime.</p>
                    <button onclick="openRecipePage('Avocado Salad')">MAKE THIS RECIPE</button>
                   </div>
                  </div>
               </div>
                       <!-- soups -->
                       <h1>Mexican soups and stews</h1>
                       <div class="AA">
                           <div class="category">
                               <img src="image/Beef-Birria-Ramen.png" alt="Beef-Birria-Ramen" style="width:150px;height:200px">
                           <div class="s2">
                               <h2><u>Beef Birria Ramen</u></h2>
                           <p>A delicious fusion of Mexican birria and Japanese ramen, combining tender beef with flavorful broth and chewy noodles.</p>
                           <button onclick="openRecipePage('Beef Birria Ramen')">MAKE THIS RECIPE</button>
                           </div>
                           </div>
                   
                           <div class="category">
                               <img src="image/Potato-Soup-with-Chorizo.png" alt="Potato Soup" style="width:150px;height:200px">
                              <div class="s2">
                               <h2><u>Potato soup with chorizo</u></h2>
                               <p>A hearty and comforting soup featuring tender potatoes and spicy chorizo in a rich, flavorful broth.</p>
                               <button onclick="openRecipePage('Potato soup with chorizo')">MAKE THIS RECIPE</button>
                              </div>
                           </div>
                   
                           <div class="category">
                               <img src="image/Green-Chicken-Enchilada-Soup.png" alt="Chicken Soup" style="width:150px;height:200px">
                               <div class="s2">
                                   <h2><u>Green Chicken Enchilada Soup</u></h2>
                     <p>A zesty and creamy soup made with shredded chicken, green enchilada sauce, and fresh vegetables.</p>
                     <button onclick="openRecipePage('Green Chicken Enchilada Soup')">MAKE THIS RECIPE</button>
                               </div>
                           </div>
                       </div>
            
                   <!-- Desserts -->
                   <h1>Mexican Desserts</h1>
                   <div class="AA">
                       
                       <div class="category">
                           <img src="image/churro-cheesecake-bars.png" alt="churro-cheesecake-bars" style="width:150px;height:200px">
                          <div class="s2">
                           <h2>Churro Cheesecake Bars</h2>
                           <p>A decadent dessert combining the crispy sweetness of churros with the creamy richness of cheesecake.</p>
                           <button onclick="openRecipePage('Churro Cheesecake Bars')">MAKE THIS RECIPE</button>
               
                          </div>
                       </div>
               
                       <div class="category">
                           <img src="image/churros.png" alt="Churros" style="width:150px;height:200px">
                           <div class="s2">
                               <h2>Churros</h2>
                 <p>Classic Mexican fried dough pastry coated in cinnamon sugar, perfect for dipping in chocolate or caramel sauce.</p>
                  <button onclick="openRecipePage('Churros')">MAKE THIS RECIPE</button>
                           </div>
                       </div>
            
                       <div class="category">
                           <img class="chocolate" src="image/Mexican-Chocolate-Chile-Cake.png" alt="Choco Cake" style="width:150;height:200px">
                       <div class="s2">
                           <h2>Mexican Chocolate Chile Cake</h2>
                       <p>A rich and spicy chocolate cake with a hint of chile, offering a unique and bold dessert experience.</p>
                       <button onclick="openRecipePage('Mexican Chocolate Chile Cake')">MAKE THIS RECIPE</button>
                       </div>
                       </div>
                   </div>
         </div>
    
            <!-- Chinese -->
             <!-- appetizers -->
             <div class="arab">
                <h1>Chinese Appetizers</h1>
            
                <div class="AA">
                    <div class="category">
                        <img src="image/Spring Rolls.jpg" alt="Spring Rolls" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Spring Rolls</h2>
                        <p>Crispy rolls filled with vegetables or meat.</p>
                        <button onclick="openRecipePage('Spring Rolls')">MAKE THIS RECIPE</button>
               
                    </div>
                     </div>
                     <div class="category">
                        <img src="image/Shrimp Toast.jpg" alt="Shrimp Toast" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Shrimp Toast</h2>
                        <p>Fried bread topped with seasoned shrimp paste.</p>
                        <button onclick="openRecipePage('Shrimp Toast')">MAKE THIS RECIPE</button>
                        </div>
                     </div>
            
                       <div class="category">
                        <img src="image/Cold Sesame Noodles.jpg" alt="Cold Sesame Noodles" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Cold Sesame Noodles</h2>
            <p>Chilled noodles tossed in a sesame-based sauce.</p>
            <button onclick="openRecipePage('Cold Sesame Noodles')">MAKE THIS RECIPE</button>
                        </div>
                       </div>
                </div>
            
                <!-- main dish -->
                <h1>Chinese Main Dishes</h1>
            
                <div class="AA">
                    <div class="category">
                        <img src="image/Kung Pao Chicken.jpg" alt="Kung Pao Chicken" style="width:150px;height:200px">
                    <div class="s2">
                        <h2>Kung Pao Chicken</h2>
                    <p>Spicy stir-fry with chicken, peanuts, and vegetables.</p>
                    <button onclick="openRecipePage('Kung Pao Chicken')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="category">
                        <img src="image/Mapo Tofu.jpg" alt="Mapo Tofu" style="width:150px;height:200px">
                       <div class="s2">
                        <h2>Mapo Tofu</h2>
                        <p>Spicy tofu with minced pork in a bold, flavorful sauce.</p>
                        <button onclick="openRecipePage('Mapo Tofu')">MAKE THIS RECIPE</button>
                       </div>
                    </div>
            
                       <div class="category">
                        <img src="image/Sweet and Sour Pork.jpg" alt="Sweet and Sour Pork" style="width:150px;height:200px">
                        <div class="s2">
                            <h2>Sweet and Sour Pork</h2>
            <p>Crispy pork in a tangy sweet and sour sauce.</p>
            <button onclick="openRecipePage('Sweet and Sour Pork')">MAKE THIS RECIPE</button>
                       </div>
                            </div>
                </div>
                <!-- noodles & rice -->
            
                <h1>Noodles & Rice Recipes</h1>
            
                <div class="AA">
                    <div class="category">
                        <img src="image/Fried Rice.jpg" alt="Fried Rice" style="width:150px;height:200px;">
               <div class="s2">
                <h2>Fried Rice</h2>
                <p>Stir-fried rice with vegetables, meat, or seafood for a flavorful and hearty meal.</p>
                <button onclick="openRecipePage('Fried Rice')">MAKE THIS RECIPE</button>
               </div>
                    </div>
            
               <div class="category">
                <img src="image/Chow Mein.jpg" alt="Chow Mein" style="width:150px;height:200px;">
                <div class="s2">
                    <h2>Chow Mein</h2>
            <p>Stir-fried noodles with vegetables and meat, tossed in a savory sauce.</p>
            <button onclick="openRecipePage('Chow Mein')">MAKE THIS RECIPE</button>
                </div>
               </div>
            
                <div class="category">
                    <img src="image/Dan Dan Noodles.jpg" alt="Dan Dan Noodles" style="width:150px;height:200px;">
                    <div class="s2">
                        <h2>Dan Dan Noodles</h2>
                    <p>Spicy Sichuan noodles topped with ground pork and a bold, flavorful sauce.</p>
                    <button onclick="openRecipePage('Dan Dan Noodles')">MAKE THIS RECIPE</button>
                    </div>
                </div>
                </div>
                    <!-- soups & stews -->
                    <h1>Chinese Soups & Stews</h1>
            
                    <div class="AA">
                        <div class="category">
                            <img src="image/Hot and Sour Soup.jpg" alt="Hot and Sour Soup" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Hot and Sour Soup</h2>
                        <p>Spicy, tangy soup with tofu, mushrooms, and bamboo shoots.</p>
                        <button onclick="openRecipePage('Hot and Sour Soup')">MAKE THIS RECIPE</button>
                        </div>
                        </div>
            
                       <div class="category">
                        <img src="image/Wonton Soup.jpg" alt="Wonton Soup" style="width:150px; height:200px">
                        <div class="s2">
                         <h2>Wonton Soup</h2>
                         <p>Light broth with pork- or shrimp-filled wontons.</p>
                         <button onclick="openRecipePage('Wonton Soup')">MAKE THIS RECIPE</button>
                        </div>
                       </div>
            
                            <div class="category">
                                <img src="image/Egg Drop Soup.jpg" alt="Egg Drop Soup" style="width:150px; height:200px">
                                <div class="s2">
                                    <h2>Egg Drop Soup</h2>
                <p>Light soup with silky beaten eggs in a savory broth.</p>
                <button onclick="openRecipePage('Egg Drop Soup')">MAKE THIS RECIPE</button>
                                </div>
                            </div>
                    </div>
            
                <!-- street foods -->
                <h1>Chinese Street Food</h1>
            
              <div class="AA">
                <div class="category">
                    <img src="image/Baozi.jpg" alt="Baozi" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Baozi</h2>
                    <p>Baozi are traditional Chinese steamed buns filled with savory meat or vegetable fillings, making them a popular snack or meal on the go.</p>
                    <button onclick="openRecipePage('Baozi')">MAKE THIS RECIPE</button>
                    </div>
                   </div>
            
                    <div class="category">
                        <img src="image/Jianbing.jpg" alt="Jianbing" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Jianbing</h2>
                        <p>Jianbing is a popular Chinese street food consisting of savory crepes filled with eggs, crispy wontons, and flavorful sauces.</p>
                        <button onclick="openRecipePage('Jianbing')">MAKE THIS RECIPE</button>
                        </div>
                    </div>
            
                           <div class="category">
                            <img src="image/Tanghulu.jpg" alt="Tanghulu" style="width:150px; height:200px">
                            <div class="s2">
                             <h2>Tanghulu</h2>
                             <p>Tanghulu is a traditional Chinese snack made of skewered candied fruits, typically hawthorn berries, coated in a hard sugar glaze.</p>
                             <button onclick="openRecipePage('Tanghulu')">MAKE THIS RECIPE</button>
                            </div>
                           </div>
              </div>
               </div>
                </div>
    
        
        <script>
            // JavaScript to dynamically load header and footer
            fetch("header.php").then(response => response.text()).then(data => {
              document.getElementById("header").innerHTML = data;
            });
        
            fetch("footer.php").then(response => response.text()).then(data => {
              document.getElementById("footer").innerHTML = data;
            });



            //to open individual recipe page
            function openRecipePage(recipeId) {
                // Open recipes.html and pass the recipe name as a query parameter
                window.open(`recipes.php?recipe=${encodeURIComponent(recipeId)}`, '_blank');
            }

            
            //to open BLDD option
            function openBlddPage(blddId) {
        // Open the category page with the selected category as a query parameter
        window.open(`bldd.php?recipe=${encodeURIComponent(blddId)}`, '_blank');
    }

          </script>
          <div class="t3">
          <?php 
    include 'footer.php'
    ?>
          </div>
    </div>
</body>
</html>



