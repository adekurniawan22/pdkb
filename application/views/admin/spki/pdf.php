<!DOCTYPE html>
<html>

<head>
    <title>PDF SPKI</title>
</head>

<style>
    .table-header {
        width: 100%;
        padding: 5px;
    }

    .table-content {
        border-collapse: collapse;
        width: 100%;
    }

    .table-content th,
    .table-content td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
        vertical-align: top;
    }

    .signature {
        margin-top: 20px;
        float: right;
        padding-top: 10px;
        text-align: center;
        page-break-inside: avoid;
    }

    .styled-list li {
        margin-left: -20px;
    }

    .titikdua {
        padding: 0 5px;
    }

    .bn {
        border-top: none !important;
        border-bottom: none !important;
        ;
        border-left: none !important;
        ;
        border-right: none !important;
        ;
    }

    .bn-xr {
        border-top: none !important;
        border-bottom: none !important;
        ;
        border-left: none !important;
        ;
    }
</style>

<body>
    <?php if ($query) { ?>
        <div class="container">
            <table class="table-header" style="background-color: #2f519e; color: white; border: 0px !important">
                <tr>
                    <td rowspan="4">
                        <img src="<?= $foto ?>" style="width: 50px;">
                    </td>
                    <td rowspan="4" style="padding-left:20px; text-align:left">
                        <span>PT PLN (PERSERO) UNIT INDUK PENYALURAN DAN PUSAT PENGATUR BEBAN KALIMANTAN</span>
                        <span>UNIT PEMELIHARAAN TRANSMISI BALIKPAPAN</span>
                    </td>
                </tr>
            </table>

            <br>
            <table class="table-header" style="margin-bottom: 30px;">
                <tr style="text-align: center;">
                    <td>
                        <span style="font-weight: bold; text-transform: uppercase; text-decoration: underline;">SURAT PERINTAH KERJA INTERN</span>
                    </td>
                </tr>
                <tr style="text-align: center;">
                    <td>
                        <span>NO. <?= $query->nomor ?>/PDKB-TT/<?= $query->bulan ?>/<?= $query->tahun ?></span>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td style="text-align: left;">Kepada</td>
                    <td class="titikdua">: <?= $query->kepada ?></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Dari</td>
                    <td class="titikdua">: <?= $query->dari ?></td>
                </tr>
            </table>
            <br>
            <table class="table-content">
                <tr>
                    <th>Macam Pekerjaan</th>
                    <td colspan="3"><?= $query->macam_pekerjaan ?></td>
                </tr>
                <tr>
                    <th>Lokasi Pekerjaan</th>
                    <td colspan="3"><?= nl2br($query->lokasi_pekerjaan) ?></td>
                </tr>
                <tr>
                    <th>Waktu Pelaksanaan</th>
                    <td colspan="3"><?= date('d/m/Y', strtotime($query->mulai_pelaksanaan)) . ' - ' . date('d/m/Y', strtotime($query->selesai_pelaksanaan)) ?></td>
                </tr>
                <tr>
                    <th rowspan="4">Nama / Jumlah Pelaksana</th>
                    <td style="width: 25%;" class="bn">
                        <b>PJ Pekerjaan</b>
                    </td>
                    <td style="width: 2px;" class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query->pj) ?></td>
                </tr>
                <tr>
                    <td class="bn">
                        <b>Pengawas Pekerjaan</b>
                    </td>
                    <td class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query->pengawas) ?></td>
                </tr>
                <tr>
                    <td class="bn">
                        <b>Pengawas K3</b>
                    </td>
                    <td class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query->pengawas_k3) ?></td>
                </tr>
                <tr>
                    <td class="bn">
                        <b>Pelaksana</b>
                    </td>
                    <td class="bn">:</td>
                    <td class="bn-xr"><?= nl2br($query->pelaksana) ?></td>
                </tr>
                <tr>
                    <th>Peralatan Yang Dipakai</th>
                    <td colspan="3"><?= nl2br($query->alat_kerja) ?></td>
                </tr>
                <tr>
                    <th>Uraian Kerja</th>
                    <td colspan="3"><?= nl2br($query->uraian_kerja) ?></td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td colspan="3"><?= nl2br($query->catatan) ?></td>
                </tr>
            </table>
        </div>

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

    <?php } else { ?>
        <h2 style="text-align: center;">Gagal Memuat PDF</h2>
    <?php } ?>
</body>

</html>