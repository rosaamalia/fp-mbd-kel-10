<?php
    require 'connection.php';

    $category_id = $_POST["id"];
    $category_name = $_POST["category_name"];
    $description = $_POST["description"];
    
    $picture = $_FILES["picture"];
    $nama_picture = $_FILES["picture"]["name"];
    $tempat_picture = $_FILES["picture"]["tmp_name"];

    $ekstensi_gambar = explode('.', $nama_picture);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));

    $nama_picture = uniqid();
    $nama_picture .= '.';
    $nama_picture .= $ekstensi_gambar;
    
    move_uploaded_file($tempat_picture, 'image/category/' . $nama_picture);
    $tempat_picture = 'image/category/' . $nama_picture;
    

    // insert data
    $query = "UPDATE categories SET
                category_name = '$category_name',
                description = $description,
                picture = bytea('$tempat_picture')
            WHERE category_id = $category_id";
    $result = pg_query($db, $query);

    header('location: productscategory.php');
?>