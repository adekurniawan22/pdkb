<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Gardu Induk</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="garduIndukTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Detail</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gardu_induk as $g) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $g->id_gardu_induk ?></p>
                                        </td>
                                        <td style="vertical-align: top;">
                                            <div class="d-flex ms-3 py-1">
                                                <?php
                                                $this->load->model('Personil_model');
                                                $personil = $this->Personil_model->dapat_satu_personil_dan_jabatan($g->id_personil);
                                                ?>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $personil->nama ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $personil->nama_jabatan ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Jenis Anomali :
                                                            <span class="text-xs text-secondary mb-0"><?= $g->jenis_anomali ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Gardu Induk :
                                                            <span class="text-xs text-secondary mb-0"><?= $g->gardu_induk ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Bay :
                                                            <span class="text-xs text-secondary mb-0"><?= nl2br($g->bay) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Jumlah Titik :
                                                            <span class="text-xs text-secondary mb-0"><?= $g->jumlah_titik ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Keterangan :
                                                            <span class="text-xs text-secondary mb-0"><?= nl2br($g->keterangan) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Klasifikasi :
                                                            <span class="text-xs text-secondary mb-0"><?= nl2br($g->klasifikasi) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Fasa :
                                                            <span class="text-xs text-secondary mb-0"><?= nl2br($g->fasa) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Tanggal Inspeksi :
                                                            <span class="text-xs text-secondary mb-0"><?= date('d/m/Y', strtotime($g->tanggal_inspeksi)) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="ms-3 text-sm font-weight-bold mb-1">Tanggal EWS :
                                                            <span class="text-xs text-secondary mb-0"><?= date('d/m/Y', strtotime($g->tanggal_ews)) ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td class="text-center" style="vertical-align: top;">
                                            <?php if ($g->status_dikerjakan == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Sudah Dikerjakan</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Belum Dikerjakan</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center" style="vertical-align: top;">
                                            <button class="btn btn-link text-dark text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_foto<?= $g->id_gardu_induk ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Foto</button>

                                            <form action="<?= base_url() ?>admin/gardu-induk/edit-gardu-induk" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_gardu_induk" value="<?= $g->id_gardu_induk ?>">
                                                <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                            </form>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_gardu_induk<?= $g->id_gardu_induk ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
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

    <?php foreach ($gardu_induk as $gm) : ?>

        <!-- Modal Foto -->
        <div class="modal fade" id="lihat_foto<?= $gm->id_gardu_induk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="<?= base_url() ?>assets/img/gardu-induk/<?= $gm->foto ?>" alt="" class="text-center" width="350px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>