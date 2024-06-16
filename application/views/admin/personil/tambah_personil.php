<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/personil/proses-tambah-personil" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                            <input class="form-control" type="file" placeholder="Foto" id="foto" name="foto" value="<?php echo set_value('foto'); ?>" onchange="validateFileSize(this)">
                            <?= form_error('foto', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <!-- Checkbox for certificate input -->
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="inputSertifikat" name="input_sertifikat" onchange="toggleSertifikatCard()">
                            <label class="form-check-label" for="inputSertifikat">
                                Apakah personil ini punya sertifikat?
                            </label>
                        </div>

                        <!-- Certificate input section -->
                        <div class="card mt-4 mb-4" id="sertifikatCard" style="display: none;">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Sertifikat <em>(tidak wajib, maksimal ukuran 5MB)</em></h6>
                                <div id="sertifikatContainer">
                                    <!-- Initial certificate input fields -->
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-control-label">File Sertifikat</label>
                                                <input class="form-control" type="file" name="file_sertifikat[]" onchange="validateFileSize(this)">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Nama Sertifikat</label>
                                                <input class="form-control" type="text" placeholder="Nama Sertifikat" name="nama_sertifikat[]">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Jenis Sertifikat</label>
                                                <select name="jenis_sertifikat[]" class="form-select">
                                                    <option value="" selected>Pilih Jenis Sertifikat</option>
                                                    <option value="Diklat">Diklat</option>
                                                    <option value="Kompetensi">Kompetensi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-control-label">Tanggal Kadaluarsa <em>(jika ada)</em></label>
                                                <input class="form-control" type="date" name="tanggal_kadaluarsa[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="button" class="d-inline-block btn bg-gradient-dark" onclick="tambahSertifikat()">+ Tambah Sertifikat</button>
                                    <button type="button" class=" btn btn-danger" id="hapusSertifikatBtn" style="display: none;" onclick="hapusSertifikat()">- Hapus Sertifikat</button>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href=" <?= base_url() ?>admin/personil" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Masukkan link ke Bootstrap JavaScript dan jQuery jika diperlukan -->
    <script>
        // Ensure script runs after the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Hide the delete button initially
            document.getElementById('hapusSertifikatBtn').style.display = 'none';
        });

        function toggleSertifikatCard() {
            var checkbox = document.getElementById('inputSertifikat');
            var card = document.getElementById('sertifikatCard');

            if (checkbox.checked) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        }

        function tambahSertifikat() {
            // Create a new row of certificate fields
            var newDiv = document.createElement('div');
            newDiv.className = 'row';

            newDiv.innerHTML = `
        <div class="col-3">
            <div class="form-group">
                <label class="form-control-label">File Sertifikat</label>
                <input class="form-control" type="file" name="file_sertifikat[]" onchange="validateFileSize(this)">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label class="form-control-label">Nama Sertifikat</label>
                <input class="form-control" type="text" placeholder="Nama Sertifikat" name="nama_sertifikat[]">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label class="form-control-label">Jenis Sertifikat</label>
                <select name="jenis_sertifikat[]" class="form-select">
                    <option value="" selected>Pilih Jenis Sertifikat</option>
                    <option value="Diklat">Diklat</option>
                    <option value="Kompetensi">Kompetensi</option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label class="form-control-label">Tanggal Kadaluarsa <em>(jika ada)</em></label>
                <input class="form-control" type="date" name="tanggal_kadaluarsa[]">
            </div>
        </div>
    `;

            // Append the new row to sertifikatContainer
            document.getElementById('sertifikatContainer').appendChild(newDiv);

            // Check number of certificate rows
            var rowsCount = document.querySelectorAll('#sertifikatContainer .row').length;

            // Show/hide delete button based on rows count
            if (rowsCount > 1) {
                document.getElementById('hapusSertifikatBtn').style.display = 'inline-block';
            } else {
                document.getElementById('hapusSertifikatBtn').style.display = 'none';
            }
        }

        function hapusSertifikat() {
            // Implement delete functionality here
            var container = document.getElementById('sertifikatContainer');
            var rows = container.getElementsByClassName('row');

            // Ensure there's at least one row left
            if (rows.length > 1) {
                container.removeChild(rows[rows.length - 1]); // Remove the last row
            }

            // Toggle delete button visibility
            if (rows.length <= 1) {
                document.getElementById('hapusSertifikatBtn').style.display = 'none';
            }
        }

        function validateForm() {
            var inputSertifikatCheckbox = document.getElementById('inputSertifikat');
            var rows = document.querySelectorAll('#sertifikatContainer .row');
            var files = document.querySelectorAll('[name="file_sertifikat[]"]');
            var names = document.querySelectorAll('[name="nama_sertifikat[]"]');
            var types = document.querySelectorAll('[name="jenis_sertifikat[]"]');
            var dates = document.querySelectorAll('[name="tanggal_kadaluarsa[]"]');

            // Check if checkbox is checked
            if (inputSertifikatCheckbox.checked) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i].value.trim();
                    var name = names[i].value.trim();
                    var type = types[i].value.trim();
                    var date = dates[i].value.trim();

                    // Check if any field in the current set is empty
                    if (file === '' || name === '' || type === '') {
                        alert('Mohon lengkapi semua kolom sertifikat.');
                        return false; // Prevent form submission
                    }
                }
            }

            return true; // Allow form submission
        }

        function validateFileSize(input) {
            if (input.files.length > 0) {
                var fileSize = input.files[0].size; // Size in bytes

                // Check if file size exceeds 5 MB (5 * 1024 * 1024 bytes)
                if (fileSize > 2 * 1024 * 1024) {
                    alert('Ukuran file tidak boleh melebihi 5 MB.');
                    input.value = ''; // Clear the file input
                }
            }
        }
    </script>