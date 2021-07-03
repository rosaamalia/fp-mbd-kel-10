<?php
    require 'connection.php';

    $company_name = $_POST["company_name"];
    $phone = $_POST["phone"];
   
    // insert data
    $query = "INSERT INTO shippers VALUES (nextval('increment_shipper'), '$company_name', '$phone')";
    pg_query($db, $query);

    echo 'masok';
    header('location: shipper.php');
?>