<?php require __DIR__."/views/header.php"; ?>

<h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>

    <?php if (isset($_SESSION['user'])): ?>
        <p>Welcome, <?php echo $_SESSION["user"]["username"]; ?>!</p>

				<a href="/newPost.php">Create a new Post</a>


				<h1>Posts</h1>
				<div class="">
				<?php foreach ($posts as $post): ?>

						<div class="">

					<img src="/app/posts/post_img/<?=$post["img"] ?>" alt="">
					<div class="">
					<small><?= $post["post_text"] ?></small>

					<form data-id="<?= $postId ?>" method="post" action="/app/posts/likes.php">
						<input type="hidden" name="post_id" value="<?= $postId ?>">
						<input type="hidden" name="action" value="<?= $action ?>">
						<button data-id="<?= $postId ?>" class="like-btn like-btn-<?= $action ?>" type="submit" name="action">Like</button>
					</form>
				</div>
				</div>
					<small><span>Likes: <?= count($likes). " "; ?></span> </small>
				<?php endforeach; ?>
			</div>

<?php else: ?>
		<h1><a href="/register.php">Register!</a> </h1>
		<h1><a href="/login.php">Login!</a></h1>
<?php endif; ?>



<?php	require __DIR__."/views/footer.php"; ?>
