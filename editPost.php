<?php
  require __DIR__.'/views/header.php';
require __DIR__.'/app/posts/editpost.php';
?>



    <div class="edit-profile-container">
      <img class="edit-post-img" src="/app/posts/post_img/<?= $postId; ?>">

      <form class="editpost-form" action="editpost.php?post_id=<?= $_GET['post_id']; ?>" method="post" enctype="multipart/form-data">
        <textarea placeholder="<?= $_SESSION["posts"]["post_text"] ?>" id="post-text" name="post-text" value="<?= $post['post_text']; ?>"><?= $post['post_text']; ?></textarea>
        <button type="submit" name="button"> Uppdate description</button>
      </form>

      <form class="editpost-form" action="editpost.php?post_id=<?= $_GET['post_id']; ?>" method="post" enctype="multipart/form-data">
        <button type="submit" name="delete"> Delete post</button>
      </form>
    <div>


<?php
require __DIR__.'/views/footer.php';
?>
