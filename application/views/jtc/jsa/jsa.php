<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Laporan JSA</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>jtc/jsa/tambah-jsa" class="btn bg-gradient-dark">+ Tambah Laporan JSA</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="jsaTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Judul Laporan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Waktu Pelaksanaan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jsa as $j) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $j->id_jsa ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex ms-3 py-1">
                                                <?php
                                                $this->load->model('Personil_model');
                                                $personil = $this->Personil_model->dapat_satu_personil_dan_jabatan($j->id_personil);
                                                ?>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $personil->nama ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $personil->nama_jabatan ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $detail_data = json_decode($j->detail, true);;
                                            ?>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $detail_data['judul_laporan'] ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($detail_data['mulai_pelaksanaan'])) . ' - ' . date('d/m/Y', strtotime($detail_data['selesai_pelaksanaan'])) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($j->sudah_disetujui == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Sudah Disetujui</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-warning"><i class="bi bi-hourglass-split me-2"></i>Menunggu Disetujui</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">

                                            <?php if ($j->sudah_disetujui == 0) : ?>
                                                <form action="<?= base_url('jtc/jsa/edit-jsa') ?>" method="post" class="d-inline-block">
                                                    <input type="hidden" name="id_jsa" value="<?= $j->id_jsa ?>">
                                                    <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                                </form>
                                            <?php endif ?>

                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_jsa<?= $j->id_jsa ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
                                            <?php if ($j->sudah_disetujui == '1') : ?>
                                            <?php endif; ?>
                                            <form action="<?= base_url() ?>jsa/cetak_jsa" method="post" class="d-inline-block" target="_blank">
                                                <input type="hidden" name="id_jsa" value="<?= $j->id_jsa ?>">
                                                <input type="hidden" name="id_atasan" value="<?= $j->id_atasan ?>">
                                                <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="bi bi-download text-dark me-2" aria-hidden="true"></i>PDF</Button>
                                            </form>
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

    <?php foreach ($jsa as $jm) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_jsa<?= $jm->id_jsa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Laporan JSA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus Laporan JSA ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>jsa/proses_hapus_jsa" method="post">
                            <input type="hidden" name="id_jsa" value="<?= $jm->id_jsa ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>