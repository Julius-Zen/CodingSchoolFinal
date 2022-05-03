<?php

$validation = [];

if(isset($_POST["btn"])) {

    $input = $database->escapeData($_POST);

    if(!isset($input["email"]) || $input["email"] == ""){
        $validation["email"] = "El. paštas privalomas.";
    } 

    if(!isset($input["password"]) || $input["password"] == ""){
        $validation["password"] = "Password privalomas";
    } 
   
    if(count($validation) == 0){

        $user = $database->queryFetch("SELECT * FROM users WHERE email = '".$input["email"]."'");

        if(!isset($user["id"]) || !password_verify($input["password"], $user["password"])){
            $validation["password"] = "Neteisinga";
        }
    }

    if(count($validation) == 0){
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];

        header("location: /final");
        exit();
    }
}

include_once "views/login.php";
?>