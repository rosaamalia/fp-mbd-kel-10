<?php
    require 'connection.php';

    $customer_id = $_POST["id"];
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

    // update data
    $query = "UPDATE customers SET
                company_name = '$company_name',
                contact_name = '$contact_name',
                contact_title = '$contact_title',
                address = '$address',
                city = '$city',
                region = '$region',
                postal_code = '$postal_code',
                country = '$country',
                phone = '$phone',
                fax = '$fax'
                WHERE customer_id LIKE '$customer_id'";
    $result = pg_query($db, $query);

    header('location: customer.php');
?>