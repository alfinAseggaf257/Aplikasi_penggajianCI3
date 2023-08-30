<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
        <?php foreach ($tes as $bulanTahun) : ?>
            <div class="alert alert-success mt-3">
                Edit Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?= $bulanTahun->bulan;  ?></span> Tahun <span class="font-weight-bold"><?= $bulanTahun->tahun;  ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-2">
    <div class="col-lg-12">
        <form action="<?= base_url('admin/dataAbsensi/prosesEditData') ?>" method="post">
            <button class="btn btn-warning mb-3" name="submit" value="submit" type="submit">Edit Data</button>
            <div class="table-responsive table--no-card m-b-40 ">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pegawai</th>
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
                    foreach ($tes as $dataAbsensi) :
                    ?>
                        <tbody>
                            <tr>

                                <input type="hidden" style="width:70px;" class="form-control rounded" name="id_kehadiran" value="<?= $dataAbsensi->id_kehadiran; ?>" id=" ">
                                <input type="hidden" style="width:70px;" class="form-control rounded" name="bulan" value="<?= $dataAbsensi->bulan; ?>" id=" ">
                                <input type="hidden" style="width:70px;" class="form-control rounded" name="tahun" value="<?= $dataAbsensi->tahun; ?>" id=" ">
                                <input type="hidden" style="width:70px;" class="form-control rounded" name="id_pegawai" value="<?= $dataAbsensi->id_pegawai; ?>" id=" ">

                                <td><?= $no++; ?></td>
                                <td><?= $dataAbsensi->nama_pegawai; ?></td>
                                <td><?= $dataAbsensi->nik; ?></td>
                                <td><?= $dataAbsensi->jenis_kelamin; ?></td>
                                <td><?= $dataAbsensi->nama_jabatan; ?></td>
                                <td><input type="number" style="width:70px;" class="form-control rounded" name="hadir" value="<?= $dataAbsensi->hadir ?>" id=""></td>
                                <td><input type="number" style="width:70px;" class="form-control rounded" name="izin" value="<?= $dataAbsensi->izin ?>" id=""></td>
                                <td><input type="number" style="width:70px;" class="form-control rounded" name="alpha" value="<?= $dataAbsensi->alpha ?>" id=""></td>

                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
                <!-- jika tidak maka tampilkan alert -->

        </form>

    </div>
</div>
</div>
<!-- END MAIN CONTENT-->