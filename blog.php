	<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: lenardpratt
 * Date: 2019-03-14
 * Time: 19:56
 */

//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php" ?>
    <script src="comments.js" defer></script>
    <title>Blog</title>
</head>
<body>
    <?php
        include "database.php";
        include "nav.php";
        include "blog_functions.php";
    ?>

    <div id="body" class="container">
        <div id="cols" class="columns">
            <div class="column">

                
                    <?php
                        build_login_status_box();

                    ?>
                
                <div class="box">
                    <?php
                        

                        build_posts_archive();
                    ?>
                </div>          
            </div>

            <div class="column">
                <div class="box">
                    <h1 class="blog-title">Lenard's Blog</h1>
                    <?php
                        build_posts();
                    ?>
                </div>
            </div>
        </div>
   </div>

</body>

</html>