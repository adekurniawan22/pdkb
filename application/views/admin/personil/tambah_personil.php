<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/personil/proses-tambah-personil" method="post" enctype="multipart/form-data">
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
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control" type="text" placeholder="Email" id="email" name="email" value="<?php echo set_value('email'); ?>">
                            <?= form_error('email', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="form-control-label">Nomor HP</label>
                            <input class="form-control" type="text" placeholder="Nomor HP" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp'); ?>">
                            <?= form_error('no_hp', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
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
                            <label for="alamat" class="form-control-label">Alamat</label>
                            <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" rows="3"><?php echo set_value('alamat'); ?></textarea>
                            <?= form_error('alamat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="form-control-label">Foto <em>(maksimal ukuran 2MB)</em></label>
                            <input class="form-control" type="file" placeholder="Foto" id="foto" name="foto" value="<?php echo set_value('foto'); ?>">
                            <?= form_error('foto', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group" id="sertifikatDiklatContainer">
                            <label for="s_diklat" class="form-control-label">Sertifikat Diklat <em>(tidak wajib, maksimal ukuran 2MB)</em></label>
                            <input class="form-control" type="file" placeholder="Sertifikat Diklat" name="s_diklat[]">
                            <?= form_error('s_diklat[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <button type="button" class="btn bg-gradient-dark" onclick="tambahSertifikatD()">+ Tambah Sertifikat Diklat</button>

                        <div class="form-group" id="sertifikatKompetensiContainer">
                            <label for="s_kompetensi" class="form-control-label">Sertifikat Kompetensi <em>(tidak wajib, maksimal ukuran 2MB)</em></label>
                            <input class="form-control" type="file" placeholder="Sertifikat Kompetensi" name="s_kompetensi[]">
                            <?= form_error('s_kompetensi[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <button type="button" class="btn bg-gradient-dark" onclick="tambahSertifikatK()">+ Tambah Sertifikat Kompetensi</button>

                        <div class="text-end mt-3">
                            <a href=" <?= base_url() ?>admin/personil" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tambahSertifikatD() {
            const sertifikatDiklatContainer = document.getElementById('sertifikatDiklatContainer');
            const newInput = document.createElement('div');
            newInput.className = 'form-group mt-3';
            newInput.innerHTML = `
        <input class="form-control" type="file" placeholder="Sertifikat Diklat" name="s_diklat[]">
    `;
            sertifikatDiklatContainer.appendChild(newInput);
        }

        function tambahSertifikatK() {
            const sertifikatKompetensiContainer = document.getElementById('sertifikatKompetensiContainer');
            const newInput2 = document.createElement('div');
            newInput2.className = 'form-group mt-3';
            newInput2.innerHTML = `
        <input class="form-control" type="file" placeholder="Sertifikat Kompetensi" name="s_kompetensi[]">
    `;
            sertifikatKompetensiContainer.appendChild(newInput2);
        }
    </script>