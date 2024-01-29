<!DOCTYPE html>
<html>

<head>
    <title>PDF Histori Alat Kerja</title>
</head>

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

    .table-lampiran td,
    .table-lampiran th {
        border: 1px solid black;
        padding: 8px;
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
</style>

<body>
    <?php if (!empty($query)) { ?>
        <div class="container mt-5">

            <!-- SAMPUL -->
            <table class="table-sampul">
                <tr>
                    <th style="text-align: center;">
                        <h3>LAPORAN PEKERJAAN</h3>
                        <div style="width: 500px; display:inline-block; margin-top:-20px">
                            <h3 style="text-transform: uppercase;"><?= $query->dasar_pelaksanaan ?></h3>
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
                        <h3>PT. PLN (PERSERO) UPT KALTIMRA</h3>
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
                        <span class="header" style="padding: 0px; margin-top:10px; display: inline-block"><b>UNIT PELAKSANA TRANSMISI KALIMANTAN TIMUR DAN KALIMANTAN UTARA</b></span>
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
                    <td>Pelaksanaan pekerjaan pada tanggal <?= $query->waktu_pelaksanaan ?></td>
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
                        <span class="header-table">PENUTUP</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= nl2br($query->penutup) ?></td>
                </tr>
            </table>

            <div class="signature">
                <div style="margin-bottom: 10px;">Balikpapan, <?= $tanggal_sekarang ?></div>
                <div style="margin-bottom: 120px; text-align: center;">
                    <b>MANAGER BAGIAN PDKB</b>
                </div>
                <hr style="width: 150px;">
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
                        <span class="header" style="padding: 0px; margin-top:10px; display: inline-block"><b>UNIT PELAKSANA TRANSMISI KALIMANTAN TIMUR DAN KALIMANTAN UTARA</b></span>
                    </td>
                </tr>
            </table>
            <!-- END HEADER -->
            <div style="margin-bottom: 40px;"></div>

            <table class="table-content">
                <tr>
                    <td style="text-align: center;" colspan="3">
                        <span class="header-table">LAMPIRAN</span>
                    </td>
                </tr>
            </table>
            <br>
            <?php foreach ($lampiran as $l) : ?>
                <table class="table-lampiran">
                    <tr>
                        <td style=" text-align: center;" colspan="3">
                            <span class="header-table" style="text-transform: uppercase;"><?= $l->judul_lampiran ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <img src="<?= base_url() ?>assets/img/lampiran-pekerjaan/<?= $l->foto_sebelum ?>" alt="" width="150px">
                        </td>
                        <td style="text-align: center;">
                            <img src="<?= base_url() ?>assets/img/lampiran-pekerjaan/<?= $l->foto_proses ?>" alt="" width="150px">
                        </td>
                        <td style="text-align: center;">
                            <img src="<?= base_url() ?>assets/img/lampiran-pekerjaan/<?= $l->foto_setelah ?>" alt="" width="150px">
                        </td>
                    </tr>

                </table>
                <br>
            <?php endforeach; ?>
            <br>

        <?php } else { ?>
            <h2 style="text-align: center;">Gagal Memuat PDF</h2>
        <?php } ?>
</body>

</html>