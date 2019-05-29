<?php
    header("Content-Type: application/json; charset=UTF-8");
    include "database.php";


    ///CREATE TABLE comments ( id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT, comment TEXT NOT NULL, post_id INTEGER NOT NULL, FOREIGN KEY (post_id) REFERENCES posts(post_id));

    $sql = "SELECT comment,comments.posted,email,name,comments.id from comments join posts on comments.post_id=posts.id where posts.id={$_GET["id"]}";

    $result = $conn ->query($sql);


    if (result == TRUE) {

        $rows = Array();

        $i = 0;
        while ($row = $result->fetch_row()) {
            $rows["".$i] = $row;
        }

        echo json_encode($rows,JSON_FORCE_OBJECT);
    }else {
        echo "Error fetching comments";
    }




?>

