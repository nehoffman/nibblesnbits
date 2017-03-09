<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="mainstyles.css">
        <title>Project Nibbles and Bits</title>
        <script src="mainJS.js"></script>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
		        
        <form action="tempLogIn.php" method="post" id="Login_Form">
            <label>User Name: </label>
            <input type="text" name="userName" placeholder="User Name">
            <label>Password: </label>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="Submit">
        </form>

        <ul id="Nav_Bar">
            <li><a href="index.php">Home</a></li>
            <li><a href="MyRecipes.php">My Recipes</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <li><a href="Forums.php">Forums</a></li>
            <li><a href="TipsAndTricks.php">Tips and Tricks</a></li>
        </ul>
        
  		<h2>Ingredients Search</h2>
		<form action="index.php" method="post">
         	<input type="search" name="recipeName"> 
			<input id="Recipe_Submit" type="submit" value="Find Recipes"> 
		</form>
		<?php
			include 'functions.php';
			loginDisplay($_SESSION["userName"]);
			$recipes = connectServer("Select * FROM Recipes;", jBaker);
		?>
	</body>
</html>