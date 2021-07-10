<?php
    require 'connection.php';

    $supplier_id = $_GET["id"];

    // delete
    $query = "DELETE FROM shippers WHERE shipper_id = $shipper_id";
    $result = pg_query($db, $query);

    header('location: shipper.php');
?>