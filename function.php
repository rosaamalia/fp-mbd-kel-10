<?php
$db = pg_connect("host=localhost port=5432 dbname=fp-mbd user=postgres password=05150302");

function add_product($data) {
    
    global $db;

    $product_name = $data["product_name"];
    $supplier = $data["supplier"];
    $category = $data["category"];
    $quantity = $data["quantity"];
    $price = $data["price"];
    $stock = $data["stock"];
    $order = $data["order"];
    $reorder_level = $data["reorder_level"];
    $discontinued = $data["discontinued"];

    if($discontinued == "Yes") {
        $discontinued = 1;
    } else {
        $discontinued = 0;
    }

    // query mencari supplier_id
    $query = "SELECT supplier_id FROM suppliers WHERE company_name LIKE '$supplier'";
    $supplier_id = pg_fetch_object(pg_query($db, $query));

    // query mencari category_id
    $query = "SELECT category_id FROM categories WHERE category_name LIKE '$category'";
    $category_id = pg_fetch_object(pg_query($db, $query));
    
    // insert data
    $query = "INSERT INTO products VALUES (nextval('increment_product'), '$product_name', $supplier_id->supplier_id, $category_id->category_id, '$quantity', $price, $stock, $order, $reorder_level, $discontinued)";
    $result = pg_query($db, $query);

    return pg_affected_rows($result);
}
?>