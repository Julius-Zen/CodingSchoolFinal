<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="./assets/js/jquery/jquery-3.6.0.min.js"></script>

    <script src="https://kit.fontawesome.com/14b1aec12d.js" crossorigin="anonymous"></script>
   
    <script type="text/javascript" src="./assets/js/richtext/jquery.richtext.js"></script>


    <link rel="stylesheet" href="./assets/js/richtext/richtext.min.css">

    <link rel="stylesheet" href="./assets/css/app.css">

    <title>Post</title>
</head>
<body>

<?php
    //app - logika (pagrindinis failas)
    include_once "app.php";

    //header html dalis
    include_once "includes/header.php";

    //puslapio turinys
    include_once "includes/".contentFinder().".php" ?? "";
    
    //html footer
    include_once "views/footer.php";
?>    

</body>
</html>