<?php
    require 'connection.php';
    
    $id = $_GET['id'];

    $query ="SELECT * FROM categories WHERE category_id=$id";
    $row = pg_fetch_object(pg_query($db, $query));
?>

<!-- Modal Content Edit Product Category -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit
        Product Category Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="productscategory_edit_save.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="id" value=<?= $row->category_id; ?>></input>
        <div class="box-body">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="cateogry_name"
                    value="<?= $row->category_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="<?= $row->description; ?>" required>
            </div>
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" class="form-control" name="picture" id="picture" value="<?= $row->picture; ?>"
                    required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="edit_product">Edit
            Product Category</button>
    </div>
</form>
<!-- End Modal Content Edit Product Category -->