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
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>admin/personil/tambah-personil" class="btn bg-gradient-dark">+ Tambah Personil</a>
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
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Alamat</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status Akun</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7 text-center" data-sortable="false">Aksi</th>
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
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->username ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($p->alamat) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($p->status_aktif == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <form action="<?= base_url() ?>admin/personil/lihat-sertifikat" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_personil" value="<?= $p->id_personil ?>">
                                                <button type="submit" class="btn btn-link text-dark text-gradient m-0 p-2"><i class="bi bi-eye me-2"></i>Sertifikat</button>
                                            </form>
                                            <form action="<?= base_url() ?>admin/personil/edit-personil" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_personil" value="<?= $p->id_personil ?>">
                                                <button type="submit" class="btn btn-link text-dark m-0 p-2"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                            </form>
                                            <button class="btn btn-link text-danger text-gradient m-0 p-2" data-bs-toggle="modal" data-bs-target="#hapus_personil<?= $p->id_personil ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
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

    <?php foreach ($personil as $pm) : ?>
        <!-- Modal Delete Personil -->
        <div class="modal fade" id="hapus_personil<?= $pm->id_personil ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Personil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus <?= '<span style="color:red">"' . $pm->nama . '"</span>' ?>?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>personil/proses_hapus_personil" method="post">
                            <input type="hidden" name="id_personil" value="<?= $pm->id_personil ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>