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
				$db = new PDO("mysql:host=localhost;dbname=Final_DB", "root", "password");
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
			for($i = 1; $i < $resultSet->rowCount() + 1; $i++)
			{
				$resultArray = $resultSet->fetch();
				$ingredient_name = $resultArray["ingredient_name"];
				echo "<li>";
				echo "<img src='" . $resultArray["ingredient_image"] . "'>";
				echo $ingredient_name;
				echo "<input type='checkbox' name='$i' value='$ingredient_name'>";
				echo "</li>";
			}
		
			$resultSet->closeCursor();
		?>
	</ul>
	
	<ul id="Recipe_List">
		<?php
			ini_set("display_errors", "1");
			ini_set('memory_limit', '1024M');
			error_reporting(E_ERROR);
		
			if($_POST['submitted'] != null) {
				
				$ingredientsSelected = array();
				
				$b = 0;
				
				foreach($_POST as $key => $value) {
					if($key != "ingredientSearch" && $key != "submitted") {
						$ingredientsSelected[$b] = $value;
						$b = $b + 1;
					}
						
				}
				
				$queryHeader="SELECT DISTINCT Recipes.recipe_id, recipe_name FROM Recipes, Ingredient_List, Ingredients ".
							 "WHERE Ingredients.ingredient_id = Ingredient_List.ingredient_id AND Recipes.recipe_id = ".
							 "Ingredient_List.recipe_id AND (ingredient_name = :ingredientName0";
				
				$queryFooter="";
				
				if(count($ingredientsSelected) != null)
				for($i = 1; $i < count($ingredientsSelected); $i++)
				{
					$queryFooter .= " OR ingredient_name = :ingredientName" . $i;
				}
				
				$queryFooter .= ");";
				
				try
				{
					$db = new PDO("mysql:host=localhost;dbname=Final_DB", "root", "password");
				}
				catch(PDOException $e)
				{
					echo($e->getMessage());
				}
				
				$recipesFound = $db->prepare($queryHeader . $queryFooter);
				
			
				
				if(count($ingredientsSelected) != null)
				for($i = 0; $i < count($ingredientsSelected); $i++)
				{
					$recipesFound->bindValue(":ingredientName" . $i, $ingredientsSelected[$i]);
				}
				
				$recipesFound->execute();
				
				$resultArray2 = $recipesFound->fetch();
				while ($resultArray2 != null)
				{
					// Use $resultArray2['recipe_id'] to use the id for something;
					// Redirect to the recipe display from here
					echo "<li>";
					echo $resultArray2['recipe_name'];
					echo "</li>";
					$resultArray2 = $recipesFound->fetch();
				}
				
				$recipesFound->closeCursor();
			}
		?>
	</ul>
	
	<ul id="Ingredients_Chosen">
	</ul>
	
	<input type='checkbox' name='submitted' value='true'>
	<script type="text/javascript" src="javascript/dragAndDrop.js"></script>
	
</form>
	
</body>
</html>
