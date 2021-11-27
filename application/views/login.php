<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/custom.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">

    <style>
        body {
            background-image: url("https://www.pu.go.id/assets/img/pu/infra-8.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card-header {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .card-title {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            padding-top: 2vh;
            padding-bottom: 2vh;
            width: 70%;
        }

        .card-logo {
            width: 30%;
        }

        img {
            width: 50%;
        }

        @media only screen and (max-width:980px) {

            .card-title {
                width: 100%;
                text-align: center;
            }

            .card-logo {
                visibility: hidden;
            }
        }
    </style>

</head>

<body>
    <!-- <img class="image" src="https://www.pu.go.id/assets/img/pu/infra-8.jpg" alt="Background"> -->

    <div class="container">

        <div class="container-fluid my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">LOGIN - SAPA (Sistem Aduan Penaggulangan Bencana)</h3>
                    <div id="logo" class="card-logo">
                        <img src="https://th.bing.com/th/id/R.44d698fcf9ad9c82a745b9a543f348d8?rik=o2e7GORVF3MGGg&riu=http%3a%2f%2fsda.pu.go.id%2fbalai%2fbwssumatera6%2fwp-content%2fuploads%2f2020%2f11%2f200721-Logo-PUPR-Logo-Komunikasi-Primary-Color-750x250.png&ehk=wlohHEd75Mz5nzTsNh9uA9mMieYjUxPJzdQiDCrEy0E%3d&risl=&pid=ImgRaw&r=0" alt="logo pupr">
                    </div>
                </div>

                <form class="form" role="form" method="post" action="<?= base_url('auth/post_login'); ?>">
                    <div class="card-body bg-secondary">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" placeholder="User Name" id="username" name="username" required="required">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="required">
                        </div>
                    </div>
                    <div class="card-footer bg-secondary">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- ./wrapper -->

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
</body>

</html>