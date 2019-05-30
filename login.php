<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php" ?>
    <title>Login</title>
</head>
<body>
<?php 
    include "nav.php";
?>
<div class="hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
            <div class="is-half">
                <form class="box"  method="post" action="handleLogin.php">
                <div class="field">
                    <label>Email</label>
                    <div class="control has-icons-left">
                        <input class="input" type="email" name="email" placeholder="johndoe@apple.com" required>
                        <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                        </span>
                        
                    </div>
                </div>

                <div class="field">
                    <label>Password</label>
                    <div class="control has-icons-left">
                        <input class="input" type="password" name="password" placeholder="Password" required>
                        <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button id="submit" class="button is-primary">
                            Submit
                        </button>
                    </p>

                    <p class="control">
                        <button id="reset" class="button is-primary">
                            Clear
                        </button>
                    </p>
                </div>
            </form>
        
            </div> 
        </div>
        </div>
    </div>   
</div>



</body>
</html>