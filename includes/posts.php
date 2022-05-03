<?php

$posts = [];
$results = $database->query("SELECT * FROM posts ORDER BY id DESC");

while ($row = $database->fetch($results)) {
    $posts[] = [
        'name' => $row['name'],
        'content' => $row['content'],
        'created_at' => $row['created_at'],
        'slug' => $row['slug'],
        'image' =>checkIfImageExist($row['image']),
    ];
}

include_once "views/posts.php";
?>