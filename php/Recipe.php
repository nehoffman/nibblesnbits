<?php
	//Start the session
	session_start();
	include 'Functions';
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <title>Project Nibbles and Bits</title>
        <script src="MainJS.js"></script>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
		<?php loginDisplay($_SESSION["userName"]); ?>

        <ul id="Nav_Bar">
            <li><a href="Index">Home</a></li>
            <li><a href="Recipes">Recipes</a></li>
            <li><a href="MyRecipes">My Recipes</a></li>
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
		<?php
			//recipe details
			$db = new PDO("mysql:host=localhost; dbname=Final_DB", "root", "password");
			$resultSet = $db->prepare("CALL recipeFound('".$_GET["recipe_id"]."');");
			$resultSet->execute();
			$resultArray = $resultSet->fetch();
			$recipeId = $resultArray["recipe_id"];
			echo "<h2>" . $resultArray["recipe_name"] . "</h2>";
			echo "<p id='instructions'>";
			echo $resultArray["recipe_instructions"];
			echo "</p>";
			$resultSet->closeCursor();
		?>
		
		<ul id='ingredients'>
			<?php
				//ingredient details
				$resultSet = $db->prepare("CALL getIngredients($recipeId)");
				$resultSet->execute();
				echo "<li> Ingredients: </li><br>";
				for($i=0;$i<$resultSet->rowCount();$i++)
				{
					$resultArray = $resultSet->fetch();
					echo "<li class='ingredients'>";
					echo "<img src='" . $resultArray["ingredient_image"] . "'> ";
					echo $resultArray["ingredient_name"];
					echo " " . $resultArray["measurement"] . $resultArray["measurement_name"];
					echo "</li><br>";
				}
				$resultSet->closeCursor();
			?>
		</ul>
	</body>
</html>