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
                <strong>Form Input</strong> Potongan
            </div>
            <div class="card-body card-block">
                <form action="<?= base_url('admin/dataPotongan/TambahDataAksi') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nama Potongan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="nama_potongan" placeholder="Nama pegawai" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group mt-4">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Nominal Potongan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="text-input" name="nominal" placeholder="Nominal Potongan" class="form-control" required>
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