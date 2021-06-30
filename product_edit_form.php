<?php
    require 'connection.php';
    
    $id = $_GET['id'];

    $query = "SELECT * FROM
                (SELECT * FROM products A JOIN categories B ON A.category_id=B.category_id) C
                JOIN suppliers D ON C.supplier_id=D.supplier_id
                WHERE C.product_id=$id";
    $row = pg_fetch_object(pg_query($db, $query));
?>

<!-- Modal Content Edit Product -->
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit
        Product Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="product_edit_save.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="id" value=<?= $row->product_id; ?>></input>
        <div class="box-body">
            <div class="form-group">
                <label for="product_name">Product
                    Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name"
                    value="<?= $row->product_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="supplier">Supplier</label>
                <select class="form-control" name="supplier" id="supplier">
                    <option>
                        <?= $row->company_name; ?>
                    </option>
                    <?php
                        $query_2 = "select * from suppliers";

                        $supplier = pg_query($db, $query_2);

                        for($i=0; $row_2 = pg_fetch_object($supplier); $i++) :
                    ?>
                    <option>
                        <?php echo $row_2->company_name; ?>
                    </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option>
                        <?= $row->category_name; ?>
                    </option>
                    <?php
                        $query_2 = "select * from categories";

                        $category = pg_query($db, $query_2);

                        for($i=0; $row_2 = pg_fetch_object($category); $i++) :
                    ?>
                    <option>
                        <?php echo $row_2->category_name; ?>
                    </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity per
                    Unit</label>
                <input type="text" class="form-control" name="quantity" id="quantity"
                    value="<?= $row->quantity_per_unit; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" value="<?= $row->unit_price; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="int" class="form-control" name="stock" id="stock" value="<?= $row->units_in_stock; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="int" class="form-control" name="order" id="order" value="<?= $row->units_on_order; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="reorder_level">Reorder
                    Level</label>
                <input type="int" class="form-control" name="reorder_level" id="reorder_level"
                    value="<?= $row->reorder_level; ?>" required>
            </div>
            <div class="form-group">
                <label for="discontinued">Discontinued</label>
                <input type="int" class="form-control" name="discontinued" id="discontinued" value="<?php
                        if($row->discontinued==1){
                            echo "Yes";
                        } else {
                            echo "No";
                        }; ?>" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="edit_product">Edit
            Product</button>
    </div>
</form>
<!-- End Modal Content Edit Product -->