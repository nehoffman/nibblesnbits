<DOCTYPE html>
<html>
    <head>  
        <link rel="stylesheet" type="text/css" href="mainstyles.css">
        <link rel="stylesheet" type="text/css" href="SearchStyles.css">
        <title>Project Nibbles and Bits</title>
    </head>

    <body>
        <h1>Project Nibbles and Bits</h1>

        <ul id="Nav_Bar">
            <li><a href="index.html">Home</a></li>
            <li><a href="Recipes.html">Recipes</a></li>
            <li><a href="MyRecipes.html">My Recipes</a></li>
            <li><a href="Categories.html">Categories</a></li>
            <li><a href="Forums.html">Forums</a></li>
            <li><a href="TipsAndTricks.html">Tips and Tricks</a></li>
        </ul>

        <p2>
            <form action="RecipesFound.php" method="post">  
                <p3>
			<h2>Ingredients Search</h2>

			<input type="search" id="Search_Ingredients">

                        <div id="Ingredients_Found">
				<iframe src="IngredientSearch.php">
                        </div>
                </p3>

                <div id="Add_Item_Container">
		</div>

                <p4>
                    <div id="Ingredients_Chosen"></div>

                    <input id="Recipe_Submit" type="submit" value="Find Recipes"> 
                </p4>       
            </form>
        </p2>
    </body>
</html>
