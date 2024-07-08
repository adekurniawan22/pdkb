<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/jsa/proses-tambah-jsa" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul_laporan" class="form-control-label">Judul Laporan</label>
                            <input class="form-control" type="text" placeholder="Judul Laporan" id="judul_laporan" name="judul_laporan" value="<?php echo set_value('judul_laporan'); ?>">
                            <?= form_error('judul_laporan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="lokasi_pekerjaan" class="form-control-label">Lokasi Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Lokasi Pekerjaan" id="lokasi_pekerjaan" name="lokasi_pekerjaan" value="<?php echo set_value('lokasi_pekerjaan'); ?>">
                            <?= form_error('lokasi_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="kepada" class="form-control-label">Kesimpulan</label>
                            <select class="form-select" aria-label="Default select example" name="kepada" id="kepada">
                                <option value="" selected>Pilih Kesimpulan</option>
                                <option value="Dapat Dikerjakan Dengan Metode PDKB" <?php echo set_select('kepada', "Dapat Dikerjakan Dengan Metode PDKB"); ?>>Dapat Dikerjakan Dengan Metode PDKB</option>
                                <option value="Tidak Dapat Dikerjakan Dengan Metode PDKB" <?php echo set_select('kepada', "Tidak Dapat Dikerjakan Dengan Metode PDKB"); ?>>Tidak Dapat Dikerjakan Dengan Metode PDKB</option>
                                <option value="TEAM LEADER PDKB GI" <?php echo set_select('kepada', "TEAM LEADER PDKB GI"); ?>>TEAM LEADER PDKB GI</option>
                                <option value="PLH TEAM LEADER PDKB GI" <?php echo set_select('kepada', "PLH TEAM LEADER PDKB GI"); ?>>PLH TEAM LEADER PDKB GI</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            <?= form_error('kepada', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="dasar_pelaksanaan" class="form-control-label">Dasar Pelaksanaan</label>
                            <input class="form-control" type="text" placeholder="Dasar Pelaksanaan" id="dasar_pelaksanaan" name="dasar_pelaksanaan" value="<?php echo set_value('dasar_pelaksanaan'); ?>">
                            <?= form_error('dasar_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="mulai_pelaksanaan" class="form-control-label">Mulai Pelaksanaan</label>
                                    <input class="form-control" type="date" id="mulai_pelaksanaan" name="mulai_pelaksanaan" value="<?php echo set_value('mulai_pelaksanaan'); ?>">
                                    <?= form_error('mulai_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                                <div class="col-6">
                                    <label for="selesai_pelaksanaan" class="form-control-label">Selesai Pelaksanaan</label>
                                    <input class="form-control" type="date" id="selesai_pelaksanaan" name="selesai_pelaksanaan" value="<?php echo set_value('selesai_pelaksanaan'); ?>">
                                    <?= form_error('selesai_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lingkup_pekerjaan" class="form-control-label">Lingkup Pekerjaan</label>
                            <textarea class="form-control" placeholder="Lingkup Pekerjaan" id="lingkup_pekerjaan" name="lingkup_pekerjaan" rows="3"><?php echo set_value('lingkup_pekerjaan'); ?></textarea>
                            <?= form_error('lingkup_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hasil_pekerjaan" class="form-control-label">Hasil Pekerjaan</label>
                            <textarea class="form-control" placeholder="Hasil Pekerjaan" id="hasil_pekerjaan" name="hasil_pekerjaan" rows="3"><?php echo set_value('hasil_pekerjaan'); ?></textarea>
                            <?= form_error('hasil_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kesimpulan" class="form-control-label">Kesimpulan</label>
                            <textarea class="form-control" placeholder="Kesimpulan" id="kesimpulan" name="kesimpulan" rows="3"><?php echo set_value('kesimpulan'); ?></textarea>
                            <?= form_error('kesimpulan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <hr class="bg-dark my-4">
                        <div class="form-group" id="temuan-container">
                            <div class="row">
                                <div class="col-6">
                                    <label for="temuan[]" class="form-control-label">Hasil Temuan 1</label>
                                    <input class="form-control" type="text" placeholder="Hasil Temuan" id="temuan[]" name="temuan[]" required oninvalid="this.setCustomValidity('Harap masukkan hasil temuan')" oninput="setCustomValidity('')">
                                </div>
                                <div class="col-6">
                                    <label for="keterangan[]" class="form-control-label">Keterangan</label>
                                    <textarea class="form-control" type="text" placeholder="Keterangan" id="keterangan[]" name="keterangan[]" rows="5" required oninvalid="this.setCustomValidity('Harap masukkan keterangan')" oninput="setCustomValidity('')"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary bg-dark" data-target="temuan-container">+ Tambah Hasil Temuan</button>


                        <hr class="bg-secondary">
                        <div class="form-group" id="foto-container">
                            <label for="foto[]" class="form-control-label">Foto Hasil Temuan <em>(maksimal ukuran file 2MB)</em></label>
                            <input class="form-control" type="file" name="foto[]" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                        </div>

                        <button type="button" class="btn btn-primary bg-dark" data-target="foto-container">+ Tambah Foto Hasil Temuan</button>

                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>admin/jsa" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambah Hasil Temuan
            var temuanContainer = document.getElementById('temuan-container');
            var tambahTemuanButton = document.querySelector('button[data-target="temuan-container"]');
            var hapusTemuanButton = document.getElementById('hapus-temuan-button');

            tambahTemuanButton.addEventListener('click', function() {
                var clone = temuanContainer.firstElementChild.cloneNode(true);

                // Tambah class mt-3 pada elemen yang diduplikasi
                clone.classList.add('mt-3');

                // Update label pada elemen yang diduplikasi
                var labels = clone.querySelectorAll('label[for^="temuan"]');
                labels.forEach(function(label, index) {
                    var currentLabelNumber = parseInt(label.textContent.match(/\d+/)[0]);
                    var newLabelNumber = currentLabelNumber + 1;
                    label.textContent = label.textContent.replace(currentLabelNumber, newLabelNumber);
                });

                // Tambahkan elemen dan tombol hapus setelah elemen pertama
                temuanContainer.appendChild(clone);
            });

            // Tambah Foto Hasil Temuan
            var fotoContainer = document.getElementById('foto-container');
            var tambahFotoButton = document.querySelector('button[data-target="foto-container"]');
            var hapusFotoButton = document.getElementById('hapus-foto-button');

            tambahFotoButton.addEventListener('click', function() {
                var clone = fotoContainer.querySelector('input[type="file"]').cloneNode();

                // Tambah class mb-3 pada elemen yang diduplikasi
                clone.classList.add('mb-3');

                // Tambahkan elemen dan tombol hapus setelah elemen pertama
                fotoContainer.parentNode.insertBefore(clone, fotoContainer.nextSibling);
            });

        });
    </script>