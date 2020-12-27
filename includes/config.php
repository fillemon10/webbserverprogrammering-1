<?php
session_start();
// connect to database

$conn = mysqli_connect("mysql.simply.com", "root", "", "sjolander_name_db_cinemania");

if (!$conn) {
    die("Error connecting to database: " . mysqli_connect_error());
}
