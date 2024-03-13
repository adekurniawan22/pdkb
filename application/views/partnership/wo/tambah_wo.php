<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>partnership/wo/proses-tambah-wo" method="post">

                        <div class="form-group">
                            <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                            <textarea class="form-control" placeholder="Pekerjaan" id="pekerjaan" name="pekerjaan" rows="4"><?php echo set_value('pekerjaan'); ?></textarea>
                            <?= form_error('pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>partnership/wo" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>