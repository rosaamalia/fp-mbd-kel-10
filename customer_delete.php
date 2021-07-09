<?php
    require 'connection.php';

    $customer_id = $_GET["id"];

    // delete
    $query = "DELETE FROM customers WHERE customer_id LIKE '$customer_id'";
    $result = pg_query($db, $query);

    header('location: customer.php');
?>