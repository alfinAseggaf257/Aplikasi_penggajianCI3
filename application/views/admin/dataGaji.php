<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
        <div class="card mt-4">
            <div class="card-header bg-dark text-white">
                Cetak Daftar Gaji
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEmail2" class="mr-2">Bulan</label>
                        <select class="form-control" name="bulan" id="">
                            <option value="">--- Pilih Bulan ---</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group mb-2 ml-4 mr-2">
                        <label for="staticEmail2" class="mr-3">Tahun</label>
                        <select class="form-control" name="tahun" id="">
                            <option value="">--- Pilih Tahun ---</option>
                            <?php
                            $tahun = date('Y');
                            for ($i = 2022; $i < $tahun + 5; $i++) :
                            ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mr-3 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data Gaji</button>
                    <?php
                    if ((isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                    } else {
                        $bulan = date('m');
                        $tahun = date('Y');
                    }
                    ?>
                    <?php if (count($gaji) > 0) { ?>
                        <a href="<?= base_url('admin/dataGaji/cetakGaji?bulan=' . $bulan), '&tahun=' . $tahun ?>" target="_blank" class="btn btn-success mb-2 mr-3 "> <i class="fa fa-print mr-1"></i>Cetak Laporan Gaji</a>
                    <?php } else { ?>
                        <button type="button" class="btn btn-success mb-2 mr-3" data-toggle="modal" data-target="#mediumModal">
                            <i class="fa fa-print mr-1"></i>Cetak Laporan Gaji
                        </button>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="alert alert-dark">
            Menampilkan Data Gaji Pegawai Bulan: <span class="font-weight-bold"><?= $bulan;  ?></span> Tahun <span class="font-weight-bold"><?= $tahun;  ?></span>
        </div>
        <?php
        $jumlah_data = count($gaji);
        //jika jumlah data lebih dari 0 maka tampilkan table ..
        if ($jumlah_data > 0) { ?>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-1">
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
        <?php } else { ?>
            <span class="badge badge-danger"><i class="fas fa-info-circle mr-3"></i>Data gaji masih kosong, silahkan input data kehadiran pada bulan dan data yang anda cari</span>
        <?php } ?>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->