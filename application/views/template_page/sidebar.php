<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
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
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <!-- Start Menu Admin -->
                <?php if ($this->session->userdata('id_hakakses') == '1') : ?>
                    <li class="active">
                        <a href="<?= base_url('admin/dashboard') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-fw fa-database"></i>Master Data</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <!-- membaca controller -->
                                <a href="<?= base_url('admin/dataPegawai') ?>">Pegawai</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/dataJabatan') ?>">Jabatan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-fw fa-table"></i>Penggajian</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="<?= base_url('admin/dataAbsensi') ?>">Absensi</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/dataPotongan') ?>">Setting Potongan Gaji</a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/dataGaji') ?>">Gaji</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-fw  fa-copy"></i>Laporan</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                <?php endif; ?>
                <!-- End Menu Admin -->


                <!-- Start Menu Pegawai -->
                <?php if ($this->session->userdata('id_hakakses') == '2') : ?>
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
                <?php endif; ?>
                <!-- End Menu Pegawai -->

                <li>
                    <a href="<?= base_url('welcome/logout') ?>">
                        <i class="zmdi fa-fw zmdi-power"></i>Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->