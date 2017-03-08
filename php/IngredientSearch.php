<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Nathan Hoffman">
	<link rel="stylesheet" type="text/css" href="mainstyles.css">
        <link rel="stylesheet" type="text/css" href="SearchStyles.css">
</head>

<body>

<input type="search" id="Search_Ingredients">

<form action="RecipesFound.php" method="post">

	<p3>
		<ul id="Ingredient_List">
			<?php
				$resultSet = $db->query("SELECT ingredient_name, ingredient_image".
					   		"FROM Ingredients, Aliases".
					   		"WHERE ingredient_name LIKE CONCAT(\"%\", $name_param, \"%\")".
	 				   		"OR (Aliases.ingredient_id = Ingredients.ingredient_id AND alias_name LIKE".
							"CONCAT(\"%\", $name_param, \"%\"));");
				$resultArray[] = $resultSet->fetchAll();

				for($i = 0; $i < $resultArray.length; $i++)
				{
					echo(<li>$resultArray[$i]</li>);
				}
			?>
		</ul>
	</p3>

</form>

</body>
</html>
