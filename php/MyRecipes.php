<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <link rel="stylesheet" type="text/css" href="MyRecipesStyles.css">
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
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
		
		
      
            <form id="Create_Recipe" method="post" action="Temp_Var.php">
                
                <label>Recipe Name: <br>
                <input type="text" name="Recipe_Name">
                <br>
                <label>Ingredient List: <br>
                <input type="search" name="Ingredient_Search">
                <br>
                <label>Recipe Steps: <br>
                <textarea rows='5' cols='50' name="Recipe_Steps"></textarea>
                <br>
                <label>Recipe Difficulty: <br>
                <select name="Difficulty_Rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                
                <label>Comments: <br>
                <textarea rows='4' cols="25" name="Recipe_Comments"></textarea>
                <br>
                
                <input type="submit" value="Submit Your Recipe">
                <br>
            </form>
            
            
        
        
        
    </body>
    
</html>

