<?php

declare(strict_types=1);

require __DIR__."/../app/autoload.php";

if (isset($_SESSION["user"])) {
	require __DIR__."/../app/posts/viewUserPost.php";
	require __DIR__."/../app/posts/posts.php";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/10up-sanitize.css/8.0.0/sanitize.css">
  <link rel="stylesheet" href="/assets/styles/main.css">
  <title>Photogram</title>
</head>
<body>

<?php require __DIR__. "/navigation.php"; ?>
