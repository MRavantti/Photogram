<?php require __DIR__."/views/header.php"; ?>

<?php if (!isset($_SESSION["user"])): ?>

	<?php redirect("/"); ?>

<?php else: ?>
	<section class="profile-container">

		<div class="profile-info">

	<a href=""><img class="profile-img" src="/app/users/avatar_img/<?php if(!$_SESSION['user']['avatar_img']){ echo 'default_avatar.png'; } else{ echo $_SESSION['user']['avatar_img'];}?>"></a>

	<h1><?php echo $_SESSION["user"]["username"]; ?></h1>
	<small><?php echo $_SESSION["user"]["user_description"] ?></small>
	<br><br>
	<div class="update-user-btn"><a href="updateUser.php">Edit profile</a></div>
</div>

	<div class="user-posts-container">


		<h1>Your posts</h1>
		<?php foreach ($imgs as $img): ?>
			<div class="user-posts">
			<a href="/editPost.php?post_id=<?= $img["img"];?>">
				<img class="post-img" src="/app/posts/post_img/<?= $img["img"]; ?>">

			</div>
			<?php print_r($img["img"]) ?>
		<?php endforeach; ?>
	</div>
</section>

<?php endif; ?>

<?php	require __DIR__."/views/footer.php"; ?>
