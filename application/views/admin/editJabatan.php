<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <!-- <a style="color:white;" href="<?= base_url('admin/dataJabatan/editData') ?>" class="au-btn au-btn-icon btn-success">
                <i class="fas fa-reply"></i>Lihat Data
            </a> -->
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Form Edit</strong> Jabatan
            </div>
            <?php
            foreach ($jabatan as $dataJabatan) :
            ?>
                <div class="card-body card-block">
                    <form action="<?= base_url('admin/dataJabatan/prosesEditData') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" id="text-input" name="id_jabatan" placeholder="id_jabatan" value="<?= $dataJabatan->id_jabatan; ?>" class="form-control" required>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Nama Jabatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="nama_jabatan" placeholder="Nama Jabatan" value="<?= $dataJabatan->nama_jabatan; ?>" class="form-control" required>
                                <?= form_error('nama_jabatan', '<small class="help-block form-text"></small>') ?>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Gaji Pokok</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" id="text-input" name="gaji_pokok" placeholder="Gaji Pokok" value="<?= $dataJabatan->gaji_pokok; ?>" class="form-control" required>
                                <small class="help-block form-text">isikan angka tanpa titik. (contoh: 4jt-> 4000000) </small>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Tunjangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" id="text-input" name="tunjangan" placeholder="Tunjangan" value="<?= $dataJabatan->tunjangan; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Bonus</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" id="text-input" name="bonus" placeholder="Bonus" value="<?= $dataJabatan->bonus; ?>" class="form-control" required>
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