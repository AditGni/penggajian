<?php
mysql_connect('localhost','root','');
mysql_select_db('db_penggajian');
error_reporting(0);
ob_start();
session_start();
include "main.php";
include "fungsi/fungsiDate.php";
$id1 = $_SESSION['idl'];
if($pg!='absen-admin'){
    unset($_SESSION['link']);
    unset($_SESSION['mon']);
} else if($pg!='tambah-gaji'){
    unset($_SESSION['nip']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Penggajian</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">

</head>

<body>

    <div id="wrapper" class="<?= ($_GET[pg]=='laporan' ? '' : 'toggled');?>">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Sistem Informasi Penggajian
                    </a>
                </li>
                <?php if($_SESSION['login']==true && $_SESSION['akses']=='pegawai'){?>
                <li>
                    <a href="?pg=absen"><i class="fa fa-lock"></i> Absen</a>
                </li>
                <li>
                    <a href="?pg=slip-gaji"><i class="fa fa-list-alt"></i> Slip Gaji</a>
                </li>
            <?php } ?>
            <?php if($_SESSION['akses']=='pimpinan'){?>
                <li>
                    <a href="?pg=laporan"><i class="fa fa-book"></i> Laporan</a>
                </li>
            <?php } ?>
                <?php if($_SESSION['login']==true && $_SESSION['akses']=='admin'){?>
                <li>
                    <a href="?pg=absen-admin"><i class="fa fa-book"></i> Absensi</a>
                </li>
                <li>
                    <a href="?pg=daftar-gaji"><i class="fa fa-money"></i> Penggajian</a>
                </li>
                <li>
                    <a href="?pg=daftar-pegawai"><i class="fa fa-user"></i> Pegawai</a>
                </li>
                <li>
                    <a href="?pg=golongan"><i class="fa fa-eercast"></i> Golongan</a>
                </li>
            <?php } if(!empty($_SESSION['login'])){ ?>
                <li>
                    <a href="?pg=proses&mod=logout"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            <?php } else {?>
                <li>
                    <a href="?pg=login"><i class="fa fa-sign-in"></i> Login</a>
                </li>
            <?php } ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="col-md-12 p-3 bg-dark">
        <?php if(!empty($_SESSION['login'])){?>
            <div class="float-right">
                <h5 class="text-white small"><a href="?pg=proses&mod=logout"><i class="fa fa-user"></i> Selamat datang, <?php echo ucwords($_SESSION['nama']);?></a></h5>   
            </div>
            <div class="clearfix"></div>
        <?php } ?>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php include $call;?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#printed").hide();
        })
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            $("#gol").hide();
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
