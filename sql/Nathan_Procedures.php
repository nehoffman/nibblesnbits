DELIMITER //

CREATE PROCEDURE Ingredients_Search
(
	IN name_param VARCHAR(100)
)
BEGIN

	SELECT ingredient_name, ingredient_image
	FROM Ingredients, Aliases
	WHERE ingredient_name LIKE CONCAT("%", name_param, "%")
	 OR (Aliases.ingredient_id = Ingredients.ingredient_id AND alias_name LIKE CONCAT("%", name_param, "%"));

END//

DELIMITER ;

CALL Ingredients_Search("apple");
