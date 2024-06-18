<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/gardu-induk/proses-tambah-gardu-induk" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="jenis_anomali" class="form-control-label">Jenis Anomali</label>
                            <input class="form-control" type="text" placeholder="Jenis Anomali" id="jenis_anomali" name="jenis_anomali" value="<?php echo set_value('jenis_anomali'); ?>">
                            <?= form_error('jenis_anomali', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="gardu_induk" class="form-control-label">Gardu Induk</label>
                            <input class="form-control" type="text" placeholder="Gardu Induk" id="gardu_induk" name="gardu_induk" value="<?php echo set_value('gardu_induk'); ?>">
                            <?= form_error('gardu_induk', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="bay" class="form-control-label">Bay</label>
                            <textarea class="form-control" placeholder="Bay" id="bay" name="bay" rows="3"><?php echo set_value('bay'); ?></textarea>
                            <?= form_error('bay', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_titik" class="form-control-label">Jumlah Titik</label>
                            <input class="form-control" type="number" placeholder="Jumlah Titik" id="jumlah_titik" name="jumlah_titik" value="<?php echo set_value('jumlah_titik'); ?>">
                            <?= form_error('jumlah_titik', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-control-label">Keterangan</label>
                            <textarea class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" rows="3"><?php echo set_value('keterangan'); ?></textarea>
                            <?= form_error('keterangan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="klasifikasi" class="form-control-label">Klasifikasi</label>
                            <input class="form-control" type="text" placeholder="Klasifikasi" id="klasifikasi" name="klasifikasi" value="<?php echo set_value('klasifikasi'); ?>">
                            <?= form_error('klasifikasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="fasa" class="form-control-label">Fasa</label>
                            <input class="form-control" type="text" placeholder="Fasa" id="fasa" name="fasa" value="<?php echo set_value('fasa'); ?>">
                            <?= form_error('fasa', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_eksekusi" class="form-control-label">Tanggal Eksekusi</label>
                            <input class="form-control" type="date" name="tanggal_eksekusi" id="tanggal_eksekusi" value="<?php echo set_value('tanggal_eksekusi'); ?>">
                            <?= form_error('tanggal_eksekusi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="form-control-label">Foto <em>(maksimal ukuran 2MB)</em></label>
                            <input class="form-control" type="file" placeholder="Foto" id="foto" name="foto" value="<?php echo set_value('foto'); ?>">
                            <?= form_error('foto', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="text-end mt-5">
                            <a href=" <?= base_url() ?>admin/gardu-induk" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>