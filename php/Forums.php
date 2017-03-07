<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="mainstyles.css">
        <title>Project Nibbles and Bits</title>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
       	<?php
		include 'functions.php';
		loginDisplay($_SESSION["userName"]);
	?>
        
        <form action="tempLogIn.php" method="post" id="Login_Form">
            <label>User Name: </label>
            <input type="text" name="userName" placeholder="User Name">
            <label>Password: </label>
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="Submit">
        </form>

        
        
        <ul id="Nav_Bar">
            <li><a href="index.html">Home</a></li>
            <li><a href="MyRecipes.html">My Recipes</a></li>
            <li><a href="Catagories.html">Categories</a></li>
            <li><a href="Forums.html">Forums</a></li>
            <li><a href="TipsAndTricks.html">Tips and Tricks</a></li>
        </ul>
        
        
        <p1>

        </p1>
        
        

    </body>
    
</html>
