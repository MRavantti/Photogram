<?php

declare(strict_types=1);

require __DIR__."/views/header.php";

if (!isset($_SESSION["user"])):

	redirect("/");

else:

if (isset($_POST["edit"])):

	$posts = (int)$_POST["edit"];

	$posts = getPostById($posts, $pdo);

?>
<section class="update-user-container">
	<div class="update-user-form">

		<?php foreach ($posts as $post): ?>

			<img class="post-img" src="<?="/app/posts/post_img/".$_SESSION["user"]["id"].'/'.$post["img"];?>">

			<textarea type="text" name="post_text" placeholder="<?= $post["post_text"]; ?>" value="<?= $post["post_text"]; ?>"></textarea>
			<button type="submit" name="id" value="<?= $post["id"]; ?>">Update</button>
	<?php endforeach; ?>


	<?php endif; ?>
</div>
</section>
	<?php

endif;

require __DIR__."/views/footer.php";

?>
