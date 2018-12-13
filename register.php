<?php

declare(strict_types=1);

require __DIR__. "/views/header.php";


?>

<section class="register-section">
	<form action="/app/users/register.php" method="post">

		<div class="register-form">
			<label for="first-name">First Name:</label>
			<input class="form-first-name" type="text" name="first_name" placeholder="First Name" required>
		</div>

		<div class="register-form">
			<label for="last-name">Last Name:</label>
			<input class="form-last-name" type="text" name="last_name" placeholder="Last Name" required>
		</div>

		<div class="register-form">
			<label for="email">Email:</label>
			<input class="form-email" type="email" name="email" placeholder="example@gmail.com" required>
		</div>

		<div class="register-form">
			<label for="username">User Name:</label>
			<input class="form-user-name" type="text" name="username" placeholder="Username" required>
		</div>

		<div class="register-form">
			<label for="password">Password:</label>
			<input class="form-password" type="password" name="password" required>
		</div>

		<!-- <div class="register-form">
			<label for="password">Confirm Password:</label>
			<input class="form-password" type="password" name="password" required>
		</div> -->

		<button type="submit" class="button">Register</button>
	</form>
</section>


<?php	require __DIR__."/views/footer.php"; ?>
