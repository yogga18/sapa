<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Tabbed IFrames</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url(); ?>auth/logout" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Pengaduan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($user->avatar != null) : ?>
                            <img src="avatar/<?= $user->avatar; ?>" class="img-circle elevation-2" width="250" height="250">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>assets/img/default.jpg" width="250" height="250" class="img-circle elevation-2">
                        <?php endif; ?>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $user->username; ?></a>
                        <a href="#" class="d-block"><?= $user->email; ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="<?= base_url(); ?>Admin/index">
                                    <i class="nav-icon fas fa-users"></i>
                                    User Account
                                </a>
                            </h6>
                        </li>

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="<?= base_url(); ?>auth/registrasi">
                                    <i class="nav-icon fas fa-user"></i>
                                    Buat Akun
                                </a>
                            </h6>
                        </li>

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="<?= base_url(); ?>Admin/suratMasuk">
                                    <i class="nav-icon far fa-envelope"></i>
                                    Surat Masuk BPBD
                                </a>
                            </h6>
                        </li>

                        <!-- <li class="nav-header">EXAMPLES</li> -->
                        <li>
                            <hr />
                        </li>

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="#">
                                    <i class="nav-icon far fa-envelope"></i>
                                    mailbox
                                </a>
                            </h6>
                        </li>

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="<?= base_url(); ?>auth/logout">
                                    <i class="nav-icon far fa-envelope"></i>
                                    Logout
                                </a>
                            </h6>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">

            <div class="tab-content pt-5">
                <div class="tab-empty">
                    <h2 class="display-4">User Account</h2>
                </div>

                <div class="container my-5">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-hover table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($posts as $post) : ?>
                                        <tr class="table-warning">

                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $post->title; ?></td>
                                            <td><?= $post->price; ?></td>
                                            <td><?= $post->phone; ?></td>
                                            <td><?= $post->image; ?></td>
                                            <!-- <img src="<?= base_url('image/' . $post->image) ?>"> -->
                                            <td>
                                                <div class="wrapper-button">
                                                    <a class="btn btn-danger btn-sm" href="delete_post/<?= $user->id; ?>"><i class="fas fa-trash-alt"></i></a>

                                                    <!-- <a class="btn btn-primary btn-sm" id="editModal" data-toggle="modal" data-target="#editModal<?= $post->id; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a> -->

                                                    <a class="btn btn-info btn-sm" href="<?= base_url("/image/$post->image") ?>" download>
                                                        <i class="fas fa-file-download"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>

        </div>
        <!-- /.content-wrapper -->

        <!-- jQuery -->
        <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <!-- overlayScrollbars -->
        <script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>


        <!-- DataTables  & Plugins --> <?= base_url('') ?>
        <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('') ?>assets/dist/js/adminlte.min.js"></script>
        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>



</body>

</html>