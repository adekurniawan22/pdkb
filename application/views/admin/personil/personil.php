<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Personil</h6>
                </div>
                <?= $this->session->flashdata('message');
                unset($_SESSION['message']); ?>
                <div class="mx-3 pb-3">
                    <a href="<?= base_url() ?>admin/tambah-personil" class="btn bg-gradient-dark">+ Tambah Personil</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Personil</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">NIP</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Username</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Status Akun</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($personil as $p) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?= base_url() ?>assets/img/profil/<?= $p->foto ?>" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $p->nama ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $p->nama_jabatan ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $p->nip ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $p->username ?></p>
                                        </td>
                                        <td class="">
                                            <?php if ($p->status_aktif == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <form action="<?= base_url() ?>admin/edit-personil" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_personil" value="<?= $p->id_personil ?>">
                                                <button type="submit" class="btn btn-link text-dark px-3 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                            </form>
                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_personil<?= $p->id_personil ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</button>
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
        <!-- Modal Delete Akun -->
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
                        <form action="<?= base_url() ?>admin/proses_hapus_personil" method="post">
                            <input type="hidden" name="id_personil" value="<?= $pm->id_personil ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>