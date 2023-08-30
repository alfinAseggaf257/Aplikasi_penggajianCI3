<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
    </div>
</div>

<div class="card rounded mt-2">
    <div class="container">
        <h5 class="mt-3">Informasi Potongan Gaji Pegawai</h5>
        <div class="col-lg-12">
            <div class="card mb-4 mt-3">
                <table class="table-striped table-bordered text-center ">
                    <thead>
                        <tr style="height:40px ;background-color:#333333; color:#fff;">
                            <th style="width:10%;">No</th>
                            <th style="width:40%;">Nama Potongan</th>
                            <th style="width:40%;">Nominal</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($potongan as $infoPot) :
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $infoPot->nama_potongan; ?></td>
                                <td>Rp. <?= number_format($infoPot->nominal, 0, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>

            </div>

        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Bulan & Tahun</th>
                        <th>Gaji Kotor</th>
                        <th>Total Potongan</th>
                        <th>Gaji Bersih</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <!-- 1. alpa -->
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
                foreach ($gaji as $dataGaji) :
                ?>
                    <?php
                    $pot_alpha = $dataGaji->alpha * $alpha;
                    $pot_izin = $dataGaji->izin * $izin;

                    $gajiKotor     = $dataGaji->gaji_pokok + $dataGaji->tunjangan  + $dataGaji->bonus;
                    $totalPotongan = $pot_alpha + $pot_izin;
                    $gajiBersih    = $gajiKotor - $totalPotongan;

                    ?>
                    <tbody>
                        <?php
                        switch ($dataGaji->bulan) {
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
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $bulan . ' ' . $dataGaji->tahun  ?></td>
                            <td>Rp. <?= number_format($gajiKotor, 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($totalPotongan, 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($gajiBersih, 0, ',', '.'); ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger" target="_blank" href="<?= base_url('laporan/laporan/laporanGaji/' . $dataGaji->bulan . '/' . $dataGaji->tahun . '/' . $dataGaji->id_pegawai) ?>"><i class="fas fa-print"></i> Cetak Dokumen</a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <!-- jika tidak maka tampilkan alert -->

        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->