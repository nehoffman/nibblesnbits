<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <title>Project Nibbles and Bits</title>
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
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
		<h2>Topic Search</h2>
		<form action="Forums" method="get">
         	<input type="search" name="topic"> 
			<input id="Recipe_Submit" type="submit" value="Find Topics"> 
		</form>
		<ul styles="height: 70%" id="search">
			<?php
				$db = new PDO("mysql:host=localhost; dbname=Final_DB", "root", "password");
				$resultSet = $db->prepare("CALL getTopics('".$_GET["topic"]."');");
				$resultSet->execute();
				for($i=0;$i<$resultSet->rowCount();$i++)
				{
					$resultArray = $resultSet->fetch();
					echo "<button class='search' onclick=location.href='Threads?topic_id=" . $resultArray["topic_id"] . "'>" . $resultArray["topic_name"] . "</button>";
					echo "<br>";
				}
			?>
		</ul>
    </body>
</html>
