<?php
    require 'connection.php';
    
    $id = $_GET['id'];

    $query = "SELECT * FROM customers WHERE customer_id LIKE '$id'";
    $row = pg_fetch_object(pg_query($db, $query));
?>

<!-- Modal Content Edit Product -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit
        Customer Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="customer_edit_save.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="id" value=<?= $row->customer_id; ?>></input>
        <div class="box-body">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control" name="company_name" id="company_name"
                    value="<?= $row->company_name;?>">
            </div>
            <div class=" form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" name="contact_name" id="contact_name"
                    value="<?= $row->contact_name;?>" required>
            </div>
            <div class="form-group">
                <label for="contact_title">Contact Title</label>
                <input type="text" class="form-control" name="contact_title" id="contact_title"
                    value="<?= $row->contact_title;?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?= $row->address;?>"
                    required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" value="<?= $row->city;?>" required>
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" name="region" id="region" value="<?= $row->region;?>">
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code"
                    value="<?= $row->postal_code;?>" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country" value="<?= $row->country;?>"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?= $row->phone;?>" required>
            </div>
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" class="form-control" name="fax" id="fax" value="<?= $row->fax;?>">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="add_product">Edit
            Customer</button>
    </div>
</form>
<!-- End Modal Content Edit Product -->