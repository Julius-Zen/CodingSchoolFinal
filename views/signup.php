<div class="main-container">
<div class="signup">
    <form method="post">
        <h3>Sign Up</h3> 
        <span>
            <?php echo $validation['name'] ?? '' ?>
        </span>
        <input type="text" name="name" placeholder="First name">
        <span>
            <?php echo $validation['surname'] ?? '' ?>
        </span>
        <input type="text" name="surname" placeholder="Last name">
        <span>
            <?php echo $validation['email'] ?? '' ?>
        </span>
        <input type="text" name="email" placeholder="Email">
        <span>
            <?php echo $validation['password'] ?? '' ?>
        </span>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="signin_submit">Sign Up</button>  
    </form>
</div>
</div>