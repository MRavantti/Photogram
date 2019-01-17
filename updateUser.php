<?php require __DIR__."/views/header.php"; ?>

<?php if (!isset($_SESSION["user"])): ?>

<?= redirect("/"); ?>

<?php else: ?>

<h1>Edit Profile</h1>

<form class="profile-edit" action="/app/users/updateUser.php" method="post" enctype="multipart/form-data">
	<input type="file" name="avatar_img" value="">
	<br>
	<button type="submit">Change Avatar Image</button>
	<br><br>
</form>


<div class="user-info">

<form class="profile-edit" action="/app/users/updateUser.php" method="post" enctype="multipart/form-data">

	<label for="user_description"></label>
	<textarea name="user_description" placeholder="<?= $_SESSION["user"]["user_description"]?>"></textarea>
	<br><br>
	<label for="username">username:</label>
	<input type="text" name="username" placeholder="<?= $_SESSION["user"]["username"] ?>">
	<br>
	<label for="email">email:</label>
	<input type="text" name="email" placeholder="<?= $_SESSION["user"]["email"] ?>">
	<br>
	<label for="first_name">first name:</label>
	<input type="text" name="first_name" placeholder="<?= $_SESSION["user"]["first_name"] ?>">
	<br>
	<label for="last_name">last name:</label>
	<input type="text" name="last_name" placeholder="<?= $_SESSION["user"]["last_name"] ?>">
	<br>
	<button type="submit" name="button">Edit Profile</button>
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
	<button type="submit" name="button">Change Password</button>
</form>
</div>

<?php endif; ?>


<?php	require __DIR__."/views/footer.php"; ?>
