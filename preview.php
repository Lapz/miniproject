<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <title>Preview Post</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <?php
                echo "<div class=\"blog-card\">";
                echo "<div class=\"post-meta\">";
                echo "<p class=\"post-meta-info\"><i class=\"far fa-clock\"></i>".date("Y-M-D H-M-S")."</p>";
                echo "<h1 class=\"post-title\">".$_POST["title"]."</h1>";
                echo "</div>";
                echo "<article class=\"post-body\">";
                echo $_POST["body"];
                echo "</article>";
                echo "</div>";

                //SELECT YEAR(posted) year,
                //MONTH(posted) month,
                //MONTHNAME(posted) month_name,
                //COUNT(*) post_count
                //FROM posts
                //GROUP BY year, MONTH(posted)
                //ORDER BY year DESC, month DESC;
            ?>
        </div>
    </div>
</body>
</html>


