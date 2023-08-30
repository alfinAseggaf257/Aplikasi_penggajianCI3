<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <!-- <a style="color:white;" href="<?= base_url('admin/dataPegawai/editData') ?>" class="au-btn au-btn-icon btn-success">
                <i class="fas fa-reply"></i>Lihat Data
            </a> -->
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Form Edit</strong> Pegawai
            </div>
            <?php
            foreach ($pegawai as $dataPegawai) :
            ?>
                <div class="card-body card-block">
                    <form action="<?= base_url('admin/dataPegawai/prosesEditData') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">NIK Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="hidden" id="text-input" name="id_pegawai" placeholder="id_pegawai" value="<?= $dataPegawai->id_pegawai; ?>" class="form-control" required>
                                <input type="number" id="text-input" name="nik" placeholder="NIK Pegawai" value="<?= $dataPegawai->nik ?>" class="form-control" readonly required>
                                <?= form_error('nik', '<small class="help-block form-text"></small>') ?>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Pegawai</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_pegawai" placeholder="Nama pegawai" value="<?= $dataPegawai->nama_pegawai ?>" class="form-control" required>
                                <?= form_error('nama_pegawai', '<small class="help-block form-text"></small>') ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Jenis Kelamin</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <?php
                                $jenkel = array('Laki-laki', 'Perempuan');
                                ?>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="0">---Pilih Jenis Kelamin---</option>
                                    <?php
                                    foreach ($jenkel as $key) {
                                        if ($key == $dataPegawai->jenis_kelamin) {
                                    ?>
                                            <option value="<?= $key; ?>" selected="selected">&nbsp; <?= $key; ?></option>
                                        <?php
                                        } else { ?>
                                            <option value="<?= $key; ?>">&nbsp; <?= $key; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_jabatan" id="id_jabatan" class="form-control">
                                    <option value="">---Pilih Jabatan---</option>
                                    <?php foreach ($editjabatan as $key) : ?>
                                        <?php
                                        if ($dataPegawai->id_jabatan == $key->id_jabatan) {
                                            echo '<option value="' . $key->id_jabatan . '" selected="selected">' . $key->nama_jabatan . '</option>';
                                        } else {
                                            echo '<option value="' . $key->id_jabatan . '" >' . $key->nama_jabatan . '</option>';
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tanggal Aktif</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="text-input" name="tanggal_aktif" value="<?= $dataPegawai->tanggal_aktif ?>" placeholder="Tanggal Aktif" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Status</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <?php
                                $status = array('Pegawai Tetap', 'Pegawai Tidak Tetap');
                                ?>
                                <select name="status" id="status" class="form-control">
                                    <option value="0">---Pilih Statu---</option>
                                    <?php
                                    foreach ($status as $key) {
                                        if ($key == $dataPegawai->status) {
                                    ?>
                                            <option value="<?= $key; ?>" selected="selected">&nbsp; <?= $key; ?></option>
                                        <?php
                                        } else { ?>
                                            <option value="<?= $key; ?>">&nbsp; <?= $key; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="username" placeholder="Username" value="<?= $dataPegawai->username; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="text-input" name="password" placeholder="Password" class="form-control">
                                <input type="hidden" id="text-input" name="passwordLama" placeholder="Password" value="<?= $dataPegawai->password; ?>" class="form-control" required>
                                <span class="text-danger">*Kosongkan password jika tidak diganti</span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Hak Akses</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_hakakses" id="id_hakakses" class="form-control">
                                    <option value="">---Pilih Hak Akses---</option>
                                    <?php foreach ($editHakAkses as $key) : ?>
                                        <?php
                                        if ($dataPegawai->id_hakakses == $key->id_hakakses) {
                                            echo '<option value="' . $key->id_hakakses . '" selected="selected">' . $key->keterangan . '</option>';
                                        } else {
                                            echo '<option value="' . $key->id_hakakses . '" >' . $key->keterangan . '</option>';
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Foto</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="hidden" name="fileLama" class="form-control" value="<?= $dataPegawai->foto;  ?>" required>
                                <img class="rounded mb-2" src="<?= base_url() . 'assets/foto/' . $dataPegawai->foto; ?>" width="90px" height="110px">
                                <input type="file" id="text-input" name="foto" placeholder="foto" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm mr-2">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->