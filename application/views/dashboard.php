<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logbook Maintenance </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>

            </ul>



            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo base_url() ?>" class="nav-link active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Form Maintenance
                                </p>
                            </a>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Data-data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                <li class="nav-item active">
                                    <a href="<?php echo base_url() ?>datadata/pegawai" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>Data Pegawai </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>datadata/barang" class="nav-link">
                                        <i class="fa fa-suitcase nav-icon"></i>
                                        <p>Data Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url() ?>datadata/log" class="nav-link">
                                        <i class="fa fa-table nav-icon"></i>
                                        <p>Log</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Form Isian Maintenance Stasiun Bumi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"></a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">

                                    <form action=" <?php echo base_url() . 'dashboard/insert'; ?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-4">No</label>
                                            <input type="hidden" name="id_mt" class="form-control">
                                            <input type="text" name="no_mt" class="form-control col-4" value="<?php echo $autonumber ?>" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4">tanggal</label>
                                            <input type="date" name="tgl_mt" class="form-control col-4">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4">Petugas 1</label>
                                            <select class="form-control col" name="petugas1">
                                                <option> </option>
                                                <?php
                                                foreach ($listpegawai as $row) {
                                                    echo '<option value="' . $row->nama_pegawai . '">' . $row->nama_pegawai . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4">Petugas 2</label>
                                            <select class="form-control col" name="petugas2">
                                                <option> </option>
                                                <?php
                                                foreach ($listpegawai as $row) {
                                                    echo '<option value="' . $row->nama_pegawai . '">' . $row->nama_pegawai . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- -->
                                        <div class="form-group row">
                                            <label class="col-4">Nama Barang</label>
                                            <select class="form-control col" name="nama_barang" id="namabarang">
                                                <option> </option>
                                                <?php
                                                foreach ($listbarang as $row) {
                                                    echo '<option value="' . $row->nama_barang . '">' . $row->nama_barang . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- 
                                        <div class="form-group row">
                                            <label class="col-4">Nama Barang</label>
                                            <input type="text" name="nama_barang" id="namabarang" class="form-control col">
                                        </div>-->

                                        <div class="form-group row">
                                            <label class="col-4">Kode Barang</label>
                                            <input type="text" name="kode_barang" class="form-control col">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control col" rows="3"></textarea>
                                        </div>
                                        <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                                        <div class="row">
                                            <div class="col-4"></div>
                                            <div class="col"><button type="submit" class="btn btn-success">Proses</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                    </div>




                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="#">Admin</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>V</b>
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#namabarang').autocomplete({
                source: "<?php echo site_url('/dashboard/get_autocomplete'); ?>",

                select: function(event, ui) {
                    $('[name="nama_barang"]').val(ui.item.label);
                    $('[name="kode_barang"]').val(ui.item.description);
                }
            });

        });
    </script>

</body>

</html>