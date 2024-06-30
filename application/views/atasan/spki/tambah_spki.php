<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>atasan/spki/proses-tambah-spki" method="post">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nomor" class="form-control-label">Nomor</label>
                                    <input class="form-control" type="text" placeholder="Nomor" id="nomor" name="nomor" value="<?php echo set_value('nomor'); ?>">
                                    <?= form_error('nomor', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="bulan" class="form-control-label">Bulan</label>
                                    <select class="form-select" aria-label="Default select example" name="bulan" id="bulan">
                                        <option value="" selected>Pilih Bulan</option>
                                        <option value="I" <?php echo set_select('bulan', "I"); ?>>I (Januari)</option>
                                        <option value="II" <?php echo set_select('bulan', "II"); ?>>II (Februari)</option>
                                        <option value="III" <?php echo set_select('bulan', "III"); ?>>III (Maret)</option>
                                        <option value="IV" <?php echo set_select('bulan', "IV"); ?>>IV (April)</option>
                                        <option value="V" <?php echo set_select('bulan', "V"); ?>>V (Mei)</option>
                                        <option value="VI" <?php echo set_select('bulan', "VI"); ?>>VI (Juni)</option>
                                        <option value="VII" <?php echo set_select('bulan', "VII"); ?>>VII (Juli)</option>
                                        <option value="VIII" <?php echo set_select('bulan', "VIII"); ?>>VIII (Agustus)</option>
                                        <option value="IX" <?php echo set_select('bulan', "IX"); ?>>IX (September)</option>
                                        <option value="X" <?php echo set_select('bulan', "X"); ?>>X (Oktober)</option>
                                        <option value="XI" <?php echo set_select('bulan', "XI"); ?>>XI (November)</option>
                                        <option value="XII" <?php echo set_select('bulan', "XII"); ?>>XII (Desember)</option>
                                    </select>
                                    <?= form_error('bulan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tahun" class="form-control-label">Tahun</label>
                                    <input class="form-control" type="text" placeholder="Tahun" id="tahun" name="tahun" value="<?php echo set_value('tahun'); ?>">
                                    <?= form_error('tahun', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="kepada" class="form-control-label">Kepada</label>
                                <select class="form-select" aria-label="Default select example" name="kepada" id="kepada">
                                    <option value="" selected>Pilih Kepada</option>
                                    <option value="TEAM LEADER PDKB RING" <?php echo set_select('kepada', "TEAM LEADER PDKB RING"); ?>>TEAM LEADER PDKB RING</option>
                                    <option value="PLH TEAM LEADER PDKB RING" <?php echo set_select('kepada', "PLH TEAM LEADER PDKB RING"); ?>>PLH TEAM LEADER PDKB RING</option>
                                    <option value="TEAM LEADER PDKB GI" <?php echo set_select('kepada', "TEAM LEADER PDKB GI"); ?>>TEAM LEADER PDKB GI</option>
                                    <option value="PLH TEAM LEADER PDKB GI" <?php echo set_select('kepada', "PLH TEAM LEADER PDKB GI"); ?>>PLH TEAM LEADER PDKB GI</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('kepada', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>

                            <div class="form-group" id="lainnya_kepada" style="display: none;">
                                <input type="text" class="form-control" name="lainnya_kepada" id="lainnya_kepada_input" placeholder="Masukkan Kepada">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="dari" class="form-control-label">Dari</label>
                                <select class="form-select" aria-label="Default select example" name="dari" id="dari">
                                    <option value="" selected>Pilih Dari</option>
                                    <option value="ASSISTANT MANAGER PDKB" <?php echo set_select('dari', "ASSISTANT MANAGER PDKB"); ?>>ASSISTANT MANAGER PDKB</option>
                                    <option value="PLH ASSISTANT MANAGER PDKB" <?php echo set_select('dari', "PLH ASSISTANT MANAGER PDKB"); ?>>PLH ASSISTANT MANAGER PDKB</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('dari', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>

                            <div class="form-group" id="lainnya_dari" style="display: none;">
                                <input type="text" class="form-control" name="lainnya_dari" placeholder="Masukkan Dari" id="lainnya_dari_input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="macam_pekerjaan" class="form-control-label">Macam Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Macam Pekerjaan" id="macam_pekerjaan" name="macam_pekerjaan" value="<?php echo set_value('macam_pekerjaan'); ?>">
                            <?= form_error('macam_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_pekerjaan" class="form-control-label">Lokasi Pekerjaan</label>
                            <textarea class="form-control" placeholder="Lokasi Pekerjaan" id="lokasi_pekerjaan" name="lokasi_pekerjaan" rows="3"><?php echo set_value('lokasi_pekerjaan'); ?></textarea>
                            <?= form_error('lokasi_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="mulai_pelaksanaan" class="form-control-label">Mulai Pelaksanaan</label>
                                    <input class="form-control" type="date" id="mulai_pelaksanaan" name="mulai_pelaksanaan" value="<?php echo set_value('mulai_pelaksanaan'); ?>">
                                    <?= form_error('mulai_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-6">
                                    <label for="selesai_pelaksanaan" class="form-control-label">Selesai Pelaksanaan</label>
                                    <input class="form-control" type="date" id="selesai_pelaksanaan" name="selesai_pelaksanaan" value="<?php echo set_value('selesai_pelaksanaan'); ?>">
                                    <?= form_error('selesai_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="pj" class="form-control-label">PJ Pekerjaan</label>
                                <select class="form-select" aria-label="Default select example" name="pj" id="selectPJ">
                                    <option value="" selected disabled>Pilih PJ Pekerjaan</option>
                                    <?php foreach ($personil as $p) : ?>
                                        <option value="<?php echo $p->nama ?>" <?php echo set_select('pj', $p->nama); ?>><?php echo $p->nama ?></option>
                                    <?php endforeach ?>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('pj', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>

                            <div class="form-group" id="lainnya_pj" style="display: none;">
                                <input type="text" class="form-control" name="lainnya_pj" placeholder="Masukkan PJ Pekerjaan" id="lainnya_pj_input">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="pengawas" class="form-control-label">Pengawas Pekerjaan</label>
                                <select class="form-select" aria-label="Default select example" name="pengawas" id="selectPengawas">
                                    <option value="" selected disabled>Pilih Pengawas Pekerjaan</option>
                                    <?php foreach ($personil as $p) : ?>
                                        <option value="<?php echo $p->nama ?>" <?php echo set_select('pengawas', $p->nama); ?>><?php echo $p->nama ?></option>
                                    <?php endforeach ?>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('pengawas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>

                            <div class="form-group" id="lainnya_pengawas" style="display: none;">
                                <input type="text" class="form-control" name="lainnya_pengawas" placeholder="Masukkan Pengawas Pekerjaan" id="lainnya_pengawas_input">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="pengawas_k3" class="form-control-label">Pengawas K3</label>
                                <select class="form-select" aria-label="Default select example" name="pengawas_k3" id="selectPengawasK3">
                                    <option value="" selected disabled>Pilih Pengawas K3</option>
                                    <?php foreach ($personil as $p) : ?>
                                        <option value="<?php echo $p->nama ?>" <?php echo set_select('pengawas_k3', $p->nama); ?>><?php echo $p->nama ?></option>
                                    <?php endforeach ?>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('pengawas_k3', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>

                            <div class="form-group" id="lainnya_pengawas_k3" style="display: none;">
                                <input type="text" class="form-control" name="lainnya_pengawas_k3" placeholder="Masukkan Pengawas K3" id="lainnya_pengawas_k3_input">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">Pelaksana</label>
                                <select class="form-select" aria-label="Default select example" id="selectPelaksana">
                                    <option value="" selected disabled>Pilih Pelaksana</option>
                                    <?php foreach ($personil as $p) : ?>
                                        <option value="<?php echo $p->nama ?>"><?php echo $p->nama ?></option>
                                    <?php endforeach ?>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" placeholder="Pelaksana" id="pelaksana" name="pelaksana" rows="5"><?php echo set_value('pelaksana'); ?></textarea>
                                <?= form_error('pelaksana', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alat_kerja" class="form-control-label">Peralatan Yang Dipakai</label>
                            <textarea class="form-control" placeholder="Peralatan Yang Dipakai" id="alat_kerja" name="alat_kerja" rows="3"><?php echo set_value('alat_kerja'); ?></textarea>
                            <?= form_error('alat_kerja', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kendaraan" class="form-control-label">Kendaraan Yang Dipakai</label>
                            <input class="form-control" type="text" placeholder="Kendaraan Yang Dipakai" id="kendaraan" name="kendaraan" value="<?php echo set_value('kendaraan'); ?>">
                            <?= form_error('kendaraan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="uraian_kerja" class="form-control-label">Uraian Kerja</label>
                            <textarea class="form-control" placeholder="Uraian Kerja" id="uraian_kerja" name="uraian_kerja" rows="3"><?php echo set_value('uraian_kerja'); ?></textarea>
                            <?= form_error('uraian_kerja', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="form-control-label">Catatan</label>
                            <textarea class="form-control" placeholder="Catatan" id="catatan" name="catatan" rows="3"><?php echo set_value('catatan'); ?></textarea>
                            <?= form_error('catatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>admin/spki" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // Fungsi untuk menangani perubahan pada dropdown
            function handleDropdownChange(elementId, targetId) {
                $('#' + elementId).on('change', function() {
                    if (this.value === 'Lainnya') {
                        $('#' + targetId).show();
                    } else {
                        $('#' + targetId).hide();
                    }
                });
            }

            // Panggil fungsi untuk setiap pasangan dropdown dan target
            handleDropdownChange('selectPJ', 'lainnya_pj');
            handleDropdownChange('selectPengawas', 'lainnya_pengawas');
            handleDropdownChange('selectPengawasK3', 'lainnya_pengawas_k3');
            handleDropdownChange('kepada', 'lainnya_kepada');
            handleDropdownChange('dari', 'lainnya_dari');

            $('#selectPelaksana').on('change', function() {
                var selectedValue = $(this).val();
                var currentValues = $('#pelaksana').val();
                if (currentValues) {
                    $('#pelaksana').val(currentValues + '\n' + selectedValue);
                } else {
                    $('#pelaksana').val(selectedValue);
                }
                $(this).val('');
            });
        });
    </script>