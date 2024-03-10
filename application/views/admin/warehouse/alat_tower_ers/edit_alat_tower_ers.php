<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/alat-tower-ers/proses-edit-alat-tower-ers" method="post">
                        <input type="hidden" name="id_alat_tower_ers" value="<?= $alat_tower_ers->id_alat_tower_ers ?>">
                        <div class="form-group">
                            <label for="jenis" class="form-control-label">Jenis Alat</label>
                            <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                                <option value="" selected>Pilih Jenis Alat</option>
                                <option value="Alat Dokumentasi" <?php echo set_select('jenis', "Alat Dokumentasi", $alat_tower_ers->jenis == "Alat Dokumentasi"); ?>>Alat Dokumentasi</option>
                                <option value="Alat Komunikasi" <?php echo set_select('jenis', "Alat Komunikasi", $alat_tower_ers->jenis == "Alat Komunikasi"); ?>>Alat Komunikasi</option>
                                <option value="Alat Uji" <?php echo set_select('jenis', "Alat Uji", $alat_tower_ers->jenis == "Alat Uji"); ?>>Alat Uji</option>
                                <option value="APD" <?php echo set_select('jenis', "APD", $alat_tower_ers->jenis == "APD"); ?>>APD</option>
                                <option value="Isolasi" <?php echo set_select('jenis', "Isolasi", $alat_tower_ers->jenis == "Isolasi"); ?>>Isolasi</option>
                                <option value="Material" <?php echo set_select('jenis', "Material", $alat_tower_ers->jenis == "Material"); ?>>Material</option>
                                <option value="Metal" <?php echo set_select('jenis', "Metal", $alat_tower_ers->jenis == "Metal"); ?>>Metal</option>
                                <option value="Peralatan K3" <?php echo set_select('jenis', "Peralatan K3", $alat_tower_ers->jenis == "Peralatan K3"); ?>>Peralatan K3</option>
                                <option value="Semi Material" <?php echo set_select('jenis', "Semi Material", $alat_tower_ers->jenis == "Semi Material"); ?>>Semi Material</option>
                            </select>
                            <?= form_error('jenis', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama_alat_tower_ers" class="form-control-label">Nama Alat</label>
                            <input class="form-control" type="text" placeholder="Nama Alat" id="nama_alat_tower_ers" name="nama_alat_tower_ers" value="<?php echo set_value('nama_alat_tower_ers', $alat_tower_ers->nama_alat_tower_ers); ?>">
                            <?= form_error('nama_alat_tower_ers', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="merk" class="form-control-label">Merk</label>
                            <input class="form-control" type="text" placeholder="Merk" id="merk" name="merk" value="<?php echo set_value('merk', $alat_tower_ers->merk); ?>">
                            <?= form_error('merk', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi" class="form-control-label">Spesifikasi</label>
                            <textarea class="form-control" placeholder="Spesifikasi" id="spesifikasi" name="spesifikasi" rows="3"><?php echo set_value('spesifikasi', $alat_tower_ers->spesifikasi); ?></textarea>
                            <?= form_error('spesifikasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-10">
                                    <label for="jumlah" class="form-control-label">Jumlah</label>
                                    <input class="form-control" type="number" min="1" placeholder="Jumlah" id="jumlah" name="jumlah" value="<?php echo set_value('jumlah', $alat_tower_ers->jumlah); ?>">
                                    <?= form_error('jumlah', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-2">
                                    <label for="satuan" class="form-control-label">Satuan</label>
                                    <select class="form-select" aria-label="Default select example" name="satuan" id="satuan">
                                        <option value="" selected>Pilih Satuan</option>
                                        <option value="Bh" <?php echo set_select('satuan', "Bh", $alat_tower_ers->satuan == "Bh"); ?>>Bh</option>
                                        <option value="Karung" <?php echo set_select('satuan', "Karung", $alat_tower_ers->satuan == "Karung"); ?>>Karung</option>
                                        <option value="Lembar" <?php echo set_select('satuan', "Lembar", $alat_tower_ers->satuan == "Lembar"); ?>>Lembar</option>
                                        <option value="Pak" <?php echo set_select('satuan', "Pak", $alat_tower_ers->satuan == "Pak"); ?>>Pak</option>
                                        <option value="Pasang" <?php echo set_select('satuan', "Pasang", $alat_tower_ers->satuan == "Pasang"); ?>>Pasang</option>
                                        <option value="Rol" <?php echo set_select('satuan', "Rol", $alat_tower_ers->satuan == "Rol"); ?>>Rol</option>
                                        <option value="Set" <?php echo set_select('satuan', "Set", $alat_tower_ers->satuan == "Set"); ?>>Set</option>
                                    </select>
                                    <?= form_error('satuan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun_pengadaan" class="form-control-label">Tahun Pengadaan</label>
                            <input class="form-control" type="text" placeholder="Tahun Pengadaan" name="tahun_pengadaan" id="tahun_pengadaan" value="<?php echo set_value('tahun_pengadaan', $alat_tower_ers->tahun_pengadaan); ?>">
                            <?= form_error('tahun_pengadaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kadaluarsa" class="form-control-label">Tanggal Kadaluarsa Alat <em>(jika ada)</em></label>
                            <input class="form-control" type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value="<?php echo set_value('tanggal_kadaluarsa', $alat_tower_ers->tanggal_kadaluarsa); ?>">
                        </div>

                        <div class="text-end mt-5">
                            <a href=" <?= base_url() ?>admin/alat-tower-ers" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>