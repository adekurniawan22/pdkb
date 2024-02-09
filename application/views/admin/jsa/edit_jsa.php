<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>admin/jsa/proses-edit-jsa" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_jsa" value="<?= $jsa->id_jsa ?>">
                        <div class="form-group">
                            <label for="dasar_pelaksanaan" class="form-control-label">Dasar Pelaksanaan</label>
                            <input class="form-control" type="text" placeholder="Dasar Pelaksanaan" id="dasar_pelaksanaan" name="dasar_pelaksanaan" value="<?php echo set_value('dasar_pelaksanaan', $jsa->dasar_pelaksanaan); ?>">
                            <?= form_error('dasar_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="waktu_pelaksanaan" class="form-control-label">Waktu Pelaksanaan</label>
                            <input class="form-control" type="date" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="<?php echo set_value('waktu_pelaksanaan', $jsa->waktu_pelaksanaan); ?>">
                            <?= form_error('waktu_pelaksanaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="lingkup_pekerjaan" class="form-control-label">Lingkup Pekerjaan</label>
                            <textarea class="form-control" placeholder="Lingkup Pekerjaan" id="lingkup_pekerjaan" name="lingkup_pekerjaan" rows="3"><?php echo set_value('lingkup_pekerjaan', $jsa->lingkup_pekerjaan); ?></textarea>
                            <?= form_error('lingkup_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hasil_pekerjaan" class="form-control-label">Hasil Pekerjaan</label>
                            <textarea class="form-control" placeholder="Hasil Pekerjaan" id="hasil_pekerjaan" name="hasil_pekerjaan" rows="3"><?php echo set_value('hasil_pekerjaan', $jsa->hasil_pekerjaan); ?></textarea>
                            <?= form_error('hasil_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kesimpulan" class="form-control-label">Kesimpulan</label>
                            <textarea class="form-control" placeholder="Kesimpulan" id="kesimpulan" name="kesimpulan" rows="3"><?php echo set_value('kesimpulan', $jsa->kesimpulan); ?></textarea>
                            <?= form_error('kesimpulan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <hr class="bg-dark my-4">
                        <div class="form-group" id="temuan-container">
                            <?php $i = 1 ?>
                            <?php foreach ($temuan_jsa as $temuan) : ?>
                                <?php if ($temuan->id_jsa == $jsa->id_jsa) : ?>
                                    <div class="row mb-4">
                                        <div class="col-5">
                                            <label for="" class="form-control-label">Hasil Temuan <?= $i ?></label>
                                            <input class="form-control" type="text" placeholder="Hasil Temuan" value="<?= $temuan->temuan ?>" id="" name="" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-control-label">Keterangan</label>
                                            <textarea class="form-control" type="text" placeholder="Keterangan" id="" name="" rows="5" disabled><?= $temuan->keterangan ?></textarea>
                                        </div>
                                        <div class="col-1">
                                            <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#hapus_temuan_jsa<?= $temuan->id_temuan_jsa ?>"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>

                        <div class="form-group" id="temuan-container">
                        </div>
                        <button type="button" class="btn btn-primary bg-dark" id="tambah_temuan_baru">+ Tambah Hasil Temuan</button>

                        <hr class="bg-secondary">
                        <div class="row ">
                            <?php foreach ($foto_jsa as $foto) : ?>
                                <?php if ($foto->id_jsa == $jsa->id_jsa) : ?>
                                    <div class="col-3 mb-2">
                                        <div class=" card-body">
                                            <img src="<?= base_url() ?>assets/img/jsa/<?= $foto->foto ?>" alt="" width="180px" class="me-2 d-inline-block">
                                            <button type="button" class="btn bg-gradient-danger position-absolute" data-bs-toggle="modal" data-bs-target="#hapus_foto_jsa<?= $foto->id_foto_jsa ?>"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                        <div class="form-group" id="foto-container">

                        </div>

                        <button type="button" class="btn btn-primary bg-dark" id="tambah_foto_jsa_baru" onclick="tambahFoto()">+ Tambah Foto Hasil Temuan</button>


                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>admin/jsa" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Temuan -->
    <?php foreach ($temuan_jsa as $temuan) : ?>
        <div class="modal fade" id="hapus_temuan_jsa<?= $temuan->id_temuan_jsa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Hasil Temuan JSA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus hasil temuan JSA ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>jsa/proses_hapus_temuan_jsa" method="post">
                            <input type="hidden" name="id_jsa" value="<?= $temuan->id_jsa ?>">
                            <input type="hidden" name="id_temuan_jsa" value="<?= $temuan->id_temuan_jsa ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- End Modal Hapus Temuan -->

    <!-- Modal Hapus Foto Temuan -->
    <?php foreach ($foto_jsa as $foto) : ?>
        <div class="modal fade" id="hapus_foto_jsa<?= $foto->id_foto_jsa ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Foto Hasil Temuan JSA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin menghapus foto temuan JSA ini?
                    </div>
                    <div class="modal-footer">
                        <form action="<?= base_url() ?>jsa/proses_hapus_foto_jsa" method="post">
                            <input type="hidden" name="id_jsa" value="<?= $foto->id_jsa ?>">
                            <input type="hidden" name="id_foto_jsa" value="<?= $foto->id_foto_jsa ?>">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn bg-gradient-primary">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- End Modal Hapus Foto Temuan -->

    <script>
        document.querySelector('#tambah_temuan_baru').addEventListener('click', function() {
            // Create a new row
            var newRow = document.createElement('div');
            newRow.className = 'row mb-4';

            // Create the first column for hasil temuan
            var col1 = document.createElement('div');
            col1.className = 'col-5';

            var label1 = document.createElement('label');
            label1.setAttribute('for', 'temuan[]');
            label1.className = 'form-control-label';
            label1.textContent = 'Hasil Temuan Baru';

            var inputTemuan = document.createElement('input');
            inputTemuan.className = 'form-control';
            inputTemuan.type = 'text';
            inputTemuan.placeholder = 'Hasil Temuan';
            inputTemuan.id = 'temuan_baru[]';
            inputTemuan.name = 'temuan_baru[]';
            inputTemuan.required = true;
            inputTemuan.setAttribute('oninvalid', "this.setCustomValidity('Harap masukkan hasil temuan')");
            inputTemuan.setAttribute('oninput', "setCustomValidity('')");

            col1.appendChild(label1);
            col1.appendChild(inputTemuan);

            // Create the second column for keterangan
            var col2 = document.createElement('div');
            col2.className = 'col-7';

            var label2 = document.createElement('label');
            label2.setAttribute('for', 'keterangan[]');
            label2.className = 'form-control-label';
            label2.textContent = 'Keterangan Baru';

            var textareaKeterangan = document.createElement('textarea');
            textareaKeterangan.className = 'form-control';
            textareaKeterangan.type = 'text';
            textareaKeterangan.placeholder = 'Keterangan';
            textareaKeterangan.id = 'keterangan_baru[]';
            textareaKeterangan.name = 'keterangan_baru[]';
            textareaKeterangan.rows = 5;
            textareaKeterangan.required = true;
            textareaKeterangan.setAttribute('oninvalid', "this.setCustomValidity('Harap masukkan keterangan')");
            textareaKeterangan.setAttribute('oninput', "setCustomValidity('')");

            col2.appendChild(label2);
            col2.appendChild(textareaKeterangan);

            // Append columns to the new row
            newRow.appendChild(col1);
            newRow.appendChild(col2);

            // Append the new row to the container
            document.querySelector('#temuan-container').appendChild(newRow);
        });

        function tambahFoto() {
            // Create label element
            var label = document.createElement("label");
            label.setAttribute("for", "foto[]");
            label.setAttribute("class", "form-control-label");
            label.innerHTML = "Foto Hasil Temuan <em>(maksimal ukuran file 2MB)</em>";

            // Create input element
            var input = document.createElement("input");
            input.setAttribute("class", "form-control");
            input.setAttribute("type", "file");
            input.setAttribute("name", "foto_baru[]");
            input.setAttribute("accept", ".jpg, .jpeg, .png");
            input.setAttribute("required", "true");
            input.setAttribute("oninvalid", "this.setCustomValidity('Harap Masukkan File Lampiran')");
            input.setAttribute("oninput", "setCustomValidity('')");

            // Append label and input to the container
            var container = document.getElementById("foto-container");
            container.appendChild(label);
            container.appendChild(input);
        }
    </script>