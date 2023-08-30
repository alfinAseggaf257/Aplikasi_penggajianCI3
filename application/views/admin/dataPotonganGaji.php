<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <a style="color:white;" href="<?= base_url('admin/dataPotongan/tambahData') ?>" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>Tambah Data
            </a>
        </div>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table table-bordered table-striped table-earning">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Potongan</th>
                        <th>Nominal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($potonganGaji as $dataPotongan) :
                ?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dataPotongan->nama_potongan; ?></td>
                            <td>Rp. <?= number_format($dataPotongan->nominal, 0, ',', '.'); ?></td>
                            <td class=" text-center">
                                <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPotongan/editData/' . $dataPotongan->id_potongan) ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPotongan/hapusData/' . $dataPotongan->id_potongan) ?>" onclick="return confirm('Yakin Akan dihapus?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->