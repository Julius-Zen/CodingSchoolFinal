<?php
    echo '<div class="a">
    <div class="article">
    <div class="picture">
        <img src="'.$image.'" alt="logo">
    </div>
    <div class="details">
        <p class="tema">'. $post["name"] .'</p>
        <span class="name">Written by '. $post["user_name"] .'</span>
        <span class="date">'. $post["created_at"] .'</span>
    </div>
    <div class="text">
        <p>'. $post["content"] .'</p>
    </div>
    </div> 
</div>';  
?>




<!--
    post perziura


<div>
    POST

    ID: <?php echo $post["id"] ?? "" ?>
    NAME: <?php echo $post["name"] ?? "" ?>
    DESC: <?php echo $post["desc"] ?? "" ?>
</div>
-->
