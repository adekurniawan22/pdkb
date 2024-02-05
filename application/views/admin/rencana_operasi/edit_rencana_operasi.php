<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/rencana-operasi/proses-edit-rencana-operasi" method="post">
                        <input type="hidden" name="id_rencana_operasi" value="<?= $rencana_operasi->id_rencana_operasi ?>">
                        <div class="form-group">
                            <label for="nama_rencana" class="form-control-label">Nama Rencana Operasi</label>
                            <input class="form-control" type="text" placeholder="Nama Rencana Operasi" id="nama_rencana" name="nama_rencana" value="<?php echo set_value('nama_rencana', $rencana_operasi->nama_rencana); ?>">
                            <?= form_error('nama_rencana', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="example-datetime-local-input" class="form-control-label">Tanggal Dikerjakan</label>
                            <input class="form-control" type="date" name="tanggal_dikerjakan" id="example-datetime-local-input" value="<?php echo set_value('tanggal_dikerjakan',  $rencana_operasi->tanggal_dikerjakan); ?>">
                            <?= form_error('tanggal_dikerjakan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <?php if ($rencana_operasi->tanggal_selesai != null) : ?>
                            <div class="form-group">
                                <label for="example-datetime-local-input" class="form-control-label">Tanggal Selesai</label>
                                <input class="form-control" type="date" name="tanggal_selesai" id="example-datetime-local-input" value="<?php echo set_value('tanggal_selesai',  $rencana_operasi->tanggal_selesai); ?>">
                                <?= form_error('tanggal_selesai', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                            </div>
                        <?php endif ?>

                        <div class="text-end mt-5">
                            <a href=" <?= base_url() ?>admin/rencana-operasi" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>