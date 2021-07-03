<?php
    require 'connection.php';

    $category_name = $_POST["category_name"];
    $description = $_POST["description"];
    $picture = $_POST["picture"];
   
    // insert data
    $query = "INSERT INTO categories VALUES (nextval('increment_category'), '$category_name', '$description', '$picture')";
    pg_query($db, $query);

    echo 'masok';
    header('location: productscategory.php');
?>