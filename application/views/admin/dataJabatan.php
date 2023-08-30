<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <a style="color:white;" href="<?= base_url('admin/dataJabatan/tambahData') ?>" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>Tambah Data
            </a>
        </div>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Jabatan</th>
                        <th class="text-right">Gaji Pokok</th>
                        <th class="text-right">Tunjangan</th>
                        <th class="text-right">Bonus</th>
                        <th>Total</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($jabatan as $dataJabatan) :
                ?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dataJabatan->nama_jabatan; ?></td>
                            <td class="text-right">Rp. <?= number_format($dataJabatan->gaji_pokok, 0, ',', '.'); ?></td>
                            <td class="text-right">Rp. <?= number_format($dataJabatan->tunjangan, 0, ',', '.'); ?></td>
                            <td class="text-right">Rp. <?= number_format($dataJabatan->bonus, 0, ',', '.'); ?></td>
                            <td class="text-right">Rp. <?= number_format($dataJabatan->gaji_pokok + $dataJabatan->tunjangan  + $dataJabatan->bonus, 0, ',', '.'); ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataJabatan/editData/' . $dataJabatan->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="<?= base_url('admin/dataJabatan/hapusData/' . $dataJabatan->id_jabatan) ?>" onclick="return confirm('Yakin Akan dihapus?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->