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
				$result = connectServer("SELECT * FROM Ingredients LIMIT 50;", "nhoffman");
				tableToHTML($result);
			?>
		</ul>
	</p3>

</form>

</body>
</html>
