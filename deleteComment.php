<?php

    session_start();


    if(!$_SESSION["admin"]) {
        echo "<script type='text/javascript'>history.go(-2);</script>";
    }else {
        include  "database.php";

        $sql = "DELETE FROM comments  where comments.id={$_GET["id"]}";

        if($conn->query($sql) === TRUE) {
            $conn ->close();
            echo "<script type='text/javascript'>history.go(-1);</script>";
        }else {
            $conn ->close();
            echo "fail";
        }
    }


?>