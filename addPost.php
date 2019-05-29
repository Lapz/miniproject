<?php

    include "database.php";

    $title = $_POST["title"];
    $body =  $_POST["body"];

    $sql = "INSERT INTO posts (title,posted,body) VALUES ('$title',NOW(),'$body')";

    if($conn->query($sql) === TRUE) {
        echo "posted";
        $conn ->close();
        echo "<script type='text/javascript'>history.go(-2);</script>"; // -2 because -1 goes back to the login page and -2 goes back tp the page the login buttons was pressed on
    }else {
        $conn ->close();
        echo "fail";
    }
?>