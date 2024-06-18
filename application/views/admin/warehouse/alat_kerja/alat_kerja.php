<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Gudang PDKB Jaringan</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>admin/alat-kerja/tambah-alat-kerja" class="btn bg-gradient-dark">+ Tambah Alat Kerja</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jenis</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama ALat</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Spesifikasi</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Sedang Dipinjam</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Kadaluarsa</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alat_kerja as $a) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->jenis ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->nama_alat_kerja ?></p>
                                        </td>
                                        <td style="word-wrap: break-word; white-space: pre-line;">
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($a->spesifikasi) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->jumlah . ' ' . $a->satuan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->sedang_dipinjam . ' ' . $a->satuan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($a->tanggal_kadaluarsa == null) : ?>
                                                <p class="text-sm font-weight-bold mb-0">Tidak ada</p <?php else : ?> <p class="text-sm font-weight-bold mb-0"><?= $a->tanggal_kadaluarsa ?></p>
                                            <?php endif ?>
                                        </td>

                                        <td class="text-center">
                                            <form action="<?= base_url() ?>admin/alat-kerja/edit-alat-kerja" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_alat_kerja" value="<?= $a->id_alat_kerja ?>">
                                                <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                            </form>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_alat_kerja<?= $a->id_alat_kerja ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
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

    <?php foreach ($alat_kerja as $am) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_alat_kerja<?= $am->id_alat_kerja ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Alat Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus alat kerja ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>alat-kerja/proses_hapus_alat_kerja" method="post">
                            <input type="hidden" name="id_alat_kerja" value="<?= $am->id_alat_kerja ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>