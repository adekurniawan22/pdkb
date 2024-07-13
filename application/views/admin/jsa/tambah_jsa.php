<style>
    .file-section {
        margin-top: 10px;
    }

    .add-image-btn {
        margin-top: 5px;
    }
</style>
<div class="container-fluid py-0">
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body pb-2">
                    <div class="form-progress-wizard">
                        <div class="progress-bar-wizard"></div>
                    </div>
                    <form id="form-wizard" action="<?= base_url() ?>admin/jsa/proses-tambah-jsa" method="post" enctype="multipart/form-data">

                        <div class="step">
                            <!-- Judul Laporan -->
                            <div class="form-group">
                                <label for="judul_laporan" class="form-control-label">Judul Laporan</label>
                                <input class="form-control" type="text" placeholder="Judul Laporan" id="judul_laporan" name="judul_laporan">
                                <span id="error_judul_laporan" style="display: none;"></span>
                            </div>

                            <!-- Lokasi Pekerjaan -->
                            <div class="form-group">
                                <label for="lokasi_pekerjaan" class="form-control-label">Lokasi Pekerjaan</label>
                                <input class="form-control" type="text" placeholder="Lokasi Pekerjaan" id="lokasi_pekerjaan" name="lokasi_pekerjaan">
                                <span id="error_lokasi_pekerjaan" style="display: none;"></span>
                            </div>

                            <!-- Mulai Pelaksanaan -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="mulai_pelaksanaan" class="form-control-label">Mulai Pelaksanaan</label>
                                        <input class="form-control" type="date" id="mulai_pelaksanaan" name="mulai_pelaksanaan">
                                        <span id="error_mulai_pelaksanaan" style="display: none;"></span>
                                    </div>
                                    <div class="col-6">
                                        <label for="selesai_pelaksanaan" class="form-control-label">Selesai Pelaksanaan</label>
                                        <input class="form-control" type="date" id="selesai_pelaksanaan" name="selesai_pelaksanaan">
                                        <span id="error_selesai_pelaksanaan" style="display: none;"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Kesimpulan -->
                            <div class="form-group">
                                <label for="kesimpulan" class="form-control-label">Kesimpulan</label>
                                <select class="form-select" aria-label="Default select example" name="kesimpulan" id="kesimpulan">
                                    <option value="" selected disabled>Pilih Kesimpulan</option>
                                    <option value="Dapat Dikerjakan Dengan Metode PDKB">Dapat Dikerjakan Dengan Metode PDKB</option>
                                    <option value="Tidak Dapat Dikerjakan Dengan Metode PDKB">Tidak Dapat Dikerjakan Dengan Metode PDKB</option>
                                </select>
                                <span id="error_kesimpulan" style="display: none;"></span>
                            </div>

                            <!-- Alasan -->
                            <div class="form-group" id="textarea-container" style="display: none;">
                                <label for="alasan">Alasan</label>
                                <textarea class="form-control" id="alasan" name="alasan" rows="3"></textarea>
                                <span id="error_alasan" style="display: none;"></span>
                            </div>

                            <div class="text-end">
                                <a href="<?= base_url('admin/jsa') ?>" class="btn btn-dark">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="button" class="btn btn-primary next-step"> Selanjutnya <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Aspek Perencanaan -->
                        <div class="step" style="display: none;">
                            <div class="card card-aspek-perencanaan">
                                <div class="card-body">
                                    <h6 class="card-title">Aspek Perencanaan</h6>
                                    <hr class="bg-dark mb-4">

                                    <!-- Jenis Anomali -->
                                    <div class="form-group">
                                        <label for="jenis_anomali_0" class="form-control-label">Jenis Anomali</label>
                                        <input class="form-control" type="text" placeholder="Jenis Anomali" id="jenis_anomali_0" name="aspek_perencanaan[0][jenis_anomali]">
                                        <span id="error_jenis_anomali_0" style="display: none;"></span>
                                    </div>

                                    <!-- Material -->
                                    <div class="form-group">
                                        <label for="material_0" class="form-control-label">Material</label>
                                        <input class="form-control" type="text" placeholder="Material" id="material_0" name="aspek_perencanaan[0][material]">
                                        <span id="error_material_0" style="display: none;"></span>
                                    </div>

                                    <!-- Metode Pekerjaan -->
                                    <div class="form-group">
                                        <label for="metode_pekerjaan_0" class="form-control-label">Metode Pekerjaan</label>
                                        <input class="form-control" type="text" placeholder="Metode Pekerjaan" id="metode_pekerjaan_0" name="aspek_perencanaan[0][metode_pekerjaan]">
                                        <span id="error_metode_pekerjaan_0" style="display: none;"></span>
                                    </div>

                                    <!-- Titik Anomali -->
                                    <div class="form-group">
                                        <label class="form-control-label">Titik Anomali Line</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="aspek_perencanaan[0][titik_anomali][]" id="line1_0" value="line1" onclick="toggleFileSection(this)">
                                            <label class="form-check-label" for="line1_0">Line 1</label>
                                            <div id="file_section_line1_0" class="file-section" style="display: none;">
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="aspek_perencanaan[0][titik_anomali][]" id="line2_0" value="line2" onclick="toggleFileSection(this)">
                                            <label class="form-check-label" for="line2_0">Line 2</label>
                                            <div id="file_section_line2_0" class="file-section" style="display: none;">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Titik Anomali Fasa -->
                                    <div class="form-group">
                                        <label class="form-control-label">Titik Anomali Fasa</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="aspek_perencanaan[0][titik_anomali][]" id="fasaR_0" value="fasaR" onclick="toggleFileSection(this)">
                                            <label class="form-check-label" for="fasaR_0">Fasa R</label>
                                            <div id="file_section_fasaR_0" class="file-section" style="display: none;">
                                                <button type="button" class="btn btn-dark add-image-btn" onclick="addFileInput('fasaR_0')">Tambah Gambar</button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="aspek_perencanaan[0][titik_anomali][]" id="fasaS_0" value="fasaS" onclick="toggleFileSection(this)">
                                            <label class="form-check-label" for="fasaS_0">Fasa S</label>
                                            <div id="file_section_fasaS_0" class="file-section" style="display: none;">
                                                <button type="button" class="btn btn-dark add-image-btn" onclick="addFileInput('fasaS_0')">Tambah Gambar</button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="aspek_perencanaan[0][titik_anomali][]" id="fasaT_0" value="fasaT" onclick="toggleFileSection(this)">
                                            <label class="form-check-label" for="fasaT_0">Fasa T</label>
                                            <div id="file_section_fasaT_0" class="file-section" style="display: none;">
                                                <button type="button" class="btn btn-dark add-image-btn" onclick="addFileInput('fasaT_0')">Tambah Gambar</button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="aspek_perencanaan[0][titik_anomali][]" id="gsw_0" value="gsw" onclick="toggleFileSection(this)">
                                            <label class="form-check-label" for="gsw_0">GSW</label>
                                            <div id="file_section_gsw_0" class="file-section" style="display: none;">
                                                <button type="button" class="btn btn-dark add-image-btn" onclick="addFileInput('gsw_0')">Tambah Gambar</button>
                                            </div>
                                        </div>
                                    </div>

                                    <span id="error_metode_titik_anomali_0" style="display: none;"></span>

                                    <!-- Keterangan Line -->
                                    <div class="form-group">
                                        <label for="keterangan_line_0" class="form-control-label">Keterangan Line</label>
                                        <textarea class="form-control" placeholder="Keterangan Line" id="keterangan_line_0" name="aspek_perencanaan[0][keterangan_line]" rows="3"></textarea>
                                        <span id="error_keterangan_line_0" style="display: none;"></span>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="button" class="btn btn-success add-aspek-perencanaan">+ Tambah Aspek Perencanaa Baru</button>
                            </div>

                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary prev-step"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary next-step"> Selanjutnya <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Aspek SDM -->
                        <div class="step" style="display: none;">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Aspek SDM</h6>
                                    <hr class="bg-dark mb-4">
                                    <div class="form-group">
                                        <label for="jumlah_personil_pdkb" class="form-control-label">Jumlah Personil PDKB</label>
                                        <input class="form-control" type="number" min="0" id="jumlah_personil_pdkb" name="jumlah_personil_pdkb">
                                        <span id="error_jumlah_personil_pdkb" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_tenaga_bantuan" class="form-control-label">Jumlah Tenaga Bantuan</label>
                                        <input class="form-control" type="number" min="0" id="jumlah_tenaga_bantuan" name="jumlah_tenaga_bantuan">
                                        <span id="error_jumlah_tenaga_bantuan" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_driver" class="form-control-label">Jumlah Driver</label>
                                        <input class="form-control" type="number" min="0" id="jumlah_driver" name="jumlah_driver">
                                        <span id="error_jumlah_driver" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="kendaraan_kerja" class="form-control-label">Kendaraan Kerja</label>
                                        <input class="form-control" type="text" placeholder="Kendaraan Kerja" id="kendaraan_kerja" name="kendaraan_kerja">
                                        <span id="error_kendaraan_kerja" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="layanan_kesehatan_terdekat" class="form-control-label">Layanan Kesehatan Terdekat</label>
                                        <input class="form-control" type="text" placeholder="Layanan Kesehatan Terdekat" id="layanan_kesehatan_terdekat" name="layanan_kesehatan_terdekat">
                                        <span id="error_layanan_kesehatan_terdekat" style="display: none;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary prev-step"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary next-step"> Selanjutnya <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Aspek Lingkungan -->
                        <div class="step" style="display: none;">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Aspek Lingkungan</h6>
                                    <hr class="bg-dark mb-4">
                                    <div class="form-group">
                                        <label for="alamat_tower" class="form-control-label">Alamat Tower</label>
                                        <input class="form-control" type="text" placeholder="Alamat Tower" id="alamat_tower" name="alamat_tower">
                                        <span id="error_alamat_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="akses_menuju_tower" class="form-control-label">Akses Menuju Tower</label>
                                        <input class="form-control" type="text" placeholder="Akses Menuju Tower" id="akses_menuju_tower" name="akses_menuju_tower">
                                        <span id="error_akses_menuju_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_akses_menuju_tower" class="form-control-label">Foto Akses Menuju Tower<em>(maksimal ukuran file 5MB)</em></label>
                                        <input class="form-control" type="file" id="foto_akses_menuju_tower" name="foto_akses_menuju_tower" accept="image/*">
                                        <span id="error_foto_akses_menuju_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="halaman_tower" class="form-control-label">Halaman Tower</label>
                                        <input class="form-control" type="text" placeholder="Halaman Tower" id="halaman_tower" name="halaman_tower">
                                        <span id="error_halaman_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_halaman_tower" class="form-control-label">Foto Halaman Tower <em>(maksimal ukuran file 5MB)</em></label>
                                        <input class="form-control" type="file" id="foto_halaman_tower" name="foto_halaman_tower" accept="image/*">
                                        <span id="error_foto_halaman_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi_lingkungan" class="form-control-label">Kondisi Lingkungan</label>
                                        <select class="form-select" aria-label="Default select example" name="kondisi_lingkungan" id="kondisi_lingkungan">
                                            <option value="" selected disabled>Pilih Kondisi Lingkungan</option>
                                            <option value="Aman">Aman</option>
                                            <option value="Tidak Aman">Tidak Aman</option>
                                        </select>
                                        <span id="error_kondisi_lingkungan" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="catatan_kondisi_lingkungan" class="form-control-label">Catatan Kondisi Lingkungan</label>
                                        <textarea class="form-control" placeholder="Catatan Kondisi Lingkungan" id="catatan_kondisi_lingkungan" name="catatan_kondisi_lingkungan" rows="3"></textarea>
                                        <span id="error_catatan_kondisi_lingkungan" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="potensi_hewan" class="form-control-label">Potensi Hewan</label>
                                        <input class="form-control" type="text" placeholder="Potensi Hewan" id="potensi_hewan" name="potensi_hewan">
                                        <span id="error_potensi_hewan" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_potensi_hewan" class="form-control-label">Foto Potensi Hewan <em>(maksimal ukuran file 5MB)</em></label>
                                        <input class="form-control" type="file" id="foto_potensi_hewan" name="foto_potensi_hewan" accept="image/*">
                                        <span id="error_foto_potensi_hewan" style="display: none;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary prev-step"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary next-step"> Selanjutnya <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Aspek Kontruksi -->
                        <div class="step" style="display: none;">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Aspek Kontruksi</h6>
                                    <hr class="bg-dark mb-4">
                                    <div class="form-group">
                                        <label for="jenis_tower" class="form-control-label">Jenis Tower</label>
                                        <select class="form-select" aria-label="Default select example" name="jenis_tower" id="jenis_tower">
                                            <option value="" selected disabled>Pilih Jenis Tower</option>
                                            <option value="Lattice Tower">Lattice Tower</option>
                                            <option value="Concreate Pole Tower">Concreate Pole Tower</option>
                                            <option value="Tubular Steel Tower">Tubular Steel Tower</option>
                                            <option value="Multi Tower">Multi Tower</option>
                                        </select>
                                        <span id="error_jenis_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="type_tower" class="form-control-label">Type Tower</label>
                                        <input class="form-control" type="text" placeholder="Type Tower" id="type_tower" name="type_tower">
                                        <span id="error_type_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_type_tower" class="form-control-label">Foto Type Tower<em>(maksimal ukuran file 5MB)</em></label>
                                        <input class="form-control" type="file" id="foto_type_tower" name="foto_type_tower" accept="image/*">
                                        <span id="error_foto_type_tower" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_stringset_isolator" class="form-control-label">Jenis Stringset Isolator</label>
                                        <select class="form-select" aria-label="Default select example" name="jenis_stringset_isolator" id="jenis_stringset_isolator">
                                            <option value="" selected disabled>Pilih Jenis Stringset Isolator</option>
                                            <option value="Porselen Single">Porselen Single</option>
                                            <option value="Porselen Double">Porselen Double</option>
                                            <option value="Kaca Single">Kaca Single</option>
                                            <option value="Kaca Double">Kaca Double</option>
                                            <option value="Polimer Single">Polimer Single</option>
                                            <option value="Polimer Double">Polimer Double</option>
                                        </select>
                                        <span id="error_jenis_stringset_isolator" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="foto_jenis_stringset_isolator" class="form-control-label">Foto Jenis Stringset Isolator<em>(maksimal ukuran file 5MB)</em></label>
                                        <input class="form-control" type="file" id="foto_jenis_stringset_isolator" name="foto_jenis_stringset_isolator" accept="image/*">
                                        <span id="error_foto_jenis_stringset_isolator" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="panjang_stringset_isolator" class="form-control-label">Panjang Stringset Isolator</label>
                                        <input class="form-control" type="text" placeholder="Panjang Stringset Isolator" id="panjang_stringset_isolator" name="panjang_stringset_isolator">
                                        <span id="error_panjang_stringset_isolator" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="posisi_pin" class="form-control-label">Jenis Posisi Pin</label>
                                        <select class="form-select" aria-label="Default select example" name="posisi_pin" id="posisi_pin">
                                            <option value="" selected disabled>Pilih Jenis Posisi Pin</option>
                                            <option value="Dalam">Dalam</option>
                                            <option value="Luar">Luar</option>
                                            <option value="Kiri">Kiri</option>
                                            <option value="Kanan">Kanan</option>
                                        </select>
                                        <span id="error_posisi_pin" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_konduktor" class="form-control-label">Jenis Jumlah Konduktor</label>
                                        <select class="form-select" aria-label="Default select example" name="jumlah_konduktor" id="jumlah_konduktor">
                                            <option value="" selected disabled>Pilih Jenis Jumlah Konduktor</option>
                                            <option value="Single Konduktor">Single Konduktor</option>
                                            <option value="Double Konduktor">Double Konduktor</option>
                                        </select>
                                        <span id="error_jumlah_konduktor" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_konduktor" class="form-control-label">Jenis Konduktor</label>
                                        <select class="form-select" aria-label="Default select example" name="jenis_konduktor" id="jenis_konduktor">
                                            <option value="" selected disabled>Pilih Jenis Konduktor</option>
                                            <option value="ACSR 240mm">ACSR 240mm</option>
                                            <option value="TACSR 450mm">TACSR 450mm</option>
                                            <option value="ACCC 380mm">ACCC 380mm</option>
                                            <option value="ACFR 240mm">ACFR 240mm</option>
                                        </select>
                                        <span id="error_jenis_konduktor" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="jarak_span" class="form-control-label">Jarak Span</label>
                                        <input class="form-control" type="text" placeholder="Jarak Span" id="jarak_span" name="jarak_span">
                                        <span id="error_jarak_span" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="kondisi_stepbolt" class="form-control-label">Kondisi Stepbolt</label>
                                        <select class="form-select" aria-label="Default select example" name="kondisi_stepbolt" id="kondisi_stepbolt">
                                            <option value="" selected disabled>Pilih Kondisi Stepbolt</option>
                                            <option value="Lengkap">Lengkap</option>
                                            <option value="Tidak Lengkap">Tidak Lengkap</option>
                                        </select>
                                        <span id="error_kondisi_stepbolt" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="panjang_traves" class="form-control-label">Panjang Traves</label>
                                        <input class="form-control" type="text" placeholder="Panjang Traves" id="panjang_traves" name="panjang_traves">
                                        <span id="error_panjang_traves" style="display: none;"></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="lebar_traves" class="form-control-label">Lebar Traves</label>
                                                <input class="form-control" type="text" placeholder="Lebar Traves" id="lebar_traves" name="lebar_traves">
                                                <span id="error_lebar_traves" style="display: none;"></span>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jarak_antar_traves" class="form-control-label">Jarak Antar Traves</label>
                                                <input class="form-control" type="text" placeholder="Jarak Antar Traves" id="jarak_antar_traves" name="jarak_antar_traves">
                                                <span id="error_jarak_antar_traves" style="display: none;"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary prev-step"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary next-step"> Selanjutnya <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Aspek Pelaksanaan -->
                        <div class="step" style="display: none;">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Aspek Pelaksanaan</h6>
                                    <hr class="bg-dark mb-4">

                                    <div class="form-group">
                                        <label for="sop" class="form-control-label">SOP PDKB</label>
                                        <select class="form-select" aria-label="Default select example" name="sop" id="sop">
                                            <option value="" selected disabled>Pilih SOP PDKB</option>
                                            <option value="Prosedur Pelaksanaan Pekerjaan">Prosedur Pelaksanaan Pekerjaan</option>
                                            <option value="Prosedur Pemeliharaan Peralatan PDKB">Prosedur Pemeliharaan Peralatan PDKB</option>
                                            <option value="Prosedur Climb Up Inspection">Prosedur Climb Up Inspection</option>
                                            <option value="Prosedur Dalam Kondisi Emergency">Prosedur Dalam Kondisi Emergency</option>
                                        </select>
                                        <span id="error_sop" style="display: none;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="ik" class="form-control-label">IK PDKB</label>
                                        <select class="form-select" aria-label="Default select example" name="ik" id="ik">
                                            <option value="" selected disabled>Pilih IK PDKB</option>
                                            <option value="Memanjat Tower Tiang">Memanjat Tower Tiang</option>
                                            <option value="Inspeksi Visual SUTT-SUTET">Inspeksi Visual SUTT-SUTET</option>
                                            <option value="Akses Hot End Crew">Akses Hot End Crew</option>
                                            <option value="Tanggal Keadaan Darurat">Tanggal Keadaan Darurat</option>
                                            <option value="Asesmen Insulator Dan Konduktor">Asesmen Insulator Dan Konduktor</option>
                                            <option value="Pengambilan Benda Asing Pada SUTT-SUTET">Pengambilan Benda Asing Pada SUTT-SUTET</option>
                                            <option value="Penggantian Insulator Suspension 70kV">Penggantian Insulator Suspension 70kV</option>
                                            <option value="Penggantian Insulator Tension 70kV">Penggantian Insulator Tension 70kV</option>
                                            <option value="Penggantian Insulator Suspension 150kV">Penggantian Insulator Suspension 150kV</option>
                                            <option value="Penggantian Insulator Tension 150kV">Penggantian Insulator Tension 150kV</option>
                                            <option value="Penggantian Insulator Support 150kV">Penggantian Insulator Support 150kV</option>
                                            <option value="Pemasangan - Pembongkaran">Pemasangan - Pembongkaran</option>
                                            <option value="Penggantian Insulator Suspension 275kV">Penggantian Insulator Suspension 275kV</option>
                                            <option value="Penggantian Insulator Tension 275kV">Penggantian Insulator Tension 275kV</option>
                                            <option value="Penggantian Insulator Support 275kV">Penggantian Insulator Support 275kV</option>
                                            <option value="Penggantian Insulator Suspension 500kV">Penggantian Insulator Suspension 500kV</option>
                                            <option value="Penggantian Insulator Tension 500kV">Penggantian Insulator Tension 500kV</option>
                                            <option value="Penggantian Insulator Support 500kV">Penggantian Insulator Support 500kV</option>
                                            <option value="Perbaikan Penggantian Aksesoris Pada SUTT-SUTET">Perbaikan Penggantian Aksesoris Pada SUTT-SUTET</option>
                                            <option value="Perbaikan Penggantian Konduktor Jumper">Perbaikan Penggantian Konduktor Jumper</option>
                                            <option value="Perbaikan dan Penggantian Aksesoris GSW OPGW">Perbaikan dan Penggantian Aksesoris GSW OPGW</option>
                                            <option value="Perbaikan Eathwire, Konduktor Rantas, Dan Spacer">Perbaikan Eathwire, Konduktor Rantas, Dan Spacer</option>
                                            <option value="Pemindahan Konduktor Pada Tower Emergency">Pemindahan Konduktor Pada Tower Emergency</option>
                                            <option value="Pemindahan Isolator Pada SUTT-SUTET">Pemindahan Isolator Pada SUTT-SUTET</option>
                                            <option value="Penggantian Traves SUTT 150kV">Penggantian Traves SUTT 150kV</option>
                                        </select>
                                        <span id="error_ik" style="display: none;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary prev-step"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showError(element, message) {
            element.innerHTML = message;
            element.style.display = 'block';
            element.style.cssText = 'font-size: 12px; color: red;';
            element.classList.add('my-2');
        }

        function imageAspekError(element, message) {
            element.innerHTML = message;
            element.style.display = 'block';
            element.style.cssText = 'font-size: 12px; color: red;';
            element.classList.add('mb-2');
        }

        function hideError(element) {
            element.style.display = 'none';
            element.innerHTML = ''; // Kosongkan pesan kesalahan jika valid
        }

        function toggleFileSection(checkbox) {
            var sectionId = 'file_section_' + checkbox.id;
            var fileSection = document.getElementById(sectionId);

            if (checkbox.checked) {
                fileSection.style.display = 'block';
                if (checkbox.value === 'line1' || checkbox.value === 'line2') {
                    // Menambahkan teks input secara otomatis
                    addTextInput(checkbox.id);
                } else {
                    fileSection.innerHTML = '<button type="button" class="btn btn-dark add-image-btn" onclick="addFileInput(\'' + checkbox.id + '\')">Tambah Gambar</button>';
                }
            } else {
                fileSection.style.display = 'none';
                fileSection.innerHTML = '';
            }
        }

        // Global variable to keep track of the count
        var fileInputCounts = {};

        function addFileInput(section) {
            // Initialize fileInputCount for the section if not already set
            if (!fileInputCounts[section]) {
                fileInputCounts[section] = 1;
            }

            var sectionId = 'file_section_' + section;
            var fileSection = document.getElementById(sectionId);

            // Create row
            var row = document.createElement('div');
            row.className = 'row align-items-center mb-3';

            // Create column for file input (col-8)
            var colFile = document.createElement('div');
            colFile.className = 'col-lg-8 col-md-8 col-sm-12';
            var inputFile = document.createElement('input');
            var inputId = sectionId + '_' + fileInputCounts[section]; // Generate unique ID for input
            inputFile.id = inputId;
            inputFile.type = 'file';
            inputFile.name = section + '_file[]';
            inputFile.className = 'form-control';
            inputFile.accept = 'image/*';
            colFile.appendChild(inputFile);

            // Create span for error message
            var errorSpan = document.createElement('span');
            errorSpan.id = inputId + '_error'; // ID for error message span
            errorSpan.className = 'text-danger'; // Example: style for error message
            errorSpan.style.display = 'none'; // Initially hide error message
            colFile.appendChild(errorSpan);

            // Create column for delete button (col-4)
            var colDelete = document.createElement('div');
            colDelete.className = 'col-lg-4 col-md-4 col-sm-12';
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-danger delete-file-btn';
            deleteButton.innerHTML = 'Hapus';
            deleteButton.onclick = function() {
                row.parentNode.removeChild(row); // Remove entire row
                fileInputCounts[section]--; // Decrease the file input count for the section
            };
            colDelete.appendChild(deleteButton);

            // Append columns to row
            row.appendChild(colFile);
            row.appendChild(colDelete);

            // Append row to fileSection
            fileSection.appendChild(row);

            // Increment the file input count for the section
            fileInputCounts[section]++;
        }

        function addTextInput(section) {
            // Initialize fileInputCount for the section if not already set
            if (!fileInputCounts[section]) {
                fileInputCounts[section] = 1;
            }

            var sectionId = 'file_section_' + section;
            var fileSection = document.getElementById(sectionId);

            // Create row
            var row = document.createElement('div');
            row.className = 'row align-items-center mb-3';

            // Create column for file input (col-8)
            var colFile = document.createElement('div');
            colFile.className = 'col-lg-8 col-md-8 col-sm-12';
            var inputFile = document.createElement('input');
            var inputId = sectionId + '_' + fileInputCounts[section]; // Generate unique ID for input
            inputFile.id = inputId;
            inputFile.type = 'text';
            inputFile.placeholder = 'Masukkan Teks';
            inputFile.name = section + '_file[]';
            inputFile.className = 'form-control';
            colFile.appendChild(inputFile);

            // Create span for error message
            var errorSpan = document.createElement('span');
            errorSpan.id = inputId + '_error'; // ID for error message span
            errorSpan.className = 'text-danger'; // Example: style for error message
            errorSpan.style.display = 'none'; // Initially hide error message
            colFile.appendChild(errorSpan);

            // Append column to row
            row.appendChild(colFile);

            // Append row to fileSection
            fileSection.appendChild(row);

            // Increment the file input count for the section
            fileInputCounts[section]++;
        }


        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.add-aspek-perencanaan').addEventListener('click', function() {
                var stepContainers = document.querySelectorAll('.card-aspek-perencanaan');
                var newIndex = stepContainers.length; // Index for the new card
                var indexPlus = stepContainers.length + 1; // Index for the new card

                // Clone the template card
                var newCard = stepContainers[0].cloneNode(true);

                // Change card title
                var titleElement = newCard.querySelector('.card-title');
                titleElement.textContent = 'Aspek Perencanaan ' + indexPlus;

                newCard.classList.add('mt-4');

                // Clear input values in the new card
                newCard.querySelectorAll('input, textarea').forEach(function(element) {
                    // If it's not a checkbox, set value to empty string
                    if (element.type !== 'checkbox') {
                        element.value = '';
                    } else {
                        // Uncheck the checkbox
                        element.checked = false;
                    }
                });


                // Clear error spans if needed
                newCard.querySelectorAll('[id^="error_"]').forEach(function(span) {
                    span.textContent = '';
                    span.style.display = 'none';
                });

                // Clear error spans if needed
                newCard.querySelectorAll('.file-section').forEach(function(fileSelection) {
                    fileSelection.innerHTML = '';
                });

                // Adjust input names and IDs to maintain sequential indices
                newCard.querySelectorAll('[name], [id]').forEach(function(element) {
                    var originalName = element.getAttribute('name');
                    var originalId = element.getAttribute('id');

                    // Adjust name attribute
                    if (originalName) {
                        var newName = originalName.replace(/\[(\d+)\]/, '[' + newIndex + ']');
                        element.setAttribute('name', newName);
                    }

                    // Adjust ID attribute
                    if (originalId) {
                        var newId = originalId.replace(/(\_\d+)/, '_' + newIndex);
                        element.setAttribute('id', newId);
                    }
                });

                // Adjust IDs for file sections (example for line1)
                var fileSections = newCard.querySelectorAll('.file-section');
                fileSections.forEach(function(fileSection) {
                    var originalId = fileSection.getAttribute('id');
                    if (originalId) {
                        var newId = originalId.replace(/(\_\d+)/, '_' + newIndex);
                        fileSection.setAttribute('id', newId);

                        // Update button onclick event
                        var section = originalId.replace(/^file_section_/, '');
                        var button = fileSection.querySelector('button');
                        if (button) {
                            button.setAttribute('onclick', "addFileInput('" + section + "')");
                        }
                    }
                });

                // Insert the new card in the step container
                stepContainers[stepContainers.length - 1].parentNode.insertBefore(newCard, stepContainers[stepContainers.length - 1].nextSibling);

                // Reset fileInputCounts for the new section
                var newSection = 'line' + indexPlus; // Adjust as per your section naming convention
                fileInputCounts[newSection] = 1;
            });
            var kesimpulanSelect = document.getElementById('kesimpulan');
            var textareaContainer = document.getElementById('textarea-container');

            kesimpulanSelect.addEventListener('change', function() {
                if (kesimpulanSelect.value === 'Tidak Dapat Dikerjakan Dengan Metode PDKB') {
                    textareaContainer.style.display = 'block';
                } else {
                    textareaContainer.style.display = 'none';
                }
            });
            kesimpulanSelect.dispatchEvent(new Event('change'));

            // Inisialisasi elemen dan variabel
            var form = document.getElementById("form-wizard");
            var steps = form.querySelectorAll(".step");
            var progressBar = document.querySelector('.progress-bar-wizard');
            var currentStep = 0;

            // Fungsi untuk menampilkan langkah tertentu dalam form wizard
            function showStep(step) {
                steps[currentStep].style.display = "none";
                steps[step].style.display = "block";
                currentStep = step;
                updateProgress();
            }

            // Fungsi untuk melanjutkan ke langkah berikutnya
            function nextStep() {
                if (currentStep < steps.length - 1) {
                    showStep(currentStep + 1);
                }
            }

            // Fungsi untuk kembali ke langkah sebelumnya
            function prevStep() {
                if (currentStep > 0) {
                    showStep(currentStep - 1);
                }
            }

            // Fungsi untuk memperbarui progress bar
            function updateProgress() {
                let progressPercent = (currentStep + 1) * (100 / steps.length);
                progressBar.style.width = `${progressPercent}%`;
            }

            var form = document.getElementById('form-wizard');
            // Menambahkan event listener untuk tombol "Next"
            form.querySelectorAll(".next-step").forEach(function(button) {
                button.addEventListener("click", async function() {
                    if (currentStep === 0) {
                        var inputsToValidate = [{
                                id: 'judul_laporan',
                                errorId: 'error_judul_laporan',
                                message: 'Harap isi Judul Laporan'
                            },
                            {
                                id: 'lokasi_pekerjaan',
                                errorId: 'error_lokasi_pekerjaan',
                                message: 'Harap isi Lokasi Pekerjaan'
                            },
                            {
                                id: 'mulai_pelaksanaan',
                                errorId: 'error_mulai_pelaksanaan',
                                message: 'Harap pilih Tanggal Mulai Pelaksanaan'
                            },
                            {
                                id: 'selesai_pelaksanaan',
                                errorId: 'error_selesai_pelaksanaan',
                                message: 'Harap pilih Tanggal Selesai Pelaksanaan'
                            },
                            {
                                id: 'kesimpulan',
                                errorId: 'error_kesimpulan',
                                message: 'Harap pilih Kesimpulan'
                            }
                        ];

                        var isValid = true;

                        inputsToValidate.forEach(function(input) {
                            var inputValue = document.getElementById(input.id).value;
                            var errorElement = document.getElementById(input.errorId);

                            if (!inputValue) {
                                showError(errorElement, input.message)
                                isValid = false;
                            } else {
                                hideError(errorElement)
                            }
                        });

                        var kesimpulanValue = document.getElementById('kesimpulan').value;
                        var alasanValue = document.getElementById('alasan').value;
                        if (kesimpulanValue === 'Tidak Dapat Dikerjakan Dengan Metode PDKB' && !alasanValue) {
                            showError(document.getElementById('error_alasan'), 'Harap isi Alasan');
                            isValid = false;
                        } else {
                            hideError(document.getElementById('error_alasan'));
                        }

                        if (isValid == false) {
                            return;
                        };

                    } else if (currentStep === 1) {
                        var index = document.querySelectorAll('.card-aspek-perencanaan').length - 1;

                        var inputsToValidate = [];

                        // Loop untuk menambahkan validasi sesuai dengan jumlah index
                        for (var i = 0; i <= index; i++) {
                            inputsToValidate.push({
                                id: 'jenis_anomali_' + i,
                                errorId: 'error_jenis_anomali_' + i,
                                message: 'Harap isi Jenis Anomali '
                            });
                            inputsToValidate.push({
                                id: 'material_' + i,
                                errorId: 'error_material_' + i,
                                message: 'Harap isi Material '
                            });
                            inputsToValidate.push({
                                id: 'metode_pekerjaan_' + i,
                                errorId: 'error_metode_pekerjaan_' + i,
                                message: 'Harap isi Metode Pekerjaan '
                            });
                            inputsToValidate.push({
                                id: 'keterangan_line_' + i,
                                errorId: 'error_keterangan_line_' + i,
                                message: 'Harap isi Keterangan Line '
                            });

                            // Validasi untuk checkbox aspek_perencanaan[i][titik_anomali][]
                            var titikAnomaliCheckboxes = document.querySelectorAll('input[name="aspek_perencanaan[' + i + '][titik_anomali][]"]:checked');
                            var titikAnomaliErrorElement = document.getElementById('error_metode_titik_anomali_' + i);

                            if (titikAnomaliCheckboxes.length === 0) {
                                showError(titikAnomaliErrorElement, 'Harap pilih minimal satu Titik Anomali <br><br>');
                                isValid = false; // tambahkan pengecekan isValid di sini jika diperlukan
                            } else {
                                var divIds = ['file_section_line1', 'file_section_line2', 'file_section_fasaR', 'file_section_fasaS'];

                                for (var j = 0; j < divIds.length; j++) {
                                    var divId = divIds[j];
                                    var fileInputsFile = document.querySelectorAll('#' + divId + '_' + i + ' input[type="file"]');
                                    var fileInputsText = document.querySelectorAll('#' + divId + '_' + i + ' input[type="text"]');
                                    if (fileInputsFile.length > 0) {
                                        fileInputsFile.forEach(function(input) {
                                            var maxFileSize = 5 * 1024 * 1024;
                                            foto = document.getElementById(input.id);
                                            if (foto.files.length === 0) {
                                                var imageError = document.querySelector('#' + input.id + '_error');
                                                imageAspekError(imageError, 'Pilih file gambar');
                                                isValid = false;
                                            } else if (foto.files[0].type.match('image.*') === false) {} else if (foto.files[0].size > maxFileSize) {
                                                var imageError = document.querySelector('#' + input.id + '_error');
                                                imageAspekError(imageError, 'File terlalu besar');
                                                isValid = false;
                                            } else {
                                                var imageError = document.querySelector('#' + input.id + '_error');
                                                hideError(imageError);
                                            }
                                            // Lakukan apa yang perlu dilakukan dengan masing-masing input file di sini
                                        });
                                    }
                                    if (fileInputsText.length > 0) {
                                        fileInputsText.forEach(function(input) {
                                            var maxFileSize = 5 * 1024 * 1024;
                                            foto = document.getElementById(input.id);
                                            if (!foto.value) {
                                                var imageError = document.querySelector('#' + input.id + '_error');
                                                imageAspekError(imageError, 'Harap isi teks');
                                                isValid = false;
                                            } else {
                                                var imageError = document.querySelector('#' + input.id + '_error');
                                                hideError(imageError);
                                            }
                                        });
                                    }
                                }
                                hideError(titikAnomaliErrorElement);
                            }
                        }

                        var isValid = true;

                        inputsToValidate.forEach(function(input) {
                            var inputValue = document.getElementById(input.id).value;
                            var errorElement = document.getElementById(input.errorId);

                            if (!inputValue) {
                                showError(errorElement, input.message);
                                isValid = false;
                            } else {
                                hideError(errorElement);
                            }
                        });

                        if (!isValid) {
                            return;
                        }

                    } else if (currentStep === 2) {
                        var inputsToValidate = [{
                                id: 'jumlah_personil_pdkb',
                                errorId: 'error_jumlah_personil_pdkb',
                                message: 'Harap isi Jumlah Personil PDKB'
                            },
                            {
                                id: 'jumlah_tenaga_bantuan',
                                errorId: 'error_jumlah_tenaga_bantuan',
                                message: 'Harap isi Jumlah Tenaga Bantuan'
                            },
                            {
                                id: 'jumlah_driver',
                                errorId: 'error_jumlah_driver',
                                message: 'Harap isi Jumlah driver'
                            },
                            {
                                id: 'kendaraan_kerja',
                                errorId: 'error_kendaraan_kerja',
                                message: 'Harap isi Kendaraan Kerja'
                            },
                            {
                                id: 'layanan_kesehatan_terdekat',
                                errorId: 'error_layanan_kesehatan_terdekat',
                                message: 'Harap isi Layanan Kesehatan Terdekat'
                            }
                        ];

                        var isValid = true;

                        inputsToValidate.forEach(function(input) {
                            var inputValue = document.getElementById(input.id).value;
                            var errorElement = document.getElementById(input.errorId);

                            if (!inputValue) {
                                showError(errorElement, input.message)
                                isValid = false;
                            } else {
                                hideError(errorElement)
                            }
                        });

                        if (isValid == false) {
                            return;
                        };
                    } else if (currentStep === 3) {
                        var inputsToValidate = [{
                                id: 'alamat_tower',
                                errorId: 'error_alamat_tower',
                                message: 'Harap isi Alamat Tower'
                            },
                            {
                                id: 'akses_menuju_tower',
                                errorId: 'error_akses_menuju_tower',
                                message: 'Harap isi Akses Menuju Tower'
                            },
                            {
                                id: 'halaman_tower',
                                errorId: 'error_halaman_tower',
                                message: 'Harap isi Halaman Tower'
                            },
                            {
                                id: 'kondisi_lingkungan',
                                errorId: 'error_kondisi_lingkungan',
                                message: 'Harap isi Kondisi Lingkungan'
                            },
                            {
                                id: 'catatan_kondisi_lingkungan',
                                errorId: 'error_catatan_kondisi_lingkungan',
                                message: 'Harap isi Catatan Kondisi Lingkungan'
                            },
                            {
                                id: 'potensi_hewan',
                                errorId: 'error_potensi_hewan',
                                message: 'Harap isi Potensi Hewan'
                            },

                        ];

                        var fotoToValidate = [{
                                id: 'foto_akses_menuju_tower',
                                errorId: 'error_foto_akses_menuju_tower',
                                message: 'Harap masukkan Foto Menuju Tower'
                            },
                            {
                                id: 'foto_halaman_tower',
                                errorId: 'error_foto_halaman_tower',
                                message: 'Harap masukkan Foto Halaman Tower'
                            }
                        ]

                        var isValid = true;
                        var maxFileSize = 5 * 1024 * 1024;

                        inputsToValidate.forEach(function(input) {
                            var inputValue = document.getElementById(input.id).value;
                            var errorElement = document.getElementById(input.errorId);

                            if (!inputValue) {
                                showError(errorElement, input.message)
                                isValid = false;
                            } else {
                                hideError(errorElement)
                            }
                        });

                        fotoToValidate.forEach(function(input) {
                            var foto = document.getElementById(input.id);
                            var errorElement = document.getElementById(input.errorId);

                            if (foto.files.length === 0) {
                                showError(errorElement, input.message)
                                isValid = false;
                            } else if (foto.files[0].size > maxFileSize) {
                                showError(errorElement, 'Ukuran file tidak boleh lebih dari 5MB');
                                isValid = false;
                            } else {
                                hideError(errorElement)
                            }
                        });

                        if (isValid == false) {
                            return;
                        };
                    } else if (currentStep === 4) {
                        var inputsToValidate = [{
                                id: 'jenis_tower',
                                errorId: 'error_jenis_tower',
                                message: 'Harap isi Jenis Tower'
                            },
                            {
                                id: 'type_tower',
                                errorId: 'error_type_tower',
                                message: 'Harap isi Type Tower'
                            },
                            {
                                id: 'jenis_stringset_isolator',
                                errorId: 'error_jenis_stringset_isolator',
                                message: 'Harap isi Jenis Stringset Isolator'
                            },
                            {
                                id: 'panjang_stringset_isolator',
                                errorId: 'error_panjang_stringset_isolator',
                                message: 'Harap isi Panjang Stringset Isolator'
                            },
                            {
                                id: 'posisi_pin',
                                errorId: 'error_posisi_pin',
                                message: 'Harap isi Posisi Pin'
                            },
                            {
                                id: 'jumlah_konduktor',
                                errorId: 'error_jumlah_konduktor',
                                message: 'Harap isi Jumlah Konduktor'
                            },
                            {
                                id: 'jenis_konduktor',
                                errorId: 'error_jenis_konduktor',
                                message: 'Harap isi Jenis Konduktor'
                            },
                            {
                                id: 'jarak_span',
                                errorId: 'error_jarak_span',
                                message: 'Harap isi Jarak Span'
                            },
                            {
                                id: 'kondisi_stepbolt',
                                errorId: 'error_kondisi_stepbolt',
                                message: 'Harap isi Kondisi Stepbolt'
                            },
                            {
                                id: 'panjang_traves',
                                errorId: 'error_panjang_traves',
                                message: 'Harap isi Panjang Traves'
                            },
                            {
                                id: 'lebar_traves',
                                errorId: 'error_lebar_traves',
                                message: 'Harap isi Lebar Traves'
                            },
                            {
                                id: 'jarak_antar_traves',
                                errorId: 'error_jarak_antar_traves',
                                message: 'Harap isi Jarak Antar Traves'
                            },

                        ];

                        var fotoToValidate = [{
                                id: 'foto_type_tower',
                                errorId: 'error_foto_type_tower',
                                message: 'Harap masukkan Foto Type Tower'
                            },
                            {
                                id: 'foto_jenis_stringset_isolator',
                                errorId: 'error_foto_jenis_stringset_isolator',
                                message: 'Harap masukkan Foto Jenis Stringset Isolator'
                            },
                        ]

                        var isValid = true;
                        var maxFileSize = 5 * 1024 * 1024;

                        inputsToValidate.forEach(function(input) {
                            var inputValue = document.getElementById(input.id).value;
                            var errorElement = document.getElementById(input.errorId);

                            if (!inputValue) {
                                showError(errorElement, input.message)
                                isValid = false;
                            } else {
                                hideError(errorElement)
                            }
                        });

                        fotoToValidate.forEach(function(input) {
                            var foto = document.getElementById(input.id);
                            var errorElement = document.getElementById(input.errorId);

                            if (foto.files.length === 0) {
                                showError(errorElement, input.message)
                                isValid = false;
                            } else if (foto.files[0].size > maxFileSize) {
                                showError(errorElement, 'Ukuran file tidak boleh lebih dari 5MB');
                                isValid = false;
                            } else {
                                hideError(errorElement)
                            }
                        });

                        if (isValid == false) {
                            return;
                        };
                    }
                    nextStep();
                });
            });

            form.addEventListener("submit", function(event) {
                if (currentStep === 5) {
                    var inputsToValidate = [{
                            id: 'sop',
                            errorId: 'error_sop',
                            message: 'Harap isi SOP'
                        },
                        {
                            id: 'ik',
                            errorId: 'error_ik',
                            message: 'Harap isi IK'
                        }
                    ];

                    var isValid = true;

                    inputsToValidate.forEach(function(input) {
                        var inputValue = document.getElementById(input.id).value;
                        var errorElement = document.getElementById(input.errorId);

                        if (!inputValue) {
                            showError(errorElement, input.message);
                            isValid = false;
                        } else {
                            hideError(errorElement);
                        }
                    });

                    if (!isValid) {
                        event.preventDefault(); // Menghentikan submit form jika validasi gagal
                        return;
                    }
                }
            });

            // Menambahkan event listener untuk tombol "Previous"
            form.querySelectorAll(".prev-step").forEach(function(button) {
                button.addEventListener("click", prevStep);
            });

            // Menampilkan langkah pertama saat halaman dimuat
            showStep(currentStep);
        });
    </script>