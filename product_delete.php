<?php
    require 'connection.php';

    $product_id = $_GET["id"];

    // echo $product_id;

    // delete
    $query = "DELETE FROM products WHERE product_id = $product_id";
    $result = pg_query($db, $query);

    header('location: products.php');
?>