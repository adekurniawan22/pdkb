<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Laporan Pekerjaan</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>admin/laporan-pekerjaan/tambah-laporan-pekerjaan" class="btn bg-gradient-dark">+ Tambah Laporan Pekerjaan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dasar Pelaksanaan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Waktu Pelaksanaan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan_pekerjaan as $l) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex ms-3 py-1">
                                                <?php
                                                $this->load->model('Personil_model');
                                                $personil = $this->Personil_model->dapat_satu_personil_dan_jabatan($l->id_personil);
                                                ?>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $personil->nama ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $personil->nama_jabatan ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $l->dasar_pelaksanaan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($l->waktu_pelaksanaan)) ?></p>
                                        </td>
                                        <td class='text-center'>
                                            <?php if ($l->sudah_disetujui == '1') : ?>
                                                <span class=" badge badge-sm bg-gradient-success">Sudah Disetujui</span>
                                            <?php else : ?>
                                                <span class=" badge badge-sm bg-gradient-warning"><i class="bi bi-hourglass-split me-2"></i>Menunggu Disetujui</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-link text-dark text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_detail<?= $l->id_laporan_pekerjaan ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Lihat Detail</button>

                                            <?php if ($l->sudah_disetujui == 0) : ?>
                                                <form action="<?= base_url('admin/laporan-pekerjaan/edit-laporan-pekerjaan') ?>" method="post" class="d-inline-block">
                                                    <input type="hidden" name="id_laporan_pekerjaan" value="<?= $l->id_laporan_pekerjaan ?>">
                                                    <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                                </form>
                                            <?php endif ?>

                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_laporan_pekerjaan<?= $l->id_laporan_pekerjaan ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
                                            <?php if ($l->sudah_disetujui == '1') : ?>
                                                <form action="<?= base_url() ?>laporan_pekerjaan/cetak_laporan_pekerjaan" method="post" class="d-inline-block" target="_blank">
                                                    <input type="hidden" name="id_laporan_pekerjaan" value="<?= $l->id_laporan_pekerjaan ?>">
                                                    <input type="hidden" name="id_atasan" value="<?= $l->id_atasan ?>">
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

    <?php foreach ($laporan_pekerjaan as $lm) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_laporan_pekerjaan<?= $lm->id_laporan_pekerjaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Laporan Pekerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus Laporan Pekerjaan ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>laporan_pekerjaan/proses_hapus_laporan_pekerjaan" method="post">
                            <input type="hidden" name="id_laporan_pekerjaan" value="<?= $lm->id_laporan_pekerjaan ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Detail -->
        <div class="modal fade" id="lihat_detail<?= $lm->id_laporan_pekerjaan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Laporan Pekerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dasar_pelaksanaan" class="form-control-label">Dasar Pelaksanaan</label>
                            <input class="form-control" type="text" placeholder="Dasar Pelaksanaan" id="dasar_pelaksanaan" name="dasar_pelaksanaan" value="<?php echo $lm->dasar_pelaksanaan ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="waktu_pelaksanaan" class="form-control-label">waktu_pelaksanaan</label>
                            <input class="form-control" type="text" placeholder="waktu_pelaksanaan" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="<?php echo $lm->waktu_pelaksanaan ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="lingkup_pekerjaan" class="form-control-label">Lingkup Pekerjaan</label>
                            <textarea class="form-control" placeholder="Lingkup Pekerjaan" id="lingkup_pekerjaan" name="lingkup_pekerjaan" rows="3" disabled><?php echo str_replace("\n", "", $lm->lingkup_pekerjaan) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="hasil_pekerjaan" class="form-control-label">Hasil Pekerjaan</label>
                            <textarea class="form-control" placeholder="Hasil Pekerjaan" id="hasil_pekerjaan" name="hasil_pekerjaan" rows="3" disabled><?php echo str_replace("\n", "", $lm->hasil_pekerjaan) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="penutup" class="form-control-label">Penutup</label>
                            <input class="form-control" type="text" placeholder="Penutup" id="penutup" name="penutup" value="<?php echo $lm->penutup ?>" disabled>
                        </div>
                        <?php foreach ($lampiran_laporan_pekerjaan as $lampiran) : ?>
                            <?php if ($lampiran->id_laporan_pekerjaan == $lm->id_laporan_pekerjaan) : ?>
                                <div class="card mt-4">
                                    <span class="px-3 pt-3">Judul Lampiran : <br> <?php echo $lampiran->judul_lampiran ?></span>
                                    <div class="row">
                                        <div class="col-4 text-center p-3">
                                            <img src="<?= base_url() ?>assets/img/lampiran-pekerjaan/<?= $lampiran->foto_sebelum ?>" alt="" class="d-inline-block" width="100px">
                                        </div>
                                        <div class="col-4 text-center p-3">
                                            <img src="<?= base_url() ?>assets/img/lampiran-pekerjaan/<?= $lampiran->foto_proses ?>" alt="" class="d-inline-block" width="100px">
                                        </div>
                                        <div class="col-4 text-center p-3">
                                            <img src="<?= base_url() ?>assets/img/lampiran-pekerjaan/<?= $lampiran->foto_setelah ?>" alt="" class="d-inline-block" width="100px">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>