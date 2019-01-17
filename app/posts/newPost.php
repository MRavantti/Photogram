<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";

if (isset($_FILES["img"], $_POST["post_text"])) {
	$description = trim(filter_var($_POST["post_text"], FILTER_SANITIZE_STRING));
	$img = $_FILES["img"];

	filter_var($img["name"], FILTER_SANITIZE_STRING);
		$id = $_SESSION["user"]["id"];
		$extension = pathinfo($img["name"])["extension"];
		$fileName = pathinfo($img["name"])["filename"];
		$username = $_SESSION["user"]["username"];
		$fileTime = date("ymd:H:i:s");
		$userFolder = $id;
		$imgName = $id."-".$fileTime.uniqid().".".$extension;

		$sql = "INSERT INTO posts(img, post_text, user_id, post_date) VALUES(:img, :post_text, :user_id, :post_date)";

		$stmt = $pdo->prepare($sql);

		if (!$stmt) {
			die(var_dump($pdo->errorInfo()));
		}

		$stmt->bindParam(":img", $imgName, PDO::PARAM_STR);
		$stmt->bindParam(":post_text", $description, PDO::PARAM_STR);
		$stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
		$stmt->bindParam(":post_date", $fileTime, PDO::PARAM_STR);

		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!is_dir(__DIR__. "/post_img/$userFolder")) {
			mkdir(__DIR__. "/post_img/$userFolder");
		}

		move_uploaded_file($_FILES["img"]["tmp_name"], __DIR__."/post_img/$userFolder/$imgName");

		redirect("/");

}
echo "lol";
