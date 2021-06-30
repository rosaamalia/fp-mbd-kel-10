<?php
    require 'connection.php';

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

    echo $supplier;

    // query mencari supplier_id, cek apakah ada tanda petik atau tidak
    $query = "SELECT supplier_id FROM suppliers WHERE company_name LIKE '%$supplier%'";
    $supplier_id = pg_fetch_object(pg_query($db, $query));

    // query mencari category_id
    $query = "SELECT category_id FROM categories WHERE category_name LIKE '%$category%'";
    $category_id = pg_fetch_object(pg_query($db, $query));
    
    // insert data
    $query = "INSERT INTO products VALUES (nextval('increment_product'), '$product_name', $supplier_id->supplier_id, $category_id->category_id, '$quantity', $price, $stock, $order, $reorder_level, $discontinued)";
    pg_query($db, $query);

    header('location: products.php');
?>