<?php

//$_POST - tuscias arejus

$validation = [];

//kai kintamasis declared duomenis sudedami i $_POST ("btn" - key)
//jei btn = ""
//garantuotai uzpildytas 
if(isset($_POST["btn"])) {

    //objektui iskvieciamas metodas 
    $input = $database->escapeData($_POST);
    
    //isset:  
    //1. !
    //2. !$a = null;
    //3. $a = ''; 

    // jei email visiskai tuscias arba null 1,2 arba tuscias 3
    if(!isset($input["email"]) || $input["email"] == ""){
        $validation["email"] = "El. paštas privalomas.";
    } 

    // jei psw nedeklaruotas ar psw yra tuscias 
    if(!isset($input["password"]) || $input["password"] == ""){
        $validation["password"] = "Password privalomas";
    } 
   
    //paskaiciuojame kiek yra $validation arejuje nariu ir prilyginame 0
    if(count($validation) == 0){

        // objektas iskviecia metoda (pasirenka visus users kur email = zmogaus sukurtam )
        $user = $database->queryFetch("SELECT * FROM users WHERE email = '".$input["email"]."'");

        //jeigu user id neegzistuoja arba psw neatitinka parasyto 
        if(!isset($user["id"]) || !password_verify($input["password"], $user["password"])){
            $validation["password"] = "Neteisinga";
        }
    }
//paskaiciuojame kiek yra $validation arejuje nariu ir prilyginame 0
    if(count($validation) == 0){
        //bendras kintamasis visur naudojamas ir jis nenusirezetina po perkrovimo 
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