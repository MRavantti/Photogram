<?php

declare(strict_types=1);

?>
<nav class="nav">
	<!-- Burger menu icon -->
<?php if (isset($_SESSION["user"])): ?>

	<div class="create-post"><a href="/newPost.php">New Post</a></div>
	<div class="update-post-btn"><a href="updatePosts.php">Edit Post</a></div>
<?php endif; ?>

	<h1 class="logo"><a href="/"><?php echo $config['title']; ?></a></h1>

	<div class="burger-icon" id="burger-icon">
		<div id="bar-one" class="bar-one"></div>
		<div id="bar-two" class="bar-two"></div>
		<div id="bar-three" class="bar-three"></div>
	</div>

	<!-- Mobile menu  -->

	<div class="mobile-menu-container" id="mobile-menu">
		<div class="mobile-menu-items">


			<?php if (isset($_SESSION["user"])): ?>

				<div class="mobile-home"><a href="/">Home</a></div>
				<div class="mobile-new-post"><a href="/newPost.php">New Post</a></div>
				<div class="profile-name"><a href="/Profile.php"><?= $_SESSION["user"]["username"] ?></a></div>
				<div class="log-out"><a href="/app/users/logout.php">Logout</a></div>

			<?php else: ?>

				<div class="log-out"><a href="/register.php">Register</a></div>
				<div class="log-out"><a href="/login.php">Login</a></div>

			</div>
		</div>
	<?php endif; ?>
</nav>
