<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Nathan Hoffman">
	<link rel="stylesheet" type="text/css" href="css/mainstyles.css">
    <link rel="stylesheet" type="text/css" href="css/SearchStyles.css">
</head>

<body>
        <ul id="Nav_Bar">
            <li><a href="index">Home</a></li>
            <li><a href="Recipes">Recipes</a></li>
            <li><a href="MyRecipes">My Recipes</a></li>
            <li><a href="Catagories">Catagories</a></li>
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>

<form action="IngredientSearch" method="post">
	
	<input type="search" id="Search_Ingredients" name="ingredientSearch">
	<ul id="Ingredient_List">
		<?php
			ini_set("display_errors", "1");
			error_reporting(E_ERROR);
		
			try
			{
				$db = new PDO("mysql:host=localhost;dbname=Final_DB", "root", "8badges");
			}
			catch(PDOException $e)
			{
				echo($e->getMessage());
			}
		
			$name_param = $_POST["ingredientSearch"];
		
			if($name_param == null)
				$resultSet = $db->prepare("SELECT * FROM Ingredients ORDER BY ingredient_name;");
			else
			{
				$resultSet = $db->prepare("SELECT ingredient_name, ingredient_image ".
										  "FROM Ingredients LEFT JOIN Aliases ".
										  "ON Aliases.ingredient_id = Ingredients.ingredient_id ".
										  "WHERE ingredient_name LIKE CONCAT(\"%\", :name_param, \"%\") ".
										  "OR alias_name LIKE CONCAT(\"%\", :name_param, \"%\") ".
										  "ORDER BY ingredient_name;");
				$resultSet->bindValue(':name_param', $name_param);
			}
			$resultSet->execute();
			for($i = 0; $i < $resultSet->rowCount(); $i++)
			{
				$resultArray = $resultSet->fetch();
				echo "<li>";
				echo "<img src='" . $resultArray["ingredient_image"] . "'>";
				echo $resultArray["ingredient_name"];
				echo "</li>";
			}
		
			$resultSet->closeCursor();
		?>
	</ul>

</form>

	<script type="text/javascript" src="javascript/dragAndDrop.js">console.log("3");</script>
	
</body>
</html>
