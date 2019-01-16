<?php

declare(strict_types=1);

?>

<nav>
	<ul>
		<li><a href="/">Home</a></li>
		<?php if (isset($_SESSION['user'])): ?>
			<li><a href="/newPost.php">Create New Post</a></li>
			<li><a href="/Profile.php"><img class="profile-img" src="/app/users/avatar_img/<?php if(!$_SESSION['user']['avatar_img']){ echo 'default_avatar.png'; } else{ echo $_SESSION['user']['avatar_img'];}?>"></a></li>
			<li><a href="/Profile.php"><?= $_SESSION["user"]["username"] ?></a></li>
			<li><a href="/app/users/logout.php">Logout</a></li>
		<?php else: ?>
			<li><a href="/register.php">Register</a></li>
			<li><a href="/login.php">Login</a></li>
		<?php endif; ?>
	</ul>
</nav>
