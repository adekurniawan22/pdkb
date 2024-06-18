<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Jaringan</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="d-inline-block">
                            <button data-bs-toggle="modal" data-bs-target="#add_data" class="btn bg-gradient-dark"><i class="bi bi-file-earmark-plus-fill"></i> Import Data</button>
                        </div>
                        <div class="d-inline-block me-3">
                            <a href="<?= base_url() ?>admin/jaringan/tambah-jaringan" class="btn bg-gradient-dark">+ Tambah Jaringan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="jaringanTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jenis Anomali</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Bay Line</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Nomor Tower</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Jumlah Titik</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Klasifikasi</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Fasa</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Eksekusi</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jaringan as $j) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $j->id_jaringan ?></p>
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
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $j->jenis_anomali ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($j->bay_line) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= $j->no_tower ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= $j->jumlah_titik ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($j->keterangan) ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($j->klasifikasi) ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($j->fasa) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($j->tanggal_eksekusi)) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($j->status_dikerjakan == '1') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Sudah Dikerjakan</span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Belum Dikerjakan</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-link text-dark text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_foto<?= $j->id_jaringan ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Foto</button>

                                            <form action="<?= base_url() ?>admin/jaringan/edit-jaringan" method="post" class="d-inline-block">
                                                <input type="hidden" name="id_jaringan" value="<?= $j->id_jaringan ?>">
                                                <button type="submit" class="btn btn-link text-dark p-2 mb-0"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</Button>
                                            </form>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_jaringan<?= $j->id_jaringan ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
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

    <?php foreach ($jaringan as $jm) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_jaringan<?= $jm->id_jaringan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Jaringan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus Jaringan ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>jaringan/proses_hapus_jaringan" method="post">
                            <input type="hidden" name="id_jaringan" value="<?= $jm->id_jaringan ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Foto -->
        <!-- Modal Foto -->
        <div class="modal fade" id="lihat_foto<?= $jm->id_jaringan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <?php if ($jm->foto) : ?>
                            <img src="<?= base_url() ?>assets/img/gardu-induk/<?= $jm->foto ?>" alt="" class="text-center" width="350px">
                        <?php else : ?>
                            <span>Belum ada foto</span>
                        <?php endif ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="modal fade" id="add_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Baca aturan untuk import data dibawah ini :
                    <ul>
                        <li>File yang hanya dapat diinputkan hanya .xlsx</li>
                        <li>Silahkan lihat contoh format file yang dapat di upload <a href="https://docs.google.com/spreadsheets/d/1lGXmP8znwv0vi6g7dt6Z04Xsop7SeNiU/edit?usp=sharing&ouid=100799364152492885109&rtpof=true&sd=true" target="_blank" style="text-decoration: underline; color: blue;">disini</a></li>
                    </ul>
                    <hr class="horizontal dark mt-0">
                    <form action="<?= base_url() ?>jaringan/import_data_excel" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="excel" class="form-control-label">File .xlsx</label>
                            <input class="form-control" type="file" id="excel" name="excel" accept=".xlsx" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn bg-gradient-primary">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('error_add_excel')) { ?>
        <!-- Tampilkan pesan 'flashdata' sebagai modal -->
        <div class="modal fade modal-scrollable" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gagal Menambahkan Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php foreach ($this->session->flashdata('error_add_excel') as $row => $invalidColumns) : ?>
                            <ul>
                                <li>
                                    <span>Baris <?= $row ?> memiliki kesalahan berikut:</span>
                                    <ul>
                                        <?php foreach ($invalidColumns as $column) : ?>
                                            <li><?= $column ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- <p></p> -->
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Oke</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>