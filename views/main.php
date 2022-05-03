
<div class="a">
    <div class="slider">
        <img src="assets/css/images/Head-section.png" alt="logo">
    </div>
 
    <?php
    echo ' <div class="card-latest">
        <div class="left">
            <div class="title">'. $newpost["name"] .'</div>
            <div class="text">'. $newpost["content"] .'</div>
            <div class="bottom">
                <p class="date">'. $newpost["created_at"] .'</p>
                <a class="read-more" href="/final/'. $newpost["slug"] .'">Read more</a>
            </div>
        </div>
        <div class="right">
            <img src="'.$image.'" alt="Logo">
        </div>
    </div>';
    ?>
    <div class="card-penal">
        <?php
        foreach($posts as $post){
        echo '
            <div class="first">
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
            </div>';  
        }
        ?>
    </div>
    <?php
    echo ' <div class="highlight-section">
        <div class="left">
            <div class="title">'. $featurepost["name"] .'</div>
            <div class="text">'. $featurepost["content"] .'</div>
            <div class="bottom">
                <p class="date">'. $featurepost["created_at"] .'</p>
                <a class="read-more" href="/final/'. $featurepost["slug"] .'">Read more</a>
            </div>
        </div>
        <div class="right">
            <img src="'.$featureimage.'" alt="Logo">
        </div>
    </div>';
    ?>
    <div class="button">
        <a href="posts">
            <div class="left">
                <p>See more</p>
            </div>
            <div class="right">
                <img src="assets/css/images/arrow-down-circle-fill 1.png" alt="logo">
            </div>     
        </a>  
    </div>
</div>