<?php
	/*
		Author: Nathan Hoffman
		Creates a new user using the data from the SignUp.php form, logs them in, then redirects to Index
	*/

	// Enables error detection
	ini_set('display_errors', '1');
	error_reporting(E_ERROR);

	session_start();

	// Checks to make sure that the user is not logged in
	if($_SESSION["userName"] != true || $_SESSION["userName"] != null)
	{
		
		// Saves all the input from the form to variables
		$username = $_POST['User_Name'];
		$email = $_POST['User_Email'];
		$password = $_POST['User_Password'];
		$firstname = $_POST['First_Name'];
		$lastname = $_POST['Last_Name'];
		$country = $_POST['User_Country'];
		$state = $_POST['User_State'];
		$birthdate = $_POST['User_DOB'];
		
		// Logs in as the root user to add a user
		try
		{
			$db = new PDO("mysql:host=localhost;dbname=Final_DB", "root", "password");
		}
		catch(PDOException $e)
		{
			echo($e->getMessage());
		}
		
		$PDOStatement = $db->prepare(
			"INSERT INTO Users (user_name, email_address, hash_password, first_name, last_name, " . 
			"country, state, date_of_birth) VALUES (:User_Name, :User_Email, :User_Password, " .
			":First_Name, :Last_Name, :User_Country, :User_State, :User_DOB)"
		);
		
		// Catches Strange errors
		if(!($PDOStatement->bindValue(":User_Name", $username)))
		   echo "Error username invalid";
		elseif(!$PDOStatement->bindValue(":User_Email", $email))
		   echo "Error email invalid";
		elseif(!$PDOStatement->bindValue(":User_Password", $password))
		   echo "Error password invalid";
		elseif(!$PDOStatement->bindValue(":First_Name", $firstname))
		   echo "Error first name is invalid";
		elseif(!$PDOStatement->bindValue(":Last_Name", $lastname))
		   echo "Error last name is invalid";
		
		// These are optional, so they can run separately
		if(!$PDOStatement->bindValue(":User_Country", $country))
		   echo "Error country is invalid";
		if(!$PDOStatement->bindValue(":User_State", $state))
		   echo "Error state is invalid";
		if(!$PDOStatement->bindValue(":User_DOB", $birthdate))
		   echo "Error date of birth is invalid";

		// Runs the SQL statement
		$PDOStatement->execute();
		
		// Adds quotes to the statements
		$qusername = $db->quote($username);
		$qpassword = $db->quote($password);
		
		// Creates another PDOStatement
		$createuser = $db->query(
			"CREATE USER $qusername@'localhost' IDENTIFIED BY $qpassword"
		);

		$grantoptions = $db->query(
			"GRANT SELECT, EXECUTE, CREATE ROUTINE ON Final_DB.* TO $qusername@'localhost'"
		);
		
		// Checks to see if there are errors. If there are no errors it will log the user in.
		if($PDOStatement->errorCode() == "00000" && $createuser && $grantoptions)
		{
			include '/usr/share/nibblesnbits/php/Functions.php';
			$errorCheck = login($username, $password);
			if($errorCheck != null)
			{
				echo $errorCheck;
			}
			
			echo "Congratulations! You have successfully created an account " .
				 $_SESSION["userName"] . "!";
			
			$db = null;
			$PDOStatement->closeCursor();
			header('Refresh: 5;Index.php');
		}
		else
		{
			if($PDOStatement->errorCode())
			foreach($PDOStatement->errorInfo() as $value)
			{
				echo $value;
				echo "<br>";
			}
			
			if(!$createuser)
				echo "Error creating user";
			
			if(!$grantoptions)
				echo "Error granting priviliges";
		}
		// Closes connection completely
		$db = null;
		$PDOStatement->closeCursor();
		
	}
	else
	{
		echo "You need to be logged out to create a new user, " . $_SESSION["userName"];
	}
?>