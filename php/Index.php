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
			include '/usr/share/nibblesnbits/php/Functions.php';
			if($_SESSION['userName'] != null)
			{
				loginDisplay($_SESSION["userName"]);
			}
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
		<form action="Index" method="get">
         	<input type="search" name="recipeName"> 
			<input id="Recipe_Submit" type="submit" value="Find Recipes"> 
		</form>
		<ul id="search">
			
		</ul>
	</body>
</html>