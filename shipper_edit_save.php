<?php
    $db = pg_connect("host=localhost port=5432 dbname=fp-mbd user=postgres password=Bolaitubundar1");

    $shipper_id = $_POST["id"];
    $company_name = $_POST["company_name"];
    $phone = $_POST["phone"];

    // insert data
    $query = "UPDATE shippers SET
                company_name = '$company_name',
                phone = $phone
            WHERE shipper_id = $shipper_id";
    $result = pg_query($db, $query);

    header('location: shipper.php');
?>