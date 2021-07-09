<?php
    require 'connection.php';

    $category_id = $_GET["id"];

    // delete
    $query = "DELETE FROM categories WHERE category_id = $category_id";
    $result = pg_query($db, $query);

    header('location: productscategory.php');
?>