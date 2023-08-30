<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Form Setting</strong> Account
            </div>
            <?php
            foreach ($setting as $dataAkun) :
            ?>
                <div class="card-body card-block">
                    <?= $this->session->flashdata('pesan'); ?>
                    <form action="<?= base_url('account/settingAkun/editAkun') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" id="text-input" name="id_pegawai" value="<?= $dataAkun->id_pegawai ?>" placeholder="Nama Jabatan" class="form-control" required>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="username" value="<?= $dataAkun->username ?>" placeholder="Nama Jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="hidden" id="text-input" name="passwordLama" value="<?= $dataAkun->password ?>" placeholder="Nama Jabatan" class="form-control" required>
                                <input type="password" id="text-input" name="password" class="form-control">
                                <small class="help-block form-text text-danger">Kosongkan kolom ini jika password tidak diganti </small>
                            </div>
                        </div>
                        <div class="row form-group mt-4">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Ulangi Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="text-input" name="konfirmasiPass" class="form-control">
                                <small class="help-block form-text text-danger">Kosongkan kolom ini jika password tidak diganti </small>
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
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->