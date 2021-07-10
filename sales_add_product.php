<?php
    require 'connection.php';

    $id = $_GET["id"];
    $err = $_GET["err"];

    if($err == 1) {
        echo "<script>
        alert ('The stock you entered exceeds the stock input limit. Please reudce its amount.');
        </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Northwind</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Northwind</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Sales -->
            <li class="nav-item active">
                <a class="nav-link" href="sales.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sales</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="products.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Products</span></a>
            </li>

            <!-- Nav Item - Products Category -->
            <li class="nav-item">
                <a class="nav-link" href="productscategory.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Products Category</span></a>
            </li>

            <!-- Nav Item - Supplier -->
            <li class="nav-item">
                <a class="nav-link" href="supplier.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Supplier</span></a>
            </li>

            <!-- Nav Item - Shipper -->
            <li class="nav-item">
                <a class="nav-link" href="shipper.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Shipper</span></a>
            </li>

            <!-- Nav Item - Customer -->
            <li class="nav-item">
                <a class="nav-link" href="customer.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Customer</span></a>
            </li>

            <!-- Nav Item - Employee -->
            <li class="nav-item">
                <a class="nav-link" href="employee.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Employee</span></a>
            </li>

            <!-- Nav Item - Sales Report -->
            <li class="nav-item">
                <a class="nav-link" href="salesreport.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Sales Report</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Sales</h1>

                    <!-- Product Datas -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between m-0">
                            <h6 class="m-0 font-weight-bold text-primary">Add Products to Order</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <form class="col" action="sales_add_product_save.php?id=<?= $id; ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row gx-3 align-items-center m-0">
                                        <div class="product_name form-group col-3">
                                            <label for="product_name">Product Name</label>
                                            <select class="form-control" name="product_name" id="product_name">
                                                <option>Choose product</option>
                                                <?php
                                                    $query = "select * from products";

                                                    $product = pg_query($db, $query);

                                                    for($i=0; $row = pg_fetch_object($product); $i++) :
                                                ?>
                                                <option><?php echo $row->product_name; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="quantity form-group col-3">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity"
                                                required>
                                            <div class="invalid-feedback">
                                                Please select a valid state.
                                            </div>
                                        </div>
                                        <div class="quantity form-group col-3">
                                            <label for="discount">Discount</label>
                                            <input type="number" class="form-control" name="discount" id="discount">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>

                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Unit Price</th>
                                            <th>Subtotal</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $query = "SELECT * FROM order_details A JOIN products B ON A.product_id=B.product_id WHERE A.order_id=$id";
                            
                                            $result = pg_query($db, $query);

                                            while($row = pg_fetch_object($result)) :
                                        ?>

                                        <tr>
                                            <td><?= $row->product_name; ?></td>
                                            <td><?= $row->quantity; ?></td>
                                            <td><?= $row->discount; ?></td>
                                            <td><?= "$".$row->unit_price; ?></td>
                                            <td><?= "$".(($row->quantity * $row->unit_price) - $row->discount); ?></td>
                                            <td>
                                                <a href="sales_delete_alert.php?id=<?= $id; ?>&product=<?= $row->product_id; ?>"
                                                    class="delete_btn d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                                                    data-toggle="modal" data-target="#Modal_delete_sales"><i
                                                        class="fas fa-solid fa-trash fa-sm text-white-50"></i>
                                                    Delete</a>

                                                <div class="modal fade bd-example-modal-lg" id="Modal_delete_sales"
                                                    tabindex="-1" role="dialog" aria-labelledby="Modal_delete"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <?php endwhile; ?>

                                    </tbody>

                                </table>
                                <a href="sales.php" class="btn btn-primary col-2">Save Order</a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Show delete data alert -->
    <script>
    $('.delete_btn').on('click',
        function(e) {
            e.preventDefault();
            $('#Modal_delete_sales').modal('show').find(
                '.modal-content').load($(
                this).attr('href'));
        });
    </script>

</body>

</html>