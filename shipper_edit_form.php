<?php
    require 'connection.php';
    
    $id = $_GET['id'];

    $query = "SELECT * FROM shippers WHERE shippers.shipper_id = $id";
    $row = pg_fetch_object(pg_query($db, $query));
?>

<!-- Modal Content Edit Product -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit
        Shipper Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="shipper_edit_save.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="id" value=<?= $row->shipper_id; ?>></input>
        <div class="box-body">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" name="company_name" id="company_name"
                    value="<?= $row->company_name; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone"
                    value="<?= $row->phone; ?>" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="edit_shipper">Edit
            Shipper</button>
    </div>
</form>
<!-- End Modal Content Edit Product -->