<?php require __DIR__."/views/header.php"; ?>

<?php if (!isset($_SESSION["user"])): ?>

	<?php redirect("/"); ?>

<?php else: ?>

	<a href=""><img class="profile-img" src="/app/users/avatar_img/<?php if(!$_SESSION['user']['avatar_img']){ echo 'default_avatar.png'; } else{ echo $_SESSION['user']['avatar_img'];}?>"></a>

	<h1><?php echo $_SESSION["user"]["username"]; ?></h1>
	<small><?php echo $_SESSION["user"]["user_description"] ?></small>
	<br><br>
	<a href="updateUser.php">Edit profile</a>

<?php endif; ?>

<?php	require __DIR__."/views/footer.php"; ?>
