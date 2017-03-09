<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles">
        <title>Project Nibbles and Bits</title>
        <script src="MainJs"></script>
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
        
  		<h2>Ingredients Search</h2>
		<form action="Index" method="get">
         	<input type="search" name="recipeName"> 
			<input id="Recipe_Submit" type="submit" value="Find Recipes"> 
		</form>
		<ul id="recipeSearch">
			<?php
				$recipes = connectServer("CALL getRecipes('".$_GET["recipeName"]."');", $_SESSION["userName"]);
				while($row = mysqli_fetch_assoc($recipes))
				{
						//echo "<button class='recipeSearch' onclick=location.href='Recipe?recipe_id=" . $row["recipe_id"] . "'>" . $row["recipe_name"] . "by " . $row["user_name"] . " " . $row["recipe_servings"] . " servings Description: " . $row["recipe_description"] . "</button>";
						echo "<p>".$row["recipe_name"]."</p>";
						echo "<br>";
				}
			?>
			
		</ul>
	</body>
</html>