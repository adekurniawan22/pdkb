<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body ">
                    <form action="<?= base_url() ?>jtc/riwayat-gudang/proses-tambah-riwayat-gudang" method="post" onsubmit="return updateSignatureInput()">
                        <div class="card mb-4">
                            <div class="card-body px-0 pb-3">
                                <h4 class="ms-4">Data Alat Tower ERS</h4>
                                <hr class="bg-dark mx-4 mb-4">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="example">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jenis</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Nama ALat</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Merk</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Spesifikasi</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Jumlah saat ini</th>
                                                <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7" data-sortable="false">Checklist</th>
                                                <th class="text-uppercase text-xxs font-weight-bolder opacity-7" data-sortable="false">Jumlah yang dipinjam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alat_tower_ers as $a) : ?>
                                                <?php
                                                $warning =  $a->jumlah - $a->sedang_dipinjam;
                                                if ($warning == 0) { ?>
                                                    <tr style="color:white" class="bg-danger">
                                                    <?php } else { ?>
                                                    <tr>
                                                    <?php } ?>
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->jenis ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->nama_alat_tower_ers ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->merk ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $a->spesifikasi ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="ms-3 text-sm font-weight-bold mb-0"><?= $warning . ' ' . $a->satuan ?></p>
                                                    </td>

                                                    <?php if ($warning == 0) { ?>
                                                        <td style="width: 15%;" class="text-center">
                                                            <input type="checkbox" class="select-checkbox form text-sm font-weight-bold mb-0" name="select_alat_kerja[]" value="<?= $a->id_alat_tower_ers ?>" data-name="<?= $a->nama_alat_tower_ers ?>" disabled>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td style="width: 15%;" class="text-center">
                                                            <input type="checkbox" class="select-checkbox form text-sm font-weight-bold mb-0" name="select_alat_kerja[]" value="<?= $a->id_alat_tower_ers ?>" data-name="<?= $a->nama_alat_tower_ers ?>">
                                                        </td>
                                                    <?php } ?>
                                                    <td style="width: 15%;">
                                                    </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="selected-items-input" name="selected_items" value="">

                        <div class="form-group">
                            <label for="nama_alat_kerja" class="form-control-label">Nama Alat Kerja</label>
                            <textarea class="form-control" placeholder="Nama Alat Kerja" id="nama_alat_kerja" name="nama_alat_kerja" rows="3" disabled></textarea>
                            <?= form_error('select_alat_kerja[]', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="penanggung_jawab" class="form-control-label">Penanggung Jawab</label>
                            <input class="form-control" type="text" name="penanggung_jawab" id="penanggung_jawab" value="<?php echo set_value('penanggung_jawab'); ?>" placeholder="Penanggung Jawab">
                            <?= form_error('penanggung_jawab', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Tanda Tangan Penanggung Jawab</label>
                            <input type="hidden" name="signature_image" id="signatureImageInput" />
                        </div>
                        <div>
                            <canvas id="signatureCanvas" class="" style="border:1px solid #000;"></canvas>
                            <button type="button" class="position-absolute btn btn-danger ms-3 m-0 text-start" onclick="resetCanvas()">Reset Tanda Tangan</button>
                            <p id="textAlertCanvas" style="display: none; font-size:12px; color:red;">Harap Mengisi Tanda Tangan</p>
                        </div>

                        <div class="form-group">
                            <label for="example-datetime-local-input" class="form-control-label">Tanggal Barang Keluar</label>
                            <input class="form-control" type="date" name="tanggal_keluar" id="example-datetime-local-input" value="<?php echo set_value('tanggal_keluar'); ?>">
                            <?= form_error('tanggal_keluar', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="form-control-label">Keterangan</label>
                            <textarea class="form-control" placeholder="Keterangan Peminjaman" id="keterangan" name="keterangan" rows="3"><?php echo set_value('keterangan'); ?></textarea>
                            <?= form_error('keterangan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>jtc/riwayat-gudang" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
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