<?php
	//Start the session
	session_start();
	include 'Functions';
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles">
        <title>Project Nibbles and Bits</title>
        <script src="MainJS"></script>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
		<?php loginDisplay($_SESSION["userName"]); ?>

        <ul id="Nav_Bar">
            <li><a href="Index">Home</a></li>
            <li><a href="Recipes">Recipes</a></li>
            <li><a href="MyRecipes">My Recipes</a></li>
            <li><a href="Catagories">Catagories</a></li>
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
		<?php
			$recipe = connectServer("CALL recipeFound('".$_GET["recipe_id"]."')", $_SESSION["userName"]);
			while($row = mysqli_fetch_assoc($recipe))
			{
				echo "<p>";
				echo "<h2>" . $row["recipe_name"] . "</h2>";
				echo $row["recipe_instructions"];
				echo "</p>";
			}
		?>
	</body>
</html>