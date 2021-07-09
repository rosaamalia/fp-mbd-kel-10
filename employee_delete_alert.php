<?php
    require 'connection.php';

    $id = $_GET['id'];
?>

<div class="modal-header">
    <h5 class="modal-title" id="Modal_delete">Delete
        Employee Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>Do you want to delete this data?</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    <a href="employee_delete.php?id=<?= $id; ?>" class="btn btn-primary" rolw="button">Delete</a>
</div>