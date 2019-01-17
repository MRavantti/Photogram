<?php

if (isset($_SESSION['user']['id'])){

	if(isset($_GET['post_id'])){
		$postId = $_GET['post_id'];
	}
	$userId = $_SESSION['user']['id'];



	$statement = $pdo->prepare('SELECT * FROM posts WHERE id = :user_id');

	if(!$statement){
		die(var_dump($pdo->errorInfo()));
	}

	$statement->bindParam(':user_id', $postId, PDO::PARAM_STR);
	$statement->execute();

	$post = $statement->fetch(PDO::FETCH_ASSOC);

	if(isset($_POST['delete'])){
		// delete post img
		$statement = $pdo->prepare('SELECT img FROM posts WHERE id = :id');

		if(!$statement){
			die(var_dump($pdo->errorInfo()));
		}

		$statement->bindParam(':id', $postId, PDO::PARAM_STR);
		$statement->execute();

		$userpost = $statement->fetchAll(PDO::FETCH_ASSOC);

		$path = __DIR__.'/posts/post_img/';

		foreach($userpost as $post){
			unlink($path.$post['img']);
		}

		$statement = $pdo->prepare('DELETE FROM posts WHERE id = :post_id');

		$statement->bindParam(':post_id', $postId, PDO::PARAM_STR);
		$statement->execute();


		$statement = $pdo->prepare('DELETE FROM likes WHERE post_id = :post_id');

		$statement->bindParam(':post_id', $postId, PDO::PARAM_STR);
		$statement->execute();

		redirect('/posts.php');

	}

};

?>
