<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Personil</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Personil</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">NIP</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">No. HP</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Alamat</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status Akun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($personil as $p) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex ms-3 py-1">
                                                <div>
                                                    <img src="<?= base_url() ?>assets/img/profil/<?= $p->foto ?>" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $p->nama ?></h6>
                                                    <?php foreach ($jabatan as $j) : ?>
                                                        <?php if ($j->id_jabatan == $p->id_jabatan) : ?>
                                                            <p class="text-xs text-secondary mb-0"><?= $j->nama_jabatan ?></p>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->nip ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->email ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->no_hp ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($p->alamat) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($p->status_aktif == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Aktif </span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>