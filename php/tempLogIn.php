<?php
	//Start the session
	session_start();
?>
<!--
!--Jacob Baker
!--February 22, 2016
!--tempLogIn.php
-->
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title> temporary login screen </title>
	</head>
	<body>
		<p> loading... </p>
		<?php
			include 'functions.php';
			$result = login($_POST["userName"], $_POST["password"]);
			if($result == -1)
				$_SESSION["userName"] = "login";
			else
				$_SESSION["userName"] = $_POST["userName"];
			header('Location: index.php');
		?>
	</body>
</html>
