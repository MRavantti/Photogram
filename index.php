<?php require __DIR__."/views/header.php";
$allPosts = getAllPosts($pdo);

?>

<section class="index">

	<?php if (isset($_SESSION['user'])): ?>

		<div class="create-post"><a href="/newPost.php">Create a new Post</a></div>



		<h1>Posts</h1>
		<div class="feed-container">

			<?php foreach ($allPosts as $post): ?>
				<div class="feed">

					<img class="post-img" src="<?='./app/posts/post_img/'.$_SESSION["user"]["id"].'/'.$post["img"];?>">
					<small class="description"><?= $post["post_text"] ?></small>

					<form class="like" method="post" action="/app/posts/likes.php">
						<input type="hidden" name="post_id" value="<?= $post["id"] ?>">
						<p></p>
						<button data-id="<?= $postId ?>" class="like-btn" type="submit" name="likes">Like</button>
					</form>
					<small class="likes">Likes: <?= (countPostLikes($post['id'], $pdo ) > 0) ? countPostLikes($post['id'], $pdo) : '0'; ?></small>
				</div>

				</div>
			<?php endforeach; ?>
		</div>

	<?php else: ?>
		<h1><a href="/register.php">Register!</a> </h1>
		<h1><a href="/login.php">Login!</a></h1>
	<?php endif; ?>


</section>

<?php	require __DIR__."/views/footer.php"; ?>
