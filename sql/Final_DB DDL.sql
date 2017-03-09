DROP DATABASE IF EXISTS users;
DROP DATABASE IF EXISTS recipes;
CREATE DATABASE users;
CREATE DATABASE recipes;
USE users;

CREATE TABLE Users
(
   user_name VARCHAR(45) NOT NULL,
   display_name VARCHAR(70),
   hash_password VARCHAR(256) NOT NULL,
   email_address VARCHAR(128) NOT NULL UNIQUE,
   privilege_level INT NOT NULL DEFAULT 1,
   first_name VARCHAR(45) NOT NULL,
   last_name VARCHAR(45) NOT NULL,
   country VARCHAR(90),
   state VARCHAR(2),
   date_of_birth DATE,
   CONSTRAINT PRIMARY KEY (user_name)
);

use recipes;

CREATE TABLE Topics
(
   topic_id INT NOT NULL AUTO_INCREMENT,
   topic_name VARCHAR(90) NOT NULL UNIQUE,
   user_name VARCHAR(45) NOT NULL,
   parent_topic INT,
   CONSTRAINT PRIMARY KEY Topics(topic_id),
   CONSTRAINT FOREIGN KEY (user_name) REFERENCES users.Users(user_name),
   CONSTRAINT FOREIGN KEY (parent_topic) REFERENCES Topics(topic_id)
);

CREATE TABLE Threads
(
   thread_id INT NOT NULL AUTO_INCREMENT,
   thread_name VARCHAR(128) NOT NULL,
   user_name VARCHAR(45) NOT NULL,
   topic_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (thread_id),
   CONSTRAINT FOREIGN KEY (topic_id) REFERENCES Topics(topic_id)
);

CREATE TABLE Posts
(
   post_id INT NOT NULL AUTO_INCREMENT,
   post_content TEXT NOT NULL,
   time_posted DATETIME NOT NULL DEFAULT NOW(),
   user_name VARCHAR(45) NOT NULL,
   thread_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (post_id),
   CONSTRAINT FOREIGN KEY (user_name) REFERENCES users.Users(user_name),
   CONSTRAINT FOREIGN KEY (thread_id) REFERENCES Threads(thread_id)
);

CREATE TABLE Recipes
(
   recipe_id INT NOT NULL AUTO_INCREMENT,
   recipe_name VARCHAR(256) NOT NULL,
   recipe_description VARCHAR(1000) NOT NULL,
   recipe_servings INT NOT NULL,
   user_name VARCHAR(45) NOT NULL,
   thread_id INT NOT NULL,
   recipe_instructions VARCHAR(2000) NOT NULL,
   difficulty INT NOT NULL,
   comment VARCHAR(500),
   CONSTRAINT PRIMARY KEY (recipe_id),
   CONSTRAINT FOREIGN KEY (user_name) REFERENCES users.Users(user_name),
   CONSTRAINT FOREIGN KEY (thread_id) REFERENCES Threads(thread_id)
);

CREATE TABLE Categories
(
   category_id INT NOT NULL,
   category_name VARCHAR(90) NOT NULL UNIQUE,
   CONSTRAINT PRIMARY KEY (category_id)
);

CREATE TABLE Recipe_Categories
(
   category_id INT NOT NULL,
   recipe_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (category_id, recipe_id),
   CONSTRAINT FOREIGN KEY (category_id) REFERENCES Categories(category_id),
   CONSTRAINT FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id)
);

CREATE TABLE User_Favorites
(
   recipe_id INT NOT NULL,
   user_name VARCHAR(45) NOT NULL,
   CONSTRAINT PRIMARY KEY (recipe_id, user_name),
   CONSTRAINT FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id),
   CONSTRAINT FOREIGN KEY (user_name) REFERENCES users.Users(user_name)
);

CREATE TABLE Ingredient_Categories
(
    ingredient_type INT NOT NULL,
    ingredient_category_name VARCHAR(45) NOT NULL,
    CONSTRAINT PRIMARY KEY (ingredient_type)
);

CREATE TABLE Ingredients
(
   ingredient_id INT NOT NULL AUTO_INCREMENT,
   ingredient_name VARCHAR(100) NOT NULL UNIQUE,
   ingredient_type INT NOT NULL,
   ingredient_allergen TINYINT(8) NOT NULL DEFAULT 0,
   ingredient_image MEDIUMBLOB NOT NULL,
   CONSTRAINT PRIMARY KEY (ingredient_id)
);

CREATE TABLE Aliases
(
   alias_id INT NOT NULL AUTO_INCREMENT,
   ingredient_id INT NOT NULL,
   alias_name VARCHAR(100) NOT NULL,
   CONSTRAINT PRIMARY KEY (alias_id),
   CONSTRAINT FOREIGN KEY (ingredient_id) REFERENCES Ingredients(ingredient_id)
);

CREATE TABLE Measurement_Types
(
   measurement_id INT NOT NULL AUTO_INCREMENT,
   measurement_name VARCHAR(50) NOT NULL UNIQUE,
   CONSTRAINT PRIMARY KEY (measurement_id)
);

