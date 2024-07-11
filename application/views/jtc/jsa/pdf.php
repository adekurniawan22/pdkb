<!DOCTYPE html>
<html>

<head>
    <style>
        .table-content {
            width: 100%;
            padding: 10px;
        }

        .table-content th,
        .table-content td {
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .signature {
            margin-top: 30px;
            float: right;
            padding-top: 10px;
            text-align: center;
            page-break-inside: avoid;
        }

        .table-sampul {
            /* border: 0px;
            border-collapse: collapse; */
            width: 100%;
        }

        .table-sampul td,
        .table-sampul th {
            /* border: 1px solid black; */
            padding: 8px;
        }

        .table-hasil-jsa {
            border-collapse: collapse;
            width: 100%;
        }


        .table-hasil-jsa th {
            border: 1px solid black;
            padding: 8px;
            vertical-align: top;
            text-align: left;
        }

        .table-hasil-jsa td {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            padding: 8px;
            vertical-align: top;
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }

        .fixed-element {
            position: relative;
            /* Ubah posisi menjadi relative */
            height: 50px;
            /* Sesuaikan tinggi elemen sesuai kebutuhan */
            text-align: center;
            line-height: 50px;
        }

        .header {
            font-size: 12px;
        }

        .header-table {
            font-size: 15px;
            font-weight: bold;
        }

        .photo {
            display: inline;
            text-align: center;
            width: 200px;
            margin: 15px
        }

        .container {
            margin: 10px;
            padding: 5px;
        }

        .img-sampul {
            position: absolute;
            width: 115%;
            top: -50px;
            bottom: -50px;
            left: -50px;
            right: -50px;
        }

        .img-orang {
            position: absolute;
            top: 360px;
            right: -180px;
            width: 90%;
            object-fit: cover;
            border-top-right-radius: 60%;
        }

        .img-sampul-pln {
            width: 55px;
            position: absolute;
            right: 0px;
            top: -45px;
        }
    </style>
    <title>PDF Laporan JSA</title>
</head>

<body>
    <?php if (!empty($query)) { ?>
        <div>
            <img src="<?= base_url('assets/img/sampul_pdf_jsa.png') ?>" class="img-sampul">
        </div>

        <div>
            <img src="<?= base_url('assets/img/orang_jsa.jpg') ?>" class="img-orang">
        </div>

        <div>
            <img src="<?= base_url('assets/img/logo_pln.png') ?>" class="img-sampul-pln">
        </div>

        <div>
            <span style="position: absolute; top:-20px;left:50px;font-size:18px;font-weight:bold;">PT. PLN (PERSERO) UPT BALIKPAPAN BIDANG PDKB</span>
        </div>
        <div class="container mt-5">
            <?php
            $detail_data = json_decode($query->detail, true);;
            ?>

            <!-- SAMPUL -->
            <table class="table-sampul">
                <tr>
                    <th style="text-align: center;">
                        <br>
                        <br>
                        <div style="line-height: 1.3;">
                            <span style="font-size: 52px; font-family: 'Arial', sans-serif;">Berita Acara</span><br>
                            <span style="font-size: 44px; color:#246A96; font-family: sans-serif; letter-spacing: 3px; font-weight:normal">Job Safety Analysis</span><br><br>
                            <span style="font-size: 22px; font-family: sans-serif;"><?= $detail_data['judul_laporan'] ?></span>
                        </div>
                    </th>
                </tr>
            </table>
            <!-- END SAMPUL -->

            <div class=" page-break">
            </div>

            <!-- HEADER -->
            <table class="table-header" style="background-color: white; color: black; border: 0px !important">
                <tr>
                    <td style="margin: 0px !important;">
                        <img src="<?= base_url('assets/img/logo_pln.png') ?>" style="width: 40px;">
                    </td>
                    <td style="padding-left:20px; text-align:left">
                        <span class="header"><b>PT PLN (PERSERO) UNIT INDUK PENYALURAN DAN PUSAT PENGATUR BEBAN KALIMANTAN</b></span>
                        <span class="header" style="padding: 0px; margin-top:10px; display: inline-block"><b>UNIT PELAKSANA TRANSMISI BALIKPAPAN</b></span>
                    </td>
                </tr>
            </table>
            <!-- END HEADER -->
            <div style="margin-bottom: 40px;"></div>

            <table class="table-content">
                <tr>
                    <td style="text-align: center;">
                        <span class="header-table">LAPORAN PELAKSANAAN PEKERJAAN</span>
                    </td>
                </tr>
            </table>
            <br>
            <table class="table-content">
                <!-- ISI -->
                <tr>
                    <td style="width: 5px">
                        <span class="header-table">I.</span>
                    </td>
                    <td style="width: 5px;"></td>
                    <td>
                        <span class="header-table">LOKASI PEKERJAAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $detail_data['lokasi_pekerjaan'] ?></td>
                </tr>

                <!-- ISI -->
                <tr>
                    <td style="width: 5px">
                        <span class="header-table">II.</span>
                    </td>
                    <td style="width: 5px;"></td>
                    <td>
                        <span class="header-table">WAKTU PELAKSANAAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                        // Array untuk mapping nama bulan Inggris ke Bahasa Indonesia
                        $bulan = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember'
                        ];

                        // Mengambil tanggal mulai dan selesai dari $detail_data
                        $tanggal_mulai = date('d', strtotime($detail_data['mulai_pelaksanaan'])) . ' ' . $bulan[date('F', strtotime($detail_data['mulai_pelaksanaan']))] . ' ' . date('Y', strtotime($detail_data['mulai_pelaksanaan']));
                        $tanggal_selesai = date('d', strtotime($detail_data['selesai_pelaksanaan'])) . ' ' . $bulan[date('F', strtotime($detail_data['selesai_pelaksanaan']))] . ' ' . date('Y', strtotime($detail_data['selesai_pelaksanaan']));

                        // Menampilkan rentang tanggal
                        echo $tanggal_mulai . ' - ' . $tanggal_selesai;
                        ?>
                    </td>
                </tr>

                <!-- ISI -->
                <tr>
                    <td style="width: 5px">
                        <span class="header-table">III.</span>
                    </td>
                    <td style="width: 5px;"></td>
                    <td>
                        <span class="header-table">LINGKUP PEKERJAAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        - Aspek Perencanaan <br>
                        - Aspek SDM <br>
                        - Aspek Lingkungan <br>
                        - Aspek Konstruksi <br>
                        - Aspek Pelaksanaan
                    </td>
                </tr>

                <!-- ISI -->
                <tr>
                    <td style="width: 5px">
                        <span class="header-table">IV.</span>
                    </td>
                    <td style="width: 5px;"></td>
                    <td>
                        <span class="header-table">KESIMPULAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                        if ($detail_data['alasan'] == null) {
                            echo $detail_data['kesimpulan'];
                        } else {
                            echo $detail_data['kesimpulan'];
                            echo '<br>Catatan: ' . $detail_data['alasan'];
                        }
                        ?>
                </tr>
            </table>

            <div class="signature">
                <div style="margin-bottom: 10px;">Balikpapan, <?= $tanggal_sekarang ?></div>
                <?php if ($atasan) : ?>
                    <div style="margin-bottom: 10px; text-align: center;">
                        <b><?= $atasan->nama_jabatan ?></b>
                    </div>
                    <div>
                        <img width="200px" src="<?= base_url() ?>assets/img/tanda-tangan/<?= $atasan->tanda_tangan ?>" alt="" style="margin-top: 20px;">
                    </div>
                    <b><?= $atasan->nama ?></b>
                <?php else : ?>
                    <div style="margin-bottom: 120px; text-align: center;">
                        <b>Atasan</b>
                    </div>
                    <b>Nama Atasan</b>
                <?php endif ?>
            </div>

            <div class="page-break"></div>

            <!-- HEADER -->
            <table class="table-header" style="background-color: white; color: black; border: 0px !important">
                <tr>
                    <td style="margin: 0px !important;">
                        <img src="<?= base_url('assets/img/logo_pln.png') ?>" style="width: 40px;">
                    </td>
                    <td style="padding-left:20px; text-align:left">
                        <span class="header"><b>PT PLN (PERSERO) UNIT INDUK PENYALURAN DAN PUSAT PENGATUR BEBAN KALIMANTAN</b></span>
                        <span class="header" style="padding: 0px; margin-top:10px; display: inline-block"><b>UNIT PELAKSANA TRANSMISI BALIKPAPAN</b></span>
                    </td>
                </tr>
            </table>
            <!-- END HEADER -->
            <div style="margin-bottom: 40px;"></div>

            <table class="table-content">
                <tr>
                    <td style="text-align: center;">
                        <span class="header-table">HASIL TEMUAN JSA</span>
                    </td>
                </tr>
            </table>
            <br>

            <!-- ASPEK PERENCANAAN -->
            <?php foreach ($detail_data['aspek_perencanaan'] as $index => $detail) { ?>
                <table class="table-hasil-jsa">
                    <tr>
                        <td style="text-align: center; background-color: yellow" colspan="3">
                            ASPEK PERENCANAAN <?php echo $index + 1 ?>
                        </td>
                    </tr>
                    <?php
                    // Inisialisasi nomor
                    $nomor = 1;
                    ?>
                    <tr>
                        <td style="width: 5%; text-align:center"><?php echo $nomor++; ?></td>
                        <td style="width: 25%;">Jenis Anomali</td>
                        <td><?= $detail['jenis_anomali'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 5%; text-align:center"><?php echo $nomor++; ?></td>
                        <td style="width: 25%;">Material</td>
                        <td><?= $detail['material'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 5%; text-align:center"><?php echo $nomor++; ?></td>
                        <td style="width: 25%;">Metode Pekerjaan</td>
                        <td><?= $detail['metode_pekerjaan'] ?></td>
                    </tr>
                    <?php foreach ($detail['titik_anomali'] as $subIndex => $data) { ?>
                        <tr>
                            <td style="width: 5%; text-align:center"><?php echo $nomor++; ?></td>
                            <td style="width: 25%;">
                                <?php
                                $mapping = [
                                    "line1" => "Line 1",
                                    "line2" => "Line 2",
                                    "fasaR" => "Fasa R",
                                    "fasaS" => "Fasa S",
                                    "fasaT" => "Fasa T",
                                    "gsw"   => "GSW",
                                ];

                                echo "Titik Anomali " . ($mapping[$data] ?? "Tidak ketahui");
                                ?>
                            </td>
                            <td>
                                <?php foreach ($detail['foto'][$subIndex] as $data) : ?>
                                    <img src="<?= base_url('assets/img/jsa/' . $data) ?>" height="150px">
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td style="width: 5%; text-align:center"><?php echo $nomor++; ?></td>
                        <td style="width: 25%;">Keterangan Line</td>
                        <td><?= $detail['keterangan_line'] ?></td>
                    </tr>
                </table>
                <br>
                <br>
            <?php } ?>

            <!-- ASPEK SDM -->
            <table class="table-hasil-jsa">
                <tr>
                    <td style="text-align: center; background-color: yellow" colspan="3">
                        ASPEK SDM
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">1</td>
                    <td style="width: 25%;">Jumlah Personil PDKB</td>
                    <td><?= $detail_data['aspek_sdm']['jumlah_personil_pdkb'] ?> Orang</td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">2</td>
                    <td style="width: 25%;">Jumlah Tenaga Bantuan</td>
                    <td><?= $detail_data['aspek_sdm']['jumlah_tenaga_bantuan'] ?> Orang</td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">3</td>
                    <td style="width: 25%;">Jumlah Driver</td>
                    <td><?= $detail_data['aspek_sdm']['jumlah_driver'] ?> Orang</td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">4</td>
                    <td style="width: 25%;">Kendaraan Kerja</td>
                    <td><?= $detail_data['aspek_sdm']['kendaraan_kerja'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">5</td>
                    <td style="width: 25%;">Layanan Kesehatan Terdekat</td>
                    <td><?= $detail_data['aspek_sdm']['layanan_kesehatan_terdekat'] ?></td>
                </tr>
            </table>
            <br>
            <br>

            <!-- ASPEK LINGKUNGAN -->
            <table class="table-hasil-jsa">
                <tr>
                    <td style="text-align: center; background-color: yellow" colspan="3">
                        ASPEK LINGKUNGAN
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">1</td>
                    <td style="width: 25%;">Alamat Tower</td>
                    <td><?= $detail_data['aspek_lingkungan']['alamat_tower'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">2</td>
                    <td style="width: 25%;">Akses Menuju Tower</td>
                    <td>
                        <?= $detail_data['aspek_lingkungan']['akses_menuju_tower'] ?><br>
                        Berikut foto dari akses menuju tower : <br>
                        <img style="margin-top: 10px;" width="400px" src="<?= base_url('assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_akses_menuju_tower']) ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">3</td>
                    <td style="width: 25%;">Halaman Tower</td>
                    <td>
                        <?= $detail_data['aspek_lingkungan']['halaman_tower'] ?><br>
                        Berikut foto dari halaman tower : <br>
                        <img style="margin-top: 10px;" width="400px" src="<?= base_url('assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_halaman_tower']) ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">4</td>
                    <td style="width: 25%;">Kondisi Lingkungan</td>
                    <td>
                        <?= $detail_data['aspek_lingkungan']['kondisi_lingkungan'] ?><br>
                        <b>Catatan</b> : <?= $detail_data['aspek_lingkungan']['catatan_kondisi_lingkungan'] ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">5</td>
                    <td style="width: 25%;">Potensi Hewan</td>
                    <td>
                        <?= $detail_data['aspek_lingkungan']['potensi_hewan'] ?><br>
                        Berikut foto dari potensi hewan : <br>
                        <img style="margin-top: 10px;" width="400px" src="<?= base_url('assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_potensi_hewan']) ?>" alt="">
                    </td>
                </tr>
            </table>
            <br>
            <br>

            <!-- ASPEK KONSTRUKSI -->
            <table class="table-hasil-jsa">
                <tr>
                    <td style="text-align: center; background-color: yellow" colspan="3">
                        ASPEK KONSTRUKSI
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">1</td>
                    <td style="width: 25%;">Jenis Tower</td>
                    <td><?= $detail_data['aspek_konstruksi']['jenis_tower'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">2</td>
                    <td style="width: 25%;">Type Tower</td>
                    <td>
                        <?= $detail_data['aspek_konstruksi']['type_tower'] ?><br>
                        Berikut foto dari type tower : <br>
                        <img style="margin-top: 10px;" width="400px" src="<?= base_url('assets/img/jsa/' . $detail_data['aspek_konstruksi']['foto_type_tower']) ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">3</td>
                    <td style="width: 25%;">Jenis Stringset Isolator</td>
                    <td>
                        <?= $detail_data['aspek_konstruksi']['jenis_stringset_isolator'] ?><br>
                        Berikut foto dari jenis stringset isolator : <br>
                        <img style="margin-top: 10px;" width="400px" src="<?= base_url('assets/img/jsa/' . $detail_data['aspek_konstruksi']['foto_jenis_stringset_isolator']) ?>" alt="">
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">4</td>
                    <td style="width: 25%;">Panjang Stringset Isolator</td>
                    <td><?= $detail_data['aspek_konstruksi']['panjang_stringset_isolator'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">5</td>
                    <td style="width: 25%;">Posisi Pin</td>
                    <td><?= $detail_data['aspek_konstruksi']['posisi_pin'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">6</td>
                    <td style="width: 25%;">Jumlah Konduktor</td>
                    <td><?= $detail_data['aspek_konstruksi']['jumlah_konduktor'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">7</td>
                    <td style="width: 25%;">Jenis Konduktor</td>
                    <td><?= $detail_data['aspek_konstruksi']['jenis_konduktor'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">8</td>
                    <td style="width: 25%;">Jarak Span</td>
                    <td><?= $detail_data['aspek_konstruksi']['jenis_konduktor'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">9</td>
                    <td style="width: 25%;">Kondisi Stepbolt</td>
                    <td><?= $detail_data['aspek_konstruksi']['kondisi_stepbolt'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">10</td>
                    <td style="width: 25%;">Lebar Traves</td>
                    <td><?= $detail_data['aspek_konstruksi']['lebar_traves'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">11</td>
                    <td style="width: 25%;">Jarak Antar Traves</td>
                    <td><?= $detail_data['aspek_konstruksi']['jarak_antar_traves'] ?></td>
                </tr>
            </table>
            <br>
            <br>

            <!-- ASPEK PELAKSANAAN -->
            <table class="table-hasil-jsa">
                <tr>
                    <td style="text-align: center; background-color: yellow" colspan="3">
                        ASPEK PELAKSANAAN
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">1</td>
                    <td style="width: 25%;">SOP PDKB</td>
                    <td><?= $detail_data['aspek_pelaksanaan']['sop'] ?></td>
                </tr>
                <tr>
                    <td style="width: 5%; text-align:center">2</td>
                    <td style="width: 25%;">IK PDKB</td>
                    <td><?= $detail_data['aspek_pelaksanaan']['ik'] ?></td>
                </tr>
            </table>

        <?php } else { ?>
            <h2 style="text-align: center;">Gagal Memuat PDF</h2>
        <?php } ?>
        </div>
</body>

</html>