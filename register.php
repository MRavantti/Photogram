<?php

declare(strict_types=1);

require __DIR__. "/views/header.php";


?>

<section class="register-section">

	<form action="/app/users/register.php" method="post">

		<div class="register-form">
			<label for="first_name">First Name:</label>
			<input class="form-first-name" type="text" name="first_name" placeholder="First Name" required>
		</div>

		<div class="register-form">
			<label for="last_name">Last Name:</label>
			<input class="form-last-name" type="text" name="last_name" placeholder="Last Name" required>
		</div>

		<div class="register-form">
			<label for="email">Email:</label>
			<input class="form-email" type="email" name="email" placeholder="example@gmail.com" required>
		</div>

		<div class="register-form">
			<label for="username">Username:</label>
			<input class="form-username" type="text" name="username" placeholder="Username" required>
		</div>

		<div class="register-form">
			<label for="password">Password:</label>
			<input class="form-password" type="password" name="password" required placeholder="Password">
		</div>

		<div class="register-form">
			<label for="confirm_password">Confirm Password:</label>
			<input class="form_password" type="password" name="confirm_password" required placeholder="Confirm Password">
		</div>

		<button type="submit" class="button">Register</button>
	</form>
	<h1>

<?php
if (isset($_SESSION["error"])){
    echo $_SESSION["error"];
  }
	?>
</h1>
</section>

<?php	require __DIR__."/views/footer.php"; ?>
