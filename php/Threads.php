<?php
	//Start the session
	session_start();
	include 'Functions';
?>
<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="MainStyles">
        <title>Project Nibbles and Bits</title>
        <script src="MainJS"></script>
    </head>
    
    <body>
        <h1>Project Nibbles and Bits</h1>
		<?php
			loginDisplay($_SESSION["userName"]);
			if($_GET["topic_id"] != null)
				$_SESSION["topic_id"] = $_GET["topic_id"];
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
			$topic = connectServer("CALL topicFound('".$_GET["topic_id"]."')", $_SESSION["userName"]);
			while($row = mysqli_fetch_assoc($topic))
			{
				echo "<h2>" . $row["topic_name"] . "</h2>";
			}
		?>
		<form method='GET'>
        	<input type="search" name="topic"> 
			<input id="Recipe_Submit" type="submit" value="Find Topics"> 
		</form>
		<ul style="height: 70%" id="search">
			<?php
				connectServer("CALL insertThread('".$_POST["threadName"]."', '".$_SESSION["userName"]."', ".$_GET["topic_id"].")", $_SESSION["userName"]);
				$threads = connectServer("CALL getThreads('".$_GET["topic"]."',".$_SESSION["topic_id"].");", $_SESSION["userName"]);
				while($row = mysqli_fetch_assoc($threads))
				{
						echo "<button class='search' onclick=location.href='Thread?thread_id=" . $row["thread_id"] . "'>" . $row["thread_name"] . "</button>";
						echo "<br>";
				}
			?>
		</ul>
		<?php
		if($_SESSION["privelege"] != -1 && $_SESSION["privelege"] <= 5 && $_GET["topic_id"] != 1)
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