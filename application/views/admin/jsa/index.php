<!DOCTYPE html>
<html>

<head>
    <title>Form Laporan Pekerjaan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Form Laporan Pekerjaan</h2>
        <form action="<?php echo base_url('jsa/process_form'); ?>" method="post" enctype="multipart/form-data">
            <!-- Informasi Laporan -->
            <div class="form-group">
                <label>Judul Laporan:</label>
                <input type="text" class="form-control" name="judul_laporan" required>
            </div>

            <!-- Informasi Kegiatan -->
            <div class="kegiatan mt-4">
                <div class="row">
                    <div class="col-6">
                        <h3>Kegiatan</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-primary" onclick="addKegiatan()">Tambah Kegiatan Baru</button>
                    </div>
                </div>
                <div class="kegiatan-section">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Kegiatan:</label>
                                <input type="text" class="form-control" name="nama_kegiatan[]" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Deskripsi Kegiatan:</label>
                                <textarea class="form-control" name="deskripsi_kegiatan[]" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Foto Kegiatan -->
            <div class="foto mt-4">
                <div class="row">
                    <div class="col-6">
                        <h3>Foto Kegiatan</h3>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-success" onclick="addFoto()">Tambah Foto Baru</button>
                    </div>
                </div>
                <div class="foto-section">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="file" accept="image/*" class="form-control" name="foto_kegiatan[]" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="row mt-4">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit Laporan</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- JavaScript untuk menambahkan input kegiatan dan foto secara dinamis -->
    <script>
        var kegiatanIndex = 1;
        var fotoIndex = 1;

        function addKegiatan() {
            kegiatanIndex++;
            var kegiatanSection = document.querySelector('.kegiatan-section');
            var lastKegiatan = kegiatanSection.lastElementChild;
            var clonedKegiatan = lastKegiatan.cloneNode(true);
            clonedKegiatan.querySelector('label').textContent = 'Nama Kegiatan:';
            clonedKegiatan.querySelector('input[name="nama_kegiatan[]"]').value = '';
            clonedKegiatan.querySelector('label').textContent = 'Deskripsi Kegiatan:';
            clonedKegiatan.querySelector('textarea[name="deskripsi_kegiatan[]"]').value = '';
            kegiatanSection.appendChild(clonedKegiatan);
        }

        function addFoto() {
            fotoIndex++;
            var fotoSection = document.querySelector('.foto-section');
            var lastFoto = fotoSection.lastElementChild;
            var clonedFoto = lastFoto.cloneNode(true);
            clonedFoto.querySelector('input[type="file"]').name = 'foto_kegiatan[]'; // Update nama input file
            clonedFoto.querySelector('input[type="file"]').value = ''; // Reset nilai input file
            fotoSection.appendChild(clonedFoto);
        }
    </script>
</body>

</html>