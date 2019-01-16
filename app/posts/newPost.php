<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";

if (isset($_FILES["img"])) {
	$postText = filter_var($_POST["post_text"]);
	$date = date("Y-m-d");
	$id = $_SESSION["user"]["id"];
	$username = $_SESSION["user"]["username"];
	$folder = $id;
	$img = $_FILES["img"];
	$imgname = $img["name"];
	$imgSave = $id."_".$date."_".$imgname;

	if (!is_dir(__DIR__. "/postImg/")) {
		mkdir(__DIR__. "/postImg/");
	}

	$path = __DIR__. "/postImg/";

	if (file_exists($path.$img["name"])) {
		redirect("/app/users/newPost.php");
		die;
	}

	$sql = "INSERT INTO posts (img, post_date, post_text, user_id, user_name)
					VALUES (:img, :post_date, :post_text, :user_id, :user_name)";

	$stmt = $pdo->prepare($sql);

	if (!$stmt) {
		die(var_dump($pdo->errorInfo()));
	}

	$stmt->bindParam(":img", $imgSave, PDO::PARAM_STR);
	$stmt->bindParam(":post_text", $postText, PDO::PARAM_STR);
	$stmt->bindParam(":user_name", $username, PDO::PARAM_STR);
	$stmt->bindParam(":user_id", $date, PDO::PARAM_INT);
	$stmt->bindParam(":post_date", $date, PDO::PARAM_STR);
	$stmt->execute();

	$oldPath = $img["tmp_name"];
	$newPath = $path.$imgSave;
	move_uploaded_file($oldPath, $newPath);

	redirect("/");
}
