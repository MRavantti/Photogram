<?php require __DIR__. "/views/header.php"; ?>


<div class="new-post-container">
	<img id="image" />
	<form class="new-post-form" action="/app/posts/newPost.php" method="post" enctype="multipart/form-data">
		<input type="file" name="img">
		<label for="img">Select file</label>
		<br><br>
		<textarea name="post_text" placeholder="Enter a description..."></textarea>
		<br>
		<button type="submit" name="button">Post</button>
	</form>

</div>

<?php require __DIR__. "/views/footer.php"; ?>
