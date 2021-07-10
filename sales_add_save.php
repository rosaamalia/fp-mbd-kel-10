<?php
    require 'connection.php';

    $customer_name = $_POST["customer"];
    $employee_name = $_POST["employee"];
    $order_date = $_POST["order_date"];
    $required_date = $_POST["required_date"];
    $shipped_date = $_POST["shipped_date"];
    $ship_via = $_POST["ship_via"];
    $freight = $_POST["freight"];
    $ship_name = $_POST["ship_name"];
    $ship_address = $_POST["ship_address"];
    $ship_city = $_POST["ship_city"];
    $ship_region = $_POST["ship_region"];
    $ship_postal_code = $_POST["ship_postal_code"];
    $ship_country = $_POST["ship_country"];
    // order_details table
    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $discount = $_POST["discount"];

    // query mencari customer_id
    $query = "SELECT customer_id FROM customers WHERE company_name LIKE '$customer_name'";
    $customer_id = pg_fetch_object(pg_query($db, $query));

    // query mencari employee_id
    $name = explode(' ', $employee_name);
    $query = "SELECT employee_id FROM employees WHERE last_name LIKE '$name[1]' AND first_name LIKE '$name[0]'";
    $employee_id = pg_fetch_object(pg_query($db, $query));

    // query mencari shipper_id
    $query = "SELECT shipper_id FROM shippers WHERE company_name LIKE '$ship_via'";
    $shipper_id = pg_fetch_object(pg_query($db, $query));

    // query mencari product_id dan unit_price
    $query = "SELECT * FROM products WHERE product_name LIKE '$product_name'";
    $products = pg_fetch_object(pg_query($db, $query));

    // insert data
    $query = "INSERT INTO orders
                VALUES (nextval('increment_order'),
                '$customer_id->customer_id',
                $employee_id->employee_id,
                '$order_date',
                '$required_date',
                '$shipped_date',
                $shipper_id->shipper_id,
                $freight,
                '$ship_name',
                '$ship_address',
                '$ship_city',
                '$ship_region',
                '$ship_postal_code',
                '$ship_country')
                RETURNING order_id";
    $order = pg_fetch_object(pg_query($db, $query));

    $query = "INSERT INTO order_details
                VALUES ($order->order_id,
                $products->product_id,
                $products->unit_price,
                $quantity,
                $discount)";
    $order_notify = pg_query($db, $query);

    // if (!$order_notify) {
    //     echo "No messages\n";
    // } else {
    //     print_r($order_notify);
    // }

    header('location: sales.php');
?>