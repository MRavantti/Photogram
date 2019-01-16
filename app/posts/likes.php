<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";



if (isset($_POST["post_id"], $_POST["action"])) {
	$postId = filter_var($_POST["post_id"], FILTER_SANITIZE_NUMBER_INT);
	$action = trim(filter_var($_POST["action"], FILTER_SANITIZE_STRING));
	$userId = $_SESSION["user"]["id"];

	if ($action === "disliked") {

		$sql = "DELETE FROM likes WHERE post_id = '$postId' AND user_id = '$userId'";

		$stmt = $pdp->prepare($sql);
		$stmt->execute();

		if (!$stmt) {
			die(var_dump($pdo->errorInfo()));
		}

	} elseif ($action === "liked") {

		$sql = "INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id)";

		$stmt = $pdo->prepare($sql);

		if (!$stmt) {
			die(var_dump($pdo->errorInfo()));
		}

		$stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
		$stmt->bindParam(":post_id", $postId, PDO::PARAM_INT);
		$stmt->execute();
	}

	$sql = "SELECT COUNT(*) AS likes FROM likes WHERE post_id = '$postId'";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	if (!$stmt) {
		die(var_dump($pdo->errorInfo()));
	}

	$likes = $stmt->fetch(PDO::FETCH_ASSOC);
	foreach ($likes as $like) {
		echo $like;
	}

} else {
	die;
}
