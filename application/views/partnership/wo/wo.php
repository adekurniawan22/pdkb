<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Dokumen WO</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>partnership/wo/tambah-wo" class="btn bg-gradient-dark">+ Tambah Dokumen WO</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Pekerjaan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Pelaporan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($wo as $w) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex ms-3 py-1">
                                                <?php
                                                $partnership = $this->db->get_where('t_partnership', ['id_partnership' => $w->id_partnership])->row();
                                                ?>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $partnership->manajer ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $partnership->nama_ultg ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $w->pekerjaan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($w->tanggal_pelaporan)) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($w->sudah_disetujui == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-dark">Dikerjakan Secara <span style="color: green;">Online</span></span>
                                            <?php elseif ($w->sudah_disetujui == '2') : ?>
                                                <span class="badge badge-sm bg-gradient-dark">Dikerjakan Secara <span style="color: red;">Offline</span></span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-warning">Diterima dan akan dilaksanakan JSA</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <?php if ($w->sudah_disetujui == 0) : ?>
                                                <form action="<?= base_url('partnership/wo/edit-wo') ?>" method="post" class="d-inline-block">
                                                    <input type="hidden" name="id_wo" value="<?= $w->id_wo ?>">
                                                    <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                                </form>
                                            <?php endif ?>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_wo<?= $w->id_wo ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>

                                            <?php if ($w->sudah_disetujui == '1' or $w->sudah_disetujui == '2') : ?>
                                                <form action="<?= base_url() ?>wo/cetak_wo" method="post" class="d-inline-block" target="_blank">
                                                    <input type="hidden" name="id_wo" value="<?= $w->id_wo ?>">
                                                    <input type="hidden" name="id_atasan" value="<?= $w->id_atasan ?>">
                                                    <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="bi bi-download text-dark me-2" aria-hidden="true"></i>PDF</Button>
                                                </form>
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

    <?php foreach ($wo as $sm) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_wo<?= $sm->id_wo ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus wo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus WO ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>wo/proses_hapus_wo" method="post">
                            <input type="hidden" name="id_wo" value="<?= $sm->id_wo ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>