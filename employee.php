<?php
    require 'connection.php';

    $query = "SELECT * FROM employees";

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
                <a class="nav-link" href="">
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
                <a class="nav-link" href="">
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
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Customer</span></a>
            </li>

            <!-- Nav Item - Employee -->
            <li class="nav-item active">
                <a class="nav-link" href="employee.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Employee</span></a>
            </li>

            <!-- Nav Item - Sales Report -->
            <li class="nav-item">
                <a class="nav-link" href="">
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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Employee</h1>

                    <!-- Employee -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between m-0">
                            <h6 class="m-0 font-weight-bold text-primary">Employee</h6>
                            <div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                                data-target="#Modal_add_product">
                                <i class="fas fa-solid fa-plus fa-sm text-white-50"></i> Add Employee Data
                            </div>

                            <!-- Modal Add Employee Data -->
                            <div class="modal fade bd-example-modal-lg" id="Modal_add_product" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Employee Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="employee_add_save.php" method="post"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name"
                                                            id="last_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" class="form-control" name="first_name"
                                                            id="first_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title_of_courtesy">Title of Courtesy</label>
                                                        <input type="text" class="form-control" name="title_of_courtesy"
                                                            id="title_of_courtesy" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="birth_date">Birth Date</label>
                                                        <input type="date" class="form-control" name="birth_date"
                                                            id="birth_date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hire_date">Hire Date</label>
                                                        <input type="date" class="form-control" name="hire_date"
                                                            id="hire_date" required>
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
                                                            id="region" required>
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
                                                        <label for="home_phone">Home Phone</label>
                                                        <input type="text" class="form-control" name="home_phone"
                                                            id="home_phone" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="extension">Extension</label>
                                                        <input type="text" class="form-control" name="extension"
                                                            id="extension" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input type="file" class="form-control" name="photo" id="photo"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="notes">Notes</label>
                                                        <input type="text" class="form-control" name="notes" id="notes"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="reports_to">Reports to</label>
                                                        <input type="text" class="form-control" name="reports_to"
                                                            id="reports_to" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="photo_path">Photo Path</label>
                                                        <input type="text" class="form-control" name="photo_path"
                                                            id="photo_path" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="add_employee">Add
                                                    Employee</button>
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
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Title</th>
                                            <th>Title of Courtesy</th>
                                            <th>Birth Date</th>
                                            <th>Hire Date</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Regione</th>
                                            <th>Postal Code</th>
                                            <th>Country</th>
                                            <th>Home Phone</th>
                                            <th>Extension</th>
                                            <th>Photo</th>
                                            <th>Notes</th>
                                            <th>Reports to</th>
                                            <th>Photo Path</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Title</th>
                                            <th>Title of Courtesy</th>
                                            <th>Birth Date</th>
                                            <th>Hire Date</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Regione</th>
                                            <th>Postal Code</th>
                                            <th>Country</th>
                                            <th>Home Phone</th>
                                            <th>Extension</th>
                                            <th>Photo</th>
                                            <th>Notes</th>
                                            <th>Reports to</th>
                                            <th>Photo Path</th>
                                            <th style="width: 150px">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php while($row = pg_fetch_object($result)) : ?>

                                        <tr>
                                            <td><?= $row->last_name; ?></td>
                                            <td><?= $row->first_name; ?></td>
                                            <td><?= $row->title; ?></td>
                                            <td><?= $row->title_of_courtesy; ?></td>
                                            <td><?= $row->birth_date; ?></td>
                                            <td><?= $row->hire_date; ?></td>
                                            <td><?= $row->address; ?></td>
                                            <td><?= $row->city; ?></td>
                                            <td><?= $row->region; ?></td>
                                            <td><?= $row->postal_code; ?></td>
                                            <td><?= $row->country; ?></td>
                                            <td><?= $row->home_phone; ?></td>
                                            <td><?= $row->extension; ?></td>
                                            <td><img src="<?= pg_unescape_bytea($row->photo); ?>"></td>
                                            <td><?= $row->notes; ?></td>
                                            <td><?= $row->reports_to; ?></td>
                                            <td><?= $row->photo_path; ?></td>
                                            <td>
                                                <a href="employee_edit_form.php?id=<?= $row->employee_id; ?>"
                                                    class="edit_btn d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"
                                                    data-toggle="modal" data-target="#Modal_edit_employee">
                                                    <i class="fas fa-solid fa-pen fa-sm text-white-50"></i> Edit
                                                </a>

                                                <div class="modal fade bd-example-modal-lg" id="Modal_edit_employee"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="employee_delete_alert.php?id=<?= $row->employee_id; ?>"
                                                    class="delete_btn d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                                                    data-toggle="modal" data-target="#Modal_delete_employee"><i
                                                        class="fas fa-solid fa-trash fa-sm text-white-50"></i>
                                                    Delete</a>

                                                <div class="modal fade bd-example-modal-lg" id="Modal_delete_employee"
                                                    tabindex="-1" role="dialog" aria-labelledby="Modal_delete_employee"
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
            $('#Modal_edit_employee').modal('show').find(
                '.modal-content').load($(
                this).attr('href'));
        });
    </script>

    <!-- Show delete data alert -->
    <script>
    $('.delete_btn').on('click',
        function(e) {
            e.preventDefault();
            $('#Modal_delete_employee').modal('show').find(
                '.modal-content').load($(
                this).attr('href'));
        });
    </script>

</body>

</html>