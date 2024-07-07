<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/alat-kerja/proses-tambah-alat-kerja" method="post">
                        <div class="form-group">
                            <label for="jenis" class="form-control-label">Jenis Alat kerja</label>
                            <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                                <option value="" selected>Pilih Jenis Alat Kerja</option>
                                <option value="Alat Dokumentasi" <?php echo set_select('jenis', "Alat Dokumentasi"); ?>>Alat Dokumentasi</option>
                                <option value="Alat Komunikasi" <?php echo set_select('jenis', "Alat Komunikasi"); ?>>Alat Komunikasi</option>
                                <option value="Alat Uji" <?php echo set_select('jenis', "Alat Uji"); ?>>Alat Uji</option>
                                <option value="APD" <?php echo set_select('jenis', "APD"); ?>>APD</option>
                                <option value="Isolasi" <?php echo set_select('jenis', "Isolasi"); ?>>Isolasi</option>
                                <option value="Material" <?php echo set_select('jenis', "Material"); ?>>Material</option>
                                <option value="Metal" <?php echo set_select('jenis', "Metal"); ?>>Metal</option>
                                <option value="Peralatan K3" <?php echo set_select('jenis', "Peralatan K3"); ?>>Peralatan K3</option>
                                <option value="Semi Material" <?php echo set_select('jenis', "Semi Material"); ?>>Semi Material</option>
                            </select>
                            <?= form_error('jenis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat_kerja" class="form-control-label">Nama Alat Kerja</label>
                            <input class="form-control" type="text" placeholder="Nama Alat Kerja" id="nama_alat_kerja" name="nama_alat_kerja" value="<?php echo set_value('nama_alat_kerja'); ?>">
                            <?= form_error('nama_alat_kerja', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi" class="form-control-label">Spesifikasi Alat Kerja</label>
                            <textarea class="form-control" placeholder="Spesifikasi Alat Kerja" id="spesifikasi" name="spesifikasi" rows="3"><?php echo set_value('spesifikasi'); ?></textarea>
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
                                        <option value="Karung" <?php echo set_select('satuan', "Karung"); ?>>Karung</option>
                                        <option value="Lembar" <?php echo set_select('satuan', "Lembar"); ?>>Lembar</option>
                                        <option value="Pak" <?php echo set_select('satuan', "Pak"); ?>>Pak</option>
                                        <option value="Pasang" <?php echo set_select('satuan', "Pasang"); ?>>Pasang</option>
                                        <option value="Rol" <?php echo set_select('satuan', "Rol"); ?>>Rol</option>
                                        <option value="Set" <?php echo set_select('satuan', "Set"); ?>>Set</option>

                                    </select>
                                    <?= form_error('satuan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kadaluarsa" class="form-control-label">Tanggal Kadaluarsa Alat <em>(jika ada)</em></label>
                            <input class="form-control" type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value="<?php echo set_value('tanggal_kadaluarsa'); ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Metode <em>(jika ada)</em></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metode[]" value="K3 DAN KOMUNIKASI">
                                <label class="form-check-label" for="K3">K3 DAN KOMUNIKASI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metode[]" value="JAR GANSOL-SAC H-FRAME">
                                <label class="form-check-label" for="GSHF">JAR GANSOL-SAC H-FRAME</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metode[]" value="JAR GANSOL TENSION">
                                <label class="form-check-label" for="GST">JAR GANSOL TENSION</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metode[]" value="JAR GANSOL-SAC SPIRAL WIRE TONG">
                                <label class="form-check-label" for="GSWT">JAR GANSOL-SAC SPIRAL WIRE TONG</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="metode[]" value="JAR PENGGANTIAN GSW">
                                <label class="form-check-label" for="PGSW">JAR PENGGANTIAN GSW</label>
                            </div>
                        </div>


                        <div class="text-end mt-5">
                            <a href=" <?= base_url() ?>admin/alat-kerja" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>