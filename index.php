<?php require __DIR__."/views/header.php"; ?>
<?php require __DIR__. "/app/posts/posts.php"; ?>
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
				</div>
					<small><?= $post["post_text"] ?></small>
				</div>
				<?php endforeach; ?>

<?php else: ?>
		<h1><a href="/register.php">Register!</a> </h1>
		<h1><a href="/login.php">Login!</a></h1>
<?php endif; ?>



<?php	require __DIR__."/views/footer.php"; ?>
