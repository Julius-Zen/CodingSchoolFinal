<div class="main-container">
    <div class="login">
        <form method="post">
            <h3>Login Here</h3>
            <span>
                <?php echo $validation['email'] ?? '' ?>
            </span>
            <input type="text" name="email" placeholder="Email">
            <span>
                <?php echo $validation["password"] ?? '' ?>
            </span>
            <input type="password" name="password" placeholder="Password">
            <button type="login" name="btn">Log In</button>
            <div class="signup">
                <a href="signup">Create new account</a>
            </div>
        </form>
    </div>
</div>