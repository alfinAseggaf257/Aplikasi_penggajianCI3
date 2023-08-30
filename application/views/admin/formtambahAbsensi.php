<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>

        </div>
        <div class="card mt-4">
            <div class="card-header bg-dark text-white">
                Tambah Data Absensi
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
                    <button type="submit" class="btn btn-primary mb-2 mr-3 ml-auto"><i class="fas fa-eye"></i> Generate</button>

                </form>
            </div>
        </div>
        <?php
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }
        ?>
        <div class="alert alert-dark">
            Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?= $bulan;  ?></span> Tahun <span class="font-weight-bold"><?= $tahun;  ?></span>
        </div>

        <?php
        $jumlah_data = count($tambah_Absensi);
        //jika jumlah data lebih kurang dari 0 artinya absensi telah
        if ($jumlah_data > 0) { ?>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-2">
    <div class="col-lg-12">
        <form method="post">
            <button class="btn btn-success mb-3" name="submit" value="submit" type="submit">Simpan</button>
            <div class="table-responsive table--no-card m-b-40 ">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Jabatan</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Alpha</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($tambah_Absensi as $dataAbsensi) :
                    ?>
                        <tbody>
                            <tr>
                                <input type="hidden" style="width:70px;" class="form-control rounded" name="bulan[]" value="<?= $bulan; ?>" id=" ">
                                <input type="hidden" style="width:70px;" class="form-control rounded" name="tahun[]" value="<?= $tahun; ?>" id=" ">
                                <input type="hidden" style="width:70px;" class="form-control rounded" name="id_pegawai[]" value="<?= $dataAbsensi->id_pegawai; ?>" id=" ">
                                <td><?= $no++; ?></td>
                                <td><?= $dataAbsensi->nama_pegawai; ?></td>
                                <td><?= $dataAbsensi->nik; ?></td>
                                <td><?= $dataAbsensi->jenis_kelamin; ?></td>
                                <td><?= $dataAbsensi->nama_jabatan; ?></td>
                                <td><input type="number" style="width:70px;" class="form-control rounded" name="hadir[]" value="0" id=""></td>
                                <td><input type="number" style="width:70px;" class="form-control rounded" name="izin[]" value="0" id=""></td>
                                <td><input type="number" style="width:70px;" class="form-control rounded" name="alpha[]" value="0" id=""></td>

                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
                <!-- jika tidak maka tampilkan alert -->
            <?php } else { ?>
                <span class="badge badge-success"><i class="fas fa-info-circle mr-2"></i>Data bulan <?= $bulan; ?> tahun <?= $tahun; ?> <b>SUDAH TEREKAP</b> cek kembali data presensi </span>
            <?php } ?>
        </form>

    </div>
</div>
</div>
<!-- END MAIN CONTENT-->