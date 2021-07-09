<?php
    require 'connection.php';

    $employee_id = $_POST["id"];
    $last_name = $_POST["last_name"];
    $first_name = $_POST["first_name"];
    $title = $_POST["title"];
    $title_of_courtesy = $_POST["title_of_courtesy"];
    $birth_date = $_POST["birth_date"];
    $hire_date = $_POST["hire_date"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $home_phone = $_POST["home_phone"];
    $extension = $_POST["extension"];

    $photo = $_FILES["photo"];
    $nama_photo = $_FILES["photo"]["name"];
    $tempat_photo = $_FILES["photo"]["tmp_name"];

    $ekstensi_gambar = explode('.', $nama_photo);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));

    $nama_photo = uniqid();
    $nama_photo .= '.';
    $nama_photo .= $ekstensi_gambar;
    
    move_uploaded_file($tempat_photo, 'image/employee/' . $nama_photo);
    $tempat_photo = 'image/employee/' . $nama_photo;

    $notes = $_POST["notes"];
    $reports_to = $_POST["reports_to"];
    $photo_path = $tempat_photo;

    // insert data
    $query = "UPDATE employees SET
                last_name = '$last_name',
                first_name = '$first_name',
                title = '$title',
                title_of_courtesy = '$title_of_courtesy',
                birth_date = '$birth_date',
                hire_date = '$hire_date',
                address = '$address',
                city = '$city',
                region = '$region',
                postal_code = '$postal_code',
                country = '$country',
                home_phone = '$home_phone',
                extension = '$extension',
                photo = bytea('$tempat_photo'),
                notes = '$notes',
                reports_to = '$reports_to',
                photo_path = '$photo_path'
            WHERE employee_id = $employee_id";
    $result = pg_query($db, $query);

    header('location: employee.php');
?>