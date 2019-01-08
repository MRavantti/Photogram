<?php

declare(strict_types=1);


if(!isset($_SESSION["user"])) {
    redirect("/");
}
else {

	$id = $_SESSION["user"]["id"];

	$query = "SELECT * FROM users WHERE email = :email";

	$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(":email", $_SESSION["user"]["email"], PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
