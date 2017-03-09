<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
        <link rel="stylesheet" type="text/css" href="css/SearchStyles.css">
        <title>Project Nibbles and Bits</title>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
	<?php
		include 'functions.php';
		loginDisplay($_SESSION["userName"]);
	?>
        
        <ul id="Nav_Bar">
            <li><a href="index">Home</a></li>
            <li><a href="Recipes">Recipes</a></li>
            <li><a href="MyRecipes">My Recipes</a></li>
            <li><a href="Categories">Categories</a></li>
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
        
 
        
        <p2>
      
            <form action="RecipesFound" method="post">
                    
                <p3> <h2>Ingredients Search</h2>
                    <input type="search" id="Search_Ingredients"> 

                        <div id="Ingredients_Found">
                            <ul id="Ingredient_List">
                      
                            </ul>
                        </div>
                    
                    </p3>
                
                
                
                
                <div id="Add_Item_Container">
                    
                </div>
                
                
                    
                    
                <p4>
                    
                    <div id="Ingredients_Chosen"></div>

                    <input id="Recipe_Submit" type="submit" value="Find Recipes"> 
                    
                </p4>
                    
                    
            </form>
            
        </p2>
    


        
    </body>
    
</html>
