<?php

declare(strict_types=1);
require __DIR__."/../autoload.php";
// In this file we delete new posts in the database.
?>
<?php

if (isset($_POST["delete"])) {

	$postId = $_POST["delete"];
	$userId = (int)$_SESSION["user"]["id"];
	$userFolder = $userId;
	$userPosts = getPostByUser($userId, $pdo);

	foreach ($userPosts as $post) {
		if ($postId === $post["id"]) {
			$imgName = $post["img"];

			$sql = "DELETE FROM posts WHERE id = :id AND img = :img";
			$stmt = $pdo->prepare($sql);

			if (!$stmt) {
				die(var_dump($pdo->errorInfo()));
			}

			$stmt->bindParam(":id", $postId, PDO::PARAM_INT);
			$stmt->bindParam(":img", $imgName, PDO::PARAM_STR);

			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			unlink(__DIR__. "/post_img/$userFolder/$imgName");

			redirect("/");
		}
	}
}
