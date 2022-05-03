<?php

$validation = [];

function slugify($text, string $divider = '-')
{
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, $divider);
    $text = preg_replace('~-+~', $divider, $text);
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


//kai kintamasis declared duomenis sudedami i $_POST ("btn" - key)
//jei btn = ""
if(isset($_POST["new-content"])) {
    //objektui iskvieciamas metodas 
    $input = $database->escapeData($_POST);

    //isset:  
    //1. !
    //2. !$a = null;
    //3. $a = ''; 
   
    // jei email visiskai tuscias arba null 1,2 arba tuscias 3
    if(!isset($input["name"]) || $input["name"] == ""){
        $validation["name"] = "privalomass.";
    } 

    // jei psw nedeklaruotas ar psw yra tuscias 
    if(!isset($input["content"]) || $input["content"] == ""){
        $validation["content"] = "privalomas";
    }

    $fullNewImagePath = "";
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $newfilename = "";
        $imageDir = "assets/uplouds/";
        $newfilename = "post-".$_SESSION['id']."-".date("YmdHis");

        $fileSize = $_FILES['image']['size'];
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileExt = strtolower(end(explode('.',$_FILES['image']['name'])));

        $extension = array("jpeg","jpg","png");

        if(in_array($fileExt, $extension) === false){
            $validation["file"] = "Failas netinkamas";
        }
 
        if($fileSize > 2097152){
            $validation["file"] = "Failas per didelis";
        }

        if(count($validation) == 0){
            if (!file_exists($imageDir)) {
                mkdir($imageDir, 0777, true);
            }

            $fullNewImagePath = $imageDir.$newfilename.".".$fileExt;
        }
    }

    //query tik nusiuncia uzklausa
    //queryfetch nusiuncia ir gauna 
    if(count($validation) == 0){
        $slug = slugify($input["name"] ?? '');
        while(true){
            $post = $database->queryFetch("SELECT `id` FROM `posts` WHERE `slug` = '$slug'");

            if(!isset($post['id'])){
                break;
            }

            $slug .= '-';
        }

        if($fullNewImagePath != ""){
            move_uploaded_file($fileTmp, $fullNewImagePath);
        }

        $database->query("
            INSERT INTO `posts` 
            SET  
                `name`='".$input["name"]."',
                `content`='".$input["content"]."',
                `feature`='".($input["feature"] ?? 0)."',
                `slug`='".$slug."',
                `user_id`='".$_SESSION['id']."',
                `image`='".$fullNewImagePath."'
        ");
/*
        $user = $database->queryFetch("SELECT created_at FROM posts WHERE id = '".$database->insertId()."'"); 
*/
        header("location: /final/posts");
        exit();
    }
}

    include_once "views/newpost.php";
