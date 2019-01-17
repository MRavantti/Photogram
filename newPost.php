<?php require __DIR__. "/views/header.php"; ?>


<div class="new-post-container">
	<h1>Create a new post</h1>
	<div class="new-post">

	<form class="new-post-form" action="/app/posts/newPost.php" method="post" enctype="multipart/form-data">
		<input class="img" type="file" name="img">
		<br><br>
		<textarea name="post_text" placeholder="Enter a description..."></textarea>
		<br>
		<button class="new-post-btn" type="submit" name="button">Post</button>
	</form>
</div>

</div>

<?php require __DIR__. "/views/footer.php"; ?>
