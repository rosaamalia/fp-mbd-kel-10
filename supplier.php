<?php
    require 'connection.php';

    $query = "SELECT * FROM suppliers";

    $result = pg_query($db, $query);

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
            <li class="nav-item">
                <a class="nav-link" href="sales.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sales</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Products -->
            <li class="nav-item">
                <a class="nav-link" href="products.php?err=0">
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
            <li class="nav-item active">
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
                    <h1 class="h3 mb-2 text-gray-800">Suppliers</h1>

                    <!-- Product Datas -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between m-0">
                            <h6 class="m-0 font-weight-bold text-primary">Supplier Data</h6>
                            <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                                data-target="#Modal_add_product">
                                <i class="fas fa-solid fa-plus fa-sm text-white-50"></i> Add Supplier
                                Data
                            </div>

                            <!-- Modal Add Product -->
                            <div class="modal fade bd-example-modal-lg" id="Modal_add_product" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Supplier Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="supplier_add_save.php" method="post"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="company_name">Company Name</label>
                                                        <input type="text" class="form-control" name="company_name"
                                                            id="company_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact_name">Contact Name</label>
                                                        <input type="text" class="form-control" name="contact_name"
                                                            id="contact_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contact_title">Contact Title</label>
                                                        <input type="text" class="form-control" name="contact_title"
                                                            id="contact_title" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" class="form-control" name="address"
                                                            id="address" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" name="city" id="city"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="region">Region</label>
                                                        <input type="text" class="form-control" name="region"
                                                            id="region">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="postal_code">Postal Code</label>
                                                        <input type="text" class="form-control" name="postal_code"
                                                            id="postal_code" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input type="text" class="form-control" name="country"
                                                            id="country" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control" name="phone" id="phone"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fax">Fax</label>
                                                        <input type="text" class="form-control" name="fax" id="fax">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="homepage">Homepage</label>
                                                        <input type="text" class="form-control" name="homepage"
                                                            id="homepage">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="add_product">Add
                                                    Supplier</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal Add Product -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Contact Name</th>
                                            <th>Contact Title</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Region</th>
                                            <th>Postal Code</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Homepage</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Contact Name</th>
                                            <th>Contact Title</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Region</th>
                                            <th>Postal Code</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Homepage</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php while($row = pg_fetch_object($result)) : ?>

                                        <tr>
                                            <td><?= $row->company_name; ?></td>
                                            <td><?= $row->contact_name; ?></td>
                                            <td><?= $row->contact_title; ?></td>
                                            <td><?= $row->address; ?></td>
                                            <td><?= $row->city; ?></td>
                                            <td><?= $row->region; ?></td>
                                            <td><?= $row->postal_code; ?></td>
                                            <td><?= $row->country; ?></td>
                                            <td><?= $row->phone; ?></td>
                                            <td><?= $row->fax; ?></td>
                                            <td><?= $row->homepage; ?></td>
                                            <td>
                                                <a href="supplier_edit_form.php?id=<?= $row->supplier_id; ?>"
                                                    class="edit_btn d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"
                                                    data-toggle="modal" data-target="#Modal_edit_supplier">
                                                    <i class="fas fa-solid fa-pen fa-sm text-white-50"></i> Edit
                                                </a>

                                                <div class="modal fade bd-example-modal-lg" id="Modal_edit_supplier"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="supplier_delete_alert.php?id=<?= $row->supplier_id; ?>"
                                                    class="delete_btn d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                                                    data-toggle="modal" data-target="#Modal_delete_product"><i
                                                        class="fas fa-solid fa-trash fa-sm text-white-50"></i>
                                                    Delete</a>

                                                <div class="modal fade bd-example-modal-lg" id="Modal_delete_supplier"
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

    <!-- Show edit data modal -->
    <script>
    $('.edit_btn').on('click',
        function(e) {
            e.preventDefault();
            $('#Modal_edit_supplier').modal('show').find(
                '.modal-content').load($(
                this).attr('href'));
        });
    </script>

    <!-- Show delete data alert -->
    <script>
    $('.delete_btn').on('click',
        function(e) {
            e.preventDefault();
            $('#Modal_delete_supplier').modal('show').find(
                '.modal-content').load($(
                this).attr('href'));
        });
    </script>

</body>

</html>