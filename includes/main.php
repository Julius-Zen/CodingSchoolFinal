<?php

$newpost = $database->queryFetch("SELECT * FROM `posts` WHERE `feature`= 0 ORDER BY id DESC");

$image = checkIfImageExist($newpost['image']);

$posts = [];
$results = $database->query("SELECT * FROM `posts` WHERE `feature`= 0 and id != '".$newpost["id"]."' ORDER BY RAND() LIMIT 3;");
while ($row = $database->fetch($results)) {
    $posts[] = [
        'name' => $row['name'],
        'content' => $row['content'],
        'created_at' => $row['created_at'],
        'slug' => $row['slug'],
        'image' =>checkIfImageExist($row['image']),
    ];
}

$featurepost = $database->queryFetch("SELECT * FROM `posts` WHERE `feature`= 1 ORDER BY id DESC");

$featureimage = checkIfImageExist($featurepost['image']);

include_once "views/main.php";

?>