<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Partnership</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama ULTG</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Manajer</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">NIP</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">No. HP</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Ditambahkan Oleh</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status Akun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($partnership as $p) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->nama_ultg ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->manajer ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $p->username ?></p>
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
                                            <?php
                                            $this->db->where('id_personil', $p->id_personil);
                                            $personil = $this->db->get('t_personil')->row();
                                            ?>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $personil->nama ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($p->status_aktif == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
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

    <?php foreach ($partnership as $pm) : ?>
        <!-- Modal Delete partnership -->
        <div class="modal fade" id="hapus_partnership<?= $pm->id_partnership ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus partnership</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus partnership ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>partnership/proses_hapus_partnership" method="post">
                            <input type="hidden" name="id_partnership" value="<?= $pm->id_partnership ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>