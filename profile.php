<?php

require __DIR__."/views/header.php";

if (!isset($_SESSION["user"])){

 redirect("/");
}
$userPosts = getPostByUser($_SESSION["user"]["id"], $pdo);
 ?>
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
		<?php foreach ($userPosts as $post): ?>
			<div class="user-posts">
				<img class="post-img" src="<?='./app/posts/post_img/'.$_SESSION["user"]["id"].'/'.$post["img"];?>">
				<form class="editpost-form" action="/app/posts/delete.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="page" value="<?='/profile.php;'?>">
	        <button class="button" type="submit" name="delete" value="<?= $post["id"] ?>"> Delete post</button>
	      </form>

			</div>
		<?php endforeach; ?>
	</div>
</section>



<?php	require __DIR__."/views/footer.php"; ?>
