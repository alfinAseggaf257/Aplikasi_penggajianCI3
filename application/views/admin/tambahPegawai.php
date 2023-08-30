<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <!-- <a style="color:white;" href="<?= base_url('admin/dataPegawai/tambahData') ?>" class="au-btn au-btn-icon btn-success">
                <i class="fas fa-reply"></i>Lihat Data
            </a> -->
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Form Input</strong> Pegawai
            </div>
            <div class="card-body card-block">
                <form action="<?= base_url('admin/dataPegawai/TambahDataAksi') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">NIK Pegawai</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="text-input" name="nik" placeholder="NIK Pegawai" class="form-control" required>
                            <?= form_error('nik', '<small class="help-block form-text"></small>') ?>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Pegawai</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_pegawai" placeholder="Nama pegawai" class="form-control" required>
                            <?= form_error('nama_pegawai', '<small class="help-block form-text"></small>') ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Jenis Kelamin</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
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
                                <?php foreach ($jabatan as $dataJabatan) : ?>
                                    <option value="<?= $dataJabatan->id_jabatan ?>"><?= $dataJabatan->nama_jabatan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Tanggal Aktif</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="text-input" name="tanggal_aktif" placeholder="Tanggal Aktif" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <option value="">---Pilih Status---</option>
                                <option value="Pegawai Tetap">Pegawai Tetap</option>
                                <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Username</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="username" placeholder="Username" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="text-input" name="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Hak Akses</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="id_hakakses" id="id_hakakses" class="form-control">
                                <option value="">---Pilih Hak Akses---</option>
                                <?php foreach ($hakAkses as $dataHakAkses) : ?>
                                    <option value="<?= $dataHakAkses->id_hakakses ?>"><?= $dataHakAkses->keterangan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Foto</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="text-input" name="foto" placeholder="foto" class="form-control" required>
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
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->