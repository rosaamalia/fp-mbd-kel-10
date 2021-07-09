<?php
    require 'connection.php';

    echo "Masuk";

    $category_name = $_POST["category_name"];
    $description = $_POST["description"];
    $picture = $_POST["picture"];
    
    // insert data
    $query = "INSERT INTO categories VALUES (nextval('increment_category'), '$category_name', '$description', '$picture')";
    pg_query($db, $query);

    header('location: productscategory.php');
?>