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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="comments.js" defer></script>
    <title>Blog</title>
</head>
<body>
    <?php
        include "nav.php";
    ?>
    <div id="body" class="container">

        <div id="archive" class="row">

            <aside>
                <div class="wrapper">

            <?php
                include "database.php";

                $sql ="SELECT YEAR(posted) year, MONTH(posted) month, MONTHNAME(posted) month_name, COUNT(*) post_count FROM posts GROUP BY MONTH(posted),YEAR(posted) ORDER BY year DESC, month DESC;";

                $result =$conn->query($sql);

                $archive = array();

                $year ="";

                $changed = false;

                if($result->num_rows >0) {
                    while ($row = $result->fetch_assoc()) {


                        if (!isset($archive[$row["year"]])) {
                            $archive[$row["year"]] = array();
                        }

                        $archive[$row["year"]][$row["month_name"]] =$row["post_count"];
                    }


                    $keys = array_keys($archive);


                    for($i=0;$i<count($keys);$i++) {
                            echo "<ul>";

                            echo "<li> {$keys[$i]}";

                            echo "<ul>";

                            $inner_keys = array_keys($archive[$keys[$i]]);


                            for ($j=0;$j<count($inner_keys);$j++) {

                                echo "<li class='archive'><a href='blog.php?month={$inner_keys[$j]}&year={$keys[$i]}'>$inner_keys[$j]</a> - {$archive[$keys[$i]][$inner_keys[$j]]} Posts</li>";

                            }



                            echo "</ul>";


                            echo "</li>";




                        echo "</ul>";
                    }

                }else {
                    echo "No posts found";
                }

                $conn -> close();

            ?>
                </div>
            </aside>

        </div>
        <div class="row">
           <aside>
               <?php

                echo "<div class='wrapper'>";
                   if(!isset($_SESSION["user"])) {
                       echo "<p class='noti'>You are not logged in and so can not add any posts. Please login here</p> ";
                       echo "<div class='buttons'><button class='button'><a href='login.html'>Login Here</a></button></div>";
                   }else{

                       if ($_SESSION["admin"]) {
                           echo "<p class='noti'>Welcome Admin User</p>";
                       }else {
                           echo "<p class='noti'>Welcome User</p>";
                       }

                   }
                   echo "</div>";
               ?>


           </aside>
        </div>
        <div id="posts" class="row wrapper">
            <h1 class="blog-title">Lenard's Blog</h1>

            <?php

            if(isset($_SESSION["user"]) && $_SESSION["admin"]) {
                echo "<a href='addPost.html'><i class=\"far fa-plus-square\"></i></a>";
            }

            ?>


            <?php

            include "database.php";



            $sql = "SELECT id,title,body,posted from posts;";


            if(isset($_GET["month"]) && isset($_GET["year"])) {
                $year  =  trim($_GET["year"],'"');
                $month = trim($_GET["month"],'"');
                $sql = "SELECT id,title,body,posted from posts where MONTHNAME(posted)='{$month}' AND YEAR(posted)='{$year}' order ";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div id= \"".$row["id"]."\" class=\"blog-card\">";
                    echo "<div class=\"post-meta\">";
                    echo "<p class=\"post-meta-info\"><i class=\"far fa-clock\"></i>".$row["posted"]."</p>";
                    echo "<h1 class=\"post-title\">".$row["title"]."</h1>";
                    echo "</div>";
                    echo "<article class=\"post-body\">";
                    echo $row["body"];
                    echo "</article>";
                    echo "</div>";
                }
            }

            echo $conn->error;

            $conn -> close();

            ?>
        </div>
    </div>
</body>

</html>