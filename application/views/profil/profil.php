<div class="container-fluid py-0">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile">
                <img src="<?= base_url() ?>assets/img/profil/<?= $profil->foto ?>" alt="Image placeholder" class="card-img-top p-4">
                <div class="card-body pt-0">
                    <div class="text-center">
                        <h5>
                            <?= $profil->nama ?>
                        </h5>
                        <div class="h6 mt-4">
                            <span>Jabatan : <i class="ni business_briefcase-24 mr-2"></i><?= $profil->nama_jabatan ?></span><br>
                            <span>NIP : <i class="ni business_briefcase-24 mr-2"></i><?= $profil->nip ?></span><br><br>

                            <form action="<?= base_url() ?>profil/lihat-sertifikat" method="post">
                                <input type="hidden" name="id_personil" value="<?= $profil->id_personil ?>">
                                <button type="submit" class="btn btn-dark btn-lg w-100"><i class="bi bi-eye-fill me-2"></i>Lihat Sertifkat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($profil->id_jabatan == '1' or $profil->id_jabatan == '2') : ?>
                <div class="card card-profilem mt-3">
                    <div class="card-header text-center">
                        <h4>Tanda tangan</h4>
                    </div>
                    <div class="text-center">
                        <?php if (empty($profil->tanda_tangan)) : ?>
                            <span>Belum ada tanda tangan</span>
                        <?php else : ?>
                            <img src="<?= base_url() ?>assets/img/tanda-tangan/<?= $profil->tanda_tangan ?>" width="300px">
                        <?php endif ?>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>profil/edit_tanda_tangan" method="post" onsubmit="return updateSignatureInput()">
                            <input type="hidden" name="id_personil" value="<?= $profil->id_personil ?>">
                            <input type="hidden" name="tanda_tangan_lama" value="<?= $profil->tanda_tangan ?>">
                            <input type="hidden" name="signature_image" id="signatureImageInput" />
                            <div class="text-center">
                                <canvas id="signatureCanvas" class="mb-3" style="border:1px solid #000;"></canvas>
                                <p id="textAlertCanvas" style="display: none; font-size:12px; color:red;">Harap Mengisi Tanda Tangan</p>
                            </div>

                            <button type="button" class="btn btn-danger btn-lg w-100" onclick="resetCanvas()">Reset Tanda Tangan</button>
                            <?php if (empty($profil->tanda_tangan)) : ?>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Tambah Tanda Tangan</button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Edit Tanda Tangan</button>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
            <?php endif ?>
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

<script>
    var textAlertCanvas = document.getElementById('textAlertCanvas');
    var canvas = document.getElementById('signatureCanvas');
    var ctx = canvas.getContext('2d');
    var drawing = false;

    // Menangani sentuhan pada perangkat mobile
    canvas.addEventListener('touchstart', function(e) {
        e.preventDefault(); // Mencegah peristiwa default sentuhan
        var rect = canvas.getBoundingClientRect();
        var touch = e.touches[0];
        drawing = true;
        ctx.beginPath();
        ctx.moveTo(touch.clientX - rect.left, touch.clientY - rect.top);
    });

    canvas.addEventListener('touchmove', function(e) {
        e.preventDefault();
        if (drawing) {
            var rect = canvas.getBoundingClientRect();
            var touch = e.touches[0];
            ctx.lineTo(touch.clientX - rect.left, touch.clientY - rect.top);
            ctx.stroke();
        }
    });

    canvas.addEventListener('touchend', function(e) {
        e.preventDefault();
        drawing = false;
        updateSignatureInput();
    });

    // Menangani interaksi mouse pada desktop
    canvas.addEventListener('mousedown', function(e) {
        drawing = true;
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    });

    canvas.addEventListener('mousemove', function(e) {
        if (drawing) {
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();
        }
    });

    canvas.addEventListener('mouseup', function() {
        drawing = false;
        updateSignatureInput();
    });


    function updateSignatureInput() {
        var signatureImageInput = document.getElementById('signatureImageInput');
        var signatureData = canvas.toDataURL('image/png');

        // Check if the canvas is empty
        if (isCanvasEmpty()) {
            // If the canvas is empty, show a warning message
            textAlertCanvas.style.display = 'block';
            // Prevent form submission
            return false;
        } else {
            // If the canvas is filled, update the signature input with the data URL
            signatureImageInput.value = signatureData;
            return true; // Allow form submission
        }
    }

    function isCanvasEmpty() {
        var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height).data;

        for (var i = 0; i < imageData.length; i += 4) {
            if (imageData[i + 3] !== 0) {
                // If the alpha channel is not transparent, the canvas is not empty
                return false;
            }
        }

        // If the loop completes without returning false, the canvas is empty
        return true;
    }

    function getSignatureImage() {
        return canvas.toDataURL('image/png');
    }

    function resetCanvas() {
        // Bersihkan canvas dengan menggambar kotak putih yang menutupi seluruh area
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        // Sembunyikan pesan kesalahan
        textAlertCanvas.style.display = 'none';
        // Bersihkan input tanda tangan
        document.getElementById('signatureImageInput').value = '';
    }
</script>