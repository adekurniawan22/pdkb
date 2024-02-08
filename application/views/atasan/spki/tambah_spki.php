<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>atasan/spki/proses-tambah-spki" method="post">
                        <div class="form-group">
                            <label for="kepada" class="form-control-label">Kepada</label>
                            <input class="form-control" type="text" placeholder="Kepada" id="kepada" name="kepada" value="<?php echo set_value('kepada'); ?>">
                            <?= form_error('kepada', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="dari" class="form-control-label">Dari</label>
                            <input class="form-control" type="text" placeholder="Dari" id="dari" name="dari" value="<?php echo set_value('dari'); ?>">
                            <?= form_error('dari', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
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
                        <div class="form-group">
                            <label for="pj" class="form-control-label">PJ Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="PJ Pekerjaan" id="pj" name="pj" value="<?php echo set_value('pj'); ?>">
                            <?= form_error('pj', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pengawas" class="form-control-label">Pengawas Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Pengawas Pekerjaan" id="pengawas" name="pengawas" value="<?php echo set_value('pengawas'); ?>">
                            <?= form_error('pengawas', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pengawas_k3" class="form-control-label">Pengawas K3</label>
                            <textarea class="form-control" placeholder="Pengawas K3" id="pengawas_k3" name="pengawas_k3" rows="3"><?php echo set_value('pengawas_k3'); ?></textarea>
                            <?= form_error('pengawas_k3', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pelaksana" class="form-control-label">Pelaksana</label>
                            <textarea class="form-control" placeholder="Pelaksana" id="pelaksana" name="pelaksana" rows="3"><?php echo set_value('pelaksana'); ?></textarea>
                            <?= form_error('pelaksana', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
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
                            <a href=" <?= base_url() ?>atasan/spki" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>