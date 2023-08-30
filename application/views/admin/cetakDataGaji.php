<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
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
<style>
    body {
        font-family: arial;
    }
</style>
<?php
if ((isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '')) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
} else {
    $bulan = date('m');
    $tahun = date('Y');
}
?>

<body>
    <br>
    <h1 class="mt-12 text-center">Auriga Tech</h1>
    <h3 class="text-center">Daftar Gaji Pegawai</h3>
    <?php
    switch ($bulan) {
        case '01':
            $bulan = 'Januari';
            break;
        case '02':
            $bulan = 'Februari';
            break;
        case '03':
            $bulan = 'Maret';
            break;
        case '04':
            $bulan = 'April';
            break;
        case '05':
            $bulan = 'Mei';
            break;
        case '06':
            $bulan = 'Juni';
            break;
        case '07':
            $bulan = 'Juli';
            break;
        case '08':
            $bulan = 'Agustus';
            break;
        case '09':
            $bulan = 'September';
            break;
        case '10':
            $bulan = 'Oktober';
            break;
        case '11':
            $bulan = 'November';
            break;
        case '12':
            $bulan = 'Desember';
            break;
        default:
            $bulan = 'Terjadi Kesalahan';
            break;
    }

    ?>
    <div class="ml-4">
        <table>
            <tr>
                <th>Bulan</th>
                <td> : </td>
                <td><?= $bulan; ?></td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td> : </td>
                <td><?= $tahun; ?></td>
            </tr>
        </table>
    </div>
</body>
<div class="row mt-1 m-3">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Gaji Kotor</th>
                        <th>Total Potongan</th>
                        <th>Gaji Bersih</th>

                        <!-- <th class="text-center">Aksi</th> -->
                    </tr>
                </thead>
                <tr>

                </tr>
                <!-- mengambil nilai dari data potongan gaji -->
                <!-- 1. Alpha -->
                <?php foreach ($potonganAlpha as $potonganGaji) {
                    $alpha = $potonganGaji->nominal;
                }
                ?>
                <!-- 2. Izin -->
                <?php foreach ($potonganIzin as $potonganGaji) {
                    $izin = $potonganGaji->nominal;
                } ?>

                <?php
                $no = 1;
                foreach ($cetakGaji as $dataGaji) :
                ?>
                    <?php
                    $pot_alpha = $dataGaji->alpha * $alpha;
                    $pot_izin = $dataGaji->izin * $izin;

                    $gajiKotor     = $dataGaji->gaji_pokok + $dataGaji->tunjangan  + $dataGaji->bonus;
                    $totalPotongan = $pot_alpha + $pot_izin;
                    $gajiBersih    = $gajiKotor - $totalPotongan;

                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dataGaji->nama_pegawai; ?></td>
                            <td><?= $dataGaji->nik; ?></td>
                            <td><?= $dataGaji->jenis_kelamin; ?></td>
                            <td><?= $dataGaji->nama_jabatan; ?></td>
                            <td>Rp. <?= number_format($gajiKotor, 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($totalPotongan, 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($gajiBersih, 0, ',', '.'); ?></td>
                            <!-- <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataGaji/editData/' . $dataGaji->id_kehadiran) ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="<?= base_url('admin/dataGaji/hapusData/' . $dataGaji->id_kehadiran) ?>" onclick="return confirm('Yakin Akan dihapus?')"><i class="fas fa-trash"></i></a>
                            </td> -->
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <!-- jika tidak maka tampilkan alert -->

        </div>
    </div>
</div>
<table width="100%">
    <tr>
        <td></td>
        <td width="200px">
            <p>Jakarta, <?= date('d M Y') ?></p>
            <p>Mengetahui, HRD</p>
            <br><br><br><br>
            <p>_________________</p>
        </td>
    </tr>
</table>

<script>
    window.print();
</script>

</html>