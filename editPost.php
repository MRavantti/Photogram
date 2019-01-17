<?php
  require __DIR__.'/views/header.php';

?>
<br><br><br><br><br><br><br><br>

<section class="edit-profile-container">

    <div>
      <img class="edit-post-img" src="/app/posts/post_img/<?= $post["img"]; ?>">

      <form class="editpost-form" action="/app/posts/editpost.php?post_id=<?= $_GET['post_id']; ?>" method="post" enctype="multipart/form-data">
        <button type="submit" name="delete" value="<?= $post["img"] ?>"> Delete post</button>
      </form>
		</div>
	</section>


<?php require __DIR__.'/views/footer.php'; ?>
