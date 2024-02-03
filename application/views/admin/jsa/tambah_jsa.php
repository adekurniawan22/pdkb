<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/jsa/proses-tambah-jsa" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dasar_pelaksanaan" class="form-control-label">Dasar Pelaksanaan</label>
                            <input class="form-control" type="text" placeholder="Dasar Pelaksanaan" id="dasar_pelaksanaan" name="dasar_pelaksanaan" value="<?php echo set_value('dasar_pelaksanaan'); ?>">
                            <?= form_error('dasar_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="waktu_pelaksanaan" class="form-control-label">Waktu Pelaksanaan</label>
                            <input class="form-control" type="date" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="<?php echo set_value('waktu_pelaksanaan'); ?>">
                            <?= form_error('waktu_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="lingkup_pekerjaan" class="form-control-label">Lingkup Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Lingkup Pekerjaan" id="lingkup_pekerjaan" name="lingkup_pekerjaan" value="<?php echo set_value('lingkup_pekerjaan'); ?>">
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

                // Tambah tombol hapus
                var deleteButton = createDeleteButton(clone, hapusTemuanButton);

                // Tambahkan elemen dan tombol hapus setelah elemen pertama
                temuanContainer.appendChild(clone);
                temuanContainer.appendChild(deleteButton);
            });

            // Tambah Foto Hasil Temuan
            var fotoContainer = document.getElementById('foto-container');
            var tambahFotoButton = document.querySelector('button[data-target="foto-container"]');
            var hapusFotoButton = document.getElementById('hapus-foto-button');

            tambahFotoButton.addEventListener('click', function() {
                var clone = fotoContainer.querySelector('input[type="file"]').cloneNode();

                // Tambah class mb-3 pada elemen yang diduplikasi
                clone.classList.add('mb-3');

                // Tambah tombol hapus
                var deleteButton = createDeleteButton(clone, hapusFotoButton);

                // Tambahkan elemen dan tombol hapus setelah elemen pertama
                fotoContainer.parentNode.insertBefore(clone, fotoContainer.nextSibling);
                fotoContainer.parentNode.insertBefore(deleteButton, clone.nextSibling);
            });

            // Fungsi untuk membuat tombol hapus
            function createDeleteButton(targetElement, hapusButton) {
                var deleteButton = document.createElement('button');
                deleteButton.innerHTML = 'Hapus';
                deleteButton.classList.add('btn', 'btn-danger', 'me-2');
                deleteButton.addEventListener('click', function() {
                    targetElement.parentNode.removeChild(targetElement);
                    deleteButton.parentNode.removeChild(deleteButton);

                    // Cek apakah elemen pertama masih ada, jika tidak, sembunyikan tombol hapus
                    if (targetElement.parentNode.children.length <= 1) {
                        hapusButton.style.display = 'none';
                    }
                });
                return deleteButton;
            }
        });
    </script>