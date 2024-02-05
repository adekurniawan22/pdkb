<div class="container-fluid py-0">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <img src="<?= base_url() ?>assets/img/profil/<?= $profil->foto ?>" alt="Image placeholder" class="card-img-top">
                <div class="card-body pt-0">
                    <div class="text-center">
                        <h5>
                            <?= $profil->nama ?>
                        </h5>
                        <div class="h6 mt-4">
                            <span>Jabatan : <i class="ni business_briefcase-24 mr-2"></i><?= $profil->nama_jabatan ?></span><br>
                            <span>NIP : <i class="ni business_briefcase-24 mr-2"></i><?= $profil->nip ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Informasi Detail</p>
                    <div class="row">
                        <form action="<?= base_url() ?>profil/proses-edit-profil" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nama</label>
                                    <input class="form-control" type="text" name="nama" value="<?= set_value('nama', $profil->nama) ?>">
                                    <?= form_error('nama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Username</label>
                                    <input class="form-control" type="text" name="username" value="<?= set_value('username', $profil->username) ?>">
                                    <?= form_error('username', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Email</label>
                                    <input class="form-control" type="text" name="email" value="<?= set_value('email', $profil->email) ?>">
                                    <?= form_error('email', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nomor Handphone</label>
                                    <input class="form-control" type="text" name="no_hp" value="<?= set_value('no_hp', $profil->no_hp) ?>">
                                    <?= form_error('no_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Alamat</label>
                                    <textarea name="alamat" rows="3" class="form-control"><?= set_value('alamat', $profil->alamat) ?></textarea>
                                    <?= form_error('alamat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Foto</label>
                                    <input class="form-control" type="file" name="foto">
                                    <?= form_error('foto', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Update</button>
                            </div>
                        </form>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Ganti Password</p>
                    <div class="row">
                        <form action="<?= base_url() ?>profil/proses-edit-password" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Masukkan Password Lama" id="password_lama" name="password_lama" value="<?php echo set_value('password_lama'); ?>">
                                    <?= form_error('password_lama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input class="form-control mt-3" type="password" placeholder="Masukkan Password Baru" id="password_baru" name="password_baru" value="<?php echo set_value('password_baru'); ?>">
                                    <?= form_error('password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                    <input class="form-control mt-3" type="password" placeholder="Masukkan Konfirmasi Password Baru" id="konfirmasi_password_baru" name="konfirmasi_password_baru" value="<?php echo set_value('konfirmasi_password_baru'); ?>">
                                    <?= form_error('konfirmasi_password_baru', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary btn-sm ms-auto">Ganti Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>