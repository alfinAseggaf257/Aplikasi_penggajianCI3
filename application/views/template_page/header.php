<?php
if (!isset($this->session->userdata['id_hakakses'])) {
    $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
				<span class="badge badge-pill badge-danger">Akses Dilarang!</span>
				Anda Belum Login
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
    redirect('welcome');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $title; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url(); ?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url(); ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url(); ?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <?php if ($this->session->userdata('id_hakakses') == '1') : ?>
                            <a href="<?= base_url('admin/dashboard') ?>">
                                <img src="<?= base_url(); ?>assets/images/icon/logo.png" alt="Cool Admin" />
                            </a>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('id_hakakses') == '2') : ?>
                            <a href="<?= base_url('pegawai/dashboard') ?>">
                                <img src="<?= base_url(); ?>assets/images/icon/logo.png" alt="Cool Admin" />
                            </a>
                        <?php endif; ?>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <?php if ($this->session->userdata('id_hakakses') == '1') : ?>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="active">
                                <a href="<?= base_url('admin/dasboard') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-database"></i>Master Data</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="<?= base_url('admin/dataPegawai') ?>">Pegawai</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/dataJabatan') ?>">Jabatan</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-table"></i>Transaksi</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="<?= base_url('admin/dataAbsensi') ?>">Absensi</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/dataGaji') ?>">Gaji</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Laporan</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="<?= base_url('admin/laporanGaji') ?>">Laporan Gaji</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/laporanAbsensi') ?>">Laporan Absensi</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('admin/slipGaji') ?>">Slip Gaji Karyawan</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/ubahPassword') ?>">
                                    <i class="fas fa-lock"></i>Ubah Password</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/logout') ?>">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            <?php endif; ?>
            <?php if ($this->session->userdata('id_hakakses') == '2') : ?>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="active">
                                <a href="<?= base_url('pegawai/dashboard') ?>">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="<?= base_url('pegawai/dataAbsensi') ?>">
                                    <i class="fas fa-fw fa-list-alt"></i>Data Absensi</a>
                            </li>
                            <li>
                                <a href="<?= base_url('pegawai/dataGaji') ?>">
                                    <i class="fas fa-fw fa-file"></i>Data Gaji</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/logout') ?>">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            <?php endif; ?>
        </header>
        <!-- END HEADER MOBILE-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                               
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <?php
                                        $where = $this->session->userdata('id_pegawai');
                                        $ProfilUtama = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$where'")->result();
                                        foreach ($ProfilUtama as $profilHeader) :
                                        ?>
                                            <div class="image">
                                                <img src="<?= base_url(); ?>assets/foto/<?= $profilHeader->foto ?>" alt="John Doe" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#"><?= $profilHeader->nama_pegawai ?></a>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <?php
                                                        $where = $this->session->userdata('id_pegawai');
                                                        $fotoProfil = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$where'")->result();
                                                        foreach ($fotoProfil as $dataFoto) :
                                                        ?>
                                                            <img src="<?= base_url(); ?>assets/foto/<?= $dataFoto->foto ?>" alt="John Doe" />
                                                        <?php endforeach; ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <?php
                                                    $where = $this->session->userdata('id_pegawai');
                                                    $dataNama_Jb = $this->db->query("SELECT * FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan WHERE id_pegawai='$where'")->result();
                                                    foreach ($dataNama_Jb as $dataNmJb) :
                                                    ?>
                                                        <h5 class="name">
                                                            <a href="#"><?= $dataNmJb->nama_pegawai ?></a>
                                                        </h5>
                                                        <span class="email"><?= $dataNmJb->nama_jabatan ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('account/profilAkun') ?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('account/settingAkun') ?>">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('welcome/logout') ?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">