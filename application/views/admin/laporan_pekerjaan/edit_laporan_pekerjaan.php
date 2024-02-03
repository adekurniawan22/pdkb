<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/laporan-pekerjaan/proses-edit-laporan-pekerjaan" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_laporan_pekerjaan" value="<?= $laporan_pekerjaan->id_laporan_pekerjaan ?>">
                        <div class="form-group">
                            <label for="dasar_pelaksanaan" class="form-control-label">Dasar Pelaksanaan</label>
                            <input class="form-control" type="text" placeholder="Dasar Pelaksanaan" id="dasar_pelaksanaan" name="dasar_pelaksanaan" value="<?php echo set_value('dasar_pelaksanaan', $laporan_pekerjaan->dasar_pelaksanaan); ?>">
                            <?= form_error('dasar_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="waktu_pelaksanaan" class="form-control-label">Waktu Pelaksanaan</label>
                            <input class="form-control" type="date" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="<?php echo set_value('waktu_pelaksanaan', $laporan_pekerjaan->waktu_pelaksanaan); ?>">
                            <?= form_error('waktu_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="lingkup_pekerjaan" class="form-control-label">Lingkup Pekerjaan</label>
                            <input class="form-control" type="text" placeholder="Lingkup Pekerjaan" id="lingkup_pekerjaan" name="lingkup_pekerjaan" value="<?php echo set_value('lingkup_pekerjaan', $laporan_pekerjaan->lingkup_pekerjaan); ?>">
                            <?= form_error('lingkup_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hasil_pekerjaan" class="form-control-label">Hasil Pekerjaan</label>
                            <textarea class="form-control" placeholder="Hasil Pekerjaan" id="hasil_pekerjaan" name="hasil_pekerjaan" rows="3"><?php echo set_value('hasil_pekerjaan', $laporan_pekerjaan->hasil_pekerjaan); ?></textarea>
                            <?= form_error('hasil_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penutup" class="form-control-label">Penutup</label>
                            <textarea class="form-control" placeholder="Penutup" id="penutup" name="penutup" rows="3"><?php echo set_value('penutup', $laporan_pekerjaan->penutup); ?></textarea>
                            <?= form_error('penutup', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <?php foreach ($lampiran_laporan_pekerjaan as $lampiran) : ?>
                            <?php if ($lampiran->id_laporan_pekerjaan == $laporan_pekerjaan->id_laporan_pekerjaan) : ?>
                                <div class="card p-3 mb-3">
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="judul_lampiran" class="form-control-label">Judul Lampiran</label>
                                                <textarea class="form-control" placeholder="Judul Lampiran" rows="3" required oninvalid="this.setCustomValidity('Harap Masukkan Nama Judul Lampiran')" oninput="setCustomValidity('')" disabled><?= $lampiran->judul_lampiran ?></textarea>
                                            </div>
                                            <div class="col-2 text-center">
                                                <label for="lampiran_sebelum" class="form-control-label">Foto Lampiran Sebelum Pekerjaan</label>
                                                <img src="<?= base_url() ?>/assets/img/lampiran-pekerjaan/<?= $lampiran->foto_sebelum ?>" width="100px" alt="">
                                            </div>
                                            <div class="col-2 text-center">
                                                <label for="lampiran_proses" class="form-control-label">Foto Lampiran Proses Pekerjaan</label>
                                                <img src="<?= base_url() ?>/assets/img/lampiran-pekerjaan/<?= $lampiran->foto_proses ?>" width="100px" alt="">
                                            </div>
                                            <div class="col-2 text-center">
                                                <label for="lampiran_setelah" class="form-control-label">Foto Lampiran Setelah Pekerjaan</label>
                                                <img src="<?= base_url() ?>/assets/img/lampiran-pekerjaan/<?= $lampiran->foto_setelah ?>" width="100px" alt="">
                                            </div>
                                            <div class="col-2 text-end">
                                                <button class="btn bg-gradient-danger" type="button" data-bs-toggle="modal" data-bs-target="#hapus_lampiran<?= $lampiran->id_lampiran ?>""><i class=" bi bi-trash-fill me-2"></i>Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                        <div class=" form-group" id="lampiran-container">
                            <div class="row">

                            </div>
                        </div>

                        <button type="button" class="btn btn-primary bg-dark" onclick="tambahLampiran()">+ Tambah Lampiran</button>

                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>admin/laporan-pekerjaan" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($lampiran_laporan_pekerjaan as $lampiran) : ?>
        <?php if ($lampiran->id_laporan_pekerjaan == $laporan_pekerjaan->id_laporan_pekerjaan) : ?>
            <div class="modal fade" id="hapus_lampiran<?= $lampiran->id_lampiran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus lampiran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah kamu yakin ingin menghapus lampiran ini?
                        </div>
                        <div class="modal-footer">
                            <form action="<?= base_url() ?>laporan_pekerjaan/proses_hapus_lampiran" method="post">
                                <input type="hidden" name="id_lampiran" value="<?= $lampiran->id_lampiran ?>">
                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                                <button type="submit" class="btn bg-gradient-primary">Ya</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>

    <script>
        // Fungsi untuk menambahkan lampiran baru
        function tambahLampiran() {
            var container = document.getElementById('lampiran-container');
            var newRow = document.createElement('div');
            newRow.className = 'row';

            var textareaInput = createTextareaInput('judul_lampiran', 'Judul Lampiran');
            var fotoSebelumInput = createFileInput('lampiran_sebelum[]', 'Foto Lampiran Sebelum Pekerjaan <br><em>(maksimal ukuran file 2MB)</em>');
            var fotoProsesInput = createFileInput('lampiran_proses[]', 'Foto Lampiran Proses Pekerjaan <br><em>(maksimal ukuran file 2MB)</em>');
            var fotoSetelahInput = createFileInput('lampiran_setelah[]', 'Foto Lampiran Setelah Pekerjaan <br><em>(maksimal ukuran file 2MB)</em>');

            newRow.appendChild(textareaInput);
            newRow.appendChild(fotoSebelumInput);
            newRow.appendChild(fotoProsesInput);
            newRow.appendChild(fotoSetelahInput);

            container.insertBefore(newRow, container.lastChild);
        }

        // Fungsi untuk membuat input file
        function createFileInput(name, label) {
            var col = document.createElement('div');
            col.className = 'col-3 mt-3';

            var labelElement = document.createElement('label');
            labelElement.htmlFor = name;
            labelElement.className = 'form-control-label';
            labelElement.innerHTML = label; // Menggunakan innerHTML agar tag HTML seperti <em> terbaca

            var inputElement = document.createElement('input');
            inputElement.className = 'form-control';
            inputElement.type = 'file';
            inputElement.name = name;
            inputElement.setAttribute('required', 'true');
            inputElement.setAttribute('oninvalid', "this.setCustomValidity('Harap Masukkan File Lampiran')");
            inputElement.setAttribute('oninput', "setCustomValidity('')")
            inputElement.setAttribute('accept', ".jpg, .jpeg, .png");

            col.appendChild(labelElement);
            col.appendChild(inputElement);

            return col;
        }

        // Fungsi untuk membuat input textarea
        function createTextareaInput(name, label) {
            var col = document.createElement('div');
            col.className = 'col-3 mt-3';

            var labelElement = document.createElement('label');
            labelElement.htmlFor = name;
            labelElement.className = 'form-control-label';
            labelElement.innerText = label;

            var textareaElement = document.createElement('textarea');
            textareaElement.className = 'form-control';
            textareaElement.placeholder = label;
            textareaElement.id = name;
            textareaElement.name = name + '[]'; // Menambahkan "[]" untuk mendukung multiple values (seperti pada input sebelumnya)
            textareaElement.rows = 3;
            textareaElement.setAttribute('required', 'true');
            textareaElement.setAttribute('oninvalid', "this.setCustomValidity('Harap Masukkan " + label + "')");
            textareaElement.setAttribute('oninput', "setCustomValidity('')");

            col.appendChild(labelElement);
            col.appendChild(textareaElement);

            return col;
        }
    </script>