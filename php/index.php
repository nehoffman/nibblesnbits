<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="mainstyles.css">
        <title>Project Nibbles and Bits</title>
        <script src="mainJS.js"></script>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
	<?php
		include 'functions.php';
		loginDisplay($_SESSION["userName"]);
	?>
        
      
        <ul id="Nav_Bar">
            <li><a href="index.php">Home</a></li>
            <li><a href="MyRecipes.php">My Recipes</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <li><a href="Forums.php">Forums</a></li>
            <li><a href="TipsAndTricks.php">Tips and Tricks</a></li>
        </ul>
        
     
        <p2>
      
            <form action="RecipesFound.php" method="post">       
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
                    
                    <div id="Ingredients_Chosen">
                    
                    </div>

                    <input id="Recipe_Submit" type="submit" value="Find Recipes"> 
                    
                </p4>
                    
            </form>
            
        </p2>
    


        
    </body>
    

</html>

