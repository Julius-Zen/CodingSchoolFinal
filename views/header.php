<header>
    <div class="a">
        <nav>
            <div class="left">
                <a class="logo" href="/final">Hotcofee</a>
            </div>
            <div class="right">
            <?php
                if(isset($_SESSION['email'])) {
                echo '<input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul class="social">
                    <li><a href="/final">Home</a></li>
                    <li><a href="posts">Article</a></li>
                    <li><a href="newpost">New Post</a></li>
                    <li>
                        <form method="post">
                            <button type="submit" name="btnlogout">Log out</button>
                        </form>
                    </li>    
                </ul>
                <ul class="navigation">  
                    <li><a href="https://www.twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://www.snapchat.com/" target="_blank"><i class="fa-brands fa-snapchat-square"></i></a></li>
                    </ul>';
                } else {
                echo '<input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul class="social">
                    <li><a href="/final">Home</a></li>
                    <li><a href="posts">Article</a></li>
                    <li class="login"><a href="login">Log in</a></li>
                </ul>
                <ul class="navigation">  
                    <li><a href="https://www.twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://www.snapchat.com/" target="_blank"><i class="fa-brands fa-snapchat-square"></i></a></li>
                    <li><a href="login"><i class="fa-solid fa-user"></i></a></li>
                    </ul>';
                }
            ?>  
            </div>    
        </nav>
    </div>   
</header>