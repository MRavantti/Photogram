<?php

declare(strict_types=1);

require __DIR__. "/views/header.php";


?>

<section class="login-section">
	<form action="/app/users/login.php" method="post">
		<div class="lgoin-form">
		<label for="email">Email:</label>
		<input class="form-email" type="email" name="email" placeholder="example@gmail.com" required>
	</div>

	<div class="login-form">
		<label for="password">Password:</label>
		<input class="form-password" type="password" name="password" required placeholder="Password">
</div>

<button type="submit" class="button">Log in</button>

</form>
</section>

<?php	require __DIR__."/views/footer.php"; ?>
