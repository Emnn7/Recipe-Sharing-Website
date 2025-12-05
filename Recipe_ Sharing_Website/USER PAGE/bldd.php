<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bldd.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <div class="t1">
        <?php 
    include 'header.php'
    ?>
        </div>
     <div class="t2">
        <div id="bldd-container">
            <div id="Breakfast" class="bldd">
                <h1>BREAKFAST</h1>
                <div class="AA">
                    <div class="categories">
                        <img src="image/dabo-kolo.jpg" alt="dabo-kolo" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Dabo Kolo</h2>
                    <p>Dabo Kolo is a crunchy Ethiopian snack, similar to small, savory biscuits, often enjoyed with a cup of tea or coffee.</p>
                    <button onclick="openRecipePage('Dabo Kolo')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Yakisoba (Fried Noodles).jpg" alt="Yakisoba" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Yakisoba (Fried Noodles)</h2>
                    <p>Stir-fried noodles with vegetables and a savory sauce.</p>
                    <button onclick="openRecipePage('Yakisoba (Fried Noodles)')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Puri.jpg" alt="Puri" style="width:150px;height:200px">
                     <div class="s2">
                        <h2>Puri</h2>
                     <p>Puri is a deep-fried, puffed bread often enjoyed with curries and sweet dishes.</p>
                     <button onclick="openRecipePage('Puri')">MAKE THIS RECIPE</button>
                     </div>
                     </div>
            
                     <div class="categories">
                        <img src="image/Frittata.jpg" alt="Frittata" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Frittata</h2>
                    <p>A versatile Italian egg dish filled with a delicious combination of vegetables, cheese, and seasonings, perfect for any meal.</p>
                    <button onclick="openRecipePage('Frittata')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Sigara Böreği.jpg" alt="Crispy Sigara Böreği rolls on a plate" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Sigara Böreği</h2>
                    <p>
                        Sigara Böreği is a popular Turkish snack made by rolling thin pastry dough (yufka) around a savory filling of feta cheese, parsley, and spices.
                    </p>
                    <button onclick="openRecipePage('Sigara Böreği')">MAKE THIS RECIPE</button>
                
                    </div>
                     </div>
            
                     <div class="categories">
                        <img src="image/Minute-Breakfast-Burrito.png" alt="burritos" style="width:150px;height:200px">
                        <div class="s2">
                           <h3>Minute Breakfast Burrito</h3>
                        <p>A quick and satisfying breakfast burrito packed with protein and flavor, perfect for busy mornings.</p>
                        <button onclick="openRecipePage('Minute Breakfast Burrito')">MAKE THIS RECIPE</button>
                        </div>
                     </div>
            
                     <div class="categories">
                        <img src="image/Southwestern-Breakfast-Burrito.png" alt="Southwestern breakfast burritos"style="width:150px;height:200px">
                        <div class="s2">
                            <h3>Southwestern Breakfast Burritos</h3>
                    <p>A flavorful Southwestern-inspired breakfast burrito with cheesy scrambled eggs, wrapped in a warm tortilla.</p>
                    <button onclick="openRecipePage('Southwestern Breakfast Burritos')">MAKE THIS RECIPE</button>
                        </div>
                       </div>
            
                       <div class="categories">
                        <img src="image/Jianbing.jpg" alt="Jianbing" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Jianbing</h2>
                        <p>Jianbing is a popular Chinese street food consisting of savory crepes filled with eggs, crispy wontons, and flavorful sauces.</p>
                        <button onclick="openRecipePage('Jianbing')">MAKE THIS RECIPE</button>
                        </div>
                    </div>
                </div>
        
            </div>
        
            <div id="Lunch" class="bldd">
                <h1>LUNCH</h1>
         <div class="AA">
            <div class="categories">
                <img src="image/Dan Dan Noodles.jpg" alt="Dan Dan Noodles" style="width:150px;height:200px;">
                <div class="s2">
                    <h2>Dan Dan Noodles</h2>
                <p>Spicy Sichuan noodles topped with ground pork and a bold, flavorful sauce.</p>
                <button onclick="openRecipePage('Dan Dan Noodles')">MAKE THIS RECIPE</button>
                </div>
            </div>
        
            <div class="categories">
                <img src="image/Fried Rice.jpg" alt="Fried Rice" style="width:150px;height:200px;">
        <div class="s2">
        <h2>Fried Rice</h2>
        <p>Stir-fried rice with vegetables, meat, or seafood for a flavorful and hearty meal.</p>
        <button onclick="openRecipePage('Fried Rice')">MAKE THIS RECIPE</button>
        </div>
            </div>
        
            <div class="categories">
                <img src="image/8736734_Chicken-Adobo-Tacos.png" alt="8736734_Chicken-Adobo-Tacos" style="width:150px;height:200px">
            <div class="s2">
                <h2>Chicken Adabo Tacos</h2>
            <p>These Chicken Adobo Tacos are bursting with flavor, thanks to the marinated chicken and tangy mango salsa.</p>
             <button onclick="openRecipePage('Chicken Adabo Tacos')">MAKE THIS RECIPE</button>
            </div>
            </div>
        
            <div class="categories">
                <img src="image/taquito-casserole.png" alt="taquito-casserole" style="width:150px;height:200px">
            <div class="s2">
                <h2>Taquito Casserole</h2>
            <p>Mexican dish that's combined taquitos with a cheesy, creamy filling, topped with a spicy jalapeño crema and fresh cilantro.</p>
             <button onclick="openRecipePage('Taquito Casserole')">MAKE THIS RECIPE</button>
            </div>
            </div>
        
            <div class="categories">
                <img src="image/Manti.jpg" alt="Turkish Manti dumplings topped with yogurt and red pepper sauce" style="width:150px; height:200px">
        <div class="s2">
        <h2>Manti</h2>
        <p>
        Small Turkish dumplings filled with spiced ground meat and served with a creamy yogurt sauce and a drizzle of melted butter and red pepper flakes.
        </p>
        <button onclick="openRecipePage('Manti')">MAKE THIS RECIPE</button>
        </div>
            </div>
        
            <div class="categories">
                <img src="image/Lahmacun.jpg" alt="Lahmacun topped with minced meat and parsley" style="width:150px; height:200px">
        <div class="s2">
        <h2>Lahmacun</h2>
        <p>
            Lahmacun, often called "Turkish pizza," is a thin flatbread topped with a mixture of minced meat, tomatoes, peppers, onions, and spices.
        </p>
        <button onclick="openRecipePage('Lahmacun')">MAKE THIS RECIPE</button>
        </div>
            </div>
        
            <div class="categories">
                <img src="image/Spaghetti Bolognese.jpg" alt="Spaghetti" style="width:150px; height:200px">
            <div class="s2">
                <h2>Spaghetti Bolognese</h2>
                <p>A hearty and classic Italian pasta dish featuring a rich, meaty tomato sauce served over perfectly cooked spaghetti.</p>
                <button onclick="openRecipePage('Spaghetti Bolognese')">MAKE THIS RECIPE</button>
            </div>
              </div>
        
              <div class="categories">
                <img src="image/Melanzane alla Parmigiana.jpg" alt="Melanzane" style="width:150px; height:200px">
             <div class="s2">
                <h2>Melanzane alla Parmigiana</h2>
             <p>A classic Italian baked eggplant dish layered with marinara sauce, mozzarella, and Parmesan cheese.</p>
             <button onclick="openRecipePage('Melanzane alla Parmigiana')">MAKE THIS RECIPE</button>
             </div>
             </div>
        
             <div class="categories">
                <img src="image/Butter Chicken (Murgh Makhani).jpg" alt="Butter chicken" style="width:150px;height:200px">
            <div class="s2">
                <h2>Butter Chicken (Murgh Makhani)</h2>
            <p>Butter Chicken is a creamy, tomato-based curry featuring tender chicken pieces cooked in a rich, spiced gravy with a hint of sweetness.</p>
            <button onclick="openRecipePage('Butter Chicken (Murgh Makhani)')">MAKE THIS RECIPE</button>
            </div>
            </div>
        
            <div class="categories">
                <img src="image/Paneer Tikka Masala.jpg" alt="Paneer tikka masala" style="width:150px;height:200px">
            <div class="s2">
                <h2>Paneer Tikka Masala</h2>
            <p>Paneer Tikka Masala is a spicy, creamy curry with grilled paneer cubes simmered in a flavorful tomato-based sauce.</p>
            <button onclick="openRecipePage('Paneer Tikka Masala')">MAKE THIS RECIPE</button>
            </div>
            </div>
        
            <div class="categories">
                <img src="image/Sushi (Nigiri, Maki, etc.).jpg" alt="Sushi" style="width:150px;height:200px">
                <div class="s2">
                    <h2>Sushi (Nigiri, Maki, etc.)</h2>
                <p>A traditional Japanese dish featuring vinegared rice and various toppings or fillings.</p>
                <button onclick="openRecipePage('Sushi (Nigiri, Maki, etc.)')">MAKE THIS RECIPE</button>
                </div>
            </div>
        
            <div class="categories">
                <img src="image/Donburi (Rice Bowls).jpg" alt="Donburi" style="width:150px;height:200px">
               <div class="s2">
                <h2>Donburi (Rice Bowls)</h2>
                <p>Hearty Japanese rice bowls with various toppings like Gyudon (beef) or Katsudon (pork cutlet).</p>
                <button onclick="openRecipePage('Donburi (Rice Bowls)')">MAKE THIS RECIPE</button>
               </div>
            </div>
        
            <div class="categories">
                <img src="image/Doro-wot.jpg" alt="Doro wot" style="width:150px; height:200px">
             <div class="s2">
                <h3>Doro Wat (Spicy Chicken Stew)</h3>
             <p>Doro Wat is a rich and flavorful spicy chicken stew, one of the most iconic dishes of Ethiopian cuisine.</p>
             <button onclick="openRecipePage('Doro Wat (Spicy Chicken Stew)')">MAKE THIS RECIPE</button>
             </div>
             </div>
        
             <div class="categories">
                <img src="image/shiro.jpg" alt="shiro" style="width:150px; height:200px">
            <div class="s2">
                <h2>Shiro (Chickpea Stew)</h2>
                <p>Shiro is made from ground chickpeas, creating a thick, hearty stew with a rich flavor from the blend of spices.</p>
               <button onclick="openRecipePage('Shiro (Chickpea Stew)')">MAKE THIS RECIPE</button>
            </div>
             </div>
        
             <div class="categories">
                <img src="image/Kitfo.jpg" alt="kitfo" style="width:150px; height:200px">
             <div class="s2">
                <h2>Kitfo (Minced Raw Beef)</h2>
             <p>Kitfo is a traditional Ethiopian dish of finely minced raw beef, flavored with spiced clarified butter (niter kibbeh).</p>
             <button onclick="openRecipePage('Kitfo (Minced Raw Beef)')">MAKE THIS RECIPE</button>
             </div>
             </div>
        
             <div class="categories">
                <img src="image/shawarma.jpg" alt="shawarma" style="width:150px; height:200px">
            <div class="s2">
                <h2>Shawarma</h2>
            <p>Shawarma is a popular Middle Eastern street food made with marinated and roasted meat.</p>
            <button onclick="openRecipePage('Shawarma')">MAKE THIS RECIPE</button>
            </div>
            </div>
        
            <div class="categories">
                <img src="image/kebab.jpg" alt="kebab" style="width:150px; height:200px">
            <div class="s2">
                <h2>Kebabs</h2>
            <p>Kebabs are skewered and grilled pieces of seasoned meat, often paired with vegetables.</p>
            <button onclick="openRecipePage('Kebab')">MAKE THIS RECIPE</button>
        
            </div>
            </div>
         </div>
        
            </div>
        
            
            <div id="Dinner" class="bldd">
                <h1>DINNER</h1>
                <div class="AA">
                    <div class="categories">
                        <img src="image/mandi.jpg" alt="mandi" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Mandi</h2>
                    <p>Mandi is a traditional Arabian rice and meat dish cooked with fragrant spices.</p>
                    <button onclick="openRecipePage('Mandi')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Doro-wot.jpg" alt="Doro wot" style="width:150px; height:200px">
                     <div class="s2">
                        <h2>Doro Wat (Spicy Chicken Stew)</h2>
                     <p>Doro Wat is a rich and flavorful spicy chicken stew, one of the most iconic dishes of Ethiopian cuisine.</p>
                     <button onclick="openRecipePage('Doro Wat (Spicy Chicken Stew)')">MAKE THIS RECIPE</button>
                     </div>
                     </div>
            
                     <div class="categories">
                        <img src="image/Sukiyaki (Beef Hot Pot).jpg" alt="sukiyaki"style="width:150px;height:200px">
                        <div class="s2">
                            <h2>Sukiyaki (Beef Hot Pot)</h2>
                        <p>A sweet and savory hot pot featuring thinly sliced beef and vegetables.</p>
                        <button onclick="openRecipePage('Sukiyaki (Beef Hot Pot)')">MAKE THIS RECIPE</button>
                        </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Teriyaki Chicken or Beef.jpg" alt="Teriyaki" style="width:150px;height:200px">
                    <div class="s2">
                        <h2>Teriyaki Chicken or Beef</h2>
                    <p> Teriyaki is a popular Japanese dish where chicken or beef is grilled and glazed with a sweet soy sauce-based marinade.</p>
                    <button onclick="openRecipePage('Teriyaki Chicken or Beef')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Unagi (Grilled Eel).jpg" alt="Unagi" style="width:150px;height:200px">
                    <div class="s2">
                        <h2>Unagi (Grilled Eel)</h2>
                <p> Unagi is grilled eel glazed with a sweet soy-based sauce, often served over rice.</p>
                <button onclick="openRecipePage('Unagi (Grilled Eel)')">MAKE THIS RECIPE</button>
                    </div>
                    </div>

                    <div class="categories">
                        <img src="image/shiro.jpg" alt="shiro" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Shiro (Chickpea Stew)</h2>
                        <p>Shiro is made from ground chickpeas, creating a thick, hearty stew with a rich flavor from the blend of spices.</p>
                       <button onclick="openRecipePage('Shiro (Chickpea Stew)')">MAKE THIS RECIPE</button>
                    </div>
                     </div>
            
                    <div class="categories">
                        <img src="image/Indian-Biryani.jpg" alt="Indian-Biryani" style="width:150px;height:200px">
                        <div class="s2"> 
                            <h2>Biryani</h2>
                            <p>Aromatic and flavorful Biryani is a rich, spiced rice dish with layers of meat or vegetables, seasoned with whole spices and garnished with fresh herbs.</p>
                            <button onclick="openRecipePage('Biryani')">MAKE THIS RECIPE</button>
                        </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Baingan Bharta.jpg" alt="Baingan Bharta" style="width:150px;height:200px">
                   <div class="s2">
                    <h2>Baingan Bharta</h2>
                    <p>Baingan Bharta is a smoky-flavored dish made with roasted eggplant, cooked with onions, tomatoes, and Indian spices.</p>
                    <button onclick="openRecipePage('Baingan Bharta')">MAKE THIS RECIPE</button>
                   </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Pollo alla Cacciatora.jpg" alt="Pollo alla cacciatora" style="width:150px; height:200px">
                     <div class="s2">
                        <h2>Pollo alla Cacciatora</h2>
                     <p>A hearty Italian chicken dish cooked in a rich tomato and olive sauce, perfect for family dinners.</p>
                     <button onclick="openRecipePage('Pollo alla Cacciatora')">MAKE THIS RECIPE</button>
                     </div>
                     </div>
            
                     <div class="categories">
                        <img src="image/Lasagna alla Bolognese.jpg" alt="A slice of Lasagna alla Bolognese" style="width:150px; height:200px">
                           <div class="s2">
                            <h2>Lasagna alla Bolognese</h2>
                            <p>A traditional Italian layered pasta dish made with rich Bolognese meat sauce, creamy béchamel, and tender lasagna sheets.</p>
                            <button onclick="openRecipePage('Lasagna alla Bolognese')">MAKE THIS RECIPE</button>
                           </div>
                      </div>
                       
                      <div class="categories">
                        <img src="image/Turkish-Kebabs.jpg" alt="A plate of Turkish kebabs served with rice and vegetables" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Kebabs</h2>
                    <p>
                        Flavorful and juicy dish made by marinating meat (often lamb or chicken) in a blend of spices, herbs, and olive oil, then grilling it to perfection.
                    </p>
                    <button onclick="openRecipePage('Turkish-Kebabs')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Roscoes-Chilaquiles.png" alt="Roscoes-Chilaquiles" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Roscoe's Chilaquiles</h2>
                        <p>Mexican breakfast dish, features crispy tortilla chips drenched in a rich and smoky salsa roja. Topped with fried eggs, crumbled cotija cheese, avocado, and a squeeze of lime.</p>
                        <button onclick="openRecipePage('Roscoe')">MAKE THIS RECIPE</button>
                        </div>
                       </div>
            
                       <div class="categories">
                        <img src="image/Beef-Birria-Ramen.png" alt="Beef-Birria-Ramen" style="width:150px;height:200px">
                    <div class="s2">
                        <h3><u>Beef Birria Ramen</u></h3>
                    <p>A delicious fusion of Mexican birria and Japanese ramen, combining tender beef with flavorful broth and chewy noodles.</p>
                    <button onclick="openRecipePage('Beef Birria Ramen')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Kung Pao Chicken.jpg" alt="Kung Pao Chicken" style="width:150px;height:200px">
                    <div class="s2">
                        <h2>Kung Pao Chicken</h2>
                    <p>Spicy stir-fry with chicken, peanuts, and vegetables.</p>
                    <button onclick="openRecipePage('Kung Pao Chicken')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Sweet and Sour Pork.jpg" alt="Sweet and Sour Pork" style="width:150px;height:200px">
                        <div class="s2">
                            <h2>Sweet and Sour Pork</h2>
                    <p>Crispy pork in a tangy sweet and sour sauce.</p>
                    <button onclick="openRecipePage('Sweet and Sour Pork')">MAKE THIS RECIPE</button>
                       </div>
                            </div>
            
                </div>
            </div>
        
           
            <div id="Dessert" class="bldd">
                <h1>DESSERT</h1>
                <div class="AA">
                    <div class="categories">
                        <img src="image/Tanghulu.jpg" alt="Tanghulu" style="width:150px; height:200px">
                        <div class="s2">
                         <h2>Tanghulu</h2>
                         <p>Tanghulu is a traditional Chinese snack made of skewered candied fruits, typically hawthorn berries, coated in a hard sugar glaze.</p>
                         <button onclick="openRecipePage('Tanghulu')">MAKE THIS RECIPE</button>
                        </div>
                       </div>
            
                       <div class="categories">
                        <img src="image/churro-cheesecake-bars.png" alt="churro-cheesecake-bars" style="width:150px;height:200px">
                       <div class="s2">
                        <h3>Churro Cheesecake Bars</h3>
                        <p>A decadent dessert combining the crispy sweetness of churros with the creamy richness of cheesecake.</p>
                        <button onclick="openRecipePage('Churro Cheesecake Bars')">MAKE THIS RECIPE</button>
            
                       </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/churros.png" alt="Churros" style="width:150px;height:200px">
                        <div class="s2">
                            <h3>Churros</h3>
              <p>Classic Mexican fried dough pastry coated in cinnamon sugar, perfect for dipping in chocolate or caramel sauce.</p>
               <button onclick="openRecipePage('Churros')">MAKE THIS RECIPE</button>
                        </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Mexican-Chocolate-Chile-Cake.png" alt="Choco Cake" style="width:10;height:200px">
                    <div class="s2">
                        <h3>Mexican Chocolate Chile Cake</h3>
                    <p>A rich and spicy chocolate cake with a hint of chile, offering a unique and bold dessert experience.</p>
                    <button onclick="openRecipePage('Mexican Chocolate Chile Cake')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Turkish-Baklava.jpg" alt="A tray of Turkish Baklava with golden layers of phyllo dough and pistachios" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Baklava</h2>
                    <p>
                        Turkish dessert made with layers of buttery phyllo dough, chopped nuts, and sweetened with a fragrant syrup of honey or sugar.
                    </p>
                    <button onclick="openRecipePage('Turkish-Baklava')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
                    
                    <div class="categories">
                        <img src="image/Künefe.jpg" alt="Künefe, a Turkish dessert made with shredded phyllo and melted cheese" style="width:150px; height:200px">
                        <div class="s2">
                            <h2>Künefe</h2>
                <p>
                    Künefe is a warm and indulgent Turkish dessert made with shredded phyllo dough (kataifi), filled with melted cheese, and soaked in a sweet syrup.
                </p>
                <button onclick="openRecipePage('Turkish-Kunefe')">MAKE THIS RECIPE</button>
                        </div>
                    </div>
                
                    <div class="categories">
                        <img src="image/Sütlaç (Rice Pudding).jpg" alt="Turkish Sütlaç rice pudding topped with cinnamon" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Sütlaç (Rice Pudding)</h2>
                <p>
                    Sütlaç is a creamy and comforting Turkish rice pudding made with slow-cooked rice, milk, and sugar.
                </p>
                <button onclick="openRecipePage('Sütlaç (Rice Pudding)')">MAKE THIS RECIPE</button>
                    </div>
                    </div>
            
                    <div class="categories">
                        <img src="image/Tiramisu.jpg" alt="Tiramisu" style="width:150px; height:200px">
                           <div class="S2">
                            <h2>Tiramisu</h2>
                    <p>A classic Italian dessert made with layers of coffee-soaked ladyfingers, creamy mascarpone, and a dusting of cocoa powder.</p>
                    <button onclick="openRecipePage('Tiramisu')">MAKE THIS RECIPE</button>
                           </div>
                    </div>
                   <div class="categories">
                    <img src="image/Panna Cotta.jpg" alt="Panna Cotta" style="width:150px; height:200px">
                    <div class="s2">
                        <h2>Panna Cotta</h2>
                    <p>A silky, creamy dessert made from sweetened cream thickened with gelatin, served with a fruit sauce or fresh berries.</p>
                    <button onclick="openRecipePage('Panna Cotta')">MAKE THIS RECIPE</button>
                    </div>
                   </div>
                   <div class="categories">
                    <img src="image/Zabaglione.jpg" alt="Zabaglione" style="width:150px; height:200px">
                   <div class="s2">
                    <h2>Zabaglione</h2>
                   <p>A light and airy Italian custard dessert made with egg yolks, sugar, and sweet wine, often served with fresh fruit or cookies.</p>
                   <button onclick="openRecipePage('Zabaglione')">MAKE THIS RECIPE</button>
                   </div>
                   </div>
            
                   <div class="categories">
                    <img src="image/Gulab Jamun.jpg" alt="Gulab Jamun" style="width:150px;height:200PX">
                 <div class="S2">
                    <h2>Gulab Jamun</h2>
                 <p>Gulab Jamun is a classic Indian dessert made from milk solids, deep-fried and soaked in aromatic sugar syrup.</p>
                 <button onclick="openRecipePage('Gulab Jamun')">MAKE THIS RECIPE</button>
                 </div>
                 </div>
                 <div class="categories">
                    <img src="image/Kheer.jpg" alt="Kheer" style="width:150px;height:200px">
                 <div class="s2">
                    <h2>Kheer</h2>
                <p>Kheer is a rich and creamy rice pudding cooked with milk, sugar, and flavored with cardamom and nuts.</p>
                <button onclick="openRecipePage('Kheer')">MAKE THIS RECIPE</button>
                 </div>
                 </div>
                 <div class="categories">
                    <img src="image/Jalebi.jpg" alt="Jalebi" style="width:150px;height:200px">
                    <div class="s2">
                        <h2>Jalebi</h2>
                    <p>Jalebi is a crispy, syrup-soaked dessert made from fermented flour batter, enjoyed for its sweet and tangy taste.</p>
                    <button onclick="openRecipePage('Jalebi')">MAKE THIS RECIPE</button>
                     </div>
             </div>
            
             <div class="categories">
                <img src="image/Mochi.jpg" alt="Mochi" style="width:150px;height:200px">
                <div class="s2">
                    <h2>Mochi</h2> 
                <p> Mochi is a traditional Japanese rice cake made from glutinous rice, known for its chewy texture.</p>
                <button onclick="openRecipePage('Mochi')">MAKE THIS RECIPE</button>
                </div>
            </div>
            <div class="categories">
                <img src="image/Matcha Ice Cream.jpg" alt="Matcha Ice-Cream" style="width:150px;height:200px"> 
               <div class="s2">
                <h2>Matcha Ice Cream</h2>
                <p> Matcha ice cream is a creamy and smooth dessert made with green tea powder, offering a balance of sweetness and earthy flavor.</p>
                <button onclick="openRecipePage('Matcha Ice Cream')">MAKE THIS RECIPE</button>
               </div>
            </div>
            <div class="categories">
                <img src="image/Dorayaki (Red Bean Pancakes.jpg" alt="Dorayki" style="width:300px;height:auto">
            <div class="s2">
                <h2>Dorayaki (Red Bean Pancakes)</h2> 
                    <p> Dorayaki consists of two fluffy pancakes filled with sweet red bean paste. It's a beloved snack in Japan.</p>
                <button onclick="openRecipePage('Dorayaki (Red Bean Pancakes)')">MAKE THIS RECIPE</button>
            </div>
            </div>
            
            <div class="categories">
                <img src="image/Baklava.jpg" alt="Baklava" style="width:150px; height:200">
            <div class="s2">
                <h2>Baklava</h2>
            <p>Baklava is a rich, sweet pastry made of layers of filo dough filled with chopped nuts and sweetened with honey or syrup.</p>
            <button onclick="openRecipePage('Baklava')">MAKE THIS RECIPE</button>
            
            </div>
            </div>
            <div class="categories">
                <img src="image/Kunafa.jpg" alt="kunafa" style="width:150px; height:200px">
            <div class="s2">
                <h2>Kunafa</h2>
            <p>Kunafa is a traditional Middle Eastern dessert made with shredded phyllo dough, filled with cheese, and soaked in sweet syrup.</p>
            <button onclick="openRecipePage('Kunafa')">MAKE THIS RECIPE</button>
            </div>
            </div>
            <div class="categories">
                <img src="image/Basbousa.jpg" alt="Basbousa" style="width:150px; height:200px">
            <div class="s2">
                <h2>Basbousa</h2>
            <p>Basbousa is a semolina-based sweet cake soaked in syrup.</p>
            <button onclick="openRecipePage('Basbousa')">MAKE THIS RECIPE</button>
            </div>
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
      // Hide all recipes initially
    document.querySelectorAll('.bldd').forEach(bldd => {
        bldd.style.display = 'none';
                });
        
                // Get the category name from the query parameter
                const urlParams = new URLSearchParams(window.location.search);
                const blddId = urlParams.get('recipe');
        
                // Show the requested recipe
                if (blddId) {
                    const blddElement = document.getElementById(blddId);
                    if (blddElement) {
                        blddElement.style.display = 'block';
                    } else {
                        document.body.innerHTML = '<p>category not found!</p>';
                    }
                } else {
                    document.body.innerHTML = '<p>No category selected!</p>';
                }
    
    function openRecipePage(recipeId) {
                // Open recipes.html and pass the recipe name as a query parameter
                window.open(`recipes.php?recipe=${encodeURIComponent(recipeId)}`, '_blank');
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