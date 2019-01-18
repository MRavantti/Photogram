<?php

declare(strict_types=1);

require __DIR__."/views/header.php";

if (!isset($_SESSION["user"])):

	redirect("/");

else:

$userPosts = getPostByUser((int)$_SESSION["user"]["id"], $pdo);

?>
<section class="update-user-container">

<?php foreach ($userPosts as $post): ?>

	<form action="/app/posts/updatePost.php" method="post" enctype="multipart/form-data" class="description-form">
		<img class="post-img" src="<?="/app/posts/post_img/".$_SESSION["user"]["id"].'/'.$post["img"];?>">

		<label for="description">Change description</label>
		<textarea type="text" name="post_text" placeholder="<?= $post["post_text"]; ?>" value="<?= $post["post_text"]; ?>"></textarea>
		<button type="submit" name="id" value="<?= $post["id"]; ?>">Update</button>
	</form>

<?php endforeach; ?>
</section>
	<?php

endif;

require __DIR__."/views/footer.php";

?>
