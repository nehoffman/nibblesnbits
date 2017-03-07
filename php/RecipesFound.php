<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="mainstyles.css">
        <link rel="stylesheet" type="text/css" href="SearchStyles.css">
        <title>Project Nibbles and Bits</title>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
	<?php
		include 'functions.php';
		loginDisplay($_SESSION["userName"]);
	?>
        
        <ul id="Nav_Bar">
            <li><a href="index.php">Home</a></li>
            <li><a href="Recipes.php">Recipes</a></li>
            <li><a href="MyRecipes.php">My Recipes</a></li>
            <li><a href="Catagories.php">Catagories</a></li>
            <li><a href="Forums.php">Forums</a></li>
            <li><a href="TipsAndTricks.php">Tips and Tricks</a></li>
        </ul>
        
        
        <p1>
        
        </p1>
    
 

        
    </body>
    
</html>
