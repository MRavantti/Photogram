<?php

declare(strict_types=1);


$id = $_SESSION["user"]["id"];

$sql = "SELECT * FROM posts WHERE user_id = :user_id";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":user_id", $id, PDO::PARAM_INT);
$stmt->execute();

$imgs = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $imgs;
