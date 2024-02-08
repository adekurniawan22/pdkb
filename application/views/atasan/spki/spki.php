<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data SPKI</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>atasan/spki/tambah-spki" class="btn bg-gradient-dark">+ Tambah SPKI</a>
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
                                    <th style="width: 25%;" class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($spki as $s) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex ms-3 py-1">
                                                <?php
                                                $this->load->model('Personil_model');
                                                $personil = $this->Personil_model->dapat_satu_personil_dan_jabatan($s->id_personil);
                                                ?>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $personil->nama ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $personil->nama_jabatan ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $s->macam_pekerjaan ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($s->sudah_disetujui == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Sudah Disetujui</span>
                                            <?php else : ?>
                                                <span style="cursor: pointer;" class="badge badge-sm bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#edit_status_spki<?= $s->id_spki ?>">Menunggu Disetujui <i class=" bi bi-pencil-square"></i></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-link text-dark text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_detail<?= $s->id_spki ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Lihat Detail</button>

                                            <?php if ($s->id_personil == $this->session->userdata('id_personil')) : ?>
                                                <form action="<?= base_url('atasan/spki/edit-spki') ?>" method="post" class="d-inline-block">
                                                    <input type="hidden" name="id_spki" value="<?= $s->id_spki ?>">
                                                    <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                                </form>
                                            <?php endif ?>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_spki<?= $s->id_spki ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>

                                            <?php if ($s->sudah_disetujui == '1') : ?>
                                                <form action="<?= base_url() ?>spki/cetak_spki" method="post" class="d-inline-block" target="_blank">
                                                    <input type="hidden" name="id_spki" value="<?= $s->id_spki ?>">
                                                    <input type="hidden" name="id_atasan" value="<?= $s->id_atasan ?>">
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

    <?php foreach ($spki as $sm) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_spki<?= $sm->id_spki ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus SPKI</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus SPKI ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>spki/proses_hapus_spki" method="post">
                            <input type="hidden" name="id_spki" value="<?= $sm->id_spki ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Detail -->
        <div class="modal fade" id="lihat_detail<?= $sm->id_spki ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail SPKI</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kepada" class="form-control-label">Kepada</label>
                            <input class="form-control" type="text" placeholder="Kepada" id="kepada" name="kepada" value="<?php echo $sm->kepada ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="dari" class="form-control-label">Dari</label>
                            <input class="form-control" type="text" placeholder="Dari" id="dari" name="dari" value="<?php echo $sm->dari ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="macam_pekerjaan" class="form-control-label">Macam Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Macam Pekerjaan" id="macam_pekerjaan" name="macam_pekerjaan" value="<?php echo $sm->macam_pekerjaan ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_pekerjaan" class="form-control-label">Lokasi Pekerjaan</label>
                            <textarea class="form-control" placeholder="Lokasi Pekerjaan" id="lokasi_pekerjaan" name="lokasi_pekerjaan" rows="3" disabled><?php echo str_replace("\n", "", $sm->lokasi_pekerjaan) ?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="mulai_pelaksanaan" class="form-control-label">Mulai Pelaksanaan</label>
                                    <input class="form-control" type="text" id="mulai_pelaksanaan" name="mulai_pelaksanaan" value="<?php echo $sm->mulai_pelaksanaan ?>" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="selesai_pelaksanaan" class="form-control-label">Selesai Pelaksanaan</label>
                                    <input class="form-control" type="text" id="selesai_pelaksanaan" name="selesai_pelaksanaan" value="<?php echo $sm->selesai_pelaksanaan ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pj" class="form-control-label">PJ Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="PJ Pekerjaan" id="pj" name="pj" value="<?php echo $sm->pj ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pengawas" class="form-control-label">Pengawas Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Pengawas Pekerjaan" id="pengawas" name="pengawas" value="<?php echo $sm->pengawas ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pengawas_k3" class="form-control-label">Pengawas K3</label>
                            <textarea class="form-control" placeholder="Pengawas K3" id="pengawas_k3" name="pengawas_k3" rows="3" disabled><?php echo str_replace("\n", "", $sm->pengawas_k3) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana" class="form-control-label">Pelaksana</label>
                            <textarea class="form-control" placeholder="Pelaksana" id="pelaksana" name="pelaksana" rows="3" disabled><?php echo str_replace("\n", "", $sm->pelaksana) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alat_kerja" class="form-control-label">Peralatan Yang Dipakai</label>
                            <textarea class="form-control" placeholder="Peralatan Yang Dipakai" id="alat_kerja" name="alat_kerja" rows="3" disabled><?php echo str_replace("\n", "", $sm->alat_kerja) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kendaraan" class="form-control-label">Kendaraan Yang Dipakai</label>
                            <input class="form-control" type="text" placeholder="Kendaraan Yang Dipakai" id="kendaraan" name="kendaraan" value="<?php echo $sm->kendaraan ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="uraian_kerja" class="form-control-label">Uraian Kerja</label>
                            <textarea class="form-control" placeholder="Uraian Kerja" id="uraian_kerja" name="uraian_kerja" rows="3" disabled><?php echo str_replace("\n", "", $sm->uraian_kerja) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="form-control-label">Catatan</label>
                            <textarea class="form-control" placeholder="Catatan" id="catatan" name="catatan" rows="3" disabled><?php echo str_replace("\n", "", $sm->catatan) ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Status Disetujui -->
        <div class="modal fade" id="edit_status_spki<?= $sm->id_spki ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah status SPKI</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="<?= base_url() ?>spki/proses_edit_status_spki" method="post">
                                <label for="sudah_disetujui" class="form-control-label">Apakah SPKI disetujui?</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="sudah_disetujui" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($sm->sudah_disetujui == '1') ? 'checked' : ''; ?>>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_spki" value="<?= $sm->id_spki ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>