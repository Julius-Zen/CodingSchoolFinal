<?php

include_once 'helpers/database.php';
//$database - objektas / Database klase
$database = new Database;
session_start();

function urlParser() {
    return explode("/", $_GET["info"]);
}

function checkIfImageExist($image) {
    if(file_exists($image)){
        return $image;
    }

    return "assets/uplouds/no-image.png";
}

function contentFinder() {
    //print_r($_SERVER["REQUEST_URI"]);
    $urls = urlParser();
    $mainUrl = $urls[0] ?? null;

    if(!isset($mainUrl) || $mainUrl == ""){
        return "main";
    }

    if($mainUrl == "posts"){
        return "posts";
    }

    if($mainUrl == "newpost"){
        return "newpost";
    }

    if($mainUrl == "login"){
       return "login";
    }

    if($mainUrl == "logout"){
        return "logout";
     }
    
    if($mainUrl == "signup"){
        return "signup";
    }
    
    if($mainUrl == "admin"){
        return "admin";
    }

    if($mainUrl == "not-found"){
        return "notFound";
    }

    return "post";
}