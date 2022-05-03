<?php

$validation = [];

if(isset($_POST["signin_submit"])) {

    $input = $database->escapeData($_POST);

    if(!isset($input["name"]) || $input["name"] == ""){
        $validation["name"] = "Name privalomas";
    }
    
    if(!isset($input["surname"]) || $input["surname"] == ""){
        $validation["surname"] = "Surname privalomas";
    } 

    if(!isset($input["password"]) || $input["password"] == ""){
        $validation["password"] = "Password privalomas";
    }

    if(!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
        $validation["email"] = "Neteisingas email";
    }

    if(!isset($input['email']) || $input['email'] == ''){
        $validation["email"] = 'El. paštas privalomas.';
    } 
    if(count($validation) == 0){
        $user = $database->queryFetch("SELECT * FROM users WHERE email = '".$input['email']."'");
        
        if(isset($user['id'])){
            $validation["email"] = 'El. paštas jau panaudotas.'; 
        } 
    }

    if(count($validation) == 0){
        $database->query("
            INSERT INTO `users` 
            SET 
                name='".$input['name']."', 
                surname='".$input['surname']."', 
                email='".$input['email']."', 
                password='".password_hash($input['password'], PASSWORD_DEFAULT)."'
        ");

        $user = $database->queryFetch("SELECT * FROM users WHERE id = '".$database->insertId()."'");
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];

        header("location: /final");
        exit();
    }
}

include_once "views/signup.php";

?>