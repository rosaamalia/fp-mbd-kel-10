<?php
    require 'connection.php';

    $id = $_GET['id'];
    $product = $_GET['product'];
?>

<div class="modal-header">
    <h5 class="modal-title" id="Modal_delete">Delete
        Product From Order</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>Do you want to delete this data?</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <a href="sales_delete.php?id=<?= $id; ?>&product=<?= $product; ?>" class="btn btn-primary" rolw="button">Delete</a>
</div>