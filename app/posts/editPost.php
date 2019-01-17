<?php

declare(strict_types=1);
require __DIR__."/../autoload.php";
// In this file we delete new posts in the database.
?>
<?php

if (isset($_POST["delete"])) {


	$postImg = $_POST["delete"];

	$username = $_SESSION["user"]["username"];

	$sql = "DELETE FROM posts WHERE img = :img";
	$stmt = $pdo->prepare($sql);

	if (!$stmt) {
		$_SESSION["error"] = "There was an error, please try again.";
		redirect("/");
		exit;
	}

	$stmt->bindParam(":id", $postImg, PDO::PARAM_INT);
	$stmt->execute();


	redirect("/");
}
