<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/proses-tambah-personil" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama" class="form-control-label">Nama Lengkap</label>
                            <input class="form-control" type="text" placeholder="Nama Lengkap" id="nama" name="nama" value="<?php echo set_value('nama'); ?>">
                            <?= form_error('nama', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nip" class="form-control-label">NIP</label>
                            <input class="form-control" type="text" placeholder="NIP" id="nip" name="nip" value="<?php echo set_value('nip'); ?>">
                            <?= form_error('nip', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
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
                            <label for="id_jabatan" class="form-control-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="id_jabatan" id="id_jabatan">
                                <option value="" selected>Pilih Jabatan</option>
                                <?php foreach ($jabatan as $j) : ?>
                                    <option value="<?= $j->id_jabatan ?>" <?php echo set_select('id_jabatan', $j->id_jabatan); ?>><?= $j->nama_jabatan ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('id_jabatan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="form-control-label">Foto</label>
                            <input class="form-control" type="file" placeholder="Foto" id="foto" name="foto" required>
                            <?= $this->session->flashdata('message');
                            unset($_SESSION['message']); ?>
                        </div>
                        <div>
                            <a href="<?= base_url() ?>admin/personil" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>