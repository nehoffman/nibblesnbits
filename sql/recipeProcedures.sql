/*
*Jacob Baker
*February 23, 2017
*recipeProcedures.sql - contains all procedures for recipe data
*/

/* changes delimiter */
DELIMITER //

/* searches for all recipes includes a limited nutritional facts */
CREATE PROCEDURE getRecipes(criteria VARCHAR(128))
BEGIN
	SET criteria = CONCAT("%", criteria , "%");
	SELECT recipe_id, recipe_name, recipe_description, recipe_servings, user_name
		FROM Recipes
		WHERE
			recipe_name LIKE(criteria) OR
			recipe_description LIKE(criteria);
END//

/* after a recipe is found the recipe_id is entered and gives all of the recipe information to the user */
CREATE PROCEDURE recipeFound(criteria INT)
BEGIN
	SELECT * FROM Recipes
		WHERE recipe_id = criteria;
END//

/* searches for all topics in the Forums section */
CREATE PROCEDURE getTopics(criteria VARCHAR(128))
BEGIN
	SET criteria = CONCAT("%", criteria , "%");
	SELECT topic_id, topic_name
		FROM Topics
		WHERE
			topic_name LIKE(criteria);
END//

/* changes it back */
DELIMITER ;