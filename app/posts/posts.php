<?php



$sql = "SELECT * FROM `users` AS u
				INNER JOIN `posts` AS p ON p.user_id = u.id";

$stmt = $pdo->prepare($sql);

if (!$stmt) {
	die(var_dump($pdo->errorInfo()));
}

$stmt->execute();

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$posts = array_reverse($posts);

foreach ($posts as $post) {
	$userId = $post["user_id"];
	$username = $post["username"];
	$postDate = $post["post_date"];
	$folder = $userId;
	$img = $post["img"];
	$src = "post_img/".$img;
	$postText = $post["post_text"];
	$postId = $post["user_id"];
	$id = $_SESSION["user"]["id"];

	$sql = "SELECT post_id FROM `likes` AS l
					INNER JOIN `posts` AS p ON p.id = l.user_id
					WHERE post_id = :post_id";

	$stmt = $pdo->prepare($sql);

	if (!$stmt) {
		die(var_dump($pdo->errorInfo()));
	}

	$stmt->bindParam(":id", $postId, PDO::PARAM_INT);
	$stmt->execute();

	$likes = $stmt->FetchAll(PDO::FETCH_ASSOC);

	$sql = "SELECT user_id FROM likes WHERE post_id = :post_id AND user_id = :post_id";

	$stmt = $pdo->prepare($sql);

	if (!$stmt) {
		die(var_dump($pdo->errorInfo()));
	}

	$stmt->bindParam(":id", $postId, PDO::PARAM_INT);
	$stmt->bindParam(":id", $_SESSION["user"]["id"], PDO::PARAM_INT);

	$liked = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($liked) {
		$action = "disliked";
	} else {
		$action = "liked";
	}
}
?>
