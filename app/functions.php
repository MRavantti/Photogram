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

/**
* Get posts by logged in user
* @param  int    $id
* @param  $pdo
* @return
*/
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

function getPostById(int $id, $pdo)
{
    $fileName = "/post_img/".$id;

    $sql = "SELECT * FROM posts WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->execute();

    $id = $stmt->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($id);  ++$i) {
        if (file_exists($fileName. "/".$id[$i]["img"])) {
            return $id[$i]["img"];
        }
    }
    return $id;
}


/**
* Get posts from all users
* @param
* @return
*/
function getAllPosts($pdo)
{
    $sql = "SELECT
	posts.id,
	posts.img,
	users.id as user_id,
	users.username,
	posts.post_date,
	posts.post_text
	FROM posts
	JOIN users ON posts.user_id = users.id
	ORDER BY post_date DESC";

    $stmt = $pdo->query($sql);

    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $allPosts;
}

/**
* Register a like from user
* @param
* @param
* @param
* @return
*/
function userLikesPost($post, $user, $pdo)
{
    $sql = "INSERT INTO likes(user_id, post_id) VALUES(:user_id, :post_id)";

    $stmt = $pdo->prepare($sql);

    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $stmt->bindParam(':user_id', $user, PDO::PARAM_INT);
    $stmt->bindParam(':post_id', $post, PDO::PARAM_INT);
    $stmt->execute();

    $likes = $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
* Register a dislike
* @param
* @param
* @param
* @return
*/
function userDislikesPost($post, $user, $pdo)
{
    $sql = "DELETE FROM likes	WHERE user_id = :user_id AND post_id = :post_id";

    $stmt = $pdo->prepare($sql);

    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $stmt->bindParam(':post_id', $post, PDO::PARAM_INT);
    $stmt->bindParam(':user_id', $user, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
* Count the likes on post
* @param
* @param
* @return
*/
function countPostLikes($post, $pdo)
{
    $sql = "SELECT * FROM likes WHERE post_id = :post_id";

    $stmt = $pdo->prepare($sql);

    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    $stmt->bindParam(':post_id', $post, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return count($user);
}
