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
                    <div class="col-6 pt-4 text-end">
                        <div class="mx-3">
                            <a href="<?= base_url() ?>histori-alat-kerja/tambah-histori-alat-kerja" class="btn bg-gradient-dark">+ Tambah Histori Alat Kerja</a>
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
                                <?php foreach ($histori as $a) : ?>
                                    <tr>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($a->tanggal_keluar)) ?></p>
                                        </td>
                                        <td>
                                            <?php if ($a->tanggal_masuk == '0000-00-00 00:00:00') : ?>
                                                <p class="text-sm font-weight-bold mb-0 text-center">-</p>
                                            <?php else : ?>
                                                <p class="ms-3 text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($a->tanggal_masuk)) ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->penanggung_jawab ?></p>
                                        </td>
                                        <td>
                                            <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->keterangan ?></p>
                                        </td>
                                        <td>
                                            <?php if ($a->status == 'keluar') : ?>

                                                <span class="ms-3 badge badge-sm bg-gradient-danger">Belum Dikembalikan</span>
                                                <button class="btn btn-link text-dark text-gradient px-3 mb-0"><i class="fas fa-pencil-alt me-2" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#status<?= $a->id_histori_alat_kerja ?>"></i></button>
                                            <?php else : ?>
                                                <span class="ms-3 badge badge-sm bg-gradient-success">Sudah Dikembalikan</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-link text-dark text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#lihat_alat<?= $a->id_histori_alat_kerja ?>"><i class="bi bi-eye-fill me-2" aria-hidden="true"></i>Lihat Daftar Alat</button>
                                            <button class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="#hapus_alat_kerja<?= $a->id_histori_alat_kerja ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</button>
                                            <form action="<?= base_url() ?>histori-alat-kerja/pdf" method="post" class="d-inline-block" target="_blank">
                                                <input type="hidden" name="id_histori_alat_kerja" value="<?= $a->id_histori_alat_kerja ?>">
                                                <button type="submit" class="btn btn-link text-dark px-3 mb-0"><i class="bi bi-download text-dark me-2" aria-hidden="true"></i>PDF</Button>
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

    <?php foreach ($histori as $am) : ?>
        <!-- Modal Delete Akun -->
        <div class="modal fade" id="hapus_alat_kerja<?= $am->id_histori_alat_kerja ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Personil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus histori alat kerja ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>alat-kerja/proses_hapus_histori_alat_kerja" method="post">
                            <input type="hidden" name="id_histori_alat_kerja" value="<?= $am->id_histori_alat_kerja ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Daftar Alat -->
        <div class="modal fade" id="lihat_alat<?= $am->id_histori_alat_kerja ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        $this->db->select('t_histori_alat_kerja.*, t_alat_kerja.nama_alat_kerja');
                        $this->db->from('t_histori_alat_kerja');
                        $this->db->join('t_alat_kerja', 't_histori_alat_kerja.id_alat_kerja = t_alat_kerja.id_alat_kerja');
                        $this->db->where('id_histori_alat_kerja =', $am->id_histori_alat_kerja);
                        $query = $this->db->get()->result();
                        ?>
                        <?php foreach ($query as $q) : ?>
                            <ul>
                                <li><?= $q->nama_alat_kerja . ' (' . $q->jumlah . ')' ?></li>
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
        <div class="modal fade" id="status<?= $am->id_histori_alat_kerja ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form action="<?= base_url() ?>alat_kerja/proses_edit_status_histori" method="post">
                                <label for="status" class="form-control-label">Apakah sudah dikembalikan?</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($am->status == 'masuk') ? 'checked' : ''; ?>>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_histori_alat_kerja" value="<?= $am->id_histori_alat_kerja ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>