/*
*Jacob Baker
*February 14, 2017
*userProcedures.sql - contains all procedures for user data
*/

/* changes delimiter */
DELIMITER //

/* uses select statements to "login" */
/* if login succedes than it returns the privelege level between 0 and 10 else it returns -1 */
CREATE FUNCTION login
(
	userName VARCHAR(45),
	hashedPassword VARCHAR(256)
)
RETURNS TINYINT
DETERMINISTIC
READS SQL DATA
BEGIN
	DECLARE privelege TINYINT;
	DECLARE CONTINUE HANDLER FOR NOT FOUND
		SET privelege = -1;

	SELECT privilege_level
		INTO privelege
		FROM Users
		WHERE
			user_name = userName AND
			hash_password = hashedPassword;

	RETURN(privelege);
END//

/* creates a user
CREATE PROCEDURE createUser
(
userName VARCHAR(45),
password VARCHAR(45), 
email VARCHAR(45),
firstName VARCHAR(45),
lastName VARCHAR(45),
country VARCHAR(45),
state VARCHAR(2),dob DATE
)
BEGIN
	/* adds user to database
	INSERT INTO Users VALUE
		(userName, CONCAT(firstName, ' ', lastName), password, email, 1, firstName, lastName, country, state, dob);
	/* creates mysql user
	CREATE USER userName IDENTIFIED BY password;
	GRANT EXECUTE
		ON users.updatePassword, users.updateUserName, users.updateDisplayName
		TO userName;
END//*/

/* updates password
CREATE PROCEDURE updatePassword(DECLARE userName VARCHAR(45), DECLARE newPassword VARCHAR(45))
BEGIN
	UPDATE Users
		WHERE user_name = userName
		SET hash_password = newPassword;
	/* needs to change password for database
END//*/

/* updates userName
CREATE PROCEDURE updateUserName(DECLARE userName VARCHAR(45), DECLARE newUserName VARCHAR(45))
BEGIN
	UPDATE Users
		SET user_name = newUserName
		WHERE user_name = userName;
END//*/

/* updates displayName
CREATE PROCEDURE updateDisplayName(DECLARE userName VARCHAR(45), DECLARE newDisplayName VARCHAR(45))
BEGIN
	UPDATE Users
		SET display_name = newDisplayName
		WHERE user_name = userName;
END//*/

/* changes it back */
DELIMITER ;
