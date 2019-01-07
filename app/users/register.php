<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";

if (isset($_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["username"], $_POST["password"], $_POST['confirm_password']))
{

	if ($_POST["password"] !== $_POST["confirm_password"]) {

		$_SESSION["error"] = "Passwords don't match";
		redirect("/register.php");

	} else {

		$firstName = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
		$lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
		$userName = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

		$sql = "SELECT username, email FROM users WHERE username = :username AND email = :email";
		$check = $pdo->prepare($sql);
		$check->bindParam(":username", $userName, PDO::PARAM_STR);
		$check->bindParam(":email", $email, PDO::PARAM_STR);
		$check->execute();

		if ($check->fetch() ) {

			$_SESSION["error"] = "User already exist";
			redirect("/register.php");
		} else {

			$query = "INSERT INTO users (first_name, last_name, username, email, password)
			VALUES (:first_name, :last_name, :username, :email, :password)";

			$stmt = $pdo->prepare($query);

			if (!$stmt) {
				die(var_dump($pdo->errorInfo()));
			}

			$stmt->bindParam(":first_name", $firstName, PDO::PARAM_STR);
			$stmt->bindParam(":last_name", $lastName, PDO::PARAM_STR);
			$stmt->bindParam(":username", $userName, PDO::PARAM_STR);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":password", $password, PDO::PARAM_STR);
			$stmt->execute();

			$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email;");
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			// Storing userinfo in SESSION-variable
			$_SESSION["user"] = $user;
			redirect("/");
		}
	}
}
