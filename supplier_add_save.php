<?php
    require 'connection.php';

    $company_name = $_POST["company_name"];
    $contact_name = $_POST["contact_name"];
    $contact_title = $_POST["contact_title"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $region = $_POST["region"];
    $postal_code = $_POST["postal_code"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $fax = $_POST["fax"];
    $homepage = $_POST["homepage"];

    // insert data
    $query = "INSERT INTO suppliers VALUES (nextval('increment_supplier'), '$company_name', '$contact_name', '$contact_title', '$address', '$city', '$region', '$postal_code', '$country', '$phone', '$fax', '$homepage')";
    pg_query($db, $query);

    header('location: supplier.php');
?>