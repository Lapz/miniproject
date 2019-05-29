<?php
    $servername = "dbprojects.eecs.qmul.ac.uk";
    $username = "lp311";
    $password = "P6kvC8YRdwgwN"; //available at webprojects
    $dbname = "lp311";
    //// Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


//CREATE TABLE users (
//    id INTEGER PRIMARY KEY AUTO_INCREMENT,
//    email TEXT NOT NULL,
//    password TEXT NOT NULL,
//    admin BOOLEAN NOT NULL
//);
//
//test@testing.com | testing

?>


