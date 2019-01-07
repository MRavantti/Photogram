<?php

declare(strict_types=1);

?>

<nav>
	<ul>
		<li><a href="/">Home</a></li>
		<?php if (isset($_SESSION['user'])): ?>
			<li><a href="/Profile.php">Profile</a></li>
			<li><a href="/app/users/logout.php">Logout</a></li>
			<?php else: ?>
		<li><a href="/register.php">Register</a></li>
		<li><a href="/login.php">Login</a></li>
	<?php endif; ?>
	</ul>
</nav>
