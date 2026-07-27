<?php

include 'config/db.php';

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $location = $_POST['location'];

    $sql = "INSERT INTO products
    (title, description, price, image, location)

    VALUES
    ('$title', '$description', '$price', '$image', '$location')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<form action="sell.php" method="POST">

    <input type="text" name="title" placeholder="Product Title" required>

    <textarea name="description" placeholder="Description"></textarea>

    <input type="number" name="price" placeholder="Price" required>

    <input type="text" name="image" placeholder="Image filename">

    <input type="text" name="location" placeholder="Location">

    <button type="submit" name="submit">
        List Product
    </button>

</form>