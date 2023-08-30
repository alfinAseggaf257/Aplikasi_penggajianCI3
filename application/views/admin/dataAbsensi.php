<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
        <div class="card mt-4">
            <div class="card-header bg-dark text-white">
                Filter Data Absensi
            </div>
            <div class="card-body">
                <form class="form-inline" action="<?= base_url('admin/dataAbsensi/') ?>" method="post">
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
                    <button type="submit" class="btn btn-primary mb-2 mr-3 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                    <a href="<?= base_url('admin/dataAbsensi/tambahAbsensi') ?>" class="btn btn-danger mb-2 mr-3 "> <i class="fa fa-plus mr-1"></i>Input Kehadiran</a>
                </form>
            </div>
        </div>
        <?php
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        if (!empty($bulan) && !empty($tahun)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        ?>
        <div class="alert alert-dark">
            Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?= $bulan;  ?></span> Tahun <span class="font-weight-bold"><?= $tahun;  ?></span>
        </div>

        <?php
        $jumlah_data = count($absensi);
        //jika jumlah data lebih dari 0 maka tampilkan table ..
        if ($jumlah_data > 0) { ?>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-2">
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
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dataAbsensi->nama_pegawai; ?></td>
                            <td><?= $dataAbsensi->nik; ?></td>
                            <td><?= $dataAbsensi->jenis_kelamin; ?></td>
                            <td><?= $dataAbsensi->nama_jabatan; ?></td>
                            <td><?= $dataAbsensi->hadir; ?></td>
                            <td><?= $dataAbsensi->izin; ?></td>
                            <td><?= $dataAbsensi->alpha; ?></td>

                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataAbsensi/editData/' . $dataAbsensi->id_kehadiran) ?>"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <!-- jika tidak maka tampilkan alert -->
        <?php } else { ?>
            <span class="badge badge-danger"><i class="fas fa-info-circle mr-3"></i>Data masih kosong, silahkan input data kehadiran pada bulan dan data yang anda cari</span>
        <?php } ?>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->