<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Rencana Operasi</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>atasan/rencana-operasi/tambah-rencana-operasi" class="btn bg-gradient-dark">+ Tambah Rencana Operasi</a>
                        </div>
                    </div>
                </div>
                </style>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama Rencana Operasi</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Dikerjakan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Selesai</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status Dikerjakan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rencana_operasi as $r) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $r->nama_rencana ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($r->keterangan) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($r->tanggal_dikerjakan)) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($r->tanggal_selesai != null) : ?>
                                                <p class=" text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($r->tanggal_selesai)) ?></p>
                                            <?php else : ?>
                                                <p class=" text-sm font-weight-bold mb-0">-- / -- / ----</p>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($r->status == '1') : ?>
                                                <span class=" badge badge-sm bg-gradient-success">Selesai</span>
                                            <?php else : ?>
                                                <span class="cursor-pointer badge badge-sm bg-gradient-warning " data-bs-toggle="modal" data-bs-target="#status<?= $r->id_rencana_operasi ?>"></i>Belum <i class="fas fa-pencil-alt ms-2" aria-hidden="true"></i></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <form action="<?= base_url() ?>atasan/rencana-operasi/edit-rencana-operasi" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_rencana_operasi" value="<?= $r->id_rencana_operasi ?>">
                                                <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                            </form>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_rencana_operasi<?= $r->id_rencana_operasi ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
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

    <?php foreach ($rencana_operasi as $am) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_rencana_operasi<?= $am->id_rencana_operasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Personil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus alat kerja ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>rencana_operasi/proses_hapus_rencana_operasi" method="post">
                            <input type="hidden" name="id_rencana_operasi" value="<?= $am->id_rencana_operasi ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Status Rencana Operasi -->
        <div class="modal fade" id="status<?= $am->id_rencana_operasi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Dikerjakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="<?= base_url() ?>rencana_operasi/prose_edit_status_rencana_operasi" method="post">
                                <label for="status" class="form-control-label">Apakah sudah dikerjakan?</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($am->status == '1') ? 'checked' : ''; ?>>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_rencana_operasi" value="<?= $am->id_rencana_operasi ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>