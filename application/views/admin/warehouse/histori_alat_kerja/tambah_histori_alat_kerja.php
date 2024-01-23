<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>histori-alat-kerja/proses-tambah-histori-alat-kerja" method="post">
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
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jumlah saat ini</th>
                                                <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7" data-sortable="false">Checklist</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Jumlah yang dipinjam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alat_kerja as $a) : ?>
                                                <?php
                                                $warning =  $a->jumlah - $a->sedang_dipinjam;
                                                if ($warning == 0) { ?>
                                                    <tr style="color:white" class="bg-danger">
                                                    <?php } else { ?>
                                                    <tr>
                                                    <?php } ?>
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
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $warning . ' ' . $a->satuan ?></p>
                                                    </td>

                                                    <?php if ($warning == 0) { ?>
                                                        <td style="width: 15%;" class="text-center">
                                                            <input type="checkbox" class="select-checkbox form text-sm font-weight-bold mb-0" name="select_alat_kerja[]" value="<?= $a->id_alat_kerja ?>" data-name="<?= $a->nama_alat_kerja ?>" disabled>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td style="width: 15%;" class="text-center">
                                                            <input type="checkbox" class="select-checkbox form text-sm font-weight-bold mb-0" name="select_alat_kerja[]" value="<?= $a->id_alat_kerja ?>" data-name="<?= $a->nama_alat_kerja ?>">
                                                        </td>
                                                    <?php } ?>
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
                            <label for="nama_alat_kerja" class="form-control-label">Nama Alat Kerja</label>
                            <textarea class="form-control" placeholder="Nama Alat Kerja" id="nama_alat_kerja" name="nama_alat_kerja" rows="3" disabled></textarea>
                            <?= form_error('select_alat_kerja[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab" class="form-control-label">Penanggung Jawab</label>
                            <input class="form-control" type="text" name="penanggung_jawab" id="penanggung_jawab" value="<?php echo set_value('penanggung_jawab'); ?>" placeholder="Penanggung Jawab">
                            <?= form_error('penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="example-datetime-local-input" class="form-control-label">Tanggal Barang Keluar</label>
                            <input class="form-control" type="datetime-local" name="tanggal_keluar" id="example-datetime-local-input" value="<?php echo set_value('tanggal_keluar'); ?>">
                            <?= form_error('tanggal_keluar', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-control-label">Keterangan</label>
                            <textarea class="form-control" placeholder="Keterangan Peminjaman" id="keterangan" name="keterangan" rows="3"><?php echo set_value('keterangan'); ?></textarea>
                            <?= form_error('keterangan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div>
                            <a href=" <?= base_url() ?>histori-alat-kerja" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>