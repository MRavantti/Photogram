<?php

declare(strict_types=1);

require __DIR__."/../autoload.php";

    if (isset($_POST["post_text"], $_POST["id"]))
		{
            $postId = $_POST["id"];
            $description = trim(filter_var($_POST["post_text"], FILTER_SANITIZE_STRING));
            $userId = (int) $_SESSION["user"]["id"];
            $userFolder = $userId;
            $userPosts = getPostByUser($userId, $pdo);

        foreach ($userPosts as $userPost){
            if (filter_var($description, FILTER_SANITIZE_STRING))
						{
							$sql = "UPDATE posts SET post_text = :post_text WHERE id = :id";

                $stm = $pdo->prepare($sql);

                if (!$stm)
								{
                    die(var_dump($pdo->errorInfo()));
                }
                $stm->bindParam(':post_text', $description, PDO::PARAM_STR);
                $stm->bindParam(':id', $postId, PDO::PARAM_INT);
                $stm->execute();

                $user = $stm->fetch(PDO::FETCH_ASSOC);

                redirect("/");
            }
            die;
}
}


redirect('/');
