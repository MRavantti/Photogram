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

function getAllPosts($pdo){
    $statement = $pdo->query("SELECT
                            posts.id,
                            posts.img,
                            users.id as user_id,
                            users.username,
                            posts.post_date,
														posts.post_text
                            from posts
                            join users on posts.user_id = users.id
                            ORDER BY post_date DESC");
    if (!$statement){
        die(var_dump($pdo->errorInfo()));
    }

    $allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allPosts;
}

function userLikesPost($post, $user, $pdo) {
    $statement = $pdo->prepare("INSERT INTO likes(user_id, post_id)
                                VALUES(:user_id, :post_id)");
    if (!$statement){
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':user_id', $user, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $post, PDO::PARAM_INT);
    $statement->execute();
    $likes = $statement->fetch(PDO::FETCH_ASSOC);
}
function userDislikesPost($post, $user, $pdo){
    $statement = $pdo->prepare("DELETE FROM likes
                                WHERE user_id = :user_id
                                AND post_id = :post_id");
    if (!$statement){
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':post_id', $post, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
}

function checkLikedPost($post, $user, $pdo) {
    $statement = $pdo->prepare("SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id");
    if (!$statement){
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':post_id', $post, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;
}


function countPostLikes($post, $pdo) {
    $statement = $pdo->prepare("SELECT * FROM likes WHERE post_id = :post_id");
    if (!$statement){
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':post_id', $post, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_ASSOC);
    return count($user);
}

?>
