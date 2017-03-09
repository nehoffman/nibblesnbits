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
		<ul id="search">
			<?php
				$posts = connectServer("CALL getPosts('".$_GET["thread_id"]."')", $_SESSION["userName"]);
				while($row = mysqli_fetch_assoc($posts))
				{
					echo "<li class='search'>";
					echo "<p style='float: right'>" . $row["user_name"] . " posted at " . $row["time_posted"] . "</p><br>";
					echo "<p>" . $row["post_content"] . "</p>";
					echo "</li>";
				}
			?>
		</ul>
		<?php
		if($_SESSION["privelege"] != -1 && $_SESSION["privelege"] <= 5)
		{
			//form to post a message
			echo "<form method='POST'>";
			echo "Message: ";
			echo "<input type='text' name='post'>";
			echo "<input type='submit' value='Post'";
			echo "</form>";
		}
		?>
	</body>
</html>