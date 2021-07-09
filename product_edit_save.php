<?php
    require 'connection.php';

    $product_id = $_POST["id"];
    $product_name = $_POST["product_name"];
    $supplier = $_POST["supplier"];
    $category = $_POST["category"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $order = $_POST["order"];
    $reorder_level = $_POST["reorder_level"];
    $discontinued = $_POST["discontinued"];

    if($discontinued == "Yes") {
        $discontinued = 1;
    } else {
        $discontinued = 0;
    }

    // query mencari supplier_id
    $query = "SELECT supplier_id FROM suppliers WHERE company_name LIKE '%$supplier%'";
    $supplier_id = pg_fetch_object(pg_query($db, $query));

    // query mencari category_id
    $query = "SELECT category_id FROM categories WHERE category_name LIKE '$category'";
    $category_id = pg_fetch_object(pg_query($db, $query));

    // insert data
    $query = "UPDATE products SET
                product_name = '$product_name',
                supplier_id = $supplier_id->supplier_id,
                category_id = $category_id->category_id,
                quantity_per_unit = '$quantity',
                unit_price = $price,
                units_in_stock = $stock,
                units_on_order = $order,
                reorder_level = $reorder_level,
                discontinued = $discontinued
            WHERE product_id = $product_id";
    $result = pg_query($db, $query);

    header('location: products.php');
?>