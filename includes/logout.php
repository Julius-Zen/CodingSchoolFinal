<?php
    if(isset($_POST["btn"])) {
        session_unset();
        session_destroy();
        header("location: /final");
        exit();
    }

    include_once "views/logout.php";