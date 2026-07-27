<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "vendora_db"
);

if(!$conn){
    die("Database connection failed");
}
?>