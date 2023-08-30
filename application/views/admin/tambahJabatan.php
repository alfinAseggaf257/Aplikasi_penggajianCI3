<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <!-- <a style="color:white;" href="<?= base_url('admin/dataJabatan/tambahData') ?>" class="au-btn au-btn-icon btn-success">
                <i class="fas fa-reply"></i>Lihat Data
            </a> -->
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Form Input</strong> Jabatan
            </div>
            <div class="card-body card-block">
                <form action="<?= base_url('admin/dataJabatan/validasiTambahData') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">

                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Jabatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_jabatan" placeholder="Nama Jabatan" class="form-control" required>
                            <?= form_error('nama_jabatan', '<small class="help-block form-text"></small>') ?>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Gaji Pokok</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="gaji_pokok" placeholder="Gaji Pokok" class="form-control" required>
                            <small class="help-block form-text">isikan angka tanpa titik. (contoh: 4jt-> 4000000) </small>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Tunjangan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="tunjangan" placeholder="Tunjangan" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Bonus</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="bonus" placeholder="Bonus" class="form-control" required>
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
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->