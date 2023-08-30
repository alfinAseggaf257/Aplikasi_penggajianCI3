<section style="background-color: #eee;" class="row mt-2">
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <h3 style="font-family:sans-serif; font-weight: 400;">Profil Pegawai</h3>
                </nav>
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        </div>
        <?php

        foreach ($profil as $dataProfil) :
        ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="<?= base_url(); ?>assets/foto/<?= $dataProfil->foto ?>" alt=" avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?= $dataProfil->nama_pegawai ?></h5>
                            <p class="text-muted mb-1"><?= $dataProfil->nama_jabatan ?></p>
                            <p class="text-muted mb-2"><?= $dataProfil->jenis_kelamin ?></p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $dataProfil->nama_pegawai ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">NIK</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $dataProfil->nik ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jabatan</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $dataProfil->nama_jabatan ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tanggal Aktif</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $dataProfil->tanggal_aktif ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Status</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $dataProfil->status ?></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
</section>