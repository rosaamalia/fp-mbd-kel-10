<?php
    require 'connection.php';

    $employee_id = $_GET["id"];

    // delete
    $query = "DELETE FROM employees WHERE employee_id = $employee_id";
    $result = pg_query($db, $query);

    header('location: employee.php');
?>