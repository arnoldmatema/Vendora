<?php

include 'config/db.php';

$user_id = $_POST['user_id'];
$role = $_POST['role'];

mysqli_query(
    $conn,
    "UPDATE users
    SET role='$role'
    WHERE id='$user_id'"
);

header("Location: adminpage.php");

?>