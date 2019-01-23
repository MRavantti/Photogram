<?php

declare(strict_types=1);

require __DIR__."/views/header.php";

if (!isset($_SESSION["user"])):

	redirect("/");

else:

?>

	<h1>Edit Profile</h1>

	<form class="profile-edit" action="/app/users/updateUser.php" method="post" enctype="multipart/form-data">

		<input class="new-img" type="file" name="avatar_img" value="">

		<br>

		<button class="button" type="submit">Change Avatar</button>

		<br><br>
	</form>

	<div class="user-info">

		<form class="profile-edit" action="/app/users/updateUser.php" method="post" enctype="multipart/form-data">

			<label for="user_description"></label>
			<textarea name="user_description" placeholder="<?= ($_SESSION["user"]["user_description"]) ?: "User Description" ?>"></textarea>

			<br><br>

			<label for="username">username:</label>
			<input type="text" name="username" value="<?= $_SESSION["user"]["username"] ?>">

			<br>

			<label for="email">email:</label>
			<input type="text" name="email" value="<?= $_SESSION["user"]["email"] ?>">

			<br>

			<label for="first_name">first name:</label>
			<input type="text" name="first_name" value="<?= $_SESSION["user"]["first_name"] ?>">

			<br>

			<label for="last_name">last name:</label>
			<input type="text" name="last_name" value="<?= $_SESSION["user"]["last_name"] ?>">

			<br>

			<button class="button" type="submit" name="button">Edit Profile</button>
			<br><br>

		</form>
	</div>

	<div class="change-password">

		<form class="profile-edit" action="/app/users/updateUser.php" method="post" enctype="multipart/form-data">
			<small>Change Password:</small>

			<br>

			<label for="old-password">Old Password:</label>
			<input type="password" name="old-password" required placeholder="Old Password">

			<br>

			<label for="new-password">New Password:</label>
			<input type="password" name="new-password" required placeholder="New Password">

			<br>

			<label for="confirm-password">Confirm Password:</label>
			<input type="password" name="confirm-password" required placeholder="Confirm Password">

			<br>

			<button class="button" type="submit" name="button">Change Password</button>

		</form>
	</div>

<?php

endif;

require __DIR__."/views/footer.php";

?>
