<?php

if(isset($_POST["btnlogout"])) {
    session_unset();
    session_destroy();
    header("location: /final");
    exit();
}

   include_once "views/header.php";

?>