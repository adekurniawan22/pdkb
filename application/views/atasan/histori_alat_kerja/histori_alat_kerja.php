<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="row mb-4">
                    <div class="col-6 d-flex align-items-center">
                        <div class="card-header pb-0">
                            <h5>Data Histori Alat Kerja</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Keluar</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Penanggung Jawab</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th style="width:30%" class="text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($histori_alat as $h) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($h->tanggal_keluar)) ?></p>
                                        </td>
                                        <td>
                                            <?php if ($h->tanggal_masuk == '0000-00-00 00:00:00') : ?>
                                                <p class="text-sm font-weight-bold mb-0 text-center">-</p>
                                            <?php else : ?>
                                                <p class="ms-3 text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($h->tanggal_masuk)) ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $h->penanggung_jawab ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $h->keterangan ?></p>
                                        </td>
                                        <td>
                                            <?php if ($h->sudah_disetujui == '0') : ?>
                                                <span class="ms-3 badge badge-sm bg-gradient-danger">Belum Disetujui</span>
                                                <button class="btn btn-link text-dark text-gradient px-3 mb-0"><i class="fas fa-pencil-alt me-2" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#status<?= $h->id_histori_alat ?>"></i></button>
                                            <?php else : ?>
                                                <span class="ms-3 badge badge-sm bg-gradient-success">Sudah Disetujui</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link text-dark text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_alat<?= $h->id_histori_alat ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Lihat Daftar Alat</button>

                                            <form action="<?= base_url() ?>histori-alat-kerja/pdf" method="post" class="d-inline-block" target="_blank">
                                                <input type="hidden" name="id_atasan" value="<?= $h->id_atasan ?>">
                                                <input type="hidden" name="id_histori_alat" value="<?= $h->id_histori_alat ?>">
                                                <button type="submit" class="btn btn-link text-dark px-3 mb-0"><i class="bi bi-download text-dark me-2" aria-hidden="true"></i>Lihat PDF</Button>
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

    <?php foreach ($histori_alat as $am) : ?>

        <!-- Modal Lihat Daftar Alat -->
        <div class="modal fade" id="lihat_alat<?= $am->id_histori_alat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Alat Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $this->db->select('t_detail_histori_alat.*, t_alat_kerja.nama_alat_kerja, t_alat_kerja.satuan');
                        $this->db->from('t_detail_histori_alat');
                        $this->db->join('t_alat_kerja', 't_detail_histori_alat.id_alat_kerja = t_alat_kerja.id_alat_kerja');
                        $this->db->where('id_histori_alat =', $am->id_histori_alat);
                        $query = $this->db->get()->result();
                        ?>
                        <?php foreach ($query as $q) : ?>
                            <ul>
                                <li><?= $q->nama_alat_kerja . ' (' . $q->jumlah . ' ' . $q->satuan . ')' ?></li>
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
        <div class="modal fade" id="status<?= $am->id_histori_alat ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Status Histori Alat Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="<?= base_url() ?>histori_alat/proses_edit_status_disetujui_histori" method="post">
                                <label for="status" class="form-control-label">Apakah disetujui?</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($am->sudah_disetujui == '1') ? 'checked' : ''; ?>>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_histori_alat" value="<?= $am->id_histori_alat ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>