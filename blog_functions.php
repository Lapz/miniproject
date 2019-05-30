
<?php


function build_posts_archive() {

    include "database.php";

    $sql = "SELECT YEAR(posted) year, MONTH(posted) month, MONTHNAME(posted) month_name, COUNT(*) post_count FROM posts GROUP BY MONTH(posted),YEAR(posted) ORDER BY year DESC, month DESC;";

    $result = $conn->query($sql);

    $archive = array();

    $year = "";

    $changed = false;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            
            
            if (!isset($archive[$row["year"]])) {
                $archive[$row["year"]] = array();
            }
            
            $archive[$row["year"]][$row["month_name"]] = $row["post_count"];
        }
        
        
        $keys = array_keys($archive);
        
        
        for ($i = 0; $i < count($keys); $i++) {
            echo "<ul>";
            
            echo "<li> <h1 class='title'>{$keys[$i]}</h1>";
            
            echo "<div class='block'>";
            echo "<ul>";
            
            $inner_keys = array_keys($archive[$keys[$i]]);
            
            
            for ($j = 0; $j < count($inner_keys); $j++) {
                
                echo "<li class='archive'><a href='blog.php?month={$inner_keys[$j]}&year={$keys[$i]}'>$inner_keys[$j]</a> - {$archive[$keys[$i]][$inner_keys[$j]]} Posts</li>";
                
            }
            
            
            
            echo "</ul>";
            echo "</div>";
            
            
            echo "</li>";
            
            
            
            
            echo "</ul>";
        }
        
    } else {
        echo "No posts found";
    }

    $conn->close();
}

function build_login_status_box() {


                echo "<div class='notification is-info'>";
                if (!isset($_SESSION["user"])) {
                    echo "<p>You are not logged in and so can not add any posts. Please login here</p> ";
                    echo "<div class='buttons'><button class='button'><a href='login.php'>Login Here</a></button></div>";
                } else {
                    
                    if ($_SESSION["admin"]) {
                        echo "<p class='noti'>Welcome Admin User</p>";
                    } else {
                        echo "<p class='noti'>Welcome User</p>";
                    }
                    
                }
                echo "</div>";
           
}

function build_posts() {
    include "database.php";

    if (isset($_SESSION["user"]) && $_SESSION["admin"]) {
        echo "<a href='addPost.html'><i class=\"far fa-plus-square\"></i></a>";
    }

    $sql = "SELECT id,title,body,posted from posts;";


    if (isset($_GET["month"]) && isset($_GET["year"])) {
        $year  = trim($_GET["year"], '"');
        $month = trim($_GET["month"], '"');
        $sql   = "SELECT id,title,body,posted from posts where MONTHNAME(posted)='{$month}' AND YEAR(posted)='{$year}' order ";
    }


    

    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
            print("<div id='{$row["id"]}' class='card'>");
                echo "<div class='card-content'>";
                    echo "<div class='media-content'>";
                        print("<p class='title is-4'>{$row["title"] }</p>");
                        print("<p class='subtitle is-6'><i class='far fa-clock'></i> {$row["posted"]}</p>");
                        
                    echo "</div>";
                echo "</div>";

                echo "<div class='card-content'>";
                    echo $row["body"];
                echo "</div>";
            echo "</div>";
        }
    }

  

    echo $conn->error;

    $conn->close();
}