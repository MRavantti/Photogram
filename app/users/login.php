<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";


if (isset($_POST["email"], $_POST["password"])) {
  $email = strtolower(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
  $password = filter_var($_POST["password"]);

  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $stmt->bindParam(":email", $email);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  redirect("/login.php");

}
  if ($email === "" || $password === "") {

  }

  if (password_verify($_POST["password"], $user["password"]))
{
  $_SESSION["user"] = $user;
  redirect("/");
} else {
  redirect("/login.php");
}
}
