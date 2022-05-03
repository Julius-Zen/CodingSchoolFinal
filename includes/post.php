<?php

$urls = urlParser();
$slug = $urls[0];

if(!isset($slug) || $slug == ""){
    header("location: /final");
    exit();
}

$post = $database->queryFetch("
    SELECT 
        `posts`.`id`,
        `posts`.`name`,
        `posts`.`content`, 
        `posts`.`created_at`,
        `posts`.`image`,
        `users`.`name` AS user_name
    FROM `posts`
    LEFT JOIN `users` ON `users`.`id`=`posts`.`user_id` 
    WHERE 
        `posts`.`slug` = '$slug'
");

if(!isset($post["id"])) {
    header("location: /final/not-found");
    exit();
}

$image = checkIfImageExist($post['image']);

include_once "views/post.php";
?>