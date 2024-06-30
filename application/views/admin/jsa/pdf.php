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
            border-collapse: collapse;
            width: 100%;
        }

        .table-sampul td,
        .table-sampul th {
            border: 1px solid black;
            padding: 8px;
        }

        .table-lampiran {
            border-collapse: collapse;
            width: 100%;
        }


        .table-lampiran th {
            border: 1pxpx solid black;
            padding: 8px;
            vertical-align: top;
            text-align: left;
        }

        .table-lampiran td {
            border-top: 0px solid black;
            border-bottom: 0px solid black;
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
    </style>
    <title>PDF Laporan JSA</title>
</head>

<body>
    <?php if (!empty($temuan_jsa) and !empty($foto_jsa)) { ?>
        <div class="container mt-5">

            <!-- SAMPUL -->
            <table class="table-sampul">
                <tr>
                    <th style="text-align: center;">
                        <h3>BERITA ACARA PELAKSANAAN HASIL JSA</h3>
                        <div style="width: 500px; display:inline-block; margin-top:-20px">
                            <h3 style="text-transform: uppercase;"><?= $query->judul_laporan ?></h3>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <img src="<?= base_url('assets/img/sampul_laporan_pekerjaan.jpg') ?>" style="width: 350px;  margin: 100px 50px;">
                    </td>
                </tr>
                <tr>
                    <th style="text-align: center; ">
                        <h3>PT. PLN (PERSERO) UPT BALIKPAPAN</h3>
                        <h3>BIDANG PDKB </h3>
                    </th>
                </tr>
            </table>
            <!-- END SAMPUL -->

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
                        <span class="header-table">DASAR PELAKSANAAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= $query->dasar_pelaksanaan ?></td>
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
                    <td>Pelaksanaan pekerjaan pada tanggal <?= date('d/m/Y', strtotime($query->mulai_pelaksanaan)) ?> sampai dengan <?= date('d/m/Y', strtotime($query->selesai_pelaksanaan)) ?></td>
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
                    <td><?= $query->lingkup_pekerjaan ?></td>
                </tr>

                <!-- ISI -->
                <tr>
                    <td style="width: 5px">
                        <span class="header-table">IV.</span>
                    </td>
                    <td style="width: 5px;"></td>
                    <td>
                        <span class="header-table">HASIL PEKERJAAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= nl2br($query->hasil_pekerjaan) ?></td>
                </tr>

                <!-- ISI -->
                <tr>
                    <td style="width: 5px">
                        <span class="header-table">V.</span>
                    </td>
                    <td style="width: 5px;"></td>
                    <td>
                        <span class="header-table">KESIMPULAN</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= nl2br($query->kesimpulan) ?></td>
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

            <table class="table-lampiran">
                <tr>
                    <th>Analisis Kondisi</th>
                    <th style="width: 40%;">Keterangan</th>
                    <th>Foto</th>
                </tr>
                <?php
                $jumlah_temuan_jsa = count($temuan_jsa);
                $jumlah_foto_jsa = count($foto_jsa);

                if ($jumlah_temuan_jsa > $jumlah_foto_jsa) {
                    $count = $jumlah_temuan_jsa;
                } else {
                    $count = $jumlah_foto_jsa;
                };
                ?>

                <?php for ($i = 0; $i < $count; $i++) : ?>
                    <tr>
                        <?php if (!empty($temuan_jsa[$i])) : ?>
                            <?php if (($count - 1) == $i) : ?>
                                <td style="text-align: left;vertical-align:top;border-bottom: 1px solid black">
                                    <span><?= $temuan_jsa[$i]->temuan ?></span>
                                </td>
                                <td style="text-align: left;vertical-align:top;border-bottom: 1px solid black">
                                    <span><?= $temuan_jsa[$i]->keterangan ?></span>
                                </td>
                            <?php else : ?>
                                <td style="text-align: left;vertical-align:top b">
                                    <span><?= $temuan_jsa[$i]->temuan ?></span>
                                </td>
                                <td style="text-align: left;">
                                    <span><?= $temuan_jsa[$i]->keterangan ?></span>
                                </td>
                            <?php endif ?>
                        <?php else : ?>
                            <?php if (($count - 1) == $i) : ?>
                                <td style="border-bottom: 1px solid black"></td>
                                <td style="border-bottom: 1px solid black"></td>
                            <?php else : ?>
                                <td></td>
                                <td></td>
                            <?php endif ?>
                        <?php endif ?>

                        <?php if (!empty($foto_jsa[$i])) : ?>
                            <?php if (($count - 1) == $i) : ?>
                                <td style="border-bottom: 1px solid black">
                                    <div style="text-align: center;">
                                        <img src="<?= base_url() ?>assets/img/jsa/<?= $foto_jsa[$i]->foto ?>" alt="" height="150px" style="padding: 10px">
                                    </div>
                                </td>
                            <?php else : ?>
                                <td>
                                    <div style="text-align: center;">
                                        <img src="<?= base_url() ?>assets/img/jsa/<?= $foto_jsa[$i]->foto ?>" alt="" height="150px" style="padding: 10px">
                                    </div>
                                </td>
                            <?php endif ?>
                        <?php else : ?>
                            <?php if (($count - 1) == $i) : ?>
                                <td style="border-bottom: 1px solid black"></td>
                            <?php else : ?>
                                <td></td>
                            <?php endif ?>
                        <?php endif ?>
                    </tr>
                <?php endfor ?>
            </table>


        <?php } else { ?>
            <h2 style="text-align: center;">Gagal Memuat PDF</h2>
        <?php } ?>
        </div>
</body>

</html>