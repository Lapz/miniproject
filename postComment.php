<?php

include "database.php";

$email = $_POST["email"];
$name = $_POST["name"];
$comment = $_POST["message"];
$id = $_POST["post-id"];
$sql =  "INSERT INTO comments (post_id,name,email,comment,posted) values({$id},'{$name}','{$email}','{$comment}',NOW())";

$result = $conn ->query($sql);





if ($result === TRUE) {
    $conn->close();
    echo "<script type='text/javascript'>history.go(-1);</script>";

}else {
    echo "fail";
    $conn->close();
}

?>



<!--CREATE TABLE comments (-->
<!--    id INTEGER PRIMARY KEY AUTO_INCREMENT,-->
<!--    name TEXT NOT NULL,-->
<!--    comment TEXT NOT NULL,-->
<!--    posted TIMESTAMP NOT NULL,-->
<!--    email TEXT NOT NULL,-->
<!--    post_id INTEGER NOT NULL,-->
<!--    FOREIGN KEY (post_id) REFERENCES posts(post_id)-->
<!--);-->
