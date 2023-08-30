<div class="container-fluid">
    <h3 class="text-center mb-3">Cetak Data Laporan Gaji</h3>
    <div class="card mx-auto" style="width: 50%;">
        <div class="card-header bg-dark text-white text-center">
            Filter Data Gaji
        </div>
        <form action="<?= base_url('admin/laporanGaji/cetakLaporanGaji') ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
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
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
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
                </div>
                <button type="submit" class="btn btn-success" style="width: 100%;"><i class="fa fa-print"> Cetak Laporan</i></button>

        </form>
    </div>
</div>
</div>