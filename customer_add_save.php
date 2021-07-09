<?php
    require 'connection.php';

    $customer_id = $_POST["customer_id"];
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

    // insert data
    $query = "INSERT INTO customers VALUES ('$customer_id', '$company_name', '$contact_name', '$contact_title', '$address', '$city', '$region', '$postal_code', '$country', '$phone', '$fax')";
    pg_query($db, $query);

    header('location: customer.php');
?>