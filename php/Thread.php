<?php
	//Start the session
	session_start();
	include 'Functions';
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
            <li><a href="Forums">Forums</a></li>
            <li><a href="TipsAndTricks">Tips and Tricks</a></li>
        </ul>
		<ul styles="height: 70%" id="search">
			<?php
				/*if($_POST["post"]  != null)
				{
					$error = connectServer("CALL insertPost('".$_POST["post"]."','".$_SESSION["userName"]."','".$_GET["thread_id"]."')", $_SESSION["userName"]);
					if($error != null)
						echo "<script> alert('$error'); </script>";
				}*/
				$db = new PDO("mysql:host=localhost; dbname=Final_DB", "root", "password");
				$resultSet = $db->prepare("CALL getPosts(".$_GET["thread_id"].");");
				$resultSet->execute();
				for($i=0;$i<$resultSet->rowCount();$i++)
				{
					echo "<li class='search'>";
					echo "<p style='float: right'>" . $row["user_name"] . " posted at " . $row["time_posted"] . "</p><br>";
					echo "<p>" . $row["post_content"] . "</p>";
					echo "</li>";
				}
			?>
		</ul>
		<?php
		/*if($_SESSION["privelege"] != -1 && $_SESSION["privelege"] <= 5)
		{
			//form to post a message
			echo "<form action='Thread?thread_id=".$_GET["thread_id"]."' id='add' method='POST'>";
			echo "Message: ";
			echo "<input type='text' name='post'>";
			echo "<input type='submit' value='Post'";
			echo "</form>";
		}*/
		?>
	</body>
</html>