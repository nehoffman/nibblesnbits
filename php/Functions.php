<?php
//Jacob Baker
//February 8, 2017
//functions.php - functions that bridge sql and html together in oh-so-sweet harmony

	//connects to server and returns errors
	/*function connectServer($query, $userName)
	{
		$link = mysqli_connect("localhost", "anonymous", "anonymous", "recipes");
		$result = mysqli_query($link, $query);
		/*$link = mysqli_connect("localhost","login","login","users");
		if(mysqli_connect_errno())
			$result = "Failed to connect to MySQL: " . mysqli_connect_error();
		else
		{
			$password = mysqli_query($link, "SELECT hash_password FROM Users WHERE user_name = $userName;");
			while($row = mysqli_fetch_assoc($password))
				$password = $row["hash_password"];
			$link = mysqli_connect("localhost",$userName,$password,"users");
			if(mysqli_connect_errno())
				$result = "Failed to connect to MySQL: " . mysqli_connect_error();
			else
				$result = mysqli_query($link, $query);
		}
		mysqli_close();
		return $result;
	}*/

	//connects to server and logs you in succedes if it returns a positive privilige level
	/*function login($userName, $password)
	{
		$link = mysqli_connect("localhost","login","login","users");
		if(mysqli_connect_errno())
			$result = "Failed to connect to MySQL: " . mysqli_connect_error();
		else
		{
			$result = mysqli_query($link, "SELECT login('$userName','$password') AS privelege");
			while($row = mysqli_fetch_assoc($result))
				$result = $row["privelege"];
		}
		mysqli_close();
		return $result;
	}*/

	function loginDisplay($userName)
	{
		$loginForm = '<form action="TempLogIn" method="post" id="Login_Form">
				<label>User Name: </label>
				<input type="text" name="userName" placeholder="User Name">
				<label>Password: </label>
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="Submit" value="login"> <button onclick=location.href="SignUp"> Register </button>';
		if($userName == null)
			echo $loginForm . "</form>";	
		else if($userName == "login")
			echo $loginForm . "login failed </form>";
		else
		{
			echo "<ul>";
			echo "<p id='Login_Form'> Welcome $userName </p>";
			echo "<button onclick=location.href='Account'> My Account </button>";
			echo "<button onclick=location.href='Index?logout=true'> Logout </button>";
			echo "</ul>";
		}
	}

	function connectServer($user, $pass)
	{
		try
		{
			$db = new PDO("mysql:host=localhost;dbname=Final_DB", $user, $pass);
			return $db;
		}
		catch(PDOException $e)
		{
			return ($e->getMessage());
		}
	}

	// Nathan Hoffman addendum
	function login($user, $pass)
	{
		$_SESSION["password"] = $pass;
		$_SESSION["userName"] = $user;
	}
?>