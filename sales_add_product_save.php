<?php
    require 'connection.php';

    $order_id = $_GET["id"];

    // order_details table
    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $discount = $_POST["discount"];

    // query mencari product_id dan unit_price
    $query = "SELECT * FROM products WHERE product_name LIKE '$product_name'";
    $products = pg_fetch_object(pg_query($db, $query));

    $query = "INSERT INTO order_details
                VALUES ($order_id,
                $products->product_id,
                $products->unit_price,
                $quantity,
                $discount)";
    pg_query($db, $query);

    header('location: sales_add_product.php?id='.$order_id);
?>