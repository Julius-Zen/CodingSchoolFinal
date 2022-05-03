<?php
// kintamasis priskirtas arejus i kuri sudedamos klaidos
$validation = [];

//jei signin_submit = ""
if(isset($_POST["signin_submit"])) {

    //objektas priskiremas metodas
    $input = $database->escapeData($_POST);

    //jei name visiskai tuscias arba null || tuscias
    if(!isset($input["name"]) || $input["name"] == ""){
        $validation["name"] = "Name privalomas";
    }
    
    //jei surname visiskai tuscias arba null || tuscias 
    if(!isset($input["surname"]) || $input["surname"] == ""){
        $validation["surname"] = "Surname privalomas";
    } 

    //jeu psw visiskai tuscias arba null || tuscias
    if(!isset($input["password"]) || $input["password"] == ""){
        $validation["password"] = "Password privalomas";
    }

    //patikrina ar teisingo formato email
    if(!filter_var($input["email"], FILTER_VALIDATE_EMAIL)) {
        $validation["email"] = "Neteisingas email";
    }

    //jei email visiskai tuscias arba null || tuscias 
    if(!isset($input['email']) || $input['email'] == ''){
        $validation["email"] = 'El. paštas privalomas.';
    } 
    if(count($validation) == 0){
        //objekte pasirinkti metoda (pasirinkti visus users kur email prilygina sukurtam )
        $user = $database->queryFetch("SELECT * FROM users WHERE email = '".$input['email']."'");
        
        //parenka id ir patikrina ar toks email jau yra 
        if(isset($user['id'])){
            $validation["email"] = 'El. paštas jau panaudotas.'; 
        } 
    }
    //query tik nusiuncia uzklausa
    //queryfetch nusiuncia ir gauna 

    if(count($validation) == 0){
        $database->query("
            INSERT INTO `users` 
            SET 
                name='".$input['name']."', 
                surname='".$input['surname']."', 
                email='".$input['email']."', 
                password='".password_hash($input['password'], PASSWORD_DEFAULT)."'
        ");
        // insertid paskutinis irasytas irasas

        $user = $database->queryFetch("SELECT * FROM users WHERE id = '".$database->insertId()."'");
        //kad nepradingtu duomenis perkrovus puslapi 
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