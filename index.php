<?php require __DIR__."/views/header.php";
$allPosts = getAllPosts($pdo);

?>

<section class="index">

	<?php if (isset($_SESSION['user'])): ?>
		<div class="feed-container">

			<?php foreach ($allPosts as $post): ?>
				<div class="feed">
					<h2><?= $post["username"]  ?></h2>
					<img class="post-img" src="<?='./app/posts/post_img/'.$post['user_id'].'/'.$post['img'];;?>">
					<small class="description"><?= $post["post_text"] ?></small>

					<form class="like" method="post" action="/app/posts/likes.php">
						<input type="hidden" name="post_id" value="<?= $post["id"] ?>">
						<p></p>
						<button class="button" type="submit" name="likes">Like</button>
						<small class="likes">Likes: <?= (countPostLikes($post['id'], $pdo ) > 0) ? countPostLikes($post['id'], $pdo) : '0'; ?></small>
					</form>
				</div>

			<?php endforeach; ?>
		</div>

	<?php else: ?>
		<h1><a href="/register.php">Register!</a> </h1>
		<h1><a href="/login.php">Login!</a></h1>
	<?php endif; ?>


</section>

<?php	require __DIR__."/views/footer.php"; ?>
