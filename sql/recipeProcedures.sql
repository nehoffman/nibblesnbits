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
	SELECT recipe_name, recipe_description, recipe_servings, user_name, recipe_instruction, difficulty, comment
		FROM Recipes
		WHERE
			recipe_name LIKE(criteria);
END//

/* changes it back */
DELIMITER ;
