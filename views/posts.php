<div class="space"></div>
<?php
    foreach($posts as $post){
        echo '<div class="a">
            <div class="card-latest">
                <div class="left">
                    <div class="title">'. $post["name"] .'</div>
                    <div class="text">'. $post["content"] .'</div>
                    <div class="bottom">
                        <p class="date">'. $post["created_at"] .'</p>
                        <a class="read-more" href="/final/'. $post["slug"] .'">Read more</a>
                    </div>
                </div>
                <div class="right">
                    <img src="'. $post["image"].'" alt="'. $post["name"].'">
                </div>
            </div>
        </div>';  
    }
?>