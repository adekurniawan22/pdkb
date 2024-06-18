<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Riwayat Gudang PDKB GI</h5>
                        </div>
                    </div>
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>jtc/riwayat-gudang/tambah-riwayat-gudang" class="btn bg-gradient-dark">+ Tambah Riwayat Gudang GI</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="riwayatGudangTable">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Dibuat Oleh</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Keluar</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Penanggung Jawab</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat_gudang as $h) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $h->id_riwayat_gudang ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex ms-3 py-1">
                                                <?php
                                                $this->load->model('Personil_model');
                                                $personil = $this->Personil_model->dapat_satu_personil_dan_jabatan($h->id_personil);
                                                ?>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $personil->nama ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $personil->nama_jabatan ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($h->tanggal_keluar)) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($h->tanggal_masuk == null) : ?>
                                                <p class="text-sm font-weight-bold mb-0 text-center">-- / -- / ----</p>
                                            <?php else : ?>
                                                <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($h->tanggal_masuk)) ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $h->penanggung_jawab ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= nl2br($h->keterangan) ?></p>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($h->status == 'keluar') : ?>
                                                <?php if ($h->sudah_disetujui == '1') : ?>
                                                    <span style="cursor: pointer;" class="badge badge-sm bg-gradient-danger">Belum Dikembalikan <i class="fas fa-pencil-alt ms-2" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#status<?= $h->id_riwayat_gudang ?>"></i></button></span>
                                                <?php else : ?>
                                                    <span class="badge badge-sm bg-gradient-warning"><i class="bi bi-hourglass-split me-2"></i>Menunggu Disetujui</span>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-success">Sudah Dikembalikan</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-link text-dark text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_alat<?= $h->id_riwayat_gudang ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Lihat Alat</button>
                                            <button class="btn btn-link text-danger text-gradient p-2 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_riwayat_gudang<?= $h->id_riwayat_gudang ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Hapus</button>
                                            <?php if ($h->sudah_disetujui == '1') : ?>
                                                <form action="<?= base_url() ?>riwayat_gudang/cetak_riwayat_gudang" method="post" class="d-inline-block" target="_blank">
                                                    <input type="hidden" name="id_riwayat_gudang" value="<?= $h->id_riwayat_gudang ?>">
                                                    <input type="hidden" name="id_atasan" value="<?= $h->id_atasan ?>">
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

    <?php foreach ($riwayat_gudang as $am) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_riwayat_gudang<?= $am->id_riwayat_gudang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Riwayat Gudang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus riwayat gudang ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>riwayat_gudang/proses_hapus_riwayat_gudang" method="post">
                            <input type="hidden" name="id_riwayat_gudang" value="<?= $am->id_riwayat_gudang ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Daftar Alat -->
        <div class="modal fade" id="lihat_alat<?= $am->id_riwayat_gudang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Alat Tower ERS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $this->db->select('t_detail_riwayat_gudang.*, t_alat_tower_ers.nama_alat_tower_ers, t_alat_tower_ers.satuan');
                        $this->db->from('t_detail_riwayat_gudang');
                        $this->db->join('t_alat_tower_ers', 't_detail_riwayat_gudang.id_alat_tower_ers = t_alat_tower_ers.id_alat_tower_ers');
                        $this->db->where('id_riwayat_gudang =', $am->id_riwayat_gudang);
                        $query = $this->db->get()->result();
                        ?>
                        <?php foreach ($query as $q) : ?>
                            <ul>
                                <li><?= $q->nama_alat_tower_ers . ' (' . $q->jumlah . ' ' . $q->satuan . ')' ?></li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-primary" data-bs-dismiss="modal">Oke</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Status Histori Alat -->
        <div class="modal fade" id="status<?= $am->id_riwayat_gudang ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Histori Riwayat Gudang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="<?= base_url() ?>riwayat_gudang/proses_edit_status_riwayat" method="post">
                                <label for="status" class="form-control-label">Apakah sudah dikembalikan?</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($am->status == 'masuk') ? 'checked' : ''; ?>>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_riwayat_gudang" value="<?= $am->id_riwayat_gudang ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>