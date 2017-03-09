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
		<?php loginDisplay($_SESSION["userName"]); ?>

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
		<form method="get">
        	<input type="search" name="topic"> 
			<input id="Recipe_Submit" type="submit" value="Find Topics"> 
		</form>
		<ul style="height: 70%" id="search">
			<?php
				$threads = connectServer("CALL getThreads('".$_GET["topic"]."','".$_GET["topic_id"]."');", $_SESSION["userName"]);
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
			echo "<form id='add' method='POST'>";
			echo "Create a Thread: ";
			echo "<input type='text' name='threadName'>";
			echo "<input type='submit' value='Create'";
			echo "</form>";
		}
		?>
	</body>
</html>