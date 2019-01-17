<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

function getPostByUser(int $id, $pdo)
{
	$fileName = "/post_img/".$id;

	$sql = "SELECT * FROM posts WHERE user_id = :user_id ORDER BY post_date DESC";
	$stmt = $pdo->prepare($sql);

	if (!$stmt) {

		die(var_dump($pdo->errorInfo()));
	}

	$stmt->bindParam(":user_id", $id, PDO::PARAM_STR);
	$stmt->execute();
	$userPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

	for ($i=0; $i < count($userPosts);  ++$i) {
		if (file_exists($fileName. "/".$userPosts[$i]["img"])) {
			return $userPosts[$i]["img"];
		}
	}
	return $userPosts;
}

?>
