<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/jaringan/proses-edit-jaringan" method="post">
                        <input type="hidden" name="id_jaringan" value="<?= $jaringan->id_jaringan ?>">
                        <div class="form-group">
                            <label for="foto" class="form-control-label">Status Dikerjakan</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status_dikerjakan" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($jaringan->status_dikerjakan == '1') ? 'checked' : ''; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_anomali" class="form-control-label">Jenis Anomali</label>
                            <input class="form-control" type="text" placeholder="Jenis Anomali" id="jenis_anomali" name="jenis_anomali" value="<?php echo set_value('jenis_anomali', $jaringan->jenis_anomali); ?>">
                            <?= form_error('jenis_anomali', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="bay_line" class="form-control-label">Bay Line</label>
                            <input class="form-control" type="text" placeholder="Bay Line" id="bay_line" name="bay_line" value="<?php echo set_value('bay_line', $jaringan->bay_line); ?>">
                            <?= form_error('bay_line', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_tower" class="form-control-label">Nomor Tower</label>
                            <input class="form-control" type="number" placeholder="Nomor Tower" id="no_tower" name="no_tower" value="<?php echo set_value('no_tower', $jaringan->no_tower); ?>">
                            <?= form_error('no_tower', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_titik" class="form-control-label">Jumlah Titik</label>
                            <input class="form-control" type="number" placeholder="Jumlah Titik" id="jumlah_titik" name="jumlah_titik" value="<?php echo set_value('jumlah_titik', $jaringan->jumlah_titik); ?>">
                            <?= form_error('jumlah_titik', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-control-label">Keterangan</label>
                            <textarea class="form-control" placeholder="Keterangan" id="keterangan" name="keterangan" rows="3"><?php echo set_value('keterangan', $jaringan->keterangan); ?></textarea>
                            <?= form_error('keterangan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="klasifikasi" class="form-control-label">Klasifikasi</label>
                            <input class="form-control" type="text" placeholder="Klasifikasi" id="klasifikasi" name="klasifikasi" value="<?php echo set_value('klasifikasi', $jaringan->klasifikasi); ?>">
                            <?= form_error('klasifikasi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            <?= form_error('tanggal_eksekusi', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_eksekusi" class="form-control-label">Tanggal Eksekusi</label>
                            <input class="form-control" type="date" name="tanggal_eksekusi" id="tanggal_eksekusi" value="<?php echo set_value('tanggal_eksekusi', $jaringan->tanggal_eksekusi); ?>">
                        </div>

                        <div class="text-end mt-5">
                            <a href=" <?= base_url() ?>admin/jaringan" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>