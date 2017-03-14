<?php
	//Start the session
	session_start();
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles.css">
        <title>Project Nibbles and Bits</title>
        <script src="MainJS.js"></script>
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
		<?php
			//retrieves the header
			if($_GET["topic_id"] != null)
				$_SESSION["topic_id"] = $_GET["topic_id"];
			$db = new PDO("mysql:host=localhost; dbname=recipes", "root", "password");
			$resultSet = $db->prepare("CALL topicFound('".$_SESSION["topic_id"]."')");
			$resultSet->execute();
			for($i=0;$i<$resultSet->rowCount();$i++)
			{
				$resultArray = $resultSet->fetch();
				echo "<h2>" . $resultArray["topic_name"] . "</h2>";
			}
		?>
		<form method='GET'>
        	<input type="search" name="topic"> 
			<input id="Recipe_Submit" type="submit" value="Find Topics"> 
		</form>
		<ul style="height: 70%" id="search">
			<?php
				//$db = new PDO("mysql:host=localhost; dbname=recipes", "root", "password");
				//$resultSetA = $db->prepare("CALL insertThread('".$_POST["threadName"]."', '".$_SESSION["userName"]."', ".$_GET["topic_id"].")");
				//$resultSetA->execute();
				$db = new PDO("mysql:host=localhost; dbname=recipes", "root", "password");
				$resultSet = $db->prepare("CALL getThreads('".$_GET["topic"]."',".$_SESSION["topic_id"].");");
				$resultSet->execute();	
				for($i=0;$i<$resultSet->rowCount();$i++)
				{
					$resultArray = $resultSet->fetch();
					echo "<button class='search' onclick=location.href='Thread?thread_id=" . $resultArray["thread_id"] . "'>" . $resultArray["thread_name"] . "</button>";
					echo "<br>";
				}
			?>
		</ul>
		<?php
		if($_SESSION["privelege"] != -1 && $_SESSION["privelege"] <= 5 && $_SESSION["topic_id"] != 1)
		{
			//form to add a thread
			echo "<form action=Threads?topic_id=".$_GET["topic_id"]." id='add' method='POST'>";
			echo "Create a Thread: ";
			echo "<input type='text' name='threadName'>";
			echo "<input type='submit' value='Create'>";
			echo "</form>";
		}
		?>
	</body>
</html>