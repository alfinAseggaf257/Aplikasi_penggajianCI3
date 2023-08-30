<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table  table-striped table-earning">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Bulan & Tahun</th>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Alpha</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($absensi as $dataAbsensi) :
                ?>
                    <tbody>
                        <?php
                        switch ($dataAbsensi->bulan) {
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
                            <td><?= $bulan . ' ' . $dataAbsensi->tahun  ?></td>
                            <td><?= $dataAbsensi->hadir; ?></td>
                            <td><?= $dataAbsensi->izin; ?></td>
                            <td><?= $dataAbsensi->alpha; ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger" target="_blank" href="<?= base_url('laporan/laporan/laporanAbsensi/' . $dataAbsensi->bulan . '/' . $dataAbsensi->tahun . '/' . $dataAbsensi->id_pegawai) ?>"><i class="fas fa-print"></i> Cetak Dokumen</a>
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