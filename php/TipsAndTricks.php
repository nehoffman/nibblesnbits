<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="css/mainstyles.css">
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
            <li><a href="Catagories">Catagories</a></li>
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
        
        
        <p1>
        
        </p1>
        

        
    </body>
    
</html>
