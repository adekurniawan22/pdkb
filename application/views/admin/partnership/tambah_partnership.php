<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/partnership/proses-tambah-partnership" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_ultg" class="form-control-label">Nama ULTG</label>
                            <input class="form-control" type="text" placeholder="Nama ULTG" id="nama_ultg" name="nama_ultg" value="<?php echo set_value('nama_ultg'); ?>">
                            <?= form_error('nama_ultg', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="manajer" class="form-control-label">Nama Manajer</label>
                            <input class="form-control" type="text" placeholder="Nama Manajer" id="manajer" name="manajer" value="<?php echo set_value('manajer'); ?>">
                            <?= form_error('manajer', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-control-label">Username</label>
                            <input class="form-control" type="text" placeholder="Username" id="username" name="username" value="<?php echo set_value('username'); ?>">
                            <?= form_error('username', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password</label>
                            <input class="form-control" type="password" placeholder="Password" id="password" name="password" value="<?php echo set_value('password'); ?>">
                            <?= form_error('password', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nip" class="form-control-label">NIP</label>
                            <input class="form-control" type="text" placeholder="NIP" id="nip" name="nip" value="<?php echo set_value('nip'); ?>">
                            <?= form_error('nip', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="<?php echo set_value('email'); ?>">
                            <?= form_error('email', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="form-control-label">Nomor HP</label>
                            <input class="form-control" type="text" placeholder="Nomor HP" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp'); ?>">
                            <?= form_error('no_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="text-end mt-3">
                            <a href=" <?= base_url() ?>admin/partnership" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>