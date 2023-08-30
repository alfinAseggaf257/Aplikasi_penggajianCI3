<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1"><?= $title; ?></h2>
        </div>
    </div>
</div>
<div class="row m-t-25">
    <div class="col-sm-8 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="text m-b-25">
                        <h2><?= $pegawai; ?></h2>
                        <span>Data Pegawai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="text m-b-25">
                        <h2><?= $admin; ?></h2>
                        <span>Data Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="text m-b-25">
                        <h2><?= $jabatan;  ?></h2>
                        <span>Data Jabatan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c4">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="text m-b-25">
                        <h2><?= $kehadiran; ?></h2>
                        <span>Data Kehadiran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
</div>
<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Data Pegawai</h2>
        <div class="table-responsive table--no-card m-b-40 ">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>Nama Pegawai</th>
                        <th>Posisi</th>
                        <th>Tanggal Aktif</th>
                    </tr>
                </thead>
                <?php foreach ($cek as $key) : ?>
                <tbody>
                    <tr>
                        <td><?= $key->nama_pegawai  ?></td>
                        <td><?= $key->nama_jabatan  ?></td>
                        <td><?= $key->tanggal_aktif  ?></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    
</div>