<?php require __DIR__."/views/header.php"; ?>

<h1><?php echo $config['title']; ?></h1>
    <p>This is the home page.</p>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Welcome, <?php echo $_SESSION['user']['first_name']; ?>!</p>
    <?php endif; ?>
<h1><a href="/register.php">Register!</a> </h1>
	<h1><a href="/login.php">Login!</a></h1>
	<?php if (isset($_SESSION["user"])): ?>
		<h1><a href="/app/users/logout.php">Logout!</a></h1>
	<?php endif; ?>



<?php	require __DIR__."/views/footer.php"; ?>
