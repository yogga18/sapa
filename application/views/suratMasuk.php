<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat Masuk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Sweet alert -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/toastr.min.css') ?>">
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
            <a href="<?= base_url(); ?>Admin/about" class="brand-link">
                <img src="<?= base_url('assets/dist/img/pupr.png') ?>" alt="PUPR Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <h3>SAPA</h3>
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

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="<?= base_url(); ?>Admin/about">
                                    <i class="nav-icon fas fa-info-circle"></i>
                                    About
                                </a>
                            </h6>
                        </li>

                        <li>
                            <hr />
                        </li>

                        <li class="nav-item">
                            <h6 class="nav-link">
                                <a href="<?= base_url(); ?>auth/logout">
                                    <i class="nav-icon fas fa-door-open"></i>
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
                    <h2 class="display-4">Surat Masuk BPBD</h2>
                </div>

                <div class="container my-5">
                    <div class="card">

                        <!-- /.modal -->
                        <?php foreach ($letter as $letters) : ?>
                            <div class="modal fade" id="modal-lg<?= $letters->id; ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Surat Aduan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form class="form" role="form" method="post" enctype="multipart/form-data" action="<?= base_url('Admin/updateSurat') ?>">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="">Tanggal Surat</label>
                                                        <input value="<?= $letters->id; ?>" type="hidden" name="id">
                                                        <input class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $letters->tgl_surat; ?>" type="date">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">No Surat</label>
                                                        <input class="form-control" id="no_surat" name="no_surat" value="<?= $letters->no_surat; ?>" type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Alamat</label>
                                                        <input class="form-control" id="alamat" name="alamat" value="<?= $letters->alamat; ?>" type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Kelurahan</label>
                                                        <input class="form-control" id="kelurahan" name="kelurahan" value="<?= $letters->kelurahan; ?>" type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Keterangan</label>
                                                        <input class="form-control" id="keterangan" name="keterangan" value="<?= $letters->keterangan; ?>" type="text">
                                                    </div>

                                                    <h5>Foto</h5>

                                                    <img src="<?= base_url('image/' . $letters->image) ?>" height="150px" width="300px" alt="image">

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                                        <label class="custom-file-label" for="customFile">Pilih gambar</label>
                                                    </div>

                                                    <div class="form-group py-4">
                                                        <label for="">Status</label>
                                                        <!-- <input class="form-control" id="status" name="status" value="<?= $letters->status; ?>" type="text"> -->
                                                        <select id="status" name="status" class="form-control">
                                                            <option id="status" name="status" value="">- Pilih Status -</option>
                                                            <option id="status" name="status" value="Selesai Survei">- Selesai Survei -</option>
                                                            <option id="status" name="status" value="Selesai Perbaikan">- Selesai Perbaikan -</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- /.modal -->

                    </div>
                </div>

                <!-- MAIN TABLE -->
                <div class="container my-5">
                    <div class="card card-primary card-outline">

                        <div class="card-body">
                            <table id="example1" class="table table-hover table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tgl Surat</th>
                                        <th scope="col">No Surat</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kelurahan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($letter as $letters) : ?>
                                        <tr class="table-warning">
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $letters->tgl_surat; ?></td>
                                            <td><?= $letters->no_surat; ?></td>
                                            <td><?= $letters->alamat; ?></td>
                                            <td><?= $letters->kelurahan; ?></td>
                                            <td><?= $letters->keterangan; ?></td>
                                            <td><?= $letters->image; ?></td>
                                            <td><?= $letters->status; ?></td>
                                            <td><?= $letters->username; ?></td>
                                            <td>
                                                <div class="wrapper-button">
                                                    <!-- DELETE -->
                                                    <a class="btn btn-danger btn-sm swalDefaultSuccess" href="delete_post/<?= $letters->id; ?>"><i class="fas fa-trash-alt"></i></a>
                                                    <!-- EDIT -->
                                                    <a class="btn btn-primary btn-sm" id="editModal" data-toggle="modal" data-target="#modal-lg<?= $letters->id; ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <!-- DOWNLOAD -->
                                                    <a class="btn btn-info btn-sm" href="<?= base_url("/image/$letters->image") ?>" download>
                                                        <i class="fas fa-file-download"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- MAIN TABLE END -->

                <!-- EMPTY TABLE -->
                <div class="container my-5 mb-5">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-exclamation-circle" style="color: red"></i>
                                Status <b>Belum dilakukan Survei</b>
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart" style="height: 1400px;">

                                <table id="example3" class="table table-hover table-bordered table-striped">
                                    <thead class="table-danger">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tgl Surat</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Kelurahan</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($sEmpty as $empty) : ?>
                                            <tr class="table-light">
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $empty->tgl_surat; ?></td>
                                                <td><?= $empty->no_surat; ?></td>
                                                <td><?= $empty->alamat; ?></td>
                                                <td><?= $empty->kelurahan; ?></td>
                                                <td><?= $empty->keterangan; ?></td>
                                                <td><?= $empty->image; ?></td>
                                                <td><?= $empty->status; ?></td>
                                                <td>
                                                    <div class="wrapper-button">
                                                        <!-- DELETE -->
                                                        <a class="btn btn-danger btn-sm swalDefaultSuccess" href="delete_post/<?= $empty->id; ?>"><i class="fas fa-trash-alt"></i></a>
                                                        <!-- EDIT -->
                                                        <a class="btn btn-primary btn-sm" id="editModal" data-toggle="modal" data-target="#modal-lg<?= $empty->id; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!-- DOWNLOAD -->
                                                        <a class="btn btn-info btn-sm" href="<?= base_url("/image/$empty->image") ?>" download>
                                                            <i class="fas fa-file-download"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- EMPTY TABLE END -->

                <!-- Selesai Survei TABLE -->
                <div class="container my-5">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-exclamation-triangle" style="color: yellow"></i>
                                Status <b>Selesai Survei</b>
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart" style="height: 1400px;">

                                <table id="example4" class="table table-hover table-bordered table-striped">
                                    <thead class="table-warning">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tgl Surat</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Kelurahan</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($sSurvei as $survei) : ?>
                                            <tr class="table-light">
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $survei->tgl_surat; ?></td>
                                                <td><?= $survei->no_surat; ?></td>
                                                <td><?= $survei->alamat; ?></td>
                                                <td><?= $survei->kelurahan; ?></td>
                                                <td><?= $survei->keterangan; ?></td>
                                                <td><?= $survei->image; ?></td>
                                                <td><?= $survei->status; ?></td>
                                                <td>
                                                    <div class="wrapper-button">
                                                        <!-- DELETE -->
                                                        <a class="btn btn-danger btn-sm swalDefaultSuccess" href="delete_post/<?= $survei->id; ?>"><i class="fas fa-trash-alt"></i></a>
                                                        <!-- EDIT -->
                                                        <a class="btn btn-primary btn-sm" id="editModal" data-toggle="modal" data-target="#modal-lg<?= $survei->id; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!-- DOWNLOAD -->
                                                        <a class="btn btn-info btn-sm" href="<?= base_url("/image/$survei->image") ?>" download>
                                                            <i class="fas fa-file-download"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Selesai Survei TABLE END -->

                <!-- Selesai Perbaikan TABLE -->
                <div class="container my-5 mb-5">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-check-circle" style="color: green"></i>
                                Status <b>Selesai Perbaikan</b>
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="bar-chart" style="height: 1400px;">

                                <table id="example3" class="table table-hover table-bordered table-striped">
                                    <thead class="table-success">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tgl Surat</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Kelurahan</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($sPerbaikan as $perbaikan) : ?>
                                            <tr class="table-light">
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $perbaikan->tgl_surat; ?></td>
                                                <td><?= $perbaikan->no_surat; ?></td>
                                                <td><?= $perbaikan->alamat; ?></td>
                                                <td><?= $perbaikan->kelurahan; ?></td>
                                                <td><?= $perbaikan->keterangan; ?></td>
                                                <td><?= $perbaikan->image; ?></td>
                                                <td><?= $perbaikan->status; ?></td>
                                                <td>
                                                    <div class="wrapper-button">
                                                        <!-- DELETE -->
                                                        <a class="btn btn-danger btn-sm swalDefaultSuccess" href="delete_post/<?= $perbaikan->id; ?>"><i class="fas fa-trash-alt"></i></a>
                                                        <!-- EDIT -->
                                                        <a class="btn btn-primary btn-sm" id="editModal" data-toggle="modal" data-target="#modal-lg<?= $perbaikan->id; ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!-- DOWNLOAD -->
                                                        <a class="btn btn-info btn-sm" href="<?= base_url("/image/$perbaikan->image") ?>" download>
                                                            <i class="fas fa-file-download"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Selesai Perbaikan TABLE END-->
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
        <!-- sweet alert -->
        <script src="<?= base_url('assets/dist/js/sweetalert2.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('') ?>assets/dist/js/adminlte.min.js"></script>
        <!-- Page specific script -->

        <!-- CHARTS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            $(function() {
                $("#example3").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
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

            $(function() {
                $("#example4").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print"]
                }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
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

            // Sweet alert
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Dihapus.'
                    })
                });
                $('.swalDefaultError').click(function() {
                    Toast.fire({
                        icon: 'error',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultWarning').click(function() {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
            });

            // BAR CHART

            /* END BAR CHART */
        </script>




</body>

</html>