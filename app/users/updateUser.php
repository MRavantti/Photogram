<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";

if (isset($_FILES["avatar_img"])) {
    $img =  $_FILES["avatar_img"];
    $date = date("Y-m-d");
    $id = $_SESSION["user"]["id"];
    $imgname = $id."_".$date."_".$img["name"];

    $sql = "UPDATE users SET avatar_img = :avatar_img WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":avatar_img", $imgname, PDO::PARAM_STR);
    $stmt->execute();

    if (!is_dir(__DIR__."/avatar_img/")) {
        mkdir(__DIR__."/avatar_img/");
    }

    $path = __DIR__."/avatar_img/";

    if (file_exists($path.$img["name"])) {
        die;
    }

    $oldpath = $img["tmp_name"];
    $newpath = $path.$imgname;

    move_uploaded_file($oldpath, $newpath);

    $_SESSION["user"]["avatar_img"] = $imgname;

    redirect("/profile.php");
};

if (isset($_POST["user_description"], $_POST["username"],$_POST["email"], $_POST["first_name"], $_POST["last_name"])) {
    $userDesc = filter_var($_POST["user_description"], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $email = strtolower(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
    $firstName = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
    $id = $_SESSION["user"]["id"];

    $columns = [];

    if (!empty($userDesc)) {
        $columns[] = "user_description = :user_description";
    }

    if (!empty($username)) {
        $columns[] = "username = :username";
    }

    if (!empty($email)) {
        $columns[] = "email = :email";
    }

    if (!empty($firstName)) {
        $columns[] = "first_name = :first_name";
    }

    if (!empty($lastName)) {
        $columns[] = "last_name = :last_name";
    }

    $columns = implode(", ", $columns);

    $sql = "UPDATE users SET $columns WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    if (!$stmt) {
        die(var_dump($pdo->errorInfo()));
    }

    if (!empty($userDesc)) {
        $stmt->bindParam(":user_description", $userDesc, PDO::PARAM_STR);
        $_SESSION["user"]["user_description"] = $userDesc;
    }

    if (!empty($username)) {
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $_SESSION["user"]["username"] = $username;
    }

    if (!empty($email)) {
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $_SESSION["user"]["email"] = $email;
    }

    if (!empty($firstName)) {
        $stmt->bindParam(":first_name", $firstName, PDO::PARAM_STR);
        $_SESSION["user"]["first_name"] = $firstName;
    }

    if (!empty($lastName)) {
        $stmt->bindParam(":last_name", $lastName, PDO::PARAM_STR);
        $_SESSION["user"]["last_name"] = $lastName;
    }

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    redirect("/profile.php");
}

if (isset($_POST["old-password"], $_POST["new-password"], $_POST["confirm-password"])) {
    if ($_POST["new-password"] === $_POST["confirm-password"]) {
        $id = $_SESSION["user"]["id"];
        $newPass = password_hash($_POST["new-password"], PASSWORD_DEFAULT);

        $sql = "SELECT password FROM users WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            die(var_dump($pdo->errorInfo()));
        }

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST["old-password"], $user["password"])) {
            $sql = "UPDATE users SET password = :password WHERE id = :id";

            $stmt = $pdo->prepare($sql);

            if (!$stmt) {
                die(var_dump($pdo->errorInfo()));
            }

            $stmt->bindParam(":password", $newPass, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            redirect("/profile.php");
        }
    }
    redirect("/updateUser.php");
}
