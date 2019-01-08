<?php require __DIR__."/views/header.php"; ?>

<a href=""><img src="<?= $_SESSION["user"]["avatar_img"] ?>" alt="avatar img"></a>
<h1><?php echo $_SESSION["user"]["username"]; ?></h1>

<?php	require __DIR__."/views/footer.php"; ?>
