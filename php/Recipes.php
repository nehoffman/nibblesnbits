<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <title>Project Nibbles and Bits</title>
        <script src="MainJs.js"></script>
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
        
  		<h2>Recipe Search</h2>
		<form action="Recipes" method="get">
         	<input type="search" name="recipeName"> 
			<input id="Recipe_Submit" type="submit" value="Find Recipes"> 
		</form>
		<ul id="search">
			<?php
				$db = new PDO("mysql:host=localhost; dbname=Final_DB", "root", "password");
				$resultSet = $db->prepare("CALL getRecipes('".$_GET["recipeName"]."');");
				$resultSet->execute();
				for($i=0;$i<$resultSet->rowCount();$i++)
				{
					$resultArray = $resultSet->fetch();
					echo "<button class='search' onclick=location.href='Recipe?recipe_id=" . $resultArray["recipe_id"] . "'>" . $resultArray["recipe_name"] . "by " . $resultArray["user_name"] . " " . $resultArray["recipe_servings"] . " servings Description: " . $resultArray["recipe_description"] . "</button>";
					echo "<br>";
				}
				$resultSet->closeCursor();
			?>
		</ul>
	</body>
</html>