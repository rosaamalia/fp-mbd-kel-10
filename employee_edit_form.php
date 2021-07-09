<?php
    require 'connection.php';
    
    $id = $_GET['id'];

    $query ="SELECT * FROM employees";
    $row = pg_fetch_object(pg_query($db, $query));
?>

<!-- Modal Content Edit Employee -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit
        Employee Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="employee_edit_save.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="id" value=<?= $row->employee_id; ?>></input>
        <div class="box-body">
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name"
                    value="<?= $row->last_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name"
                    value="<?= $row->first_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title"
                    value="<?= $row->title; ?>" required>
            </div>
            <div class="form-group">
                <label for="title_of_courtesy">Title of Courtesy</label>
                <input type="text" class="form-control" name="title_of_courtesy" id="title_of_courtesy"
                    value="<?= $row->title_of_courtesy; ?>" required>
            </div>
            <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" class="form-control" name="birth_date" id="birth_date"
                    value="<?= $row->birth_date; ?>" required>
            </div>
            <div class="form-group">
                <label for="hire_date">Hire Date</label>
                <input type="date" class="form-control" name="hire_date" id="hire_date"
                    value="<?= $row->hire_date; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address"
                    value="<?= $row->address; ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city"
                    value="<?= $row->city; ?>" required>
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" name="region" id="region"
                    value="<?= $row->region; ?>" required>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code"
                    value="<?= $row->postal_code; ?>" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country"
                    value="<?= $row->country; ?>" required>
            </div>
            <div class="form-group">
                <label for="home_phone">Home Phone</label>
                <input type="text" class="form-control" name="home_phone" id="home_phone"
                    value="<?= $row->home_phone; ?>" required>
            </div>
            <div class="form-group">
                <label for="extesion">Extension</label>
                <input type="text" class="form-control" name="extension" id="extension"
                    value="<?= $row->extension; ?>" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" name="photo" id="photo"
                value="<?= $row->photo; ?>">
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <input type="text" class="form-control" name="notes" id="notes"
                    value="<?= $row->notes; ?>" required>
            </div>
            <div class="form-group">
                <label for="reports_to">Reports to</label>
                <input type="number" class="form-control" name="reports_to" id="reports_to"
                    value="<?= $row->reports_to; ?>" required>
            </div>
            <div class="form-group">
                <label for="photo_path">Photo Path</label>
                <input type="number" class="form-control" name="photo_path" id="photo_path"
                    value="<?= $row->photo_path; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="edit_employee">Edit
            Employee</button>
    </div>
</form>
<!-- End Modal Content Edit Employee -->