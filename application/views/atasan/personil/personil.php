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
                                                <?php if ($p->id_jabatan != '1' and $p->id_jabatan != '2') : ?>
                                                    <span style="cursor: pointer;" class="badge badge-sm bg-gradient-success" data-bs-toggle="modal" data-bs-target="#edit_status_akun<?= $p->id_personil ?>">Aktif <i class=" bi bi-pencil-square"></i></span>
                                                <?php else : ?>
                                                    <span style="cursor: no-drop;" class=" badge badge-sm bg-gradient-success">Aktif <i class=" bi bi-pencil-square"></i></span>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <?php if ($p->id_jabatan != '1' and $p->id_jabatan != '2') : ?>
                                                    <span style="cursor: pointer;" class="badge badge-sm bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#edit_status_akun<?= $p->id_personil ?>">Tidak Aktif <i class=" bi bi-pencil-square"></i></span>
                                                <?php else : ?>
                                                    <span style="cursor: no-drop;" class=" badge badge-sm bg-gradient-danger">Tidak Aktif <i class=" bi bi-pencil-square"></i></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <form action="<?= base_url() ?>atasan/personil/lihat-sertifikat" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_personil" value="<?= $p->id_personil ?>">
                                                <button type="submit" class="btn btn-link text-dark text-gradient m-0 p-2"><i class="bi bi-eye me-2"></i>Sertifikat</button>
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

        <!-- Modal Delete Personil -->
        <div class="modal fade" id="edit_status_akun<?= $pm->id_personil ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah status akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="<?= base_url() ?>personil/proses_edit_status_akun" method="post">
                                <?php if ($pm->status_aktif == '1') {
                                    $status = 'Aktif';
                                } else {
                                    $status = 'Tidak Aktif';
                                }
                                ?>
                                <label for="status_aktif" class="form-control-label">Status akun <?= $status ?></label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status_aktif" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($pm->status_aktif == '1') ? 'checked' : ''; ?>>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_personil" value="<?= $pm->id_personil ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn bg-gradient-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>