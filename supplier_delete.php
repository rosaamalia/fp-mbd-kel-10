<?php
    require 'connection.php';

    $supplier_id = $_GET["id"];

    // delete
    $query = "DELETE FROM suppliers WHERE supplier_id = $supplier_id";
    $result = pg_query($db, $query);

    header('location: supplier.php');
?>