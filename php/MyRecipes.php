<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <link rel="stylesheet" type="text/css" href="MyRecipeStyles.css">
        <title>Project Nibbles and Bits</title>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
	<?php
		include 'Functions';
		loginDisplay($_SESSION["userName"]);
	?>
        
        <ul id="Nav_Bar">
            <li><a href="Index">Home</a></li>
            <li><a href="Recipes">Recipes</a></li>
            <li><a href="MyRecipes">My Recipes</a></li>
            <li><a href="Categories">Categories</a></li>
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
      
        
        <p1>
            <form id="Create_Recipes" action="AddRecipe">
                <div>
                    <Label><b>Create Your Own Recipe!</b></Label><br><br>
                    <label><b>Recipe Name</b></label>
                    <input type="text" placeholder="Recipe Name" id="Recipe_Name_Field" required><br>
                    <input type="button" value="Create Your Recipe!">
                </div>
            </form>
        </p1>

        
        
        
    </body>
    
</html>

