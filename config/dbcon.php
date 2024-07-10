<?php 

    $host = "localhost"; //database server host
    $username = "root"; //database name
    $password = "";     //database password
    $database = "test"; //database name

    // create database connection
    $con = mysqli_connect($host, $username, $password, $database);


    // check database connection
    if (!$con) {
        die("connection failed: " . mysqli_connect_error() );
    }

?>