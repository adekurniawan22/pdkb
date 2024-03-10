<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/partnership/proses-edit-partnership" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_partnership" value="<?= $partnership->id_partnership ?>">
                        <div class="form-group">
                            <label for="nama_ultg" class="form-control-label">Nama ULTG</label>
                            <input class="form-control" type="text" placeholder="Nama ULTG" id="nama_ultg" name="nama_ultg" value="<?php echo set_value('nama_ultg', $partnership->nama_ultg); ?>">
                            <?= form_error('nama_ultg', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="manajer" class="form-control-label">Nama Manajer</label>
                            <input class="form-control" type="text" placeholder="Nama Manajer" id="manajer" name="manajer" value="<?php echo set_value('manajer', $partnership->manajer); ?>">
                            <?= form_error('manajer', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-control-label">Username</label>
                            <input class="form-control" type="text" placeholder="Username" id="username" name="username" value="<?php echo set_value('username', $partnership->username); ?>">
                            <?= form_error('username', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru" class="form-control-label">Password Baru <em class="text-danger">(gunakan jika personil lupa password)</em></label>
                            <input class="form-control" type="password" placeholder="Password Baru" id="password_baru" name="password_baru" value="<?php echo set_value('password_baru'); ?>">
                            <?= form_error('password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_password_baru" class="form-control-label">Konfirmasi Password Baru <em class="text-danger">(gunakan jika personil lupa password)</em></label>
                            <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" id="konfirmasi_password_baru" name="konfirmasi_password_baru" value="<?php echo set_value('konfirmasi_password_baru'); ?>">
                            <?= form_error('konfirmasi_password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nip" class="form-control-label">NIP</label>
                            <input class="form-control" type="text" placeholder="NIP" id="nip" name="nip" value="<?php echo set_value('nip', $partnership->nip); ?>">
                            <?= form_error('nip', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="<?php echo set_value('email', $partnership->email); ?>">
                            <?= form_error('email', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="form-control-label">Nomor HP</label>
                            <input class="form-control" type="text" placeholder="Nomor HP" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp', $partnership->no_hp); ?>">
                            <?= form_error('no_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="foto" class="form-control-label">Status Aktif</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status_aktif" type="checkbox" id="flexSwitchCheckDefault" <?php echo ($partnership->status_aktif == '1') ? 'checked' : ''; ?>>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <a href=" <?= base_url() ?>admin/partnership" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>