CREATE TABLE Measurement_Aliases
(
   measurement_alias_id INT NOT NULL AUTO_INCREMENT,
   measurement_id INT NOT NULL,
   measurement_name VARCHAR(50) NOT NULL,
   CONSTRAINT PRIMARY KEY (measurement_alias_id),
   CONSTRAINT FOREIGN KEY (measurement_id) REFERENCES Measurement_Types(measurement_id)
);

CREATE TABLE Blacklist_Table
(
   ingredient_id INT NOT NULL,
   user_name VARCHAR(45) NOT NULL,
   maximum_amount INT NOT NULL,
   measurement_id INT,
   CONSTRAINT PRIMARY KEY (ingredient_id),
   CONSTRAINT FOREIGN KEY (measurement_id) REFERENCES Measurement_Types(measurement_id)
);

CREATE TABLE Nutrition
(
   ingredient_id INT NOT NULL,
   serving_size INT NOT NULL,
   measurement_id INT NOT NULL,
   total_fat DECIMAL(9,2),
   saturated_fat DECIMAL(9,2),
   cholesterol DECIMAL(9,2),
   sodium DECIMAL(9,2),
   potassium DECIMAL(9,2),
   total_carbohydrate DECIMAL(9,2),
   fiber DECIMAL(9,2),
   protein DECIMAL(9,2),
   vitamin_a DECIMAL(9,2),
   vitamin_c DECIMAL(9,2),
   calcium DECIMAL(9,2),
   iron DECIMAL(9,2),
   vitamin_d DECIMAL(9,2),
   vitamin_e DECIMAL(9,2),
   vitamin_k DECIMAL(9,2),
   thiamin DECIMAL(9,2),
   riboflavin DECIMAL(9,2),
   niacin DECIMAL(9,2),
   vitamin_b6 DECIMAL(9,2),
   foliate DECIMAL(9,2),
   vitamin_b12 DECIMAL(9,2),
   biotin DECIMAL(9,2),
   pantothenic_acid DECIMAL(9,2),
   phosphorus DECIMAL(9,2),
   iodine DECIMAL(9,2),
   magnesium DECIMAL(9,2),
   zinc DECIMAL(9,2),
   selenium DECIMAL(9,2),
   copper DECIMAL(9,2),
   manganese DECIMAL(9,2),
   chromium DECIMAL(9,2),
   molybdenum DECIMAL(9,2),
   chloride DECIMAL(9,2),
   CONSTRAINT PRIMARY KEY (ingredient_id),
   CONSTRAINT FOREIGN KEY (ingredient_id) REFERENCES Ingredients(ingredient_id),
   CONSTRAINT FOREIGN KEY (measurement_id) REFERENCES Measurement_Types(measurement_id)
);

CREATE TABLE Ingredients_On_Hand
(
   user_name VARCHAR(45) NOT NULL,
   ingredient_id INT NOT NULL,
   quantity INT NOT NULL,
   measurement_id INT,
   CONSTRAINT PRIMARY KEY (user_name, ingredient_id),
   CONSTRAINT FOREIGN KEY (measurement_id) REFERENCES Measurement_Types(measurement_id)
);

CREATE TABLE Ingredient_List
(
   recipe_id INT NOT NULL,
   ingredient_id INT NOT NULL,
   measurement FLOAT NOT NULL,
   measurement_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (recipe_id, ingredient_id),
   CONSTRAINT FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id),
   CONSTRAINT FOREIGN KEY (measurement_id) REFERENCES Measurement_Types(measurement_id)
);

CREATE TABLE Equipment
(
   equipment_id INT NOT NULL AUTO_INCREMENT,
   equipment_name VARCHAR(90) NOT NULL UNIQUE,
   CONSTRAINT PRIMARY KEY (equipment_id)
);

CREATE TABLE Preparation
(
   preparation_id INT NOT NULL AUTO_INCREMENT,
   preparation_instructions TEXT NOT NULL,
   difficulty INT NOT NULL,
   ingredient_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (preparation_id),
   CONSTRAINT FOREIGN KEY (ingredient_id) REFERENCES Ingredients(ingredient_id)
);

CREATE TABLE Recipe_Ingredient_Preparation
(
   recipe_id INT NOT NULL,
   preparation_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (recipe_id, preparation_id),
   CONSTRAINT FOREIGN KEY (preparation_id) REFERENCES Preparation(preparation_id),
   CONSTRAINT FOREIGN KEY (recipe_id) REFERENCES Recipes(recipe_id)
);

CREATE TABLE Equipment_Needed
(
   equipment_id INT NOT NULL,
   preparation_id INT NOT NULL,
   CONSTRAINT PRIMARY KEY (equipment_id, preparation_id),
   CONSTRAINT FOREIGN KEY (equipment_id) REFERENCES Equipment(equipment_id),
   CONSTRAINT FOREIGN KEY (preparation_id) REFERENCES Preparation(preparation_id)
);
