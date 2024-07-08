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
                            <label for="kesimpulan" class="form-control-label">Kesimpulan</label>
                            <select class="form-select" aria-label="Default select example" name="kesimpulan" id="kesimpulan">
                                <option value="" selected disabled>Pilih Kesimpulan</option>
                                <option value="Dapat Dikerjakan Dengan Metode PDKB" <?php echo set_select('kesimpulan', "Dapat Dikerjakan Dengan Metode PDKB"); ?>>Dapat Dikerjakan Dengan Metode PDKB</option>
                                <option value="Tidak Dapat Dikerjakan Dengan Metode PDKB" <?php echo set_select('kesimpulan', "Tidak Dapat Dikerjakan Dengan Metode PDKB"); ?>>Tidak Dapat Dikerjakan Dengan Metode PDKB</option>
                            </select>
                            <?= form_error('kesimpulan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                        </div>

                        <hr class="bg-dark my-4">
                        <h4 class="text-center mb-4">Hasil Temuan JSA</h4>

                        <div class="card bg-light mb-5">
                            <div class="card-body">
                                <h6 class="card-title">Aspek Perencanaan</h6>
                                <hr class="bg-dark mb-4">
                                <div class="form-group">
                                    <label for="jenis_anomali" class="form-control-label">Jenis Anomali</label>
                                    <input class="form-control" type="text" placeholder="Jenis Anomali" id="jenis_anomali" name="jenis_anomali" value="<?php echo set_value('jenis_anomali'); ?>">
                                    <?= form_error('jenis_anomali', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="material" class="form-control-label">Material</label>
                                    <input class="form-control" type="text" placeholder="Material" id="material" name="material" value="<?php echo set_value('material'); ?>">
                                    <?= form_error('material', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="metode_pekerjaan" class="form-control-label">Metode Pekerjaan</label>
                                    <input class="form-control" type="text" placeholder="Metode Pekerjaan" id="metode_pekerjaan" name="metode_pekerjaan" value="<?php echo set_value('metode_pekerjaan'); ?>">
                                    <?= form_error('metode_pekerjaan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="titik_anomali" class="form-control-label">Titik Anomali</label>
                                    <select class="form-select" aria-label="Default select example" name="titik_anomali" id="titik_anomali">
                                        <option value="" selected disabled>Pilih Titik Anomali</option>
                                        <option value="Line 1" <?php echo set_select('titik_anomali', "Line 1"); ?>>Line 1</option>
                                        <option value="Line 2" <?php echo set_select('titik_anomali', "Line 2"); ?>>Line 2</option>
                                        <option value="Fasa R" <?php echo set_select('titik_anomali', "Fasa R"); ?>>Fasa R</option>
                                        <option value="Fasa S" <?php echo set_select('titik_anomali', "Fasa S"); ?>>Fasa S</option>
                                        <option value="Fasa T" <?php echo set_select('titik_anomali', "Fasa T"); ?>>Fasa T</option>
                                        <option value="GSW" <?php echo set_select('titik_anomali', "GSW"); ?>>GSW</option>
                                    </select>
                                    <?= form_error('titik_anomali', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="keterangan_line" class="form-control-label">Keterangan Line</label>
                                            <textarea class="form-control" placeholder="Keterangan Line" id="keterangan_line" name="keterangan_line" rows="3"><?php echo set_value('keterangan_line'); ?></textarea>
                                            <?= form_error('keterangan_line', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="foto_aspek_perencanaan" class="form-control-label">Foto <em>(maksimal ukuran file 5MB)</em></label>
                                            <input class="form-control" type="file" name="foto_aspek_perencanaan" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card bg-light mb-5">
                            <div class="card-body">
                                <h6 class="card-title">Aspek SDM</h6>
                                <hr class="bg-dark mb-4">
                                <div class="form-group">
                                    <label for="jumlah_personil_pdkb" class="form-control-label">Jumlah Personil PDKB</label>
                                    <input class="form-control" type="number" min="0" id="jumlah_personil_pdkb" name="jumlah_personil_pdkb" value="<?php echo set_value('jumlah_personil_pdkb'); ?>">
                                    <?= form_error('jumlah_personil_pdkb', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_tenaga_bantuan" class="form-control-label">Jumlah Tenaga Bantuan</label>
                                    <input class="form-control" type="number" min="0" id="jumlah_tenaga_bantuan" name="jumlah_tenaga_bantuan" value="<?php echo set_value('jumlah_tenaga_bantuan'); ?>">
                                    <?= form_error('jumlah_tenaga_bantuan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_driver" class="form-control-label">Jumlah Driver</label>
                                    <input class="form-control" type="number" min="0" id="jumlah_driver" name="jumlah_driver" value="<?php echo set_value('jumlah_driver'); ?>">
                                    <?= form_error('jumlah_driver', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="kendaraan_kerja" class="form-control-label">Kendaraan Kerja</label>
                                    <input class="form-control" type="text" placeholder="Kendaraan Kerja" id="kendaraan_kerja" name="kendaraan_kerja" value="<?php echo set_value('kendaraan_kerja'); ?>">
                                    <?= form_error('kendaraan_kerja', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="layanan_kesehatan_terdekat" class="form-control-label">Layanan Kesehatan Terdekat</label>
                                    <input class="form-control" type="text" placeholder="Layanan Kesehatan Terdekat" id="layanan_kesehatan_terdekat" name="layanan_kesehatan_terdekat" value="<?php echo set_value('layanan_kesehatan_terdekat'); ?>">
                                    <?= form_error('layanan_kesehatan_terdekat', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-light mb-5">
                            <div class="card-body">
                                <h6 class="card-title">Aspek Lingkungan</h6>
                                <hr class="bg-dark mb-4">
                                <div class="form-group">
                                    <label for="alamat_tower" class="form-control-label">Alamat Tower</label>
                                    <input class="form-control" type="text" placeholder="Alamat Tower" id="alamat_tower" name="alamat_tower" value="<?php echo set_value('alamat_tower'); ?>">
                                    <?= form_error('alamat_tower', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="akses_menuju_tower" class="form-control-label">Akses Menuju Tower</label>
                                            <input class="form-control" type="text" placeholder="Akses Menuju Tower" id="akses_menuju_tower" name="akses_menuju_tower" value="<?php echo set_value('akses_menuju_tower'); ?>">
                                            <?= form_error('akses_menuju_tower', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="foto_aspek_lingkungan_1" class="form-control-label">Foto <em>(maksimal ukuran file 5MB)</em></label>
                                            <input class="form-control" type="file" name="foto_aspek_lingkungan_1" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="halaman_tower" class="form-control-label">Halaman Tower</label>
                                            <input class="form-control" type="text" placeholder="Halaman Tower" id="halaman_tower" name="halaman_tower" value="<?php echo set_value('halaman_tower'); ?>">
                                            <?= form_error('halaman_tower', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="foto_aspek_lingkungan_2" class="form-control-label">Foto <em>(maksimal ukuran file 5MB)</em></label>
                                            <input class="form-control" type="file" name="foto_aspek_lingkungan_2" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kondisi_lingkungan" class="form-control-label">Kondisi Lingkungan</label>
                                    <select class="form-select" aria-label="Default select example" name="kondisi_lingkungan" id="kondisi_lingkungan">
                                        <option value="" selected disabled>Pilih Kondisi Lingkungan</option>
                                        <option value="Aman" <?php echo set_select('kondisi_lingkungan', "Aman"); ?>>Aman</option>
                                        <option value="Tidak Aman" <?php echo set_select('kondisi_lingkungan', "Tidak Aman"); ?>>Tidak Aman</option>
                                    </select>
                                    <?= form_error('kondisi_lingkungan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="potensi_hewan" class="form-control-label">Potensi Hewan</label>
                                            <input class="form-control" type="text" placeholder="Potensi Hewan" id="potensi_hewan" name="potensi_hewan" value="<?php echo set_value('potensi_hewan'); ?>">
                                            <?= form_error('potensi_hewan', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="foto_aspek_lingkungan_3" class="form-control-label">Foto <em>(maksimal ukuran file 5MB)</em></label>
                                            <input class="form-control" type="file" name="foto_aspek_lingkungan_3" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card bg-light mb-5">
                            <div class="card-body">
                                <h6 class="card-title">Aspek Kontruksi</h6>
                                <hr class="bg-dark mb-4">
                                <div class="form-group">
                                    <label for="jenis_tower" class="form-control-label">Jenis Tower</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_tower" id="jenis_tower">
                                        <option value="" selected disabled>Pilih Jenis Tower</option>
                                        <option value="Lattice Tower" <?php echo set_select('jenis_tower', "Lattice Tower"); ?>>Lattice Tower</option>
                                        <option value="Concreate Pole Tower" <?php echo set_select('jenis_tower', "Concreate Pole Tower"); ?>>Concreate Pole Tower</option>
                                        <option value="Tubular Steel Tower" <?php echo set_select('jenis_tower', "Tubular Steel Tower"); ?>>Tubular Steel Tower</option>
                                        <option value="Multi Tower" <?php echo set_select('jenis_tower', "Multi Tower"); ?>>Multi Tower</option>
                                    </select>
                                    <?= form_error('jenis_tower', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="type_tower" class="form-control-label">Type Tower</label>
                                            <input class="form-control" type="text" placeholder="Type Tower" id="type_tower" name="type_tower" value="<?php echo set_value('type_tower'); ?>">
                                            <?= form_error('type_tower', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="foto_aspek_kontruksi_1" class="form-control-label">Foto <em>(maksimal ukuran file 5MB)</em></label>
                                            <input class="form-control" type="file" name="foto_aspek_kontruksi_1" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="jenis_stringset_isolator" class="form-control-label">Jenis Stringset Isolator</label>
                                            <select class="form-select" aria-label="Default select example" name="jenis_stringset_isolator" id="jenis_stringset_isolator">
                                                <option value="" selected disabled>Pilih Jenis Stringset Isolator</option>
                                                <option value="Porselen Single" <?php echo set_select('jenis_stringset_isolator', "Porselen Single"); ?>>Porselen Single</option>
                                                <option value="Porselen Double" <?php echo set_select('jenis_stringset_isolator', "Porselen Double"); ?>>Porselen Double</option>
                                                <option value="Kaca Single" <?php echo set_select('jenis_stringset_isolator', "Kaca Single"); ?>>Kaca Single</option>
                                                <option value="Kaca Double" <?php echo set_select('jenis_stringset_isolator', "Kaca Double"); ?>>Kaca Double</option>
                                                <option value="Polimer Single" <?php echo set_select('jenis_stringset_isolator', "Polimer Single"); ?>>Polimer Single</option>
                                                <option value="Polimer Double" <?php echo set_select('jenis_stringset_isolator', "Polimer Double"); ?>>Polimer Double</option>
                                            </select>
                                            <?= form_error('jenis_stringset_isolator', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="foto_aspek_kontruksi_2" class="form-control-label">Foto <em>(maksimal ukuran file 5MB)</em></label>
                                            <input class="form-control" type="file" name="foto_aspek_kontruksi_2" accept=".jpg, jpeg, .png" required oninvalid="this.setCustomValidity('Harap Masukkan File Lampiran')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="panjang_stringset_isolator" class="form-control-label">Panjang Stringset Isolator</label>
                                    <input class="form-control" type="text" placeholder="Panjang Stringset Isolator" id="panjang_stringset_isolator" name="panjang_stringset_isolator" value="<?php echo set_value('panjang_stringset_isolator'); ?>">
                                    <?= form_error('panjang_stringset_isolator', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="posisi_pin" class="form-control-label">Jenis Posisi Pin</label>
                                    <select class="form-select" aria-label="Default select example" name="posisi_pin" id="posisi_pin">
                                        <option value="" selected disabled>Pilih Jenis Posisi Pin</option>
                                        <option value="Dalam" <?php echo set_select('posisi_pin', "Dalam"); ?>>Dalam</option>
                                        <option value="Luar" <?php echo set_select('posisi_pin', "Luar"); ?>>Luar</option>
                                        <option value="Kiri" <?php echo set_select('posisi_pin', "Kiri"); ?>>Kiri</option>
                                        <option value="Kanan" <?php echo set_select('posisi_pin', "Kanan"); ?>>Kanan</option>
                                    </select>
                                    <?= form_error('posisi_pin', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_konduktor" class="form-control-label">Jenis Jumlah Konduktor</label>
                                    <select class="form-select" aria-label="Default select example" name="jumlah_konduktor" id="jumlah_konduktor">
                                        <option value="" selected disabled>Pilih Jenis Jumlah Konduktor</option>
                                        <option value="Single Konduktor" <?php echo set_select('jumlah_konduktor', "Single Konduktor"); ?>>Single Konduktor</option>
                                        <option value="Double Konduktor" <?php echo set_select('jumlah_konduktor', "Double Konduktor"); ?>>Double Konduktor</option>
                                    </select>
                                    <?= form_error('jumlah_konduktor', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_konduktor" class="form-control-label">Jenis Konduktor</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_konduktor" id="jenis_konduktor">
                                        <option value="" selected disabled>Pilih Jenis Konduktor</option>
                                        <option value="ACSR 240mm" <?php echo set_select('jenis_konduktor', "ACSR 240mm"); ?>>ACSR 240mm</option>
                                        <option value="TACSR 450mm" <?php echo set_select('jenis_konduktor', "TACSR 450mm"); ?>>TACSR 450mm</option>
                                        <option value="ACCC 380mm" <?php echo set_select('jenis_konduktor', "ACCC 380mm"); ?>>ACCC 380mm</option>
                                        <option value="ACFR 240mm" <?php echo set_select('jenis_konduktor', "ACFR 240mm"); ?>>ACFR 240mm</option>
                                    </select>
                                    <?= form_error('jenis_konduktor', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="jarak_span" class="form-control-label">Jarak Span</label>
                                    <input class="form-control" type="text" placeholder="Jarak Span" id="jarak_span" name="jarak_span" value="<?php echo set_value('jarak_span'); ?>">
                                    <?= form_error('jarak_span', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="kondisi_stepbolt" class="form-control-label">Kondisi Stepbolt</label>
                                    <select class="form-select" aria-label="Default select example" name="kondisi_stepbolt" id="kondisi_stepbolt">
                                        <option value="" selected disabled>Pilih Kondisi Stepbolt</option>
                                        <option value="Lengkap" <?php echo set_select('kondisi_stepbolt', "Lengkap"); ?>>Lengkap</option>
                                        <option value="Tidak Lengkap" <?php echo set_select('kondisi_stepbolt', "Tidak Lengkap"); ?>>Tidak Lengkap</option>
                                    </select>
                                    <?= form_error('kondisi_stepbolt', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="panjang_traves" class="form-control-label">Panjang Traves</label>
                                    <input class="form-control" type="text" placeholder="Panjang Traves" id="panjang_traves" name="panjang_traves" value="<?php echo set_value('panjang_traves'); ?>">
                                    <?= form_error('panjang_traves', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="lebar_traves" class="form-control-label">Lebar Traves</label>
                                            <input class="form-control" type="text" placeholder="Lebar Traves" id="lebar_traves" name="lebar_traves" value="<?php echo set_value('lebar_traves'); ?>">
                                            <?= form_error('lebar_traves', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jarak_antar_traves" class="form-control-label">Jarak Antar Traves</label>
                                            <input class="form-control" type="text" placeholder="Jarak Antar Traves" id="jarak_antar_traves" name="jarak_antar_traves" value="<?php echo set_value('jarak_antar_traves'); ?>">
                                            <?= form_error('jarak_antar_traves', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Aspek Pelaksanaan</h6>
                                <hr class="bg-dark mb-4">

                                <div class="form-group">
                                    <label for="sop" class="form-control-label">SOP PDKB</label>
                                    <select class="form-select" aria-label="Default select example" name="sop" id="sop">
                                        <option value="" selected disabled>Pilih SOP PDKB</option>
                                        <option value="SOP 1" <?php echo set_select('sop', "SOP 1"); ?>>SOP 1</option>
                                        <option value="SOP 2" <?php echo set_select('sop', "SOP 2"); ?>>SOP 2</option>
                                    </select>
                                    <?= form_error('sop', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="ik" class="form-control-label">IK PDKB</label>
                                    <select class="form-select" aria-label="Default select example" name="ik" id="ik">
                                        <option value="" selected disabled>Pilih IK PDKB</option>
                                        <option value="IK 1" <?php echo set_select('ik', "IK 1"); ?>>IK 1</option>
                                        <option value="IK 2" <?php echo set_select('ik', "IK 2"); ?>>IK 2</option>
                                    </select>
                                    <?= form_error('ik', '<p style="font-size: 12px;color: red;" class="my-2">', '</p>'); ?>
                                </div>

                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <a href=" <?= base_url() ?>admin/jsa" class="btn btn-primary" type="button">Kembali</a>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>