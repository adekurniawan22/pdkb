<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>alat-kerja/proses-tambah-histori-alat-kerja" method="post">
                        <div class="card mb-4">
                            <div class="card-body px-0 pb-3">
                                <h4 class="ms-4">Data Alat Kerja</h4>
                                <hr class="bg-dark mx-4 mb-4">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jenis</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama ALat</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Spesifikasi</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                                <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7" data-sortable="false"><input type="checkbox" id="selectAll"></th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Jumlah yang dipinjam</th>
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
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->spesifikasi ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->jumlah . ' ' . $a->satuan ?></p>
                                                    </td>
                                                    <td style="width: 15%;" class="text-center">
                                                        <input type="checkbox" class="select-checkbox form text-sm font-weight-bold mb-0" name=" select_alat_kerja[]" value="<?= $a->id_alat_kerja ?>" data-name="<?= $a->nama_alat_kerja ?>">
                                                    </td>
                                                    <td style="width: 15%;">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="selected-items-input" name="selected_items" value="">

                        <div class="form-group">
                            <label for="spesifikasi" class="form-control-label">Nama Barang Yang Dipinjam</label>
                            <textarea class="form-control" placeholder="Spesifikasi Alat Kerja" id="spesifikasi" name="spesifikasi" rows="3"><?php echo set_value('spesifikasi'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="example-datetime-local-input" class="form-control-label">Tanggal Peminjaman</label>
                            <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00" id="example-datetime-local-input">
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi" class="form-control-label">Keterangan Peminjaman</label>
                            <textarea class="form-control" placeholder="Spesifikasi Alat Kerja" id="spesifikasi" name="spesifikasi" rows="3"><?php echo set_value('spesifikasi'); ?></textarea>
                            <?= form_error('spesifikasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div>
                            <a href=" <?= base_url() ?>alat-kerja" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>