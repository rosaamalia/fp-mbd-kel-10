<?php
    require 'connection.php';

    $order_id = $_GET["id"];
    $product_id = $_GET["product"];

    // delete
    $query = "DELETE FROM order_details WHERE order_id = $order_id AND product_id = $product_id";
    $result = pg_query($db, $query);

    header('location: sales_add_product.php?id='.$order_id);
?>