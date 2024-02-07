<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/alat-tower-ers/proses-tambah-alat-tower-ers" method="post">
                        <div class="form-group">
                            <label for="jenis" class="form-control-label">Jenis Alat</label>
                            <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                                <option value="" selected>Pilih Jenis Alat</option>
                                <option value="Metal" <?php echo set_select('jenis', "Metal"); ?>>Metal</option>
                                <option value="Isolasi" <?php echo set_select('jenis', "Isolasi"); ?>>Isolasi</option>
                                <option value="APD" <?php echo set_select('jenis', "APD"); ?>>APD</option>
                            </select>
                            <?= form_error('jenis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat_tower_ers" class="form-control-label">Nama Alat</label>
                            <input class="form-control" type="text" placeholder="Nama Alat" id="nama_alat_tower_ers" name="nama_alat_tower_ers" value="<?php echo set_value('nama_alat_tower_ers'); ?>">
                            <?= form_error('nama_alat_tower_ers', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="merk" class="form-control-label">Merk</label>
                            <input class="form-control" type="text" placeholder="Merk" id="merk" name="merk" value="<?php echo set_value('merk'); ?>">
                            <?= form_error('merk', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi" class="form-control-label">Spesifikasi</label>
                            <textarea class="form-control" placeholder="Spesifikasi" id="spesifikasi" name="spesifikasi" rows="3"><?php echo set_value('spesifikasi'); ?></textarea>
                            <?= form_error('spesifikasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-10">
                                    <label for="jumlah" class="form-control-label">Jumlah</label>
                                    <input class="form-control" type="number" min="1" placeholder="Jumlah" id="jumlah" name="jumlah" value="<?php echo set_value('jumlah'); ?>">
                                    <?= form_error('jumlah', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-2">
                                    <label for="satuan" class="form-control-label">Satuan</label>
                                    <select class="form-select" aria-label="Default select example" name="satuan" id="satuan">
                                        <option value="" selected>Pilih Satuan</option>
                                        <option value="Bh" <?php echo set_select('satuan', "Bh"); ?>>Bh</option>
                                        <option value="Pasang" <?php echo set_select('satuan', "Pasang"); ?>>Pasang</option>
                                        <option value="Set" <?php echo set_select('satuan', "Set"); ?>>Set</option>
                                        <option value="Lembar   " <?php echo set_select('satuan', "Lembar"); ?>>Lembar </option>
                                        <option value="Karung" <?php echo set_select('satuan', "Karung"); ?>>Karung</option>
                                    </select>
                                    <?= form_error('satuan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_pengadaan" class="form-control-label">Tahun Pengadaan</label>
                            <input class="form-control" type="text" placeholder="Tahun Pengadaan" name="tahun_pengadaan" id="tahun_pengadaan" value="<?php echo set_value('tahun_pengadaan'); ?>">
                            <?= form_error('tahun_pengadaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kadaluarsa" class="form-control-label">Tanggal Kadaluarsa Alat <em>(jika ada)</em></label>
                            <input class="form-control" type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value="<?php echo set_value('tanggal_kadaluarsa'); ?>">
                        </div>

                        <div class="text-end mt-5">
                            <a href=" <?= base_url() ?>admin/alat-tower-ers" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>