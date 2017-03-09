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

/* after a topic is found it gives all of the information about the topic away */
CREATE PROCEDURE topicFound(criteria INT)
BEGIN
	SELECT * FROM Topics
		WHERE topic_id = criteria;
END//

/* searches for all threads in the Forums section */
CREATE PROCEDURE getThreads(criteria VARCHAR(128), topicId INT)
BEGIN
	SET criteria = CONCAT("%", criteria , "%");
	SELECT thread_id, thread_name
		FROM Threads
		WHERE
			thread_name LIKE(criteria) AND
			topic_id = topicId;
END//

/* retrieves all posts in a thread */
CREATE PROCEDURE getPosts(threadId INT)
BEGIN
	SELECT post_content, user_name, time_posted
		FROM Posts
		WHERE
			thread_id = threadId;
END//

/* adds a post */
CREATE PROCEDURE insertPost(content TEXT, user VARCHAR(45), thread INT)
BEGIN
	INSERT INTO Posts(post_content, user_name, thread_id) VALUES
		(content, user, thread);
END//

/* adds a thread */
CREATE PROCEDURE insertThread(name VARCHAR(128), user VARCHAR(45), topic INT)
BEGIN
	INSERT INTO Threads(thread_name, user_name, topic_id) VALUES
		(name, user, topic);
END//

/* changes it back */
DELIMITER ;