<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: lenardpratt
 * Date: 2019-03-12
 * Time: 16:04
 */

include "database.php";


$sql = "SELECT id,admin from users where password ='".$_POST["password"]."' and email='".$_POST["email"]."';";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result ->fetch_assoc();

    $_SESSION['user'] = $row["id"];

    $_SESSION['admin'] = $row["admin"];

    $conn -> close();

    echo "<script type='text/javascript'>history.go(-2);</script>"; // -2 because -1 goes back to the login page and -2 goes back tp the page the login buttons was pressed on
}else {
    $conn -> close();
    echo "<script type='text/javascript'>window.location = 'login.html'</script>";

}


/*
    SELECT YEAR(posted) year,
    -> MONTH(posted) month,
    -> MONTHNAME(posted) month_name,
    -> COUNT(*) post_count
    -> FROM posts
    -> GROUP BY year, MONTH(posted)
    -> ORDER BY year DESC, month DESC;
*/

?>