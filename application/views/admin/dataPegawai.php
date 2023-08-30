<!-- MAIN CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
            <a style="color:white;" href="<?= base_url('admin/dataPegawai/tambahData') ?>" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>Tambah Data
            </a>
        </div>
    </div>
</div>
<?= $this->session->flashdata('pesan'); ?>
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table table-borderless table-striped table-earning" id>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Tanggal Aktif</th>
                        <th>Status</th>
                        <th>Hak Akses</th>
                        <th>Foto</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($pegawai as $dataPegawai) :
                ?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $dataPegawai->nik; ?></td>
                            <td><?= $dataPegawai->nama_pegawai; ?></td>
                            <td><?= $dataPegawai->jenis_kelamin; ?></td>
                            <td><?= $dataPegawai->nama_jabatan; ?></td>
                            <td><?= $dataPegawai->tanggal_aktif; ?></td>
                            <td><?= $dataPegawai->status; ?></td>
                            <td><?= $dataPegawai->keterangan; ?></td>
                            <td><img style="max-width:100px; height:80px;" class="rounded" src="<?= base_url() . 'assets/foto/' . $dataPegawai->foto; ?>" class="foto"></td>
                            <td class=" text-center">
                                <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPegawai/editData/' . $dataPegawai->id_pegawai) ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPegawai/hapusData/' . $dataPegawai->id_pegawai) ?>" onclick="return confirm('Yakin Akan dihapus?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